<?php

/**
 * Interface MySQLServiceInterface
 * Interface allows to implement several database models with all needed methods
 */
interface DatabaseServiceInterface {
    /**
     * @param $credentials
     * @return null|User
     */
    public function getUserFromDatabase($credentials);

/* Book methods
---–-----------------------*/
    /**
     * @return array|null
     */
    public function getAllBooks();

    /**
     * @param $id
     * @return Book|null
     */
    public function getBookById($id);

    /**
     * @param $book
     * @return bool
     */
    public function addBook($book);

    /**
     * @param $bookId
     * @return bool
     */
    public function deleteBook($bookId);

    /**
     * @param $book
     * @return bool
     */
    public function updateBook($book);

    /**
     * @param $input
     * @return array|null
     */
    public function getBooksByTitleOrAuthor($input);

/* Member methods
---–-----------------------*/
    /**
     * @return array|null
     */
    public function getAllMembers();

    /**
     * @param $id
     * @return Member|null
     */
    public function getMemberById($id);

    /**
     * @param $member
     * @return bool
     */
    public function addMember($member);

    /**
     * @param $memberId
     * @return bool
     */
    public function deleteMember($memberId);

    /**
     * @param $member
     * @return bool
     */
    public function updateMember($member);

/* Gallery methods
---–-----------------------*/
    /**
     * @param $imageGalleryName
     * @return array|null
     */
    public function getImages($imageGalleryName);

    /**
     * @param $id
     * @return array|null
     */
    public function getImageById($id);

    /**
     * @param $galleryID
     * @param $images
     * @return bool
     */
    public function updateImageGallery($galleryID, $images);

    /**
     * @param $imageGalleryID
     * @param $state
     * @return bool
     */
    public function updateImageGalleryVisibility($imageGalleryID, $state);

    /**
     * @return array|null
     */
    public function getAllGalleries();

    /**
     * @param $imageNames
     * @return array|null
     */
    public function getImageIdsByImageNames($imageNames);

    /**
     * @param $galleryID
     * @return array|null
     */
    public function getGalleryImagesByGalleryID($galleryID);

    /**
     * @param $galleryID
     * @return array|null
     */
    public function getGalleryImageIdsByGalleryID($galleryID);

    /**
     * @param $ids
     * @return array|null
     */
    public function getImageNamesByImageIds($ids);

    /**
     * @return array|null
     */
    public function getGalleryNames();

    /**
     * @param $galleryName
     * @return int
     */
    public function getGalleryIdByGalleryName($galleryName);

    /**
     * @param $pageName
     * @return Gallery|null
     */
    public function getGalleryVisibilityByPageName($pageName);

/* Contact request methods
---–-----------------------*/
    /**
     * @param $contactRequest
     * @return bool
     */
    public function receiveContactRequest($contactRequest);

    /**
     * @return array|null
     */
    public function getAllContactRequests();

    /**
     * @param $id
     * @return ContactRequest|null
     */
    public function getContactRequestById($id);

    /**
     * @param $id
     * @return bool
     */
    public function setContactRequestToReplied($id);

/* Page content methods
---–-----------------------*/
    /**
     * @param $pageName
     * @return null|PageContent
     */
    public function getContentByPageName($pageName);

    /**
     * @return array|null
     */
    public function getAllPageContents();

    /**
     * @param $pageContent
     * @return bool
     */
    public function updatePageContent($pageContent);

/* Book loan and return methods
---–-----------------------*/
    /**
     * @param $input
     * @return bool
     */
    public function loanBook($input);

    /**
     * @param $input
     * @return bool
     */
    public function returnBook($input);
}
