<?php

namespace App\Utils;

use NumberFormatter;

/**
 * DateFormatter
 */
class MoneyFormatter
{        
    /**
     * getFmt
     *
     * @param  String $locale
     * @return NumberFormatter
     */
    public static function getFmt(String $locale) : NumberFormatter
    {
        return new NumberFormatter($locale, NumberFormatter::CURRENCY);
    }

    /**
     * formatToBRL
     *
     * @param float $value
     * @return String
     */
    public static function formatToBRL($value) : String
    {
        $value = (float) $value;
        return MoneyFormatter::getFmt('pt_BR')->formatCurrency($value, 'BRL');
    }
}