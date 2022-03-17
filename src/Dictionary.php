<?php

namespace Illusionpro\ValidatePolish;

class Dictionary
{

    public static function getProvinces()
    {
        return array(
            1 => 'dolnośląskie',
            2 => 'kujawsko-pomorskie',
            3 => 'lubelskie',
            4 => 'lubuskie',
            5 => 'łódzkie',
            6 => 'małopolskie',
            7 => 'mazowieckie',
            8 => 'opolskie',
            9 => 'podkarpackie',
            10 => 'podlaskie',
            11 => 'pomorskie',
            12 => 'śląskie',
            13 => 'świętokrzyskie',
            14 => 'warmińsko-mazurskie',
            15 => 'wielkopolskie',
            16 => 'zachodniopomorskie'
        );
    }

    public static function getProvince($id)
    {
        return ($id >= 1 && $id <= 16) ? Dictionary::getProvinces()[$id] : false;
    }
}