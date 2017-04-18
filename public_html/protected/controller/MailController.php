<?php


class MailController {
    //used const because the from value will never change
    private const headers = "From: swd.library.griffith@gmail.com" . "\r\n";

    /**
     * @param $to
     * @param $subject
     * @param $msg
     * @return bool
     */
    public static function sendMail($to, $subject, $msg): bool {
        return mail($to, $subject, wordwrap($msg, 70), self::headers);
    }
}