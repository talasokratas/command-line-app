<?php
/**
 * Created by PhpStorm.
 * User: ritmas
 * Date: 04/05/2019
 * Time: 16:27
 */

namespace App\Calculator;


use DateTime;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

;

abstract class AbstractCalculator
{

    /**
     * @param DateTime $dob
     * @return int
     */
    public function calculateAge(\DateTime $dob): int
    {
        $today = new Datetime(date('m.d.y'));
        $age = $today->diff($dob);

        return $age->y;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    abstract public function printInfo(InputInterface $input, OutputInterface $output): void;


    /**
     * @param string $dob
     * @return bool
     */
    public function checkDateFormat(string $dob): bool
    {
        $result = false;

        if (DateTime::createFromFormat('Y-m-d', $dob) !== FALSE) {
            $result = true;
        }

        return $result;
    }
}