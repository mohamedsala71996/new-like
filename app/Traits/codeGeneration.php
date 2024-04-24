<?php

namespace App\Traits;

function generateRandomCode($length = 8) {
    $min = pow(10, $length - 1);
    $max = pow(10, $length) - 1;
    return str_pad(rand($min, $max), $length, '0', STR_PAD_LEFT);
}

trait codeGeneration
{

    static public function codeGeneration(): void
    {
        static::saving(function($model){
            $model->verify_code = generateRandomCode();
        });
    }
}
