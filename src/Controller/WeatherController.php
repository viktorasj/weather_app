<?php

namespace App\Controller;

use App\GoogleApi\WeatherService;
use App\Validation\ValidationService;
use App\Model\NullWeather;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class WeatherController extends AbstractController
{
    public function index($day)
    {
        try {
            if($day){
                $validation = new ValidationService($day);
                dump($validation);
                if($validation->getErrors() !== null) {
                    echo ($validation->getErrors());
                    exit;
                }
            }
            $fromGoogle = new WeatherService();
            $weather = $fromGoogle->getDay(new \DateTime($day));
        } catch (\Exception $exp) {
            $weather = new NullWeather();
        }

        return $this->render('weather/index.html.twig', [
            'weatherData' => [
                'date'      => $weather->getDate()->format('Y-m-d'),
                'dayTemp'   => $weather->getDayTemp(),
                'nightTemp' => $weather->getNightTemp(),
                'sky'       => $weather->getSky()
            ],
        ]);
    }
}
