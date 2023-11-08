<?php

namespace Modules\CustomTranslation\Tests\Feature;

use Tests\Feature\FeatureTestCase;

class InvoiceTest extends FeatureTestCase
{
    protected function getTexts($locale) {
        $jsonPath = module_path('custom-translation')
            . '/Resources/overrides/lang/'
            . $locale
            . '.json';
        return json_decode(file_get_contents($jsonPath), true);
    }

    public function testItShouldSeeNewInvoiceSpanishCustomText()
    {
        $this->user->locale = 'es-ES';
        $this->user->save();

        $newTexts = $this->getTexts($this->user->locale);

        $this->loginAs()
            ->get(route('invoices.index'))
            ->assertStatus(200)
            ->assertSeeText($newTexts['Nuevo Factura']);
    }

    public function testItShouldSeeNewRecurringInvoiceSpanishCustomText()
    {
        $this->user->locale = 'es-ES';
        $this->user->save();

        $newTexts = $this->getTexts($this->user->locale);

        $this->loginAs()
            ->get(route('recurring-invoices.index'))
            ->assertStatus(200)
            ->assertSeeText($newTexts['Nuevo Factura recurrente']);
    }

    public function testItShouldSeeNewInvoicePortugueseCustomText()
    {
        $this->user->locale = 'pt-BR';
        $this->user->save();

        $newTexts = $this->getTexts($this->user->locale);

        $this->loginAs()
            ->get(route('invoices.index'))
            ->assertStatus(200)
            ->assertSeeText($newTexts['Novo Fatura']);
    }

    public function testItShouldSeeNewRecurringInvoicePortugueseCustomText()
    {
        $this->user->locale = 'pt-BR';
        $this->user->save();

        $newTexts = $this->getTexts($this->user->locale);

        $this->loginAs()
            ->get(route('recurring-invoices.index'))
            ->assertStatus(200)
            ->assertSeeText($newTexts['Novo Fatura recorrente']);
    }
}
