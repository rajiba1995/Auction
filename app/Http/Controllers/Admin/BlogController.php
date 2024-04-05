<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\BlogContract;

class BlogController extends Controller
{
    protected $blogRepository;

    public function __construct(BlogContract $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

     // Blog
     public function BlogIndex()
     {
         $data = $this->blogRepository->getAllBlogs();
         return view('admin.blog.index', compact('data'));
     }
     public function BlogCreate()
     {
         return view('admin.blog.create');
     }
     public function BlogStore(Request $request)
     {
        //  dd($request->all());    
         $request->validate([
             'image' => 'required|mimes:jpeg,jepg,gif,webp,png',
             'title'=>'required|max:255',
             'short_description'=>'required',
             'long_description'=>'required',
             'page_title'=>'required|max:255',
             'meta_title'=>'required|max:255',
             'meta_description'=>'required',
             'meta_keyword'=>'required',
         ]);
         $params = $request->except('_token');
         $data = $this->blogRepository->CreateBlog($params);
         if ($data) {
             return redirect()->route('admin.blog.index')->with('success', 'Data has been successfully stored!');
         } else {
             return redirect()->route('admin.blog.create')->with('error', 'Something went wrong please try again!');
         }
     }
     public function BlogStatus($id)
     {
         $data = $this->blogRepository->StatusBlog($id);
         return redirect()->back();
     }
     public function BlogEdit($id)
     {
         $data = $this->blogRepository->GetBlogById($id);
         return view('admin.blog.edit', compact('data'));
     }
     public function BlogUpdate(Request $request)
     {
         // dd($request->all());
         $request->validate([
            'image' => 'mimes:jpeg,jepg,gif,webp,png',
            'title'=>'required|max:255',
            'short_description'=>'required',
            'long_description'=>'required',
            'page_title'=>'required|max:255',
            'meta_title'=>'required|max:255',
            'meta_description'=>'required',
            'meta_keyword'=>'required',
 
         ]);
         $params = $request->except('_token');
         $data = $this->blogRepository->updateBlog($params);
         if ($data) {
             return redirect()->route('admin.blog.index', $request->id)->with('success', 'Data has been successfully updated!');
         } else {
             return redirect()->route('admin.blog.edit', $request->id)->with('error', 'Something went wrong please try again!');
         }
     }
     public function BlogDelete($id)
     {
         $data = $this->blogRepository->DeleteBlog($id);
         if ($data) {
             return redirect()->route('admin.blog.index')->with('success', 'Deleted Successfully!');
         } else {
             return redirect()->route('admin.blog.index')->with('error', 'Something went wrong please try again!');
         }
     }
}
