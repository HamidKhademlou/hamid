<?php

    class getInput{

        public $title = "";
        public $editorInput = "";

        public function setTitle($new){
            $this->title = $new;
        }
        public function getTitle(){
            return $this->title;
        }

        public function setEditorInput($new){
            $this->editorInput = $new;
        }
        public function getEditorInput(){
            return $this->editorInput;
        }

    }