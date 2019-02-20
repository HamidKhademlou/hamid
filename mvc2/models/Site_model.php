<?php
class Site_model extends Model
{
    private $flagconnection = null;
    public function __construct()
    {
        $this->flagConnection = parent::__construct();
    }
}