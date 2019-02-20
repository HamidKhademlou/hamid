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
    public static function setSession($b, $c)
    {
        $_SESSION[$b] = $c;
    }
    public static function getSession($b)
    {
        echo $_SESSION[$b];
    }
}
session::sessionStart();
?>
<?php
session::setSession('name', 'hamisss');
session::getSession('name');
session::sessionDestroy();
?>