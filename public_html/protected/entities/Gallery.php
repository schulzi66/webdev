<?php

class Gallery implements Serializable {
    private $galleryId, $name, $state;

    /**
     * Gallery constructor.
     * @param $galleryId
     * @param $name
     * @param $state
     */
    public function __construct($galleryId, $name, $state)
    {
        $this->galleryId = $galleryId;
        $this->name = $name;
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function serialize() {
        return serialize([
            $this->galleryId,
            $this->name,
            $this->state
        ]);
    }

    /**
     * @param string $data
     */
    public function unserialize($data) {
        list(
            $this->galleryId,
            $this->name,
            $this->state
            ) = unserialize($data);
    }

    /**
     * @return mixed
     */
    public function getGalleryId()
    {
        return $this->galleryId;
    }

    /**
     * @param mixed $galleryId
     */
    public function setGalleryId($galleryId)
    {
        $this->galleryId = $galleryId;
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
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }


}