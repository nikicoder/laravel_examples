<?php

namespace App\Helpers;

class ConvertHelper
{
    public static function convertFoodVolumeToWeight(string $food, float $volume)
    {
        switch (mb_strtolower($food)) {
            case 'морковь':
                return $volume * 650;
            case 'картофель':
                return $volume * 750;
            case 'свекла':
                return $volume * 650;
            case 'лук':
                return $volume * 350;
            case 'капуста':
                return $volume * 400;
        }
        
    }
}