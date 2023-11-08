<?php

namespace Modules\CustomTranslation\Overrides\Illuminate\Translation;

use Illuminate\Translation\Translator as OriginalTranslator;

class Translator extends OriginalTranslator
{
    /**
     * The array of texts translation to replacement.
     *
     * @var array
     */
    private $newTexts = [];

    /**
     * The current locate.
     *
     * @var array
     */
    private $currentLocale;

    /**
     * Set the default locale.
     *
     * @param  string  $locale
     * @return void
     *
     * @throws \InvalidArgumentException
     */
    public function setLocale($locale)
    {
        parent::setLocale($locale);

        if($locale == $this->currentLocale) {
            return;
        }

        $this->currentLocale = $locale;
        $jsonPath = module_path('custom-translation')
            . '/Resources/overrides/lang/'
            . $locale . '.json';

        if(file_exists($jsonPath)) {
            $this->newTexts = json_decode(file_get_contents($jsonPath), true);
        }
    }

    /**
     * Get the translation for the given key.
     *
     * @param  string  $key
     * @param  array  $replace
     * @param  string|null  $locale
     * @param  bool  $fallback
     * @return string|array
     */
    public function get($key, array $replace = [], $locale = null, $fallback = true)
    {
        $line = parent::get($key, $replace, $locale, $fallback);
        if(is_string($line) && array_key_exists($line, $this->newTexts)) {
            $line = $this->newTexts[$line];
        }

        return $line;
    }
}
