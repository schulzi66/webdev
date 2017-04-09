<?php


class User
{
    private $name, $surname;

    /**
     * User constructor.
     * @param $name
     * @param $surname
     */
    public function __construct($name, $surname)
    {
        $this->name = $name;
        $this->surname = $surname;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }




}