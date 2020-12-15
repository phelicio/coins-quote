<?php

namespace App\Utils;

use \Carbon\Carbon;

/**
 * DateFormatter
 */
class DateFormatter
{    
    /**
     * formatFromTimestamp
     *
     * @param  mixed $timestamp
     * @return String
     */
    public static function formatFromTimestamp($timestamp) : String
    {
        return Carbon::createFromTimestamp($timestamp)->format('d/m/Y - H:i:s');
    }
}