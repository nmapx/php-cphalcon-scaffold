<?php

namespace Test\Behat;

use Behat\MinkExtension\Context\MinkContext;

class MainContext extends MinkContext
{
    /**
     * @BeforeScenario
     */
    public function setBaseUrl()
    {
        $this->setMinkParameter('base_url', "http://server:9460");
    }
}
