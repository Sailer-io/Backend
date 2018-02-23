<?php
/**
 * https://dwm.ovh
 * User: Lénaïc GROLLEAU
 * Date: 17/02/18
 * Time: 18:37
 */

namespace App;

abstract class Utils
{
    public static function generateRandomString($length = 12)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}