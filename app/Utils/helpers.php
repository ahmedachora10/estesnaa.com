<?php

use App\Models\Setting;

if (! function_exists('setting')) {

    function setting($key, $default = null)
    {
        if (is_null($key)) {
            return new Setting();
        }

        if (is_array($key)) {
            return Setting::set($key[0], $key[1]);
        }

        $value = Setting::get($key);

        return is_null($value) ? value($default) : $value;
    }
}

if (! function_exists('date_for_humans')) {

    function date_for_humans(int $day)
    {
        if (!is_int($day)) {
            return $day;
        }

        $day_for_humans = null;

        if($day == 1) { $day_for_humans = 'يوم'; }
        elseif($day == 2) { $day_for_humans = 'يومين'; }
        elseif($day >= 3 && $day <= 10) { $day_for_humans = 'أيام'; }
        elseif($day > 10) { $day_for_humans = 'يوم'; }

        return  $day .' '. $day_for_humans;
    }
}

if (! function_exists('views_for_humans')) {

    function views_for_humans(int $view)
    {
        if (!is_int($view)) {
            return $view;
        }

        $view_for_humans = null;

        if($view == 1) { $view_for_humans = 'مشاهدة'; }
        elseif($view == 2) { $view_for_humans = 'مشاهدات'; }
        elseif($view >= 3 && $view <= 10) { $view_for_humans = 'مشاهدات'; }
        elseif($view > 10) { $view_for_humans = 'مشاهدة'; }

        return  $view .' '. $view_for_humans;
    }
}