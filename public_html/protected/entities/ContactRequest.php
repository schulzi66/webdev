<?php


class ContactRequest implements Serializable
{
    private $id, $name, $surName, $mail, $message;

    /**
     * ContactRequest constructor.
     * @param $id
     * @param $name
     * @param $surName
     * @param $mail
     * @param $message
     */
    public function __construct($id, $name, $surName, $mail, $message)
    {
        $this->id = $id;
        $this->name = $name;
        $this->surName = $surName;
        $this->mail = $mail;
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function serialize()
    {
        return serialize([
            $this->id,
            $this->name,
            $this->surName,
            $this->mail,
            $this->message
        ]);
    }

    /**
     * @param string $data
     */
    public function unserialize($data)
    {
        list(
            $this->id,
            $this->name,
            $this->surName,
            $this->mail,
            $this->message
            ) = unserialize($data);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
        return $this->surName;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }



}