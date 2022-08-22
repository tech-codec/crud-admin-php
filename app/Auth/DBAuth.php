<?php

namespace App\Auth;

use App\Database\Database;

class DBAuth
{
    private $db;
    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getUserId()
    {
        if ($this->logged()) {
            return $_SESSION['auth'];
        }
        return false;
    }

    /**
     * la function d'authenfication
     *
     * @param [type] $username
     * @param [type] $password
     * @return boolean
     */
    public function login($username, $password)
    {
        $user = $this->db->prepare('SELECT * FROM users WHERE username =?', [$username], null, true);
        //var_dump(sha1('demo'));
        if ($user) {
            if ($user->password = sha1($password)) {
                $_SESSION['auth'] = $user->id;
                return true;
            }
        }
        return false;
    }

    public function logged()
    {
        return isset($_SESSION['auth']);
    }
}
