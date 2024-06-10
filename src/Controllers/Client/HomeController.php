<?php 

namespace Ductong\Mvcoop\Controllers\Client;

use Ductong\Mvcoop\Commons\Controller;
use Ductong\Mvcoop\Models\Post;
use Ductong\Mvcoop\Models\User;

class HomeController extends Controller
{
    private Post $post;

    public function __construct(){
        $this->post = new Post;
    }
    public function index() {
        $postFirstLatest = $this->post->getFirstLatest();
        $postTop6 = $this->post->getTop6();
        $postTop6chunk = array_chunk($postTop6, 3);
        // $user = new User();
        // $data = $user->getByID(1);
        return $this->renderViewClient(
            'home',
            [
                'postFirstLatest' => $postFirstLatest,
                'postTop6chunk' => $postTop6chunk
            ]
        );
    }
}