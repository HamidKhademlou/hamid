<?php
class session
{
    public static function sessionStart()
    {
        session_start();
    }
    public static function sessionDestroy()
    {
        session_unset();
        session_destroy();
    }
    public static function setSession($name, $value)
    {
        $_SESSION[$name] = $value;
    }
    public static function getSession($name)
    {
        echo $_SESSION[$name];
    }
}
session::sessionStart();
?>
<?php
session::setSession('user', 'hamid');
session::getSession('user');
session::sessionDestroy();
?>