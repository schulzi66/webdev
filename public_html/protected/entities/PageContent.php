<?php

/**
 * Class PageContent
 * Generate PageContent objects
 */
class PageContent implements Serializable {
    private $pageId, $pageName, $headline, $content;

    /**
     * PageContent constructor.
     * @param $pageId
     * @param $pageName
     * @param $headline
     * @param $content
     */
    public function __construct($pageId, $pageName, $headline, $content) {
        $this->pageId = $pageId;
        $this->pageName = $pageName;
        $this->headline = $headline;
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function serialize() {
        return serialize([
            $this->pageId,
            $this->pageName,
            $this->headline,
            $this->content
        ]);
    }

    /**
     * @param string $data
     */
    public function unserialize($data) {
        list(
            $this->pageId,
            $this->pageName,
            $this->headline,
            $this->content
            ) = unserialize($data);
    }

    /**
     * @return mixed
     */
    public function getPageId() {
        return $this->pageId;
    }

    /**
     * @param mixed $pageId
     */
    public function setPageId($pageId) {
        $this->pageId = $pageId;
    }

    /**
     * @return mixed
     */
    public function getPageName() {
        return $this->pageName;
    }

    /**
     * @param mixed $pageName
     */
    public function setPageName($pageName) {
        $this->pageName = $pageName;
    }

    /**
     * @return mixed
     */
    public function getHeadline() {
        return $this->headline;
    }

    /**
     * @param mixed $headline
     */
    public function setHeadline($headline) {
        $this->headline = $headline;
    }

    /**
     * @return mixed
     */
    public function getContent() {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content) {
        $this->content = $content;
    }
}