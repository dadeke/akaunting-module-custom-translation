# Custom Translation app for Akaunting

[![Release](https://img.shields.io/github/v/release/dadeke/akaunting-module-custom-translation?label=release)](https://github.com/dadeke/akaunting-module-custom-translation/releases)
[![Tests](https://github.com/dadeke/akaunting-module-custom-translation/actions/workflows/tests.yml/badge.svg)](https://github.com/dadeke/akaunting-module-custom-translation/actions)
[![License](https://img.shields.io/github/license/dadeke/akaunting-module-custom-translation?label=license)](LICENSE.txt)

This app is workaround that allows you to replace some the official Akaunting translation without editing its core. It will be useful while it is not possible to fix some translations in the [Crowdin](https://crowdin.com/project/akaunting) project.


## Requirements

- [Akaunting 3](https://github.com/akaunting/akaunting/releases)

## Installation

- Into `modules` create folder `CustomTranslation` (camel case)
- Download the last release [https://github.com/dadeke/akaunting-module-custom-translation/releases](https://github.com/dadeke/akaunting-module-custom-translation/releases) **custom-translation-(version).zip**
- Extract zip file into `modules/CustomTranslation`
- [Install](https://akaunting.com/hc/docs/developers/modules/#67474166c92e) the module: `php artisan module:install custom-translation 1`

## Settings

Add more lines into JSON files to fix the translation in your installation:

### Spanish 🇪🇸

https://github.com/dadeke/akaunting-module-custom-translation/blob/75f7fae6e1fd939240fbec9bdb8e464350868e2a/Resources/overrides/lang/es-ES.json#L1-L4

### Portuguese 🇧🇷

https://github.com/dadeke/akaunting-module-custom-translation/blob/75f7fae6e1fd939240fbec9bdb8e464350868e2a/Resources/overrides/lang/pt-BR.json#L1-L4
