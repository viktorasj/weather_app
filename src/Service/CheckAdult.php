<?php


namespace App\Service;


class CheckAdult
{
    public function checkAdult(int $age): bool
    {
        if($age >= 18)
        {
            return true;
        }
    }
}