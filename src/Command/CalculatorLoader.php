<?php
/**
 * Created by PhpStorm.
 * User: ritmas
 * Date: 04/05/2019
 * Time: 14:42
 */

namespace App\Command;


use App\Calculator\AdultCalculator;
use App\Calculator\AgeCalculator;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class CalculatorLoader
{


    public function info(InputInterface $input, OutputInterface $output)
    {

        if($input->getOption('adult')){
            $loader = new AdultCalculator();
            $loader->printInfo($input,$output);
        } else {
            $loader = new AgeCalculator();
            $loader->printInfo($input,$output);
        }

    }
    
}