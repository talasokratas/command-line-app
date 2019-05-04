<?php
/**
 * Created by PhpStorm.
 * User: ritmas
 * Date: 03/05/2019
 * Time: 21:01
 */

namespace App\Command;


use DateTime;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;


class AgeCommand extends Command
{
    protected static $defaultName = 'app:age:calculator';
    private $loader;

    public function __construct(CalculatorLoader $calculatorLoader)
    {
        $this->loader = $calculatorLoader;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            // the short description shown while running "php bin/console list"
            ->setDescription('Calculates your age by given date of birth')
            ->addArgument('dob', InputArgument::OPTIONAL,'Date of birth yyyy-mm-dd')
            ->setHelp('This command allows you to calculate age by given date of birth')
            ->addOption('adult', 'a', InputOption::VALUE_NONE, 'Tells if you are over 18 years old' )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->loader->info($input, $output);

        $io = new SymfonyStyle($input,$output);
        $dob = $input->getArgument('dob');

        if($dob) {
            if(DateTime::createFromFormat('Y-m-d', $dob) !== FALSE){
                $bday = new DateTime($dob);
                $today = new Datetime(date('m.d.y'));
                $age = $today->diff($bday);
                $io->note(sprintf('I am %s years old',$age->y));
            }
            else {
                $io->error(sprintf('Please enter your date of birth in this format: yyyy-mm-dd'));
                die();
            }

        } else {
            $io->error(sprintf('Please enter your date of birth'));
            die();
        }


        if($input->getOption('adult')){
            if($dob)  {
                if($age->y >= 18) {
                    $io->success(sprintf('Am I an adult ? ----- YES !'));
                } else {
                    $io->warning(sprintf('Am I an adult ? ----- NO !!!'));
                }
            }
            else {
                $io->error(sprintf('Please enter your date of birth'));
            }
        }
    }
}