<?php
require "../database/MySQLService.php";

class ContactController
{
    /**
     * @param $contactRequest
     * @return bool
     */
    public static function receiveContactRequest ($contactRequest) : bool {
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->receiveContactRequest($contactRequest);
        }
        return false;
    }

    /**
     * @return array|null
     */
    public static function getAllContactRequests () : ?array {
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->getAllContactRequests();
        }
        return null;
    }

    /**
     * @param $id
     * @return ContactRequest|null
     */
    public static function getContactRequestById($id) : ?ContactRequest {
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->getContactRequestById($id);
        }
        return null;
    }
}