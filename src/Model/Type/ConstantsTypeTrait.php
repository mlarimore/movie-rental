<?php
namespace Model\Type;

trait ConstantsTypeTrait
{
    /**
     * @return array
     */
    public static function getTypes(): array
    {
        $reflection = new \ReflectionClass(__CLASS__);

        return $reflection->getConstants();
    }

    /**
     * Checks if given string exists in types array
     * @param  string  $type
     * @return boolean
     */
    public static function hasType(string $type): bool
    {
        return in_array($type, self::getTypes());
    }

    /**
     * Checks if given string exists as a key in types array
     * @param  string  $key
     * @return boolean
     */
    public static function hasTypeKey(string $key): bool
    {
        return array_key_exists($key, self::getTypes());
    }

    /**
     * Returns the value of the type array associated with the given key
     * @param  string  $type
     * @return mixed
     */
    public static function getTypeValueByKey(string $key)
    {
        return self::getTypes()[$key];
    }

    /**
     * Returns the key of the type array associated with the given value or false
     * @param  string  $type
     * @return mixed
     */
    public static function getTypeKeyByValue(string $type)
    {
        return array_search($type, self::getTypes());
    }
}
