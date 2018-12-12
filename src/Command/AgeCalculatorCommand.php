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
        $test = $this->getContainer()->get("app.service.age_calculator");


        if ($birthdate) {
            $io->note(sprintf('You passed an argument: %s', $test-> calculateAge(new \DateTime ($birthdate))));
        }

        if ($input->getOption('adult')) {
            // ...
        }

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');
    }
}
