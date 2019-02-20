<?php

class Controller{

    protected $edit_row = null;
    protected $delete_row = null;
    protected $save_row = null;
    protected $cancel_row = null;

    protected $check_edit = null;
    protected $check_delete = null;
    protected $check_save = null;
    protected $check_cancel = null;

    protected $quantityError = null;
    protected $priceError = null;

    public function __autoload($class_name)
    {
        include_once 'Class.' . $class_name . '.php';
    }

    public function __construct($_input)
    {
        //Check if remove, edit, save or cancel button is pressed
        $this->check_edit = $this->check_delete = $this->check_save = $this->check_cancel = false;
        foreach($_input as $key => $value){
            $exp_key = explode('_', $key);
            if($exp_key[0] == 'edit'){
                $this->check_edit = true;
                $this->edit_row = $exp_key[1];
            }
            if($exp_key[0] == 'delete'){
                $this->check_delete = true;
                $this->delete_row = $exp_key[1]; 
            }
            if($exp_key[0] == 'save'){
                $this->check_save = true;
                $this->save_row = $exp_key[1]; 
            }
            if($exp_key[0] == 'cancel'){
                $this->check_cancel = true;
                $this->cancel_row = $exp_key[1]; 
            }
        }

        //delete selected row
        if($this->check_delete == true){
            $delete_row = $this->delete_row;
            $deleteObj = new Database('localhost', 'root', '', 'frooshgah');
            $deleteObj->delete('products', "id=$delete_row");
            unset($deleteObj);
        }

        //edit selected row
        if($this->check_edit == true){

        }

        //save selected row
        if($this->check_save == true){
            $insertOk = 0;
            $save_row = $this->save_row;
            $getObj = new Get();
            $getObj->setType($_input["type"]);
            $getObj->setName($_input["name"]);
            
            if(preg_match('/^[0-9]*$/', $_input["quantity"]) && $_input["quantity"] >= 0){
                $_input["quantity"] = ltrim($_input["quantity"], '0');
                $_input["quantity"] = (int)$_input["quantity"];
                $getObj->setQuantity($_input["quantity"]);
                $insertOk += 1;
            }else{
                $this->quantityError = "Not Valid Quantity!";
            }

            $_input["price"] = (double)$_input["price"];
            if(preg_match('/^(?:0|[1-9]\d*)(?:\.\d{2})?$/', $_input["price"])){
                $_input["price"] = ltrim($_input["price"], '0');
                $_input["price"] = (double)$_input["price"];
                $getObj->setPrice($_input["price"]);
                $insertOk += 1;
            }else{
                $this->priceError = "Not Valid Price!";
            }

            if($insertOk == 2){
                $editObj = new Database('localhost', 'root', '', 'frooshgah');
                $editObj->update($getObj, 'products', "id=$save_row");
            }
            
            unset($getObj);
            unset($editObj);
        }

        //cancel selected row
        if($this->check_cancel == true){
            $this->check_edit = false;
            $this->edit_row = null;
        }

        //insert data in database
        if($this->check_edit == false && $this->check_delete == false && $this->check_save == false && $this->check_cancel == false){
            $insertOk = 0;
            $getObj = new Get();
            $getObj->setType($_input["type"]);
            $getObj->setName($_input["name"]);

            if(preg_match('/^[0-9]*$/', $_input["quantity"]) && $_input["quantity"] >= 0){
                $_input["quantity"] = ltrim($_input["quantity"], '0');
                $_input["quantity"] = (int)$_input["quantity"];
                $getObj->setQuantity($_input["quantity"]);
                $insertOk += 1;
            }else{
                $this->quantityError = "Not Valid Quantity!";
            }

            $_input["price"] = (double)$_input["price"];
            if(preg_match('/^(?:0|[1-9]\d*)(?:\.\d{2})?$/', $_input["price"])){
                $_input["price"] = ltrim($_input["price"], '0');
                $_input["price"] = (double)$_input["price"];
                $getObj->setPrice($_input["price"]);
                $insertOk += 1;
            }else{
                $this->priceError = "Not Valid Price!";
            }

            if($insertOk == 2){
                $databaseObj = new Database('localhost', 'root', '', 'frooshgah');
                $databaseObj->insert('products', $getObj);
            }
            
            unset($getObj);
            unset($databaseObj);
        }
    }

    public function getEditRow(){
        return $this->edit_row; 
    }

    public function getQuantityError(){
        return $this->quantityError; 
    }

    public function getPriceError(){
        return $this->priceError; 
    }

}