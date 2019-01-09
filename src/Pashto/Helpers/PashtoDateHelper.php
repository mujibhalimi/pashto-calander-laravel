<?php

namespace Mujibhalimi\Pashto\Helpers;

use mujibhalimi\Pashto\IntlDatetime;

/**
 * Class PashtoDateHelper
 * @package Halimi\Pashto
 * @author  Mujib <salimjan3008@gmail.com>
 */
class PashtoDateHelper
{
    /**
     * Gregorian to Jalali
     *
     * @param $date
     * @param string $format
     * @param string $locale
     * @link http://userguide.icu-project.org/formatparse/datetime
     *
     * @return string
     */
    public function gToj ($date, $format = 'yyyy/MM/dd H:m:s', $locale = 'ps', $timezone = null)
    {
        $date = new IntlDatetime($date, $timezone, 'gregorian');
        $date->setCalendar('pashto');
        $date->setLocale($locale);

        return $date->format($format);
    }

    /**
     * Jalali to Gregorian
     *
     * @param $date
     * @param string $format
     * @param string $inputLocale
     * @param string $locale
     * @link http://userguide.icu-project.org/formatparse/datetime
     *
     * @return string
     */
    public function jTog ($date, $format = 'yyyy/MM/dd H:m:s', $inputLocale = 'ps', $locale = 'en', $timezone = 'Asia/Kabul')
    {
        $date = new IntlDatetime($date, $timezone, 'pashto', $inputLocale);

        $date->setCalendar('Gregorian');
        $date->setLocale($locale);

        return $date->format($format);
    }

    /**
     * @param integer $timestamp timestamp
     *
     * @return false|string
     */
    public function moment ($timestamp)
    {
        if (!ctype_digit($timestamp)) {
            $timestamp = strtotime($timestamp);
        }
        $diff = time() - $timestamp;
        if ($diff == 0) {
            return 'اوس';
        }
        elseif ($diff > 0) {
            $day_diff = floor($diff / 86400);
            if ($day_diff == 0) {
                if ($diff < 60) return 'اوس';
                if ($diff < 120) return 'یوه دقیقه مخکې';
                if ($diff < 3600) return floor($diff / 60) . ' دقیقه مخکې';
                if ($diff < 7200) return 'یو ساعت مخکې';
                if ($diff < 86400) return floor($diff / 3600) . ' ساعت مخکې';
            }
            if ($day_diff == 1) {
                return 'پرون';
            }
            if ($day_diff < 7) {
                return $day_diff . ' ورځ مخکې';
            }
            if ($day_diff < 31) {
                return ceil($day_diff / 7) . ' اونۍ مخکې';
            }
            if ($day_diff < 60) {
                return 'تېره میاشت';
            }

            return date('F Y', $timestamp);
        }
        else {
            $diff     = abs($diff);
            $day_diff = floor($diff / 86400);
            if ($day_diff == 0) {
                if ($diff < 120) {
                    return 'یوه دقیقه مخکې';
                }
                if ($diff < 3600) {
                    return floor($diff / 60) . ' دقیقه مخکې';
                }
                if ($diff < 7200) {
                    return 'یو ساعت مخکې';
                }
                if ($diff < 86400) {
                    return floor($diff / 3600) . ' ساعت مخکې';
                }
            }
            if ($day_diff == 1) {
                return 'سبا';
            }
            if ($day_diff < 4) {
                return date('l', $timestamp);
            }
            if ($day_diff < 7 + (7 - date('w'))) {
                return 'بله اونۍ';
            }
            if (ceil($day_diff / 7) < 4) {
                return 'په ' . ceil($day_diff / 7) . ' اونۍ';
            }
            if (date('n', $timestamp) == date('n') + 1) {
                return 'بله میاشت';
            }

            return date('F Y', $timestamp);
        }
    }

    /**
     * @param integer $timestamp timestamp
     *
     * @return false|string
     */
    public function momentEn ($timestamp)
    {
        if (!ctype_digit($timestamp)) {
            $timestamp = strtotime($timestamp);
        }
        $diff = time() - $timestamp;
        if ($diff == 0) {
            return 'now';
        }
        elseif ($diff > 0) {
            $day_diff = floor($diff / 86400);
            if ($day_diff == 0) {
                if ($diff < 60) return 'just now';
                if ($diff < 120) return '1 minute ago';
                if ($diff < 3600) return floor($diff / 60) . ' minutes ago';
                if ($diff < 7200) return '1 hour ago';
                if ($diff < 86400) return floor($diff / 3600) . ' hours ago';
            }
            if ($day_diff == 1) {
                return 'Yesterday';
            }
            if ($day_diff < 7) {
                return $day_diff . ' days ago';
            }
            if ($day_diff < 31) {
                return ceil($day_diff / 7) . ' weeks ago';
            }
            if ($day_diff < 60) {
                return 'last month';
            }

            return date('F Y', $timestamp);
        }
        else {
            $diff     = abs($diff);
            $day_diff = floor($diff / 86400);
            if ($day_diff == 0) {
                if ($diff < 120) {
                    return 'in a minute';
                }
                if ($diff < 3600) {
                    return 'in ' . floor($diff / 60) . ' minutes';
                }
                if ($diff < 7200) {
                    return 'in an hour';
                }
                if ($diff < 86400) {
                    return 'in ' . floor($diff / 3600) . ' hours';
                }
            }
            if ($day_diff == 1) {
                return 'Tomorrow';
            }
            if ($day_diff < 4) {
                return date('l', $timestamp);
            }
            if ($day_diff < 7 + (7 - date('w'))) {
                return 'next week';
            }
            if (ceil($day_diff / 7) < 4) {
                return 'in ' . ceil($day_diff / 7) . ' weeks';
            }
            if (date('n', $timestamp) == date('n') + 1) {
                return 'next month';
            }

            return date('F Y', $timestamp);
        }
    }
}
