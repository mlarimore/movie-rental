<?php
namespace Model\Type;

interface TypeInterface
{
    /**
     * @return array
     */
    public static function getTypes(): array;

    /**
     * Checks if given string exists in types array
     * @param  string  $type
     * @return boolean
     */
    public static function hasType(string $type): bool;

    /**
     * Checks if given string exists as a key in types array
     * @param  string  $key
     * @return boolean
     */
    public static function hasTypeKey(string $key): bool;

    /**
     * Returns the value of the type array associated with the given key
     * @param  string  $type
     * @return mixed
     */
    public static function getTypeValueByKey(string $key);

    /**
     * Returns the key of the type array associated with the given value or false
     * @param  string  $type
     * @return mixed
     */
    public static function getTypeKeyByValue(string $type);
}
