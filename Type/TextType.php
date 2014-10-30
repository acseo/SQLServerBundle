<?php
namespace ACSEO\Bundle\SQLServerBundle\Type;

use Doctrine\DBAL\Types\StringType as DoctrineStringType;
use Doctrine\DBAL\Platforms\AbstractPlatform;

/**
 * Text convertion
 */
class TextType extends DoctrineStringType
{

    /**
     * Convertion to Database value
     * @param string           $value    value
     * @param AbstractPlatform $platform platform
     *
     * @return string converted value
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return mb_convert_encoding($value, 'ISO-8859-15', 'UTF-8');
    }

    /**
     * Convertion to PHP value
     * @param string           $value    value
     * @param AbstractPlatform $platform platform
     *
     * @return string converted value                    [description]
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return (is_resource($value)) ? stream_get_contents($value) : mb_convert_encoding($value, 'UTF-8', 'ISO-8859-15');
    }

}
