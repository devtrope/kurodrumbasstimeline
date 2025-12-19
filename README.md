# Kuro Drumbass Timeline

Kuro Drumbass Timeline is a simple, framework-agnostic PHP library designed to format dates based on the birth date of Kuro Drumbass in multiple languages.

## Installation

### Via Composer (recommended)

```bash
composer require devtrope/kurodrumbasstimeline
```

### Manual installation

- Download the source
- Include the files in your project

## Basic Usage

```php
use KuroDrumbassTimeline\Converter;
use KuroDrumbassTimeline\Configuration;

$configuration = new Configuration();
$configuration->setLocale('en_US');
$converter = new Converter($configuration);
$date = '1990-06-15';
$result = $converter->toKuroFormat($date);
// November 15, 3 before Kuro Drumbass
```

## Supported Languages

Translations are stored using *ISO 639-1 language codes*:

```json
{
    "fr": { "before": "avant", "after": "après" },
    "en": { "before": "before", "after": "after" },
    "es": { "before": "antes", "after": "después" },
    "de": { "before": "vor", "after": "nach" },
    "it": { "before": "prima", "after": "dopo" },
    "pt": { "before": "antes", "after": "depois" },
    "nl": { "before": "voor", "after": "na" },
    "pl": { "before": "przed", "after": "po" },
    "ru": { "before": "до", "after": "после" },
    "ja": { "before": "前", "after": "後" },
    "zh": { "before": "之前", "after": "之后" },
    "ko": { "before": "이전", "after": "이후" },
    "ar": { "before": "قبل", "after": "بعد" }
}
```

## License

MIT Licence - see [LICENSE](LICENSE.md) for details.