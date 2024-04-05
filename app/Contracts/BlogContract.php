<?php

namespace App\Contracts;

interface BlogContract{
    //Blog
    public function getAllBlogs();
    public function CreateBlog(array $data);
    public function StatusBlog($id);
    public function GetBlogById($id);
    public function DeleteBlog($id);
    public function updateBlog(array $data);

} 
?>