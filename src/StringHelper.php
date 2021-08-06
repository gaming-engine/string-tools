<?php

namespace GamingEngine\StringTools;

class StringHelper
{
    public static function template(string $template, array $values = []): string
    {
        foreach($values as $key => $value) {
            $template = str_ireplace(
                '{' . $key . '}',
                $value,
                $template
            );
        }

        return $template;
    }
}