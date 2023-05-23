<?php
// Src/Controllers/EmailController.php

namespace App\Controllers;

use App\Lib\EmailService;

class EmailController {
    private $emailService;

    public function __construct() {
        $this->emailService = new EmailService();
    }

    public function sendConfirmationEmail($username, $email, $confirmationLink) {
        return $this->emailService->prepareConfirmationEmail($username, $email, $confirmationLink);
    }
}