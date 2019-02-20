<?php

class MakeForm{

    /*public function __construct($action, $method="GET" ,$target="_self", $options=null, $classes=null){
        echo "<form class=\"$classes\" action=\"$action\" method=\"$method\" target=\"$target\" $options>"."\n";
    }

    public function __destruct(){
        echo "</form>"."\n";
    }*/

    public static function startForm($action, $method="GET" ,$target="_self", $options=null, $classes=null){
        echo "<form class=\"$classes\" action=\"$action\" method=\"$method\" target=\"$target\" $options>"."\n";
    }

    public static function endForm(){
        echo "</form>"."\n";
    }

    public static function inputText($name, $value, $placeholder, $options=null, $classes=null){
        echo "<input type=\"text\" class=\"$classes\" name=\"$name\" id=\"$name\" value=\"$value\" placeholder=\"$placeholder\" $options>"."\n";
    }

    public static function inputNumber($name, $value, $placeholder, $options=null, $classes=null){
        echo "<input type=\"number\" class=\"$classes\" name=\"$name\" id=\"$name\" value=\"$value\" placeholder=\"$placeholder\" $options>"."\n";
    }

    public static function inputSubmit($name, $value, $options=null, $classes=null){
        echo "<input type=\"submit\" class=\"$classes\" name=\"$name\" id=\"$name\" value=\"$value\" $options>"."\n";
    }

    public static function inputButton($name, $value, $onclick=null, $options=null, $classes=null){
        echo "<input type=\"button\" class=\"$classes\" name=\"$name\" id=\"$name\" value=\"$value\" onclick=\"$onclick\" $options>"."\n";
    }

}