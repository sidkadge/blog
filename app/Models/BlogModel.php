<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table = 'blogs';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'title', 'slug', 'image', 'short_content', 'content',
        'author', 'category', 'created_at', 'meta_title',
        'meta_keywords', 'meta_description'
    ];

}

