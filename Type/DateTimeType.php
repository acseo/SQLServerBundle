<?php
namespace ACSEO\Bundle\SQLServerBundle\Type;

use Doctrine\DBAL\Types\DateTimeType as DoctrineDateTimeType;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\ConversionException;

/**
 * DateTime convertion
 */
class DateTimeType extends DoctrineDateTimeType
{

    /**
     * Convert to Database value
     * @param DateTime         $value    value
     * @param AbstractPlatform $platform platform
     *
     * @return string converted value
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return ($value !== null)
            ? $value->format('M j Y H:i:s:000A') : null;
    }

    /**
     * Convert to PHP Value
     * @param string           $value    value
     * @param AbstractPlatform $platform platform
     *
     * @return DateTime converted value
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        if ($value === null || $value instanceof \DateTime) {
            return $value;
        }

        $val = \DateTime::createFromFormat('M j Y H:i:s:uA', $value);
        if (! $val) {
            throw ConversionException::conversionFailedFormat($value, $this->getName(), 'M j Y H:i:s:uA');
        }

        return $val;
    }

}
