<?php

namespace Frne\Bundle\QualityPimpBundle\Checks;

class PhpUnitCheckTest extends \PHPUnit_Framework_TestCase
{
    private $sut;

    public function setUp()
    {
        $this->sut = new PhpUnitCheck();
    }

    public function testImplementsCheckInterface()
    {
        $this->assertInstanceOf('Frne\Bundle\QualityPimpBundle\Checks\CheckInterface', $this->sut);
    }
} 