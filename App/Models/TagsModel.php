<?php

namespace App\Models;

use System\Model;

class TagsModel extends Model
{
    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'tags';

    /**
     * Create New Tag Record
     *
     * @return void
     */
    public function create()
    {
        $this->data('name', $this->request->post('name'))
            ->data('status', $this->request->post('status'))
            ->insert($this->table);
    }

    /**
     * Update Tag Record By Id
     *
     * @param int $id
     * @return void
     */
    public function update($id)
    {
        $this->data('name', $this->request->post('name'))
            ->data('status', $this->request->post('status'))
            ->where('id=?', $id)
            ->update($this->table);
    }

    /**
     * Get enabled tags with total number of posts for each tag
     *
     * @return array
     */
    public function getEnabledTagsWithNumberOfTotalPosts()
    {
        // share the tags in the application to not call it twice in the same request

        if (!$this->app->isSharing('enabled-tags')) {
            // first, we will get the enabled tags
            // and we will add another condition that the total number of posts
            // for each tag should be more than zero
            $tags = $this->select('t.id', 't.name')
                ->select('(SELECT COUNT(pt.post_id) FROM post_tags pt WHERE pt.tag_id=t.id) AS total_posts')
                ->from('tags t')
                ->where('t.status=?', 'enabled')
                ->having('total_posts > 0')
                ->fetchAll();

            $this->app->share('enabled-tags', $tags);
        }

        return $this->app->get('enabled-tags');
    }

    /**
     * Get Tag With Posts
     *
     * @param int $id
     * @return array
     */
    public function getTagWithPosts($id)
    {
        $tag = $this->where('id=? AND status=?', $id, 'enabled')->fetch($this->table);

        if (!$tag) {
            return [];
        }

        // We will get the current page
        $currentPage = $this->pagination->page();
        // We will get the items per page
        $limit = $this->pagination->itemsPerPage();

        // Set our offset
        $offset = $limit * ($currentPage - 1);

        $tag->posts = $this->select('p.*', 'u.first_name', 'u.last_name')
            ->select('(SELECT COUNT(co.id) FROM comments co WHERE co.post_id=p.id) AS total_comments')
            ->from('posts p')
            ->join('LEFT JOIN users u ON p.user_id=u.id')
            ->join('LEFT JOIN post_tags pt ON p.id=pt.post_id')
            ->where('pt.tag_id=? AND p.status=?', $id, 'enabled')
            ->orderBy('p.id', 'DESC')
            ->limit($limit, $offset)
            ->fetchAll();

        // Get total posts for pagination
        $totalPosts = $this->select('COUNT(DISTINCT p.id) AS `total`')
            ->from('posts p')
            ->join('LEFT JOIN post_tags pt ON p.id=pt.post_id')
            ->where('pt.tag_id=? AND p.status=?', $id, 'enabled')
            ->orderBy('p.id', 'DESC')
            ->fetch();

        if ($totalPosts) {
            $this->pagination->setTotalItems($totalPosts->total);
        }

        return $tag;
    }
    // TagsModel.php

/**
 * Delete a specific post tag
 *
 * @param int $postId
 * @param int $tagId
 * @return void
 */
public function deletePostTag($postId, $tagId)
{
    $this->db->where('post_id = ? AND tag_id = ?', $postId, $tagId)->delete('post_tags');
}

}
