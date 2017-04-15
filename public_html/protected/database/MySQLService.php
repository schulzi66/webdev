<?php
require "DatabaseModel.php";
require "../entities/User.php";
require "../entities/Book.php";
require "../entities/Member.php";

class MySQLService {
    private $connection;
    #region Getter and Setter
    /**
     * @param mixed $connection
     */
    public function setConnection($connection) {
        $this->connection = $connection;
    }

    /**
     * @return mixed
     */
    public function getConnection() {
        return $this->connection;
    }
    #endregion

    //region Connection
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
        if ($connection) {
            $sql = "SELECT * FROM books";
            $result = mysqli_query($connection, $sql);
            if ($result->num_rows >= 1) {
                $bookArray = $result->fetch_all();
                return $bookArray;
            }
        }
        return null;
    }

    /**
     * @param $id
     * @return Book|null
     */
    public function getBookById($id): ?Book {
        $connection = $this->getConnection();
        if ($connection) {
            $sql = "SELECT * FROM books WHERE ID = '" . $id . "';";
            $result = mysqli_query($connection, $sql);
            if ($result->num_rows == 1) {
                $result = $result->fetch_assoc();
                $book = new Book($result["ID"], $result["Title"], $result["Author"], $result["ISBN"], $result["Category"], $result["LoanID"]);
                return $book;
            }
        }
        return null;
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
            $sql = "INSERT INTO books (ID,  Title, Author, ISBN, Category, LoanID) VALUES (DEFAULT , '$title', '$author', '$isbn', '$category', NULL )";
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
        if ($connection) {
            $result = $connection->query("DELETE FROM books WHERE ID = " . $bookId . ";");
            if ($result) {
                $connection->query("ALTER TABLE books AUTO_INCREMENT = " . $bookId . ";");
            }
            return $result;
        }
        return false;
    }

    /**
     * @param $book
     * @return bool
     */
    public function updateBook($book): bool {

        $connection = $this->getConnection();
        if ($connection) {
            $id = mysqli_real_escape_string($connection, $book->getId());
            $title = mysqli_real_escape_string($connection, $book->getTitle());
            $author = mysqli_real_escape_string($connection, $book->getAuthor());
            $isbn = mysqli_real_escape_string($connection, $book->getIsbn());
            $category = mysqli_real_escape_string($connection, $book->getCategory());

            $sql = $connection->prepare("UPDATE books SET Title=?, Author=?, ISBN=?, Category=? WHERE ID=?");
            $sql->bind_param('ssssi', $title, $author, $isbn, $category, $id);

            $result = $sql->execute();
            return $result;
        }
        return false;
    }

    /**
     * @param $input
     * @return array
     */
    public function getBooksByTitleOrAuthor($input): ?array {
        $connection = $this->getConnection();
        if ($connection) {
            if ($input["bookTitle"] != "" && $input["bookAuthor"] != "" && $input["notLoaned"] == "on") {
                $sql = "SELECT * FROM books WHERE Title LIKE '%" . $input["bookTitle"] . "%' AND Author LIKE '%"
                    . $input["bookAuthor"] . "%' AND LoanID IS NULL;";
            } else if ($input["bookTitle"] != "" && $input["bookAuthor"] != "") {
                $sql = "SELECT * FROM books WHERE Title LIKE '%" . $input["bookTitle"] . "%' AND Author LIKE '%"
                    . $input["bookAuthor"] . "%';";
            } else if ($input["bookTitle"] != "" && $input["notLoaned"] == "on") {
                $sql = "SELECT * FROM books WHERE Title LIKE '%" . $input["bookTitle"] . "%' AND LoanID IS NULL;";
            } else if ($input["bookTitle"] != "") {
                $sql = "SELECT * FROM books WHERE Title LIKE '%" . $input["bookTitle"] . "%';";
            } else if ($input["bookAuthor"] != "" && $input["notLoaned"] == "on") {
                $sql = "SELECT * FROM books WHERE Author LIKE '%" . $input["bookAuthor"] . "%' AND LoanID IS NULL;";
            } else if ($input["bookAuthor"] != "") {
                $sql = "SELECT * FROM books WHERE Author LIKE '%" . $input["bookAuthor"] . "%';";
            } else {
                return null;
            }
            $result = mysqli_query($connection, $sql);
            if ($result->num_rows > 0) {
                $resultArray = $result->fetch_all();
                $bookArray = Array();
                foreach ($resultArray as &$book) {
                    array_push($bookArray, new Book($book["0"], $book["1"], $book["2"], $book["3"], $book["4"], $book["5"]));
                }
                return $bookArray;
            }
        }
        return null;
    }

    //endregion

    //region Member
    /**
     * @return array|null
     */
    public function getAllMembers(): ?array {
        $connection = $this->getConnection();
        if ($connection) {
            $sql = "SELECT * FROM member";
            $result = mysqli_query($connection, $sql);
            if ($result->num_rows >= 1) {
                $memberArray = $result->fetch_all();
                return $memberArray;
            }
        }
        return null;
    }

    /**
     * @param $id
     * @return Member|null
     */
    public function getMemberById($id): ?Member {
        $connection = $this->getConnection();
        if ($connection) {
            $sql = "SELECT * FROM member WHERE MemberID = '" . $id . "';";
            $result = mysqli_query($connection, $sql);
            if ($result->num_rows == 1) {
                $result = $result->fetch_assoc();
                $member = new Member($result["MemberID"], $result["Firstname"], $result["Surname"], $result["Address"], $result["Phone"], $result["Birth"], $result["Gender"], $result["Email"]);
                return $member;
            }
        }
        return null;
    }

    /**
     * @param $member
     * @return bool
     */
    public function addMember($member): bool {
        $connection = $this->getConnection();
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
            return $result;
        }
        return false;
    }

    /**
     * @param $memberId
     * @return bool
     */
    public function deleteMember($memberId): bool {
        $connection = $this->getConnection();
        if ($connection) {
            $result = $connection->query("DELETE FROM member WHERE MemberID = " . $memberId . ";");
            if ($result) {
                $connection->query("ALTER TABLE member AUTO_INCREMENT = " . $memberId . ";");
            }
            return $result;
        }
        return false;
    }

    /**
     * @param $member
     * @return bool
     */
    public function updateMember($member): bool {

        $connection = $this->getConnection();
        if ($connection) {
            $memberId = mysqli_real_escape_string($connection, $member->getMemberId());
            $firstName = mysqli_real_escape_string($connection, $member->getFirtName());
            $surName = mysqli_real_escape_string($connection, $member->getSurName());
            $address = mysqli_real_escape_string($connection, $member->getAddress());
            $phone = mysqli_real_escape_string($connection, $member->getPhone());
            $birth = mysqli_real_escape_string($connection, $member->getBirth());
            $gender = mysqli_real_escape_string($connection, $member->getGender());
            $mail = mysqli_real_escape_string($connection, $member->getEmail());

            $sql = $connection->prepare("UPDATE member SET Firstname=?, Surname=?, Address=?, Phone=?, Birth=?, Gender=?, Email=? WHERE MemberID=?");
            $sql->bind_param('ssssssi', $firstName, $surName, $address, $phone, $gender, $mail, $memberId);

            $result = $sql->execute();
            return $result;
        }
        return false;
    }
    //endregion

    //TODO Julian: Queries
    //region images
    /**
     * @param string $imageGalleryName
     * @return array|null
     */
    public function getImages($imageGalleryName = "default"): ?array {
        $connection = $this->getConnection();
        if ($connection) {
            if ($imageGalleryName == "default") {
                $sql = "SELECT * FROM images";
            } else {
                $sql = $connection->prepare("SELECT * FROM gallery JOIN galleryimages ON gallery.SliderID = galleryimages.SliderID WHERE name=?");
                $sql->bind_param($imageGalleryName);
            }
            $result = mysqli_query($connection, $sql);
            if ($result->num_rows >= 1) {
                $imageArray = $result->fetch_all();
                return $imageArray;
            }
        }
        return null;
    }

    /**
     * @return bool
     */
    public function setImageGalleryImages($images): bool {
        $connection = $this->getConnection();
        if ($connection) {
            $sql = "";
            foreach ($images as $image) {
                $sql .= "INSERT INTO galleryimages(SliderID, ImageID) VALUES(" . $image["sliderID"] . "," . $image["imageID"] . ")";
            }
            $connection->multi_query($sql);
        }
        return false;
    }

    /**
     * @param $imageGalleryName
     * @return bool
     */
    public function updateImageGallery($imageGalleryName, $images): bool {
        $connection = $this->getConnection();
        if ($connection) {
            $sql = $connection->prepare("");
            $result = $sql->execute();
            return $result;
        }
        return false;
    }

    public function getAllGalleries(): ?array {
        $connection = $this->getConnection();
        if ($connection) {
            $sql = "SELECT * FROM galleries";
            $result = mysqli_query($connection, $sql);
            if ($result->num_rows >= 1) {
                $galleryArray = $result->fetch_all();
                return $galleryArray;
            }
        }
        return null;
    }
    //end region images
}