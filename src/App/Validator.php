<?php
    namespace NalSolution\App;
    class Validator
    {
        public static function validate($value, $type){
            switch ($type) {
                case 'required':
                    return !empty($value);
                case 'numbers':
                    preg_match('/^[0-9]*$/', $value, $matches);
                    return !empty($value) && $matches[0];
                case 'date(y-m-d)':
                    $array = explode("-", $value);
                    return !empty($value) && checkdate($array[2], $array[1], $array[0]);
                default:
                    return false;
            }
        }
    }
?>