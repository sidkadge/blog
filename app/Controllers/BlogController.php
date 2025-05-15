<?php

namespace App\Controllers;

use App\Models\BlogModel;

class BlogController extends BaseController
{
    public function index()
    {
        $model = new BlogModel();
        $data['blogs'] = $model
        ->where('is_active', 'Y')
        ->orderBy('created_at', 'DESC')
        ->findAll();

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
    public function login()
    {
     return view('login');
    }
      public function getdashboard()
    {
        return view('Dashboard');
    }
    public function getaddblog()
    {
        return view('addblog');
    }
    public function getbloglist()
    {
        $model = new BlogModel();
        $data['blogs'] = $model
        ->where('is_active', 'Y')
        ->orderBy('created_at', 'DESC')
        ->findAll();
//  echo '<pre>';print_r($data);die;
        return view('bloglist', $data);
    }
    public function addBlog()
    {
        $request = $this->request;
        $data = [
            'title'             => $request->getPost('title'),
            'slug'              => $request->getPost('slug'),
            'short_content'     => $request->getPost('short_content'),
            'content'           => $request->getPost('content'),
            'author'            => $request->getPost('author'),
            'category'          => $request->getPost('category'),
            'created_at'        => $request->getPost('created_at'),
            'meta_title'        => $request->getPost('meta_title'),
            'meta_keywords'     => $request->getPost('meta_keywords'),
            'meta_description'  => $request->getPost('meta_description'),
        ];
        // print_r($data);die;
        $image = $request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move(FCPATH . 'public/uploads', $newName);
            $data['image'] = $newName;
        }
        $blogModel = new \App\Models\BlogModel();
        $blogModel->save($data);
        return $this->response->setJSON(['status' => 'success']);
    }
    public function updateblog($id)
    {
        $request = $this->request;
        $data = [
            'title'             => $request->getPost('title'),
            'slug'              => $request->getPost('slug'),
            'short_content'     => $request->getPost('short_content'),
            'content'           => $request->getPost('content'),
            'author'            => $request->getPost('author'),
            'category'          => $request->getPost('category'),
            'created_at'        => $request->getPost('created_at'),
            'meta_title'        => $request->getPost('meta_title'),
            'meta_keywords'     => $request->getPost('meta_keywords'),
            'meta_description'  => $request->getPost('meta_description'),
        ];
        $image = $request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move(FCPATH . 'public/uploads', $newName);
            $data['image'] = $newName;
        }
        $blogModel = new \App\Models\BlogModel();
        $blogModel->update($id, $data);
        return $this->response->setJSON(['status' => 'success']);
    }
public function deleteblog($id)
{
    if (!$id) {
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Blog ID is missing'
        ]);
    }
    $db = \Config\Database::connect();
    $builder = $db->table('blogs');
    $data = ['is_active' => 'N'];
    $builder->where('id', $id);
    $updated = $builder->update($data);

    if ($updated) {
        return $this->response->setJSON(['status' => 'success']);
    } else {
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Update failed'
        ]);
    }
}

}
