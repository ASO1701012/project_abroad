<?php


class DBReturnValueConversion
{
    public static function dbConversion($ans){
        $count = 0;
        foreach ($ans as $i){
            foreach ($i as $key => $value){
                if(is_string($key)){
                    unset($ans[$count][$key]);
                }
            }
            $count++;
        }
        $json_li = json_encode($ans);
        return $json_li;
    }
}