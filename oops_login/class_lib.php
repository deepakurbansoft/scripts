<?php

class person
{
 var $name;
    public $height;
    protected $social_insurance;
    private $pin_number;

    public function setHeight($height)
    {
        $this->height = $height;

    }
    function __construct($persons_name)
    {
        $this->name= $persons_name;
    }

    function set_name($new_name)
    {
        $this->name = $new_name;
    }

    function get_name()
    {
        return $this->name;
    }

    function get_height()
    {
        return $this->height;
    }
}

class UserService
{
    protected $_email;    // using protected so they can be accessed
    protected $_password; // and overidden if necessary

    protected $_db;       // stores the database handler
    protected $_user;     // stores the user data

    public function __construct(PDO $db, $email, $password)
    {
        $this->_db = $db;
        $this->_email = $email;
        $this->_password = $password;
    }

    public function login()
    {
        $user = $this->_checkCredentials();
        if ($user) {
            $this->_user = $user; // store it so it can be accessed later
            $_SESSION['user_id'] = $user['id'];
            return $user['id'];
        }
        return false;
    }

    protected function _checkCredentials()
    {
        $stmt = $this->_db->prepare('SELECT * FROM users WHERE 1');
        $stmt->execute(array($this->email));
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $submitted_pass =  $this->_password;
            if ($submitted_pass == $user['password']) {
                return $user;
            }
        }
        return false;
    }

    public function getUser()
    {
        return $this->_user;
    }
}

class userDetails
{
   public function GetuserDetails()
   {
       $stmt = $this->_db->prepare('SELECT * FROM users WHERE 1');
       $stmt->execute(array($this->email));
   }
}