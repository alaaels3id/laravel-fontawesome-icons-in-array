<?php

namespace App\Http;

class Icon
{
    public static function getBIIcons($with_null = null): array
    {
        $icons = $with_null == null ? [] : ['' => ''];

        $lines = self::get_file_in_array(public_path(self::normalizePath('assets/vendors/bicon/bootstrap-icons.css')));

        $callback = function($line) {
            $class = str_replace(['::before', '.'],'', $line);

            return ['icon' => $class, 'name' => last(explode('bi-', $class))];
        };

        $icons += array_map($callback, array_slice($lines,2));

        return $icons;
    }

    public static function getFAIcons($with_null = null): array
    {
        $icons = $with_null == null ? [] : ['' => ''];

        $lines = self::get_file_in_array(public_path(self::normalizePath('assets/vendors/fontawesome/css/fontawesome.css')));

        $callback = function($line) {
            $class = str_replace([':before', '.'],'', $line);

            return ['icon' => $class, 'name' => last(explode('fa-', $class))];
        };

        $icons += array_map($callback, array_slice($lines,39));

        return $icons;
    }

    public static function get_file_in_array($file_path): array
    {
        $lines = [];

        $file_content = str_replace(["\r", "\n", "\t", " "],"", file_get_contents($file_path));

        $first = explode('}', $file_content);

        if($first)
        {
            foreach($first as $v)
            {
                $second = explode('{', $v);

                if(isset($second[0]) && $second[0] !== '') $lines[] = trim($second[0]);
            }
        }

        return $lines;
    }

    private static function normalizePath($path)
    {
        return str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $path);
    }
}
