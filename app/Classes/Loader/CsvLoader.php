<?php

namespace App\Classes\Loader;

/**
 * Loads the csv file and returns a customized Array for database seeding
 */
class CsvLoader
{
    public static function load($file)
    {
        // Open file
        $h = fopen($file, 'r');
        $array_data = [];

        while( ($data = fgetcsv($h, 1000, ',')) !== FALSE)
        {
            $array_data[] = $data;
        }

        fclose($h);

        // Asign column names
        $columns = $array_data[0];
        $columns = array_slice($columns, 1);
        unset($array_data[0]); // Remove the column names

        // Build array with congruent keys
        $data = [];
        foreach ($array_data as $values) {
            $tmp = [];
            $id = $values[0];

            foreach (array_slice($values, 1) as $key => $value)
            {
                $tmp[ $columns[$key] ] = $value;
            }

            $data[$id] = $tmp;
        }

        return $data;
    }
}