<?php

namespace App\Controllers;

use App\Models\BlogModel;

class Blog extends BaseController
{
    public function index()
    {
        $model = new BlogModel();
        $data['blogs'] = $model->orderBy('created_at', 'DESC')->findAll();
        return view('blog/index', $data);
    }

    public function view($slug)
    {
        $model = new BlogModel();
        $blog = $model->where('slug', $slug)->first();

        if (!$blog) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Blog not found');
        }

        $data['blog'] = $blog;
        $data['other_blogs'] = $model->where('slug !=', $slug)->findAll();

        return view('blog/view', $data);
    }

    public function ajaxView($slug)
    {
        $model = new BlogModel();
        $blog = $model->where('slug', $slug)->first();

        if (!$blog) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Blog not found');
        }

        $data['blog'] = $blog;
        $data['other_blogs'] = $model->where('slug !=', $slug)->findAll();

        return view('blog/ajax_view', $data);
    }


    public function login()
    {
        return view('login');
    }
}
