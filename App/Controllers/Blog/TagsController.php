<?php

namespace App\Controllers\Blog;

use System\Controller;

class TagsController extends Controller
{
    /**
     * Display Posts by Tag
     *
     * @param string $name
     * @param int $id
     * @return mixed
     */
    public function index($name, $id)
    {
        $tag = $this->load->model('Tags')->getTagWithPosts($id);

        if (!$tag) {
            return $this->url->redirectTo('/404');
        }

        $this->html->setTitle($tag->name);

        if ($tag->posts) {
            $tag->posts = array_chunk($tag->posts, 2);
        } else {
            if ($this->pagination->page() != 1) {
                // Redirect to the first page of the tag
                return $this->url->redirectTo("/tag/$name/$id");
            }
        }

        $data['tag'] = $tag;

        $postController = $this->load->controller('Blog/Post');

        $data['post_box'] = function ($post) use ($postController) {
            return $postController->box($post);
        };

        $data['url'] = $this->url->link('/tag/' . seo($tag->name) . '/' . $tag->id . '?page=');

        $data['pagination'] = $this->pagination->paginate();

        $view = $this->view->render('blog/tag', $data);

        return $this->blogLayout->render($view);
    }
}
