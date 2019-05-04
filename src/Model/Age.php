<?php
/**
 * Created by PhpStorm.
 * User: ritmas
 * Date: 04/05/2019
 * Time: 14:28
 */

namespace App\Model;


use DateTime;

class Age
{
    private $age;


    /**
     * Age constructor.
     * @param $dob
     */
    public function __construct($dob)
    {
        $this->age = $this->calculateAge($dob);
    }

    /**
     * @param $dob
     * @return int
     */
    public function calculateAge($dob) : int
    {
        $birthDay = new DateTime($dob);
        $today = new Datetime(date('y-m-d'));
        $age = $today->diff($birthDay);

        return $age->y;

    }

}