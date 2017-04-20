<?php

class GalleryImages implements Serializable {
    private $galleryID, $imageID;

    /**
     * Gallery constructor.
     * @param $galleryID
     * @param $imageID
     */
    public function __construct($galleryID, $imageID) {
        $this->galleryID = $galleryID;
        $this->imageID = $imageID;
    }

    /**
     * @return string
     */
    public function serialize() {
        return serialize([
            $this->galleryID,
            $this->imageID
        ]);
    }

    /**
     * @param string $data
     */
    public function unserialize($data) {
        list(
            $this->galleryID,
            $this->imageID
            ) = unserialize($data);
    }

    /**
     * @return mixed
     */
    public function getGalleryID() {
        return $this->galleryID;
    }

    /**
     * @param mixed $galleryID
     */
    public function setGalleryID($galleryID) {
        $this->galleryID = $galleryID;
    }

    /**
     * @return mixed
     */
    public function getImageID() {
        return $this->imageID;
    }

    /**
     * @param mixed $imageID
     */
    public function setImageID($imageID) {
        $this->imageID = $imageID;
    }

}