<?php
require_once "../database/MySQLService.php";

/**
 * Controller-Class MemberManagementController
 */
class MemberManagementController {
    /**
     * @return array|null
     */
    public static function getAllMembers(): ?array {
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->getAllMembers();
        }
        return null;
    }

    /**
     * @param $id
     * @return Member|null
     */
    public static function getMemberById($id): ?Member {
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->getMemberById($id);
        }
        return null;
    }

    /**
     * @param $member
     * @return bool
     */
    public static function addMember($member): bool {
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->addMember($member);
        }
        return false;
    }

    /**
     * @param $memberId
     * @return bool
     */
    public static function deleteMember($memberId): bool {
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->deleteMember($memberId);
        }
        return false;
    }

    /**
     * @param $member
     * @return bool
     */
    public static function updateMember($member): bool {
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->updateMember($member);
        }
        return false;
    }
}