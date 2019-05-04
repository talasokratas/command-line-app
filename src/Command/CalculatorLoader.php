<?php
/**
 * Created by PhpStorm.
 * User: ritmas
 * Date: 04/05/2019
 * Time: 14:42
 */

namespace App\Command;


class CalculatorLoader
{
    /** @var GoogleApi */
    private $weatherService;
    /**
     * LoaderService constructor.
     * @param GoogleApi $weatherService
     */
    public function __construct(GoogleApi $weatherService)
    {
        $this->weatherService = $weatherService;
    }
    /**
     * @param DateTime $day
     * @return Weather
     * @throws Exception
     */
    public function loadWeatherByDay(DateTime $day): Weather
    {
        return $this->weatherService->getDay($day);
    }
}