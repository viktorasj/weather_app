<?php
/**
 * Created by PhpStorm.
 * User: vic
 * Date: 18.12.12
 * Time: 02.13
 */

namespace App\Service;


class AgeCalculator
{
    public function calculateAge (\DateTime $birthdate)
    {
        $today = new \DateTime;
        $age = $today->diff($birthdate)->y;
        return $age;
    }
}