<?php

namespace App\Table;

use App\App;

class Table
{

    protected static $table;

    public static function getTable()
    {
        if (static::$table === null) {
            $class_name = explode('\\', get_called_class());
            static::$table = strtolower(end($class_name)) . 's';
        }
        return static::$table;
    }

    public static function query($statement, $attributes = null, $one = false)
    {
        if ($attributes) {
            return App::getDb()->prepare($statement, $attributes, get_called_class(), $one);
        } else {
            return App::getDb()->query($statement, get_called_class(), $one);
        }
    }

    public static function find($id)
    {
        return static::query(
            "SELECT *
            FROM " . self::getTable() . "
            WHERE id=?
            ",
            [$id],
            true
        );
    }

    public static function all()
    {
        return App::getDb()->query(
            "SELECT *
            FROM " . self::getTable() . "
            ",
            get_called_class()
        );
    }



    public function __get($key)
    {

        $methode = 'get' . ucfirst($key);
        $this->$key = $this->$methode();
        return $this->$key;
    }
}
