<?php


class Member implements Serializable
{
    private $memberId, $firstName, $surName, $address, $phone, $birth, $gender, $email;

    /**
     * Member constructor.
     * @param $memberId
     * @param $firstName
     * @param $surName
     * @param $address
     * @param $phone
     * @param $birth
     * @param $gender
     * @param $email
     */
    public function __construct($memberId, $firstName, $surName, $address, $phone, $birth, $gender, $email)
    {
        $this->memberId = $memberId;
        $this->firstName = $firstName;
        $this->surName = $surName;
        $this->address = $address;
        $this->phone = $phone;
        $this->birth = $birth;
        $this->gender = $gender;
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function serialize()
    {
        return serialize([
            $this->memberId,
            $this->firstName,
            $this->surName,
            $this->address,
            $this->phone,
            $this->birth,
            $this->gender,
            $this->email
        ]);
    }

    /**
     * @param string $data
     */
    public function unserialize($data)
    {
        list(
            $this->memberId,
            $this->firstName,
            $this->surName,
            $this->address,
            $this->phone,
            $this->birth,
            $this->gender,
            $this->email
            ) = unserialize($data);
    }

    /**
     * @return mixed
     */
    public function getMemberId()
    {
        return $this->memberId;
    }

    /**
     * @param mixed $memberId
     */
    public function setMemberId($memberId)
    {
        $this->memberId = $memberId;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getSurName()
    {
        return $this->surName;
    }

    /**
     * @param mixed $surName
     */
    public function setSurName($surName)
    {
        $this->surName = $surName;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getBirth()
    {
        return $this->birth;
    }

    /**
     * @param mixed $birth
     */
    public function setBirth($birth)
    {
        $this->birth = $birth;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }


}