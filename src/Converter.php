<?php

namespace KuroDrumbassTimeline;

use DateTime;
use IntlDateFormatter;

class Converter
{
    private const BASE_YEAR = 1993;
    private array $prefix = [];

    public function __construct(private Configuration $configuration)
    {
        $jsonData = file_get_contents(__DIR__ . '/prefix.json');
        $this->prefix = json_decode($jsonData, true);
    }

    private function formatDateLocale(DateTime $dateTime): bool|string
    {
        $pattern = 'dd MMMM';
        if ($this->configuration->getIsAmerican()) {
            // Because America !!!
            $pattern = 'MMMM dd,';
        }

        $formatter = new IntlDateFormatter(
            $this->configuration->getLocale(),
            IntlDateFormatter::NONE,
            IntlDateFormatter::NONE,
            $dateTime->getTimezone()->getName(),
            IntlDateFormatter::GREGORIAN,
            $pattern
        );

        return $formatter->format($dateTime);
    }

    public function toKuroFormat(string|DateTime $dateToConvert): string
    {
        if (!$dateToConvert instanceof DateTime) {
            $dateToConvert = new DateTime($dateToConvert);
        }
        $year = (int)$dateToConvert->format('Y');
        $difference = $year - self::BASE_YEAR;
        $formattedDate = $this->formatDateLocale($dateToConvert);
        $stringPrefix = $this->getStringPrefix($difference);

        if ($difference < 0) {
            $difference = abs($difference);
        }

        return "{$formattedDate} {$difference} {$stringPrefix} Kuro Drumbass";
    }

    private function getStringPrefix(int $difference): mixed
    {
        $arrayKey = 'after';
        if ($difference < 0) {
            $arrayKey = 'before';
        }

        return $this->prefix[$this->configuration->getLocale()][$arrayKey];
    }
}
