<?php

namespace App;

class Helper
{
    public static function envUpdate($key, $value)
    {

        // Path to current .env file
        $path = base_path('.env');

        // Trim leading and trailing spaces (if any)
        $value = trim($value);

        //check whether key exists or not


        // Replace contents of current .env with given modifications
        if (file_exists($path)) {
            file_put_contents($path, str_replace(
                $key . '=' . env($key),
                $key . '=' . $value,
                file_get_contents($path)
            ));
        }
    }
}
