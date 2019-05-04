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
use Symfony\Component\Console\Style\SymfonyStyle;

class AdultCalculator extends AbstractCalculator implements CalculatorInterface
{

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return mixed|void
     */
    public function printInfo(InputInterface $input, OutputInterface $output): void
    {
        $io = new SymfonyStyle($input,$output);
        $dob = $input->getArgument('dob');

        if(parent::checkDateFormat($dob)){
            $bday = new DateTime($dob);
            $age = parent::calculateAge($bday);

        } else {
            $io->error(sprintf('Please enter your date of birth in this format: yyyy-mm-dd'));
            die();
        }

        $io->note(sprintf('I am %s years old',$age));

        if($this->isAdult($age)) {
            $io->success(sprintf('Am I an adult ? ----- YES !'));
        } else {
            $io->warning(sprintf('Am I an adult ? ----- NO !!!'));
        }

    }

    /**
     * @param int $age
     * @return bool
     */
    public function isAdult(int $age): bool
    {
        $result = false;
        if ($age >= 18) {
            $result = true;
        }
        return $result;
    }

}