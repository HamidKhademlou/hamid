<?php

class Session{
    public static $key = null;
    public static $value = null;

    public function __construct(){
        session_start();
        echo "AUTO START SESSION"."<br>";
    }

    public function __destruct(){
        session_destroy();
        echo "AUTO END SESSION"."<br>";
    }

    public static function start_session(){
        if(!isset($_SESSION)){
            session_start();
        }
        // echo "START SESSION"."<br>";
    }

    public static function end_session(){
        session_unset();
        session_destroy();
        // echo "END SESSION"."<br>";
    }

    public static function unset_session($key){
        unset($_SESSION[$key]);
    }

    public static function setSession($keyin, $valuein){
        self::$value = $_SESSION["$keyin"] = $valuein;
        self::$key = $keyin;
        // echo "SESSION WAS SET"."<br>";
    }

    public static function getSession($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }else{
            return false;
        }
        // return self::$key." : ".self::$value . "<br>";
    }
}