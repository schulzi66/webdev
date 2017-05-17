<?php
require_once __DIR__. "/../database/MySQLService.php";

/**
 * Controller-Class ContactController
 */
class ContactController {
    /**
     * @param $contactRequest
     * @return bool
     */
    public static function receiveContactRequest($contactRequest){
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->receiveContactRequest($contactRequest);
        }
        return false;
    }

    /**
     * @return array|null
     */
    public static function getAllContactRequests(){
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
    public static function getContactRequestById($id) {
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->getContactRequestById($id);
        }
        return null;
    }

    /**
     * @param $id
     * @return bool
     */
    public static function setContactRequestToReplied($id){
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->setContactRequestToReplied($id);
        }
        return null;
    }
}