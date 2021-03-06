<?php

namespace App\Facades;

use \Illuminate\Support\Facades\Facade;

class Utils extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'utils';
    }

    /**
     * Convert seconds to an array of hours, minutes, seconds
     * @param $seconds
     * @return array['h', 'm', 's']
     */
    public static function secondsToTimeParts($seconds): array
    {
        $dtF = new \DateTime('@0');
        $dtT = new \DateTime("@$seconds");

        $t = $dtF->diff($dtT);

        $retval = [];
        $retval['h'] = (int) $t->format('%h');
        $retval['m'] = (int) $t->format('%i');
        $retval['s'] = (int) $t->format('%s');

        return $retval;
    }

    /**
     * Convert seconds to HH MM format
     * @param $seconds
     * @param bool $incl_sec
     * @return string
     */
    public static function secondsToTime($seconds, $incl_sec=false): string
    {
        $hms = self::secondsToTimeParts($seconds);
        $format = $hms['h'].'h '.$hms['m'].'m';
        if($incl_sec) {
            $format .= ' '.$hms['s'].'s';
        }

        return $format;
    }

    /**
     * Bitwise operator for setting days of week to integer field
     * @param int $datefield initial datefield
     * @param array $day_enums Array of values from config("enum.days")
     * @return int
     */
    public static function setDays(int $datefield, array $day_enums) {
        foreach($day_enums as $day) {
            $datefield |= $day;
        }

        return $datefield;
    }

    /**
     * Bit check if a day exists within a integer bitfield
     * @param int $datefield datefield from database
     * @param int $day_enum Value from config("enum.days")
     * @return bool
     */
    public static function hasDay(int $datefield, int $day_enum) {
        return ($datefield & $day_enum) === $datefield;
    }
}
