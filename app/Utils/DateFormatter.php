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
        $date = Carbon::createFromTimestamp($timestamp);
        $date->sub('hour', 3);
        return $date->format('d/m/Y - H:i:s');
    }
}