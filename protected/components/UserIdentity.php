<?

class UserIdentity extends CUserIdentity
{
    private $_id;

    public function authenticate()
    {
        $record = User::model() -> findByAttributes(array('email' => $this -> username));

        if($record === null)
        {
            $this -> errorCode = self::ERROR_USERNAME_INVALID;
        }
        else if($record -> password !== crypt($this -> password, $record -> password))
        {
            $this -> errorCode = self::ERROR_PASSWORD_INVALID;
        }
        else
        {
            $this -> _id = $record -> id;
            $this -> setState('email', $record -> email);
            $this -> errorCode = self::ERROR_NONE;
        }
        return !$this -> errorCode;
    }
 
    public function getId()
    {
        return $this -> _id;
    }
}

?>