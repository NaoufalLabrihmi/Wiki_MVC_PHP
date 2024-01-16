<?php

namespace App\Models;

use System\Model;

class PostsModel extends Model
{
    protected $table = 'posts';

    public function all()
    {
        $user = $this->load->model('Login')->user();
    
        // Check if the user is a Super Administrator
        if ($user && $user->users_group_id == 1) {
            // Super Administrator - fetch all posts
            return $this->selectAllPosts();
        } elseif ($user) {
            // Regular User - fetch only the user's posts
            return $this->selectUserPosts($user->id);
        } else {
            // Guest or unauthenticated user - fetch public posts or handle as needed
            return $this->selectPublicPosts();
        }
    }
    
    /**
     * Fetch all posts for Super Administrators
     *
     * @return array
     */
    private function selectAllPosts()
    {
        return $this->select('p.*', 'c.name AS `category`', 'u.first_name', 'u.last_name')
            ->from('posts p')
            ->join('LEFT JOIN categories c ON p.category_id=c.id')
            ->join('LEFT JOIN users u ON p.user_id=u.id')
            ->fetchAll();
    }
    
    /**
     * Fetch only the user's posts for regular Users
     *
     * @param int $userId
     * @return array
     */
    private function selectUserPosts($userId)
    {
        return $this->select('p.*', 'c.name AS `category`', 'u.first_name', 'u.last_name')
            ->from('posts p')
            ->join('LEFT JOIN categories c ON p.category_id=c.id')
            ->join('LEFT JOIN users u ON p.user_id=u.id')
            ->where('p.user_id = ?', $userId)
            ->fetchAll();
    }
    
    /**
     * Fetch public posts for unauthenticated users or guests
     *
     * @return array
     */
    private function selectPublicPosts()
    {
        return $this->select('p.*', 'c.name AS `category`', 'u.first_name', 'u.last_name')
            ->from('posts p')
            ->join('LEFT JOIN categories c ON p.category_id=c.id')
            ->join('LEFT JOIN users u ON p.user_id=u.id')
            ->where('p.status = ?', 'enabled')  // Adjust this condition based on your needs
            ->fetchAll();
    }
    

    public function getPostWithComments($id)
    {
        $post = $this->select('p.*', 'c.name AS `category`', 'u.first_name', 'u.last_name', 'u.image AS userImage')
            ->from('posts p')
            ->join('LEFT JOIN categories c ON p.category_id=c.id')
            ->join('LEFT JOIN users u ON p.user_id=u.id')
            ->where('p.id=? AND p.status=?', $id, 'enabled')
            ->fetch();

        if (!$post) return null;

        $post->comments = $this->select('c.*', 'u.first_name', 'u.last_name', 'u.image AS userImage')
            ->from('comments c')
            ->join('LEFT JOIN users u ON c.user_id=u.id')
            ->where('c.post_id=?', $id)
            ->fetchAll();

        return $post;
    }
/**
     * Get a post with comments and tags by ID
     *
     * @param int $id
     * @return \stdClass|null
     */
    public function getPostWithCommentsAndTags($id)
    {
        $post = $this->select('p.*', 'c.name AS `category`', 'u.first_name', 'u.last_name', 'u.image AS userImage')
            ->from('posts p')
            ->join('LEFT JOIN categories c ON p.category_id=c.id')
            ->join('LEFT JOIN users u ON p.user_id=u.id')
            ->where('p.id=? AND p.status=?', $id, 'enabled')
            ->fetch();

        if (!$post) {
            return null;
        }

        // Get comments for the post
        $post->comments = $this->select('c.*', 'u.first_name', 'u.last_name', 'u.image AS userImage')
            ->from('comments c')
            ->join('LEFT JOIN users u ON c.user_id=u.id')
            ->where('c.post_id=?', $id)
            ->fetchAll();

        // Get tags for the post
        $post->tags = $this->getTagsForPost($id);

        return $post;
    }
    public function getTagsForPost($postId)
    {
        $tags = $this->select('t.*')
            ->from('post_tags pt')
            ->join('INNER JOIN tags t ON pt.tag_id = t.id')
            ->where('pt.post_id = ?', $postId)
            ->fetchAll();

        return $tags;
    }

    public function latest()
    {
        return $this->select('p.*', 'c.name AS `category`', 'u.first_name', 'u.last_name')
            ->select('(SELECT COUNT(co.id) FROM comments co WHERE co.post_id=p.id) AS total_comments')
            ->from('posts p')
            ->join('LEFT JOIN categories c ON p.category_id=c.id')
            ->join('LEFT JOIN users u ON p.user_id=u.id')
            ->where('p.status=?', 'enabled')
            ->orderBy('p.id', 'DESC')
            ->fetchAll();
    }

    /**
 * Create New Post
 *
 * @return void
 */
public function create()
{
    $image = $this->uploadImage();

    if ($image) {
        $this->data('image', $image);
    }

    $user = $this->load->model('Login')->user();
    $userId = $user ? $user->id : null;

    $postId = $this->data('title', $this->request->post('title'))
        ->data('details', $this->request->post('details'))
        ->data('category_id', $this->request->post('category_id'))
        ->data('user_id', $userId)
        ->data('status', $this->request->post('status'))
        ->data('created', time())
        ->insert('posts')
        ->lastId();

    // Handle tags
    $tags = array_filter((array)$this->request->post('tags_post'), 'is_numeric');
    $this->updatePostTags($postId, $tags);
}

/**
 * Update Posts Record By Id
 *
 * @param int $id
 * @return void
 */
public function update($id)
{
    $image = $this->uploadImage();

    if ($image) {
        $this->data('image', $image);
    }

    $this->data('title', $this->request->post('title'))
        ->data('details', $this->request->post('details'))
        ->data('category_id', $this->request->post('category_id'))
        ->data('status', $this->request->post('status'))
        ->where('id=?', $id)
        ->update('posts');

    // Handle tags
    $tags = array_filter((array)$this->request->post('tags_post'), 'is_numeric');
    $this->updatePostTags($id, $tags);
}

/**
 * Update post_tags table for a post
 *
 * @param int $postId
 * @param array $tags
 * @return void
 */
private function updatePostTags($postId, $tags)
{
    // First, delete existing tags for the post
    $this->where('post_id = ?', $postId)->delete('post_tags');

    // Now, insert the new tags for the post
    foreach ($tags as $tagId) {
        $this->data('post_id', $postId)
            ->data('tag_id', $tagId)
            ->insert('post_tags');
    }
}

    public function addNewComment($id, $comment, $userId)
    {
        $this->data('post_id', $id)
            ->data('comment', $comment)
            ->data('status', 'enabled')
            ->data('created', time())
            ->data('user_id', $userId)
            ->insert('comments');
    }

    private function uploadImage()
    {
        $image = $this->request->file('image');

        if (!$image->exists()) {
            return '';
        }

        return $image->moveTo($this->app->file->toPublic('images'));
    }

    private function attachTagsToPost($postId, $tagIds)
    {
        foreach ($tagIds as $tagId) {
            $this->data('post_id', $postId)
                ->data('tag_id', $tagId)
                ->insert('post_tags');
        }
    }

    // PostsModel.php

/**
 * Detach tags from the post
 *
 * @param int $postId
 * @return void
 */
public function detachTagsFromPost($postId)
{
    $this->where('post_id = ?', $postId)->delete('post_tags');
}

}
