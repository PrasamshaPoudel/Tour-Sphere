<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of blog posts
     */
    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->paginate(6);
        return view('pages.blog', compact('blogs'));
    }

    /**
     * Display the specified blog post
     */
    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return view('pages.single-blog', compact('blog'));
    }

    /**
     * Show the form for creating a new blog post (Admin)
     */
    public function create()
    {
        return view('admin.blog-manage');
    }

    /**
     * Store a newly created blog post (Admin)
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/blogs'), $imageName);
            $data['image'] = 'images/blogs/' . $imageName;
        }

        Blog::create($data);

        return redirect()->route('admin.blog.manage')->with('success', 'Blog post created successfully!');
    }

    /**
     * Show the form for editing a blog post (Admin)
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blog-manage', compact('blog'));
    }

    /**
     * Update the specified blog post (Admin)
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $blog = Blog::findOrFail($id);
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($blog->image && file_exists(public_path($blog->image))) {
                unlink(public_path($blog->image));
            }
            
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/blogs'), $imageName);
            $data['image'] = 'images/blogs/' . $imageName;
        }

        $blog->update($data);

        return redirect()->route('admin.blog.manage')->with('success', 'Blog post updated successfully!');
    }

    /**
     * Remove the specified blog post (Admin)
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        
        // Delete image if exists
        if ($blog->image && file_exists(public_path($blog->image))) {
            unlink(public_path($blog->image));
        }
        
        $blog->delete();

        return redirect()->route('admin.blog.manage')->with('success', 'Blog post deleted successfully!');
    }

    /**
     * Admin blog management page
     */
    public function manage()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->get();
        return view('admin.blog-manage', compact('blogs'));
    }
}



