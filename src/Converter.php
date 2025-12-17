<?php

namespace KuroDrumbassTimeline;

use DateTime;

class Converter
{
    private const BASE_YEAR = 1993;

    public function toKuroFormat(string|DateTime $dateToConvert): string
    {
        if (!$dateToConvert instanceof DateTime) {
            $dateToConvert = new DateTime($dateToConvert);
        }
        $year = (int)$dateToConvert->format('Y');
        $difference = $year - self::BASE_YEAR;

        if ($difference < 0) {
            return $dateToConvert->format('d m') . " " . $difference . " avant Kuro Drumbass";
        }

        return $dateToConvert->format('d m') . " " . $difference . " après Kuro Drumbass";
    }
}