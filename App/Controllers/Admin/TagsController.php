<?php

namespace App\Controllers\Admin;

use System\Controller;

class TagsController extends Controller
{
    /**
     * Display Tags List
     *
     * @return mixed
     */
    public function index()
    {
        $this->html->setTitle('Tags');

        $data['tags'] = $this->load->model('Tags')->all();

        $data['success'] = $this->session->has('success') ? $this->session->pull('success') : null;

        $view = $this->view->render('admin/tags/list', $data);

        return $this->adminLayout->render($view);
    }

    /**
     * Open Tags Form
     *
     * @return string
     */
    public function add()
    {
        return $this->form();
    }

    /**
     * Submit for creating new tag
     *
     * @return string | json
     */
    public function submit()
    {
        $json = [];

        if ($this->isValid()) {
            // it means there are no errors in form validation
            $this->load->model('Tags')->create();

            $json['success'] = 'Tag Has Been Created Successfully';

            $json['redirectTo'] = $this->url->link('/admin/tags');
        } else {
            // it means there are errors in form validation
            $json['errors'] = $this->validator->flattenMessages();
        }

        return $this->json($json);
    }

    /**
     * Display Edit Form
     *
     * @param int $id
     * @return string
     */
    public function edit($id)
    {
        $tagsModel = $this->load->model('Tags');

        if (!$tagsModel->exists($id)) {
            return $this->url->redirectTo('/404');
        }

        $tag = $tagsModel->get($id);

        return $this->form($tag);
    }

    /**
     * Display Form
     *
     * @param \stdClass $tag
     */
    private function form($tag = null)
    {
        if ($tag) {
            // editing form
            $data['target'] = 'edit-tag-' . $tag->id;

            $data['action'] = $this->url->link('/admin/tags/save/' . $tag->id);

            $data['heading'] = 'Edit ' . $tag->name;
        } else {
            // adding form
            $data['target'] = 'add-tag-form';

            $data['action'] = $this->url->link('/admin/tags/submit');

            $data['heading'] = 'Add New Tag';
        }

        $data['name'] = $tag ? $tag->name : null;
        $data['status'] = $tag ? $tag->status : 'enabled';

        return $this->view->render('admin/tags/form', $data);
    }

    /**
     * Submit for updating tag
     *
     * @return string | json
     */
    public function save($id)
    {
        $json = [];

        if ($this->isValid()) {
            // it means there are no errors in form validation
            $this->load->model('Tags')->update($id);

            $json['success'] = 'Tag Has Been Updated Successfully';

            $json['redirectTo'] = $this->url->link('/admin/tags');
        } else {
            // it means there are errors in form validation
            $json['errors'] = $this->validator->flattenMessages();
        }

        return $this->json($json);
    }

    /**
     * Delete Record
     *
     * @param int $id
     * @return mixed
     */
    public function delete($id)
    {
        $tagsModel = $this->load->model('Tags');

        if (!$tagsModel->exists($id)) {
            return $this->url->redirectTo('/404');
        }

        $tagsModel->delete($id);

        $json['success'] = 'Tag Has Been Deleted Successfully';

        return $this->json($json);
    }

    /**
     * Validate the form
     *
     * @return bool
     */
    private function isValid()
    {
        $this->validator->required('name', 'Tag Name is Required');

        return $this->validator->passes();
    }
}
