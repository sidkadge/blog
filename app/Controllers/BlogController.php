<?php

namespace App\Controllers;

class BlogController extends BaseController
{
    public function getdashboard()
    {
        return view('Dashboard');
    }
    public function getaddblog()
    {
        return view('addblog');
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


}
