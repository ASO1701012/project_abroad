<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '' . DIRECTORY_SEPARATOR . 'abroad_web' . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'Model' . DIRECTORY_SEPARATOR . 'account' . DIRECTORY_SEPARATOR . 'login' . DIRECTORY_SEPARATOR . 'AuthenticationDB.php');


class LoginAuthentication
{
    public $password;
    public $teacher_number;
    public $hash;

    public function __construct($teacher_number, $password)
    {
        $this->teacher_number = $teacher_number;
        $this->password = $password;
    }

    public function authentication()
    {
        $db = new AuthenticationDB();
        $ans = $db->getList('teacher_number', "$this->teacher_number");
        $this->hash = $ans[0]["password"];
        if (password_verify($this->password, $this->hash)) {
            session_regenerate_id(True);
            $_SESSION['user_id'] = $this->teacher_number;
            return True;
        } else {
            return false;
        }
    }
}