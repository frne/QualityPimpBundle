<?php

namespace Frne\Bundle\QualityPimpBundle\Executor;

use Frne\Bundle\QualityPimpBundle\Checks\CheckInterface;

class CheckRegistry
{
    /**
     * @var CheckInterface[]
     */
    private $checks;

    /**
     * @param string $id
     * @param CheckInterface $check
     */
    public function registerCheck($id, CheckInterface $check)
    {
        $this->checks[$id] = $check;
    }

    /**
     * @return CheckInterface[]
     */
    public function getChecks()
    {
        return $this->checks;
    }
} 