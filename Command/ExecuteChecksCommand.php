<?php

namespace Frne\Bundle\QualityPimpBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ExecuteChecksCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('quality-pimp:execute-checks')
            ->setDescription('Executes quality checks and ouputs results')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $checks = $this->getContainer()->get('qualitypimp.check_registry');

        var_dump($checks->getChecks());
    }
}