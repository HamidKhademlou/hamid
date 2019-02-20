<?php
class Model
{
    public $con;
    public function __construct($servername = db_Servername, $username = db_username, $password = db_password, $dbname = db_Databasename)
    {
        try {
            $this->con = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection Failed" . $e->getMessage();
        }
    }
    public function select($tablename, $fields = "*", $condition = 1, $flag = 0)
    {
        $stmt = $this->con->prepare("SELECT $fields FROM $tablename WHERE $condition ");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        if ($flag == 1) {
            return ($stmt->fetch());
        } elseif ($flag == 0) {
            return ($stmt->fetchAll());
        }
    }
// ---------------------------------------
    // public $id;
    // public $title;
    // public $post;
    // public $author;
    // public $tags;
    // public $datePosted;
    // function __construct($inId = null, $inTitle = null, $inPost = null, $inPostFull = null, $inAuthorId = null, $inDatePosted = null)
    // {
    //     try {
    //         $conn = new PDO("mysql:host=$servername;dbname=blog", $username, $password);
    //         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //         echo "Connected successfully";
    //     } catch (PDOException $e) {
    //         echo "Connection failed: " . $e->getMessage();
    //     }

    //     if (!empty($inId)) {
    //         $this->id = $inId;
    //     }
    //     if (!empty($inTitle)) {
    //         $this->title = $inTitle;
    //     }
    //     if (!empty($inPost)) {
    //         $this->post = $inPost;
    //     }
    //     if (!empty($inDatePosted)) {
    //         $splitDate = explode("-", $inDatePosted);
    //         $this->datePosted = $splitDate[1] . "/" . $splitDate[2] . "/" . $splitDate[0];
    //     }
    //     if (!empty($inAuthorId)) {
    //         $stmt = $conn->prepare("SELECT first_name, last_name FROM peoples WHERE id = " . $inAuthorId);
    //         $stmt->execute();
    //         $row = $stmt->fetch(PDO::FETCH_ASSOC);
    //         $this->author = $row["first_name"] . " " . $row["last_name"];
    //     }
    //     $postTags = "No Tags";
    //     if (!empty($inId)) {
    //         $stmt = $conn->prepare("SELECT tags.* FROM tags_has_blog_posts LEFT JOIN (tags) ON (tags_has_blog_posts.tags_id = tags.id) WHERE tags_has_blog_posts.blog_posts_id = " . $inId);
    //         $stmt->execute();
    //         $tagArray = array();
    //         $tagIDArray = array();
    //         while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    //             $tagArray[] = $row["name"];
    //             $tagIDArray[] = $row["id"];
    //         }
    //         if (sizeof($tagArray) > 0) {
    //             foreach ($tagArray as $tag) {
    //                 $tagArray[] = $row["name"];
    //                 $tagIDArray[] = $row["id"];
    //             }
    //             if (sizeof($tagArray) > 0) {
    //                 foreach ($tagArray as $tag) {
    //                     if ($postTags == "No Tags") {
    //                         $postTags = $tag;
    //                     } else {
    //                         $postTags = $postTags . ", " . $tag;
    //                     }
    //                 }
    //             }
    //         }
    //         $this->tags = $postTags;
    //     }
    // }
}