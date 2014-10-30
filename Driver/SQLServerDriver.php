<?php
namespace ACSEO\Bundle\SQLServerBundle\Driver;

use Realestate\MssqlBundle\Driver\PDODblib\Driver as Driver;
use ACSEO\Bundle\SQLServerBundle\Platforms\SQLServerDblibPlatform;

/**
 * Driver
 */
class SQLServerDriver extends Driver
{
    /**
     * Get Database Platform
     *
     * @return AbstractPlatform database platform
     */
    public function getDatabasePlatform()
    {
        return new SQLServerDblibPlatform();
    }

}
