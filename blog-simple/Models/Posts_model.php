<?php 
class Posts_model extends Model
{
    private $flagConnection = null;
    public function __construct()
    {
        $this->flagConnection = parent::__construct();
    }
    public function GetBlogPosts($id)
    {
        if(is_numeric($id)==true){
        $rows = $this->select('blog_posts', '*', "id = $id", 1);
        return $rows;
        }else{
            $rows = $this->select('blog_posts', '*', "title = $id", 1);
        return $rows;
        }
    }
}

//  $blogPosts = GetBlogPosts();
//  $template  = new template();

// $html='';
// foreach ($blogPosts as $post)
// {
// $html.= "<div class='post'>";
// $html.= "<h2>" . $post->title . "</h2>";
// $html.= "<p>" . $post->post . "</p>";
// $html.= "<span class='footer'>Posted By: " . $post->author . " Posted on: " . $post->datePosted . " Tags: " . $post->tags . "</span>";
// $html.= "</div>";
// }
// $template->assign(array(
//     'title'   => 'My Simple Blog !',
//     'header'  => 'UME blog !',
//     'posts' => $html
// 	));

// $template->display('includes/template-blogindex.tpl');

//     }

// }