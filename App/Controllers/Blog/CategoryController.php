<?php

namespace App\Controllers\Blog;

use System\Controller;

class CategoryController extends Controller
{
     /**
     * Display Category Page
     *
     * @param string name
     * @param int $id
     * @return mixed
     */
    public function index($title, $id)
    {
        $category = $this->load->model('Categories')->getCategoryWithPosts($id);

        if (! $category) {
            return $this->url->redirectTo('/404');
        }

        $this->html->setTitle($category->name);

        if ($category->posts) {
            $category->posts = array_chunk($category->posts, 2);
        } else {
            if ($this->pagination->page() != 1) {
                // then just redirect him to the first page of the category
                // regardless there is posts or not in that category
                return $this->url->redirectTo("/category/$title/$id");
            }
        }

        $data['category'] = $category;

        $postController = $this->load->controller('Blog/Post');

        // the idea here as follows:
        // first we will pass the $post variable to $post_box variable
        // in the view file
        // why ? because $post_box is an anonymous function
        // when calling it, it will call the "box" method
        // from the post controller
        // so it will pass to it the "$post" variable to be used in the
        // post-box view
        $data['post_box'] = function ($post) use ($postController) {
            return $postController->box($post);
        };

        $data['url'] = $this->url->link('/category/' . seo($category->name) . '/' . $category->id . '?page=');

        
        $data['pagination'] = $this->pagination->paginate();

        $view = $this->view->render('blog/category', $data);

        return $this->blogLayout->render($view);
    }
}