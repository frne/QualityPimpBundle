<?php

namespace Frne\Bundle\QualityPimpBundle\Command;

use Frne\Bundle\QualityPimpBundle\Checks\ConfigurableCheckInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ListConfiguredChecksCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('quality-pimp:checks:list-configured')
            ->setDescription('Lists available quality checks');
    }

    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ) {
        $registry = $this->getContainer()->get(
            'qualitypimp.registry.checks_configured'
        );
        $tableRows = array();

        foreach ($registry->getChecks() as $id => $check) {

            $options = 'NOT CONFIGURABLE';
            if ($check instanceof ConfigurableCheckInterface) {
                $options = '';
                foreach($check->getOptions() as $key => $value) {
                    $options .= sprintf("%s: %s, ", $key, $value);
                }
            }


            $tableRows[] = array(
                $id,
                $check->getDescription(),
                $check->isMuted() ? 'true' : 'false',
                $options
            );
        }

        $table = $this->getHelper('table');
        $table
            ->setHeaders(array('ID', 'Description', 'Muted', 'Options'))
            ->setRows($tableRows);
        $table->render($output);
    }
}