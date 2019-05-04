<?php
/**
 * Created by PhpStorm.
 * User: ritmas
 * Date: 04/05/2019
 * Time: 14:42
 */

namespace App\Command;

use App\Calculator\CalculatorInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class CalculatorLoader
{
    /** @var CalculatorInterface[] */
    private $calculator;

    public function info(InputInterface $input, OutputInterface $output)
    {

        if($input->getOption('adult')){
            $loader = $this->getCalculator('age');
        } else {
            $loader = $this->getCalculator('adult');
        }

        $loader->printInfo($input,$output);
    }

    /**
     * @param $calculatorName
     * @return CalculatorInterface
     */
    public function getCalculator($calculatorName): CalculatorInterface
    {
        if (!isset($this->calculator[$calculatorName])) {
            throw new \RuntimeException('Provider with name: "' . $calculatorName . '" does not exist');
        }
        return $this->calculator[$calculatorName];
    }

    /**
     * @param $calculatorName
     * @param CalculatorInterface $calculatorService
     */
    public function addCalculator($calculatorName, CalculatorInterface $calculatorService): void
    {
        $this->calculator[$calculatorName] = $calculatorService;
    }
    
}