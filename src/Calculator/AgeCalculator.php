<?php
/**
 * Created by PhpStorm.
 * User: ritmas
 * Date: 04/05/2019
 * Time: 14:24
 */

namespace App\Calculator;


use DateTime;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AgeCalculator extends AbstractCalculator implements CalculatorInterface
{
    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return mixed|void
     */
    public function printInfo(InputInterface $input, OutputInterface $output)
    {
        parent::printInfo($input, $output);

    }

}