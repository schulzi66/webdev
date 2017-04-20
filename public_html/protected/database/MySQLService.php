<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require "DatabaseModel.php";
require "$root/webdev/public_html/protected/entities/User.php";
require "$root/webdev/public_html/protected/entities/Book.php";
require "$root/webdev/public_html/protected/entities/Member.php";
require "$root/webdev/public_html/protected/entities/ContactRequest.php";
require "$root/webdev/public_html/protected/entities/PageContent.php";
require "$root/webdev/public_html/protected/entities/Gallery.php";
require "$root/webdev/public_html/protected/entities/GalleryImage.php";



class MySQLService {
    private $connection;


    /**
     * @return bool
     */
    public function connect(): bool {
        $this->setConnection(DatabaseModel::getAdapter());

        if ($this->getConnection()) {
            return true;
        } else {
            return false;
        }
    }

    //region Getter and Setter
    /**
     * @return mixed
     */
    public function getConnection() {
        return $this->connection;
    }

    /**
     * @param mixed $connection
     */
    public function setConnection($connection) {
        $this->connection = $connection;
    }

    //endregion

    //region User

    /**
     * @param $credentials
     * @return null|User
     */
    public function getUserFromDatabase($credentials): ?User {
        $connection = $this->getConnection();
        if ($connection) {
            $userName = mysqli_real_escape_string($connection, $credentials["userName"]);
            $password = mysqli_real_escape_string($connection, $credentials["password"]);
            $sql = "SELECT * FROM users WHERE BINARY UserName = '" . $userName . "' AND BINARY Password = '" . $password . "';";
            $result = mysqli_query($connection, $sql);
            if ($result->num_rows == 1) {
                $result = mysqli_fetch_assoc($result);
                return new User($result["UserID"], $result["UserName"]);
            }
        }
        return null;
    }

    //endregion

    //region Books
    /**
     * @return array|null
     */
    public function getAllBooks(): ?array {
        $connection = $this->getConnection();
        $bookArray = null;
        if ($connection) {
            $sql = "SELECT * FROM books";
            $result = mysqli_query($connection, $sql);
            if ($result->num_rows >= 1) {
                $resultArray = $result->fetch_all();
                $bookArray = array();
                foreach ($resultArray as $book) {
                    array_push($bookArray, new Book($book["0"], $book["1"], $book["2"], $book["3"], $book["4"], $book["5"], $book["6"], $book["7"], $book["8"]));
                }
            }
        }
        return $bookArray;
    }

    /**
     * @param $id
     * @return Book|null
     */
    public function getBookById($id): ?Book {
        $connection = $this->getConnection();
        $book = null;
        if ($connection) {
            $sql = "SELECT * FROM books WHERE ID = '" . $id . "';";
            $result = mysqli_query($connection, $sql);
            if ($result->num_rows == 1) {
                $result = $result->fetch_assoc();
                $book = new Book($result["ID"], $result["Title"], $result["Author"], $result["ISBN"], $result["Category"], $result["MemberID"], $result["Taken"], $result["Returned"], $result["ImageID"]);
            }
        }
        return $book;
    }

    /**
     * @param $book
     * @return bool
     */
    public function addBook($book): bool {
        $connection = $this->getConnection();
        if ($connection) {
            $title = mysqli_real_escape_string($connection, $book->getTitle());
            $author = mysqli_real_escape_string($connection, $book->getAuthor());
            $isbn = mysqli_real_escape_string($connection, $book->getIsbn());
            $category = mysqli_real_escape_string($connection, $book->getCategory());
            $sql = "INSERT INTO books (ID,  Title, Author, ISBN, Category, MemberID) VALUES (DEFAULT , '$title', '$author', '$isbn', '$category', NULL )";
            $result = mysqli_query($connection, $sql);
            return $result;
        }
        return false;
    }

    /**
     * @param $bookId
     * @return bool
     */
    public function deleteBook($bookId): bool {
        $connection = $this->getConnection();
        $result = false;
        if ($connection) {
            $result = $connection->query("DELETE FROM books WHERE ID = " . $bookId . ";");
            if ($result) {
                $connection->query("ALTER TABLE books AUTO_INCREMENT = " . $bookId . ";");
            }
        }
        return $result;
    }

    /**
     * @param $book
     * @return bool
     */
    public function updateBook($book): bool {

        $connection = $this->getConnection();
        $result = false;
        if ($connection) {
            $id = mysqli_real_escape_string($connection, $book->getId());
            $title = mysqli_real_escape_string($connection, $book->getTitle());
            $author = mysqli_real_escape_string($connection, $book->getAuthor());
            $isbn = mysqli_real_escape_string($connection, $book->getIsbn());
            $category = mysqli_real_escape_string($connection, $book->getCategory());

            $sql = $connection->prepare("UPDATE books SET Title=?, Author=?, ISBN=?, Category=? WHERE ID=?");
            $sql->bind_param('ssssi', $title, $author, $isbn, $category, $id);

            $result = $sql->execute();
        }
        return $result;
    }

    /**
     * @param $input
     * @return array
     */
    public function getBooksByTitleOrAuthor($input): ?array {
        $connection = $this->getConnection();
        $bookArray = null;
        if ($connection) {
            if(count($input) == 3)
            //If the "Search library" was used, input will always contain 3 input strings that need to be prepared for SQL Execution
            {
                $bookTitle = mysqli_real_escape_string($connection, $input["bookTitle"]);
                $bookAuthor = mysqli_real_escape_string($connection, $input["bookAuthor"]);
                $isAvailable = mysqli_real_escape_string($connection, $input["isAvailable"]);
            }
            //if the main page search was used the input will be only one string. Both Title and Author are searched for this String
            if (count($input) == 1) {
                $input = mysqli_real_escape_string($connection, $input);
                $sql = "SELECT * FROM books WHERE Title LIKE '%" . $input . "%' OR Author LIKE '%"
                    . $input . "%';";
            }
            /*else if the "Search library" was used these are all the possibilities which input fields were used or not
            to provide the correct data back to the user*/
            else if ($bookTitle != "" && $bookAuthor != "" && $isAvailable == "on") {
                $sql = "SELECT * FROM books WHERE Title LIKE '%" . $bookTitle . "%' AND Author LIKE '%"
                    . $bookAuthor . "%' AND MemberID IS NULL;";
            } else if ($bookTitle != "" && $bookAuthor != "") {
                $sql = "SELECT * FROM books WHERE Title LIKE '%" . $bookTitle . "%' AND Author LIKE '%"
                    . $bookAuthor . "%';";
            } else if ($bookTitle != "" && $isAvailable == "on") {
                $sql = "SELECT * FROM books WHERE Title LIKE '%" . $bookTitle . "%' AND MemberID IS NULL;";
            } else if ($bookTitle != "") {
                $sql = "SELECT * FROM books WHERE Title LIKE '%" . $bookTitle . "%';";
            } else if ($bookAuthor != "" && $isAvailable == "on") {
                $sql = "SELECT * FROM books WHERE Author LIKE '%" . $bookAuthor . "%' AND MemberID IS NULL;";
            } else if ($bookAuthor != "") {
                $sql = "SELECT * FROM books WHERE Author LIKE '%" . $bookAuthor . "%';";
            } else {
                return null;
            }
            $result = mysqli_query($connection, $sql);
            if ($result->num_rows > 0) {
                //Fetch all arrays and create Book entities out of the arrays.
                $resultArray = $result->fetch_all();
                $bookArray = array();
                foreach ($resultArray as $book) {
                    array_push($bookArray, new Book($book["0"], $book["1"], $book["2"], $book["3"], $book["4"], $book["5"], $book["6"], $book["7"], $book["8"]));
                }
            }
        }
        return $bookArray;
    }

    //endregion

    //region Member
    /**
     * @return array|null
     */
    public function getAllMembers(): ?array {
        $connection = $this->getConnection();
        $memberArray = null;
        if ($connection) {
            $sql = "SELECT * FROM member";
            $result = mysqli_query($connection, $sql);
            if ($result->num_rows >= 1) {
                $resultArray = $result->fetch_all();
                $memberArray = array();
                foreach ($resultArray as $member) {
                    array_push($memberArray, new Member($member["0"], $member["1"], $member["2"], $member["3"], $member["4"], $member["5"], $member["6"], $member["7"]));
                }
            }
        }
        return $memberArray;
    }

    /**
     * @param $id
     * @return Member|null
     */
    public function getMemberById($id): ?Member {
        $connection = $this->getConnection();
        $member = null;
        if ($connection) {
            $sql = "SELECT * FROM member WHERE MemberID = '" . $id . "';";
            $result = mysqli_query($connection, $sql);
            if ($result->num_rows == 1) {
                $result = $result->fetch_assoc();
                $member = new Member($result["MemberID"], $result["Firstname"], $result["Surname"], $result["Address"], $result["Phone"], $result["Birth"], $result["Gender"], $result["Email"]);
            }
        }
        return $member;
    }

    /**
     * @param $member
     * @return bool
     */
    public function addMember($member): bool {
        $connection = $this->getConnection();
        $result = false;
        if ($connection) {
            $firstName = mysqli_real_escape_string($connection, $member->getFirstName());
            $surName = mysqli_real_escape_string($connection, $member->getSurName());
            $address = mysqli_real_escape_string($connection, $member->getAddress());
            $phone = mysqli_real_escape_string($connection, $member->getPhone());
            $birth = mysqli_real_escape_string($connection, $member->getBirth());
            $gender = mysqli_real_escape_string($connection, $member->getGender());
            $mail = mysqli_real_escape_string($connection, $member->getEmail());
            $sql = "INSERT INTO member (MemberID, Firstname, Surname, Address, Phone, Birth, Gender, Email) VALUES (DEFAULT , '$firstName', '$surName', '$address', '$phone', '$birth', '$gender', '$mail')";
            $result = mysqli_query($connection, $sql);
        }
        return $result;
    }

    /**
     * @param $memberId
     * @return bool
     */
    public function deleteMember($memberId): bool {
        $connection = $this->getConnection();
        $result = false;
        if ($connection) {
            $result = $connection->query("DELETE FROM member WHERE MemberID = " . $memberId . ";");
            if ($result) {
                $connection->query("ALTER TABLE member AUTO_INCREMENT = " . $memberId . ";");
            }
        }
        return $result;
    }

    /**
     * @param $member
     * @return bool
     */
    public function updateMember($member): bool {

        $connection = $this->getConnection();
        $result = false;
        if ($connection) {
            $memberId = mysqli_real_escape_string($connection, $member->getMemberId());
            $firstName = mysqli_real_escape_string($connection, $member->getFirstName());
            $surName = mysqli_real_escape_string($connection, $member->getSurName());
            $address = mysqli_real_escape_string($connection, $member->getAddress());
            $phone = mysqli_real_escape_string($connection, $member->getPhone());
            $birth = mysqli_real_escape_string($connection, $member->getBirth());
            $gender = mysqli_real_escape_string($connection, $member->getGender());
            $mail = mysqli_real_escape_string($connection, $member->getEmail());

            $sql = $connection->prepare("UPDATE member SET Firstname=?, Surname=?, Address=?, Phone=?, Birth=?, Gender=?, Email=? WHERE MemberID=?");
            $sql->bind_param('sssssssi', $firstName, $surName, $address, $phone, $birth, $gender, $mail, $memberId);

            $result = $sql->execute();
        }
        return $result;
    }
    //endregion
    //TODO JUUL: Queries
    //region Images
    /**
     * @param string $imageGalleryName
     * @return array|null
     */
    public function getImages($imageGalleryName = "default"): ?array {
        $connection = $this->getConnection();
        $images = array();
        if ($connection) {
            if ($imageGalleryName == "default") {
                $sql = "SELECT * FROM images";
            } else {
                $sql = $connection->prepare("SELECT * FROM gallery JOIN galleryimages ON gallery.GalleryID = galleryimages.GalleryID WHERE name=?");
                $sql->bind_param($imageGalleryName);
            }
            $result = mysqli_query($connection, $sql);
            if ($result->num_rows >= 1) {
                $images = $result->fetch_all();
            }
        }
        return $images;
    }

    /**
     * @param $galleryID
     * @param $images
     * @return bool
     */
    /* TODO Query: Update galleryimages if galleryimgages with id $galleryID exists, otherwise Insert into galleryimages ....
        ---> Request if imagegallery exists
    */
    public function updateImageGallery($galleryID, $images): bool {
        $connection = $this->getConnection();
        $result = false;
        if ($connection) {
            $sql = "";
            foreach ($images as $image) {
                $ID = mysqli_real_escape_string($connection, $galleryID);
                $imageID = mysqli_real_escape_string($connection, $image["imageID"]);
                $sql .= "INSERT INTO galleryimages(GalleryID, ImageID) VALUES(" . $ID . "," . $imageID . ");";
            }
            $result = $connection->multi_query($sql);
        }
        return $result;
    }

    /**
     * @param $imageGalleryID
     * @param $state
     * @return bool
     */
    public function updateImageGalleryVisibility($imageGalleryID, $state): bool {
        $connection = $this->getConnection();
        $result = false;
        if ($connection) {
            $sql = $connection->prepare("UPDATE gallery SET State = $state WHERE GalleryID = $imageGalleryID; ");
            $result = $sql->execute();
        }
        return $result;
    }

    /**
     * @return array|null
     */
    //TODO JUUL: use Galleries entity -> see getAllBooks, use getter in view
    public function getAllGalleries(): ?array {
        $connection = $this->getConnection();
        $galleries = array();
        if ($connection) {
            $sql = "SELECT * FROM gallery";
            $result = mysqli_query($connection, $sql);
            if ($result->num_rows >= 1) {
                $galleries = $result->fetch_all();
            }
        }
        return $galleries;
    }

    /**
     * @param $imageNames
     * @return array
     */
    public function getImageIdsByImageNames($imageNames) : array {
        $connection = $this->getConnection();
        $imageIDs = array();
        $sql = "";
        if ($connection) {
            foreach ($imageNames as $name) {
                $name = mysqli_real_escape_string($connection, $name);
                $sql .= "SELECT ImageID From images WHERE PictureRef = '" . $name . "';";
            }
            if (mysqli_multi_query($connection,$sql))
            {
                do
                {
                    // Store first result set
                    if ($result=mysqli_store_result($connection)) {
                        // Fetch one and one row
                        while ($row=mysqli_fetch_row($result))
                        {
                            $imageIDs[] = $row[0];
                        }
                        // Free result set
                        mysqli_free_result($result);
                    }
                }
                while (mysqli_next_result($connection));
            }
        }
        return $imageIDs;
    }

    /**
     * @param $galleryID
     * @return array|null
     */
    public function getGalleryImagesByGalleryID($galleryID): ?array {
        $connection = $this->getConnection();
        $galleryIds = array();
        if ($connection) {
            $sql = "SELECT galleryimages.GalleryID, images.Type, images.PictureRef, galleryimages.ImageID FROM galleryimages JOIN images ON galleryimages.ImageID = images.ImageID WHERE GalleryID = '" . $galleryID . "';";
            $result = mysqli_query($connection, $sql);
            if ($result->num_rows > 0) {
                $resultArray = $result->fetch_all();
                foreach ($resultArray as $image) {
                    array_push($galleryIds, new GalleryImage($image["0"], $image["3"]));
                }
            }
        }
        return $galleryIds;
    }

    public function getGalleryImageIdsByGalleryID($galleryID): ?array {
        $connection = $this->getConnection();
        $galleryIds = array();
        if ($connection) {
            $sql = "SELECT ImageID FROM galleryimages WHERE GalleryID = '" . $galleryID . "';";
            $result = mysqli_query($connection, $sql);
            if ($result->num_rows > 0) {
                $resultArray = $result->fetch_all();
                foreach ($resultArray as $image) {
                    array_push($galleryIds, $image["0"]);
                }
            }
        }
        return $galleryIds;
    }

    public function getImageNamesByImageIds($ids) : array {
        $connection = $this->getConnection();
        $imageNames = array();
        $sql = "";
        if ($connection) {
            foreach ($ids as $id) {
                $id = mysqli_real_escape_string($connection, $id);
                $sql .= "SELECT PictureRef From images WHERE ImageID = '" . $id . "';";
            }
            if (mysqli_multi_query($connection,$sql))
            {
                do
                {
                    // Store first result set
                    if ($result=mysqli_store_result($connection)) {
                        // Fetch one and one row
                        while ($row=mysqli_fetch_row($result))
                        {
                            $imageNames[] = $row[0];
                        }
                        // Free result set
                        mysqli_free_result($result);
                    }
                }
                while (mysqli_next_result($connection));
            }
        }
        return $imageNames;
    }

    /**
     * @return array|null
     */
    public function getGalleryNames(): ?array {
        $connection = $this->getConnection();
        if ($connection) {
            $sql = "SELECT Name, GalleryID FROM gallery";
            $result = mysqli_query($connection, $sql);
            if ($result->num_rows >= 1) {
                $galleryArray = $result->fetch_all();
                return $galleryArray;
            }
        }
        return null;
    }

    /**
     * @param $galleryName
     * @return int
     */
    public function getGalleryIdByGalleryName($galleryName) : int {
        $connection = $this->getConnection();
        if ($connection) {
            $sql = "SELECT GalleryID FROM gallery WHERE Name = '" . $galleryName . "';";
            $result = mysqli_query($connection, $sql);
            if ($result->num_rows >= 1) {
                $galleryArray = $result->fetch_assoc();
                return $galleryArray["GalleryID"];
            }
        }
        return null;
    }

    /**
     * @param $pageName
     * @return Gallery|null
     */
    public function getGalleryVisibilityByPageName($pageName): ?Gallery {
        $connection = $this->getConnection();
        $gallery = null;
        if ($connection) {
            $pageName = mysqli_real_escape_string($connection, $pageName);
            $sql = "SELECT * FROM gallery WHERE Name = '" . $pageName . "';";
            $result = mysqli_query($connection, $sql);
            if ($result->num_rows == 1) {
                $result = $result->fetch_assoc();
                $gallery = new Gallery($result["GalleryID"], $result["Name"], $result["State"]);
            }
        }
        return $gallery;
    }

    //endregion

    //region ContactRequests
    /**
     * @param $contactRequest
     * @return bool
     */
    public function receiveContactRequest($contactRequest): bool {
        $connection = $this->getConnection();
        $result = false;
        if ($connection) {
            $name = mysqli_real_escape_string($connection, $contactRequest->getName());
            $surName = mysqli_real_escape_string($connection, $contactRequest->getSurName());
            $email = mysqli_real_escape_string($connection, $contactRequest->getMail());
            $message = mysqli_real_escape_string($connection, $contactRequest->getMessage());
            $sql = "INSERT INTO messages (MessageID, Firstname, Surname, Email, Message, Replied) VALUES (DEFAULT , '$name', '$surName', '$email', '$message', FALSE )";
            $result = mysqli_query($connection, $sql);
        }
        return $result;
    }

    /**
     * @return array|null
     */
    public function getAllContactRequests(): ?array {
        $connection = $this->getConnection();
        $requestArray = null;
        if ($connection) {
            $sql = "SELECT * FROM messages";
            $result = mysqli_query($connection, $sql);
            if ($result->num_rows >= 1) {
                $resultArray = $result->fetch_all();
                $requestArray = array();
                foreach ($resultArray as $request) {
                    array_push($requestArray, new ContactRequest($request["0"], $request["1"], $request["2"], $request["3"], $request["4"], $request["5"]));
                }
            }
        }
        return $requestArray;
    }

    /**
     * @param $id
     * @return ContactRequest|null
     */
    public function getContactRequestById($id): ?ContactRequest {
        $connection = $this->getConnection();
        $request = null;
        if ($connection) {
            $sql = "SELECT * FROM messages WHERE MessageID = '" . $id . "';";
            $result = mysqli_query($connection, $sql);
            if ($result->num_rows == 1) {
                $result = $result->fetch_assoc();
                $request = new ContactRequest($result["MessageID"], $result["Firstname"], $result["Surname"], $result["Email"], $result["Message"], $result["Replied"]);
            }
        }
        return $request;
    }

    /**
     * @param $id
     * @return bool
     */
    public function setContactRequestToReplied($id): bool {
        $connection = $this->getConnection();
        $result = false;
        if ($connection) {
            $messageId = mysqli_real_escape_string($connection, $id);
            $sql = $connection->prepare("UPDATE messages SET Replied=TRUE WHERE MessageID=?");
            $sql->bind_param('i', $messageId);
            $result = $sql->execute();
        }
        return $result;
    }
    //endregion

    //region Content
    /**
     * @param $pageName
     * @return null|PageContent
     */
    public function getContentByPageName($pageName): ?PageContent {
        $connection = $this->getConnection();
        $request = null;
        if ($connection) {
            $pageName = mysqli_real_escape_string($connection, $pageName);
            $sql = "SELECT * FROM pagecontent WHERE PageName = '" . $pageName . "';";
            $result = mysqli_query($connection, $sql);
            if ($result->num_rows == 1) {
                $result = $result->fetch_assoc();
                $request = new PageContent($result["PageID"], $result["PageName"], $result["Headline"], $result["Content"]);
            }
        }
        return $request;
    }

    /**
     * @return array|null
     */
    public function getAllPageContents(): ? array {
        $connection = $this->getConnection();
        $contentArray = null;
        if ($connection) {
            $sql = "SELECT * FROM pagecontent";
            $result = mysqli_query($connection, $sql);
            if ($result->num_rows >= 1) {
                $resultArray = $result->fetch_all();
                $contentArray = array();
                foreach ($resultArray as $content) {
                    array_push($contentArray, new PageContent($content["0"], $content["1"], $content["2"], $content["3"]));
                }
            }
        }
        return $contentArray;
    }

    /**
     * @param $pageContent
     * @return bool
     */
    public function updatePageContent($pageContent): bool {
        $connection = $this->getConnection();
        $result = false;
        if ($connection) {
            $pageName = mysqli_real_escape_string($connection, $pageContent->getPageName());
            $headline = mysqli_real_escape_string($connection, $pageContent->getHeadline());
            $content = mysqli_real_escape_string($connection, $pageContent->getContent());

            $sql = $connection->prepare("UPDATE pagecontent SET Headline=?, Content=? WHERE PageName=?");
            $sql->bind_param('sss', $headline, $content, $pageName);

            $result = $sql->execute();
        }
        return $result;
    }

    //endregion
    //region Loans
    public function loanBook($input) : bool {
        $connection = $this->getConnection();
        $result = false;
        if($connection) {
            $bookId = mysqli_real_escape_string($connection, $input["bookId"]);
            $memberId = mysqli_real_escape_string($connection, $input["memberId"]);
            $takenDate = gmdate("Y-m-d");
            $sql = "UPDATE books SET MemberId = $memberId, Taken = '$takenDate', Returned = NULL WHERE ID = $bookId;";
            $result = mysqli_query($connection, $sql);
        }
        return $result;
    }

    public function returnBook($input) : bool {
        $connection = $this->getConnection();
        $result = false;
        if($connection) {
            $bookId = mysqli_real_escape_string($connection, $input["bookId"]);
            $returnDate = mysqli_real_escape_string($connection, $input["returned"]);
            $sql = "UPDATE books SET MemberId = NULL, Taken = NULL, Returned = '$returnDate' WHERE ID = $bookId;";
            $result = mysqli_query($connection, $sql);
        }
        return $result;
    }

    //endregion
}