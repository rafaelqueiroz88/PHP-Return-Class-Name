<?php

class Father {

    private static function isPartUppercase($string) {
        
        $count = strlen($string);
        
        for($i = 0; $i < $count; $i++) {
            if(ctype_upper($string[$i]) && $i == 0) {
                $string[$i] = lcfirst($string[$i]);
            }
            else if(ctype_upper($string[$i]) && $i > 0) {
                $wordstart = substr($string, 0, $i);
                $wordend = substr($string, $i, $count);
                $string = $wordstart . '_' . lcfirst($wordend);
            }            
        }

        return $string;
    }

    public static function GetClassName() {
        
        $class  = get_called_class();
        $return = self::isPartUppercase($class);
        if($return)
            return $return;
    }
}