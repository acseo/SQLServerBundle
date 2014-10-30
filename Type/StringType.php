<?php
namespace ACSEO\Bundle\SQLServerBundle\Type;

use Doctrine\DBAL\Types\StringType as DoctrineStringType;
use Doctrine\DBAL\Platforms\AbstractPlatform;

/**
 * String convertion
 */
class StringType extends DoctrineStringType
{

    /**
     * Converts a value from its PHP representation to its database representation
     * of this type.
     *
     * @param mixed                                     $value    The value to convert.
     * @param \Doctrine\DBAL\Platforms\AbstractPlatform $platform The currently used database platform.
     *
     * @return mixed The database representation of the value.
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
         return mb_convert_encoding($value, 'ISO-8859-15', 'UTF-8');
    }

    /**
     * Converts a value from its database representation to its PHP representation
     * of this type.
     *
     * @param mixed                                     $value    The value to convert.
     * @param \Doctrine\DBAL\Platforms\AbstractPlatform $platform The currently used database platform.
     *
     * @return mixed The PHP representation of the value.
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return mb_convert_encoding($value, 'UTF-8', 'ISO-8859-15');
    }

}
