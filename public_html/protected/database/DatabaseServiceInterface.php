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
    public function getUserFromDatabase($credentials): ?User;

/* Book methods
---–-----------------------*/
    /**
     * @return array|null
     */
    public function getAllBooks(): ?array;

    /**
     * @param $id
     * @return Book|null
     */
    public function getBookById($id): ?Book;

    /**
     * @param $book
     * @return bool
     */
    public function addBook($book): bool;

    /**
     * @param $bookId
     * @return bool
     */
    public function deleteBook($bookId): bool;

    /**
     * @param $book
     * @return bool
     */
    public function updateBook($book): bool;

    /**
     * @param $input
     * @return array|null
     */
    public function getBooksByTitleOrAuthor($input): ?array;

/* Member methods
---–-----------------------*/
    /**
     * @return array|null
     */
    public function getAllMembers(): ?array;

    /**
     * @param $id
     * @return Member|null
     */
    public function getMemberById($id): ?Member;

    /**
     * @param $member
     * @return bool
     */
    public function addMember($member): bool;

    /**
     * @param $memberId
     * @return bool
     */
    public function deleteMember($memberId): bool;

    /**
     * @param $member
     * @return bool
     */
    public function updateMember($member): bool;

/* Gallery methods
---–-----------------------*/
    /**
     * @param $imageGalleryName
     * @return array|null
     */
    public function getImages($imageGalleryName): ?array;

    /**
     * @param $id
     * @return array|null
     */
    public function getImageById($id) : ?array;

    /**
     * @param $galleryID
     * @param $images
     * @return bool
     */
    public function updateImageGallery($galleryID, $images): bool;

    /**
     * @param $imageGalleryID
     * @param $state
     * @return bool
     */
    public function updateImageGalleryVisibility($imageGalleryID, $state): bool;

    /**
     * @return array|null
     */
    public function getAllGalleries(): ?array;

    /**
     * @param $imageNames
     * @return array|null
     */
    public function getImageIdsByImageNames($imageNames): ?array;

    /**
     * @param $galleryID
     * @return array|null
     */
    public function getGalleryImagesByGalleryID($galleryID): ?array;

    /**
     * @param $galleryID
     * @return array|null
     */
    public function getGalleryImageIdsByGalleryID($galleryID): ?array;

    /**
     * @param $ids
     * @return array|null
     */
    public function getImageNamesByImageIds($ids): ?array;

    /**
     * @return array|null
     */
    public function getGalleryNames(): ?array;

    /**
     * @param $galleryName
     * @return int
     */
    public function getGalleryIdByGalleryName($galleryName): int;

    /**
     * @param $pageName
     * @return Gallery|null
     */
    public function getGalleryVisibilityByPageName($pageName): ?Gallery;

/* Contact request methods
---–-----------------------*/
    /**
     * @param $contactRequest
     * @return bool
     */
    public function receiveContactRequest($contactRequest): bool;

    /**
     * @return array|null
     */
    public function getAllContactRequests(): ?array;

    /**
     * @param $id
     * @return ContactRequest|null
     */
    public function getContactRequestById($id): ?ContactRequest;

    /**
     * @param $id
     * @return bool
     */
    public function setContactRequestToReplied($id): bool;

/* Page content methods
---–-----------------------*/
    /**
     * @param $pageName
     * @return null|PageContent
     */
    public function getContentByPageName($pageName): ?PageContent;

    /**
     * @return array|null
     */
    public function getAllPageContents(): ? array;

    /**
     * @param $pageContent
     * @return bool
     */
    public function updatePageContent($pageContent): bool;

/* Book loan and return methods
---–-----------------------*/
    /**
     * @param $input
     * @return bool
     */
    public function loanBook($input) : bool;

    /**
     * @param $input
     * @return bool
     */
    public function returnBook($input) : bool;
}
