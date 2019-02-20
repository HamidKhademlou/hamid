<?php

    class Controller{

        public function __construct($uri, $host, $indexAddr)
        {
            
            $url = trim($uri,"/");
            $dir = dirname($url);
            $filename = basename($url);
            $midvar = explode(".", $filename);
            $filename = $midvar[0];

            $newhost = $dir . "/" . $filename;
            $finaldir = $newhost.".php";
            
            //
            $selfdir = ltrim(str_replace("/", "\\", dirname($indexAddr)), "\\")."\\";
            $fdir1 = str_replace("/", "\\", $finaldir);
            $fdir2 = str_replace($selfdir, "", $fdir1);
            //
            
            if(file_exists("$fdir2")){
                require "$fdir2";
            }else{
                echo "File is not exists!!";
            }

            return null;
        }
            
    }
