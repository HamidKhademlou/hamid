<?php
$csv = new csv();
$csv->file();

class csv
{
    public function file()
    {
        require_once "student.php";
        $students = new student();
        $array = $students->one_student();
        $myfile = fopen("student.csv", "a+") or die("Unable to open file!");
        fwrite($myfile, "id, firstname, lastname,");
        fwrite($myfile, "\r\n");
        fclose($myfile);
        foreach ($array as $key => $value) {
            $myfile = fopen("student.csv", "a+") or die("Unable to open file!");
            foreach ($value as $value2) {
                // $value = test_input($value);
                fwrite($myfile, $value2 . ", ");
            }
            fwrite($myfile, "\r\n");
            fclose($myfile);
        }
        // $quoted = sprintf('"%s"', addcslashes(basename($file), '"\\'));
        // $size = filesize("/Report.pdf");
        $file = file_get_contents('student.csv');
        $size = strlen($file);

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=student.csv');
        header('Content-Transfer-Encoding: binary');
        header('Connection: Keep-Alive');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . $size);

        echo $file;
    }
}
