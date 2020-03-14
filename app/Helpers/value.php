<?php

if (!function_exists('numerical')) {
    /**
     * Helper get decimal value if needed.
     * @param $number
     * @param int $precision
     * @param bool $trimmed
     * @param string $dec_point
     * @param string $thousands_sep
     * @return int|string
     */
    function numerical($number, $precision = 3, $trimmed = true, $dec_point = ',', $thousands_sep = '.')
    {
        if (empty($number)) {
            return 0;
        }
        $formatted = number_format($number, $precision, $dec_point, $thousands_sep);

        if (!$trimmed) {
            return $formatted;
        }

        // Trim unnecessary zero after comma: (2,000 -> 2) or (3,200 -> 3,2)
        return strpos($formatted, $dec_point) !== false ? rtrim(rtrim($formatted, '0'), $dec_point) : $formatted;;

        /* Trim only zero after comma: (2,000 -> 2) but (3,200 -> 3,200)
        $decimalString = '';
        for ($i = 0; $i < $precision; $i++) {
            $decimalString .= '0';
        }
        $trimmedNumber = str_replace($dec_point . $decimalString, "", (string)$formatted);
        return $trimmedNumber;
        */
    }
}

if (!function_exists('if_empty')) {
    /**
     * Helper get decimal value if needed.
     * @param $value
     * @param string $default
     * @param string $prefix
     * @param string $suffix
     * @param bool $strict
     * @return array|string
     */
    function if_empty($value, $default = '', $prefix = '', $suffix = '', $strict = false)
    {
        if (is_null($value) || empty($value)) {
            return $default;
        }

        if ($strict) {
            if ($value == '0' || $value == '-' || $value == '0000-00-00' || $value == '0000-00-00 00:00:00') {
                return $default;
            }
        }

        if (is_array($value)) {
            return $value;
        }

        return is_null($default) ? $value : $prefix . $value . $suffix;
    }
}


if (!function_exists('get_if_exist')) {
    /**
     * Helper get decimal value if needed.
     * @param $array
     * @param string $key
     * @param string $default
     * @return array|string
     */
    function get_if_exist($array, $key = '', $default = '')
    {
        if (is_array($array) && key_exists($key, if_empty($array, []))) {
            if (!empty($array[$key])) {
                return $array[$key];
            }
        }

        return $default;
    }
}
