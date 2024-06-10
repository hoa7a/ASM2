<?php 

namespace Ductong\Mvcoop\Controllers\Client;

use Ductong\Mvcoop\Commons\Controller;
use Ductong\Mvcoop\Models\Post;
use Ductong\Mvcoop\Models\User;

class PostController  extends Controller
{
    private Post $post;

    public function __construct(){
        $this->post = new Post;
    }
    public function show($id) {
        $post = $this->post->getByID($id);
        return $this->renderViewClient(
            'post-show',
            [
                '$post' => $post,
                
            ]
        );
    }
}