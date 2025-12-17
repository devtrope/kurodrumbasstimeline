<?php

namespace KuroDrumbassTimeline;

use DateTime;
use IntlDateFormatter;

class Converter
{
    private const BASE_YEAR = 1993;
    private const LOCALE = 'fr_FR';

    private function formatDateLocale(DateTime $dateTime)
    {
        $formatter = new IntlDateFormatter(
            self::LOCALE,
            IntlDateFormatter::NONE,
            IntlDateFormatter::NONE,
            $dateTime->getTimezone()->getName(),
            IntlDateFormatter::GREGORIAN,
            'dd MMMM'
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

        if ($difference < 0) {
            $difference = abs($difference);
            return "{$formattedDate} {$difference} avant Kuro Drumbass";
        }

        return "{$formattedDate} {$difference} après Kuro Drumbass";
    }
}
