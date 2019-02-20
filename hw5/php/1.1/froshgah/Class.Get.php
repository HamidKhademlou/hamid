<?php

    class Get{

        public $type = "";
        public $name = "";
        public $quantity = "";
        public $price = "";

        /**
         * releases all resources
         */
        public function __destruct(){
            echo "<script>console.log('".'The class "', __CLASS__, '" was destroyed.<br />'."')</script>";
        }

        public function setType($new){
            $this->type = $new;
        }
        public function getType(){
            return $this->type;
        }

        public function setName($new){
            $this->name = $new;
        }
        public function getName(){
            return $this->name;
        }

        public function setQuantity($new){
            $this->quantity = $new;
        }
        public function getQuantity(){
            return $this->quantity;
        }

        public function setPrice($new){
            $this->price = $new;
        }
        public function getPrice(){
            return $this->price;
        }

    }