<?php
namespace App\Controllers\Admin;

use App\Models\UsersModel;
use App\Models\CategoriesModel;
use App\Models\TagsModel;
use App\Models\PostsModel;
use System\Controller;

class DashboardController extends Controller
{
    /**
     * Display Dashboard Page
     *
     * @return mixed
     */
    public function index()
    {
        $this->html->setTitle('Dashboard | Blog');

        // Create an instance of the Database class
        $database = new \System\Database($this->app);

        // Fetch statistics
        $usersCount = $database->getUserCount();
        $categoriesCount = $database->getCategoryCount();
        $tagsCount = $database->getTagCount();
        $postsCount = $database->getPostCount();

        // Pass data to the view
        $view = $this->view->render('admin/main/dashboard', [
            'userCount' => $usersCount,
            'categoryCount' => $categoriesCount,
            'tagCount' => $tagsCount,
            'postCount' => $postsCount,
        ]);

        return $this->adminLayout->render($view);
}
}