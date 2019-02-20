<?php

class View{

    public function __construct()
    {
        
    }

    public function render($folder, $file, $array = array(), $loadTheme = true, $themeFolder = theme_addr){
        //define variables:
        extract($array);
        
        //make view page url:
        if($folder != null){
            $viewUrl = "Views"."/".$folder."/".$file.".php";
        }else{
            $viewUrl = $file;
        }
        
        //render view page:
        if($loadTheme == true){
            $this->header($themeFolder);
        }
        require $viewUrl;
        if($loadTheme == true){
            $this->footer($themeFolder);
        }

        return;
    }

    public function header($folder){
        require($folder."/header.php");
    }

    public function footer($folder){
        require($folder."/footer.php");
    }

}