<?php

/**
 * Class ContactRequest
 * Generate ContactRequest objects
 */
class ContactRequest implements Serializable {
    private $id, $name, $surName, $mail, $message, $replied;

    /**
     * ContactRequest constructor.
     * @param $id
     * @param $name
     * @param $surName
     * @param $mail
     * @param $message
     * @param $replied
     */
    public function __construct($id, $name, $surName, $mail, $message, $replied) {
        $this->id = $id;
        $this->name = $name;
        $this->surName = $surName;
        $this->mail = $mail;
        $this->message = $message;
        $this->replied = $replied;
    }

    /**
     * @return string
     */
    public function serialize() {
        return serialize([
            $this->id,
            $this->name,
            $this->surName,
            $this->mail,
            $this->message,
            $this->replied
        ]);
    }

    /**
     * @param string $data
     */
    public function unserialize($data) {
        list(
            $this->id,
            $this->name,
            $this->surName,
            $this->mail,
            $this->message,
            $this->replied
            ) = unserialize($data);
    }

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSurname() {
        return $this->surName;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname) {
        $this->surname = $surname;
    }

    /**
     * @return mixed
     */
    public function getMail() {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail) {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getMessage() {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message) {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getReplied() {
        return $this->replied;
    }

    /**
     * @param mixed $replied
     */
    public function setReplied($replied) {
        $this->replied = $replied;
    }
}