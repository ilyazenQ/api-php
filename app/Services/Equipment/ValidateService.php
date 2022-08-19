<?php

namespace App\Services\Equipment;

class ValidateService implements Validator
{
    public function validate()
    {
        if (!$_POST('title'))
        {
            return false;
        }
        return true;
    }
}