<?php 

namespace App\Controllers\Blog;

use System\Controller;

class PostController extends Controller
{
     // In PostController.php

/**
 * Display Post Page
 *
 * @param string name
 * @param int $id
 * @return mixed
 */
public function index($title, $id)
{
    $postModel = $this->load->model('Posts');
    
    // Get post with comments and tags
    $post = $postModel->getPostWithCommentsAndTags($id);

    if (! $post) {
        return $this->url->redirectTo('/404');
    }

    $this->html->setTitle($post->title);

    $data['post'] = $post;

    // Pass tags data to the view
    $data['tags'] = $postModel->getTagsForPost($id);

    $view = $this->view->render('blog/post', $data);

    return $this->blogLayout->render($view);
}

     /**
     * Add New Comment to the given post
     *
     * @param string $title
     * @param int $id
     * @return mixed
     */
    public function addComment($title, $id)
    {
        // first we will check if there is no comment or the post does not exist
        // then we will redirect him to not found page
        $comment = $this->request->post('comment');

        $postsModel = $this->load->model('Posts');
        $loginModel = $this->load->model('Login');

        $post = $postsModel->get($id);

        if (! $post OR $post->status == 'disabled' OR ! $comment OR ! $loginModel->isLogged()) {
            return $this->url->redirectTo('/404');
        }

        $user = $loginModel->user();

        $postsModel->addNewComment($id, $comment, $user->id);

        return $this->url->redirectTo('/post/' . $title . '/' . $id . '#comments');
    }

     /**
     * Load the post box view for the given post
     *
     * @param \stdClass $post
     * @return string
     */
    public function box($post)
    {
        return $this->view->render('blog/post-box', compact('post'));
    }
}