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

    public static function getNfzList()
    {
        return array(
            1 => array('code' => '01', 'name' => 'Dolnośląski Oddział Narodowego Funduszu Zdrowia we Wrocławiu.'),
            2 => array('code' => '02', 'name' => 'Kujawsko-Pomorski Oddział Narodowego Funduszu Zdrowia w Bydgoszczy.'),
            3 => array('code' => '03', 'name' => 'Lubelski Oddział Narodowego Funduszu Zdrowia w Lublinie.'),
            4 => array('code' => '04', 'name' => 'Lubuski Oddział Narodowego Funduszu Zdrowia w Zielonej Górze.'),
            5 => array('code' => '05', 'name' => 'Łódzki Oddział Narodowego Funduszu Zdrowia w Łodzi.'),
            6 => array('code' => '06', 'name' => 'Małopolski Oddział Narodowego Funduszu Zdrowia w Krakowie.'),
            7 => array('code' => '07', 'name' => 'Mazowiecki Oddział Narodowego Funduszu Zdrowia w Warszawie.'),
            8 => array('code' => '08', 'name' => 'Opolski Oddział Narodowego Funduszu Zdrowia w Opolu.'),
            9 => array('code' => '09', 'name' => 'Podkarpacki Oddział Narodowego Funduszu Zdrowia w Rzeszowie.'),
            10 => array('code' => '10', 'name' => 'Podlaski Oddział Narodowego Funduszu Zdrowia w Białymstoku.'),
            11 => array('code' => '11', 'name' => 'Pomorski Oddział Narodowego Funduszu Zdrowia w Gdańsku.'),
            12 => array('code' => '12', 'name' => 'Śląski Oddział Narodowego Funduszu Zdrowia w Katowicach.'),
            13 => array('code' => '13', 'name' => 'Świętokrzyski Oddział Narodowego Funduszu Zdrowia w Kielcach.'),
            14 => array('code' => '14', 'name' => 'Warmińsko-Mazurski Oddział Narodowego Funduszu Zdrowia w Olsztynie.'),
            15 => array('code' => '15', 'name' => 'Wielkopolski Oddział Narodowego Funduszu Zdrowia w Poznaniu.'),
            16 => array('code' => '16', 'name' => 'Zachodniopomorski Oddział Narodowego Funduszu Zdrowia w Szczecinie.'),
        );

    }

    public static function getNfz(int $id)
    {
        return ($id >= 1 && $id <= 16) ? Dictionary::getNfzList()[$id] : false;
    }
}
