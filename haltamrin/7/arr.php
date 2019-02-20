<?php
class arr
{
    public $a = array();
    public function __construct()
    {
        $this->a = new SplFixedArray(5);
        // foreach
        return $this->a;
    }
    public function setvalue($index, $value)
    {
        $this->a[$index] = $value;
        return $this->a;
    }
    public function view($index)
    {
        $l = count($this->a);
        // var_dump($l);die;
        if ($index < $l) {
            return $this->a[$index];
        } else {
            return -1;
        }
    }
    public function sort()
    {
        $aa=(array)$this->a;
        sort($aa);
        return $aa;
    }
}
