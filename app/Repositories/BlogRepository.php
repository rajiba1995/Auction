<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Contracts\BlogContract;
use App\Helper\helper;
use App\Models\Collection;
use App\Models\Category;
use App\Models\Tutorial;
use App\Models\Client;
use App\Models\Feedback;
use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;





class BlogRepository implements BlogContract
{
    //Blog
    public function getAllBlogs()
    {
        return Blog::latest()->where('deleted_at', 1)->paginate(20);
    }
    public function CreateBlog(array $data)
    {

        try {
            $blog = new Blog();
            $collection = collect($data);
            $blog->title = $collection['title'];
            $blog->slug = slugGenerate($collection['title'],'blogs');
            $blog->short_desc = $collection['short_description'];
            $blog->long_desc = $collection['long_description'];
            $blog->page_title = $collection['page_title'];
            $blog->meta_title = $collection['meta_title'];
            $blog->meta_desc = $collection['meta_description'];
            $blog->meta_keyword = $collection['meta_keyword'];
            if (isset($data['image']) && $data['image']->isValid()) {
                $file = $collection['image'];
                $imageName = time() . "." . $file->getClientOriginalExtension();
                $file->move("uploads/blog", $imageName);
                $uploadedImage = $imageName;
                $blog->image = 'uploads/blog/' . $uploadedImage;
            }

            $blog->save();
            return $blog;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }
    public function StatusBlog($id)
    {
        $blog = Blog::findOrFail($id);
        $status = $blog->status == 1 ? 0 : 1;
        $blog->status = $status;
        $blog->save();
        return $blog;
    }
    public function GetBlogById($id)
    {
        return Blog::findOrFail($id);
    }
    public function updateBlog(array $data)
    {

        try {
            $collection = collect($data);
            $blog = Blog::findOrFail($collection['id']);
            $blog->title = $collection['title'];
            $blog->slug = slugGenerateUpdate($collection['title'],'blogs',$collection['id']);
            $blog->short_desc = $collection['short_description'];
            $blog->long_desc = $collection['long_description'];
            $blog->page_title = $collection['page_title'];
            $blog->meta_title = $collection['meta_title'];
            $blog->meta_desc = $collection['meta_description'];
            $blog->meta_keyword = $collection['meta_keyword'];
            if (isset($data['image']) && $data['image']->isValid()) {
                $file = $collection['image'];
                $imageName = time() . "." . $file->getClientOriginalExtension();
                $file->move("uploads/blog", $imageName);
                $uploadedImage = $imageName;
                $blog->image = 'uploads/blog/' . $uploadedImage;
            } else {
                $blog->image = $collection['old_blog_img'];
            }
            $blog->save();
            return $blog;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }
    public function DeleteBlog($id)
    {
        $delete = Blog::findOrFail($id);
        $delete->deleted_at = 0;
        $delete->save();
        if ($delete->deleted_at == 0) {
            $image_path = $delete->image;
            if (File::exists($image_path)) {
                unlink($image_path);
            }
        }
        return $delete;
    }
}
