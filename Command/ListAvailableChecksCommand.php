<?php

namespace Frne\Bundle\QualityPimpBundle\Command;

use Frne\Bundle\QualityPimpBundle\Checks\ConfigurableCheckInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ListAvailableChecksCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('quality-pimp:checks:list-available')
            ->setDescription('Lists available quality checks');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $registry = $this->getContainer()->get('qualitypimp.registry.checks_available');
        $tableRows = array();

        foreach ($registry->getChecks() as $id => $check) {
            $tableRows[] = array($id, $check->getDescription(), ($check instanceof ConfigurableCheckInterface ? 'true' : 'false'));
        }

        $table = $this->getHelper('table');
        $table
            ->setHeaders(array('ID', 'Description', 'Is Configurable'))
            ->setRows($tableRows);
        $table->render($output);
    }
}