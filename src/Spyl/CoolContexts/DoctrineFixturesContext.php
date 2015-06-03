<?php

namespace Spyl\CoolContexts;

use Behat\Behat\Context\Context;

class DoctrineFixturesContext extends Context
{
    /**
     * @BeforeSuite
     */
    public static function reinitDatabase()
    {
        DefaultContext::databaseContainsFixtures();
    }

    /**
     * @AfterScenario @database
     */
    public static function databaseContainsFixtures()
    {
        exec('php app/console doctrine:fixtures:load -n -e test');
    }
}
