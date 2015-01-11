<?php

namespace Frne\Bundle\QualityPimpBundle\Checks;

interface ConfigurableCheckInterface
{
    /**
     * Takes check specific options array
     *
     * @param array $options
     * @return void
     */
    public function setOptions(array $options);

    /**
     * Returns the checks specific options
     *
     * @return array
     */
    public function getOptions();
} 