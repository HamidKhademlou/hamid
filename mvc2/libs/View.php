<?php
class view
{
    public function __contruct()
    {
    }
    public function render($folder, $file, $output = array(), $load = 0)
    {
        if ($load == 0) {
            $this->header();
        }

        extract($output);
        require_once("views/" . $folder . "/" . $file . ".php");

        if ($load == 0) {
            $this->footer();
        }
    }
    public function header()
    {
        require_once("views/header.html");
    }
    public function marketheader()
    {
        require_once("views/marketheader.php");
    }
    public function footer()
    {
        require_once("views/footer.html");
    }
}