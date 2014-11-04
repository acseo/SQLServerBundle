<?php

namespace ACSEO\Bundle\SQLServerBundle\Composer;

use Symfony\Component\Process\Process;
use Composer\Script\CommandEvent;

/**
 * ScriptHandler
 */
class ScriptHandler
{
    /**
     * Composer variables are declared static so that an event could update
     * a composer.json and set new options, making them immediately available
     * to forthcoming listeners.
     */
    private static $options = array();

    /**
     * Updates vendor/doctrine/dbal/lib/Doctrine/DBAL/DriverManager.php
     *
     * @param $event CommandEvent A instance
     */
    public static function updateDoctrineDriverManager(CommandEvent $event)
    {
        $command = "if ! grep --quiet pdo_dblib vendor/doctrine/dbal/lib/Doctrine/DBAL/DriverManager.php; then (sed -i -e \"s/\$_driverMap = array(/\$_driverMap = array(\\n            \\/* Patch ACSEO via composer install *\\/\\n            \\'pdo_dblib\\' => \\'Doctrine\/DBAL\/Driver\/PDODblibSqlsrv\/Driver\\',\\n            \\/* Fin Patch *\\/\\n/g\" vendor/doctrine/dbal/lib/Doctrine/DBAL/DriverManager.php) fi";

        exec($command);
    }

}
