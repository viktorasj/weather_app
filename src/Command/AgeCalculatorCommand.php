<?php

namespace App\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

class AgeCalculatorCommand extends ContainerAwareCommand
{
    protected static $defaultName = 'app:age:calculator';

    protected function configure()
    {
        $this
            ->setDescription('Calculates age from given birthdate and answers you are adult or not')
            ->addArgument('birthdate', InputArgument::OPTIONAL, 'passed birthdate')
            ->addOption('adult', null, InputOption::VALUE_NONE, 'answers adult or not')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $birthdate = $input->getArgument('birthdate');
        $manager = $this->getContainer()->get("app.service.manager");


        if ($birthdate) {
            $age = $manager->calcAge(new \DateTIme($birthdate));
            $io->note(sprintf('I\'m '.$age.' years old'));
        }

        if ($input->getOption('adult')) {
            $adultOrNot = $manager->isAdult();
            $msg = 'Am I an adult? -----';
            if($adultOrNot){
                $io->success($msg.' Yes!');
            }
            else {
                $io->warning($msg.' No!');
            }
        }
    }
}
