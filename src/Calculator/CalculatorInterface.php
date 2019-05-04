<?php
/**
 * Created by PhpStorm.
 * User: ritmas
 * Date: 04/05/2019
 * Time: 16:22
 */

namespace App\Calculator;


use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

interface CalculatorInterface
{
    /**
     * @param \DateTime $dob
     * @return int
     */
    public function calculateAge(\DateTime $dob): int;

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return mixed
     */
    public function printInfo(InputInterface $input, OutputInterface $output);
}