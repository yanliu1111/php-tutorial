<?php
class Person {
    public string $name;
    public string $surname;
    protected ?int $age;

    static int $counter = 0;

    public function __construct($name, $surname)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->age = null;
        self::$counter++;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public static function getCounter()
    {
        return self::$counter;
    }
}