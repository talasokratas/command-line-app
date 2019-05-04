<?php
/**
 * Created by PhpStorm.
 * User: ritmas
 * Date: 03/05/2019
 * Time: 21:01
 */

namespace App\Command;


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
        $io = new SymfonyStyle($input,$output);
        $dob = $input->getArgument('dob');

        if(!$dob){
            $io->error(sprintf('Please enter your date of birth in this format: yyyy-mm-dd'));
            die();
        }

        $this->loader->info($input, $output);

    }
}