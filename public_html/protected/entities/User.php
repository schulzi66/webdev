<?php


class User {
    private $userId, $userName;

    /**
     * User constructor.
     * @param $userId
     * @param $userName
     */
    public function __construct($userId, $userName) {
        $this->userId = $userId;
        $this->userName = $userName;
    }

    /**
     * @return string
     */
    public function serialize() {
        return serialize([
            $this->userId,
            $this->userName
        ]);
    }

    /**
     * @param string $data
     */
    public function unserialize($data) {
        list(
            $this->userId,
            $this->userName
            ) = unserialize($data);
    }

    /**
     * @return mixed
     */
    public function getUserId() {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId) {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getUserName() {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName) {
        $this->userName = $userName;
    }
}