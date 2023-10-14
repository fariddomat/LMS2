<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderByDesc('created_at')->paginate(40);
        return view('dashboard.posts.index', compact('posts'));
    }


    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('dashboard.posts.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts',

            'description' => 'required',
            'introduction' => 'required',
            'content_table' => 'required',
            'first_paragraph' => 'required',
            'image' => 'nullable', 'image', 'mimes:jpeg,png,jpg,webp',
            'author_name' => 'required',
            'author_title' => 'required',
            'author_image' => 'nullable', 'image', 'mimes:jpeg,png,jpg,webp',
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,webp'],
            'category_id' => 'required',
            'tags.*' => 'exists:tags,id',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->description = $request->description;
        $post->introduction = $request->introduction;
        $post->content_table = $request->content_table;
        $post->first_paragraph = $request->first_paragraph;
        $post->author_name = $request->author_name;
        $post->author_title = $request->author_title;
        $post->published = $request->has('published') ? true : false;
        $post->category_id = $request->category_id;
        $image = $request->file('image');
        $filename = $image->getClientOriginalName();
        $post->image = $image->storeAs('photos/blogs', $filename, ['disk' => 'public']);
        $post->save();

        $post->tags()->attach($request->tags);

        return redirect()->route('dashboard.posts.index')->with('success', 'Post created successfully.');
    }

    public function edit(Post $post)
    {

        $categories = Category::all();
        $tags = Tag::all();

        return view('dashboard.posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|unique:posts,title,' . $post->id,

            'description' => 'required',
            'introduction' => 'required',
            'content_table' => 'required',
            'first_paragraph' => 'required',
            'image' => 'nullable', 'image', 'mimes:jpeg,png,jpg,webp',
            'author_name' => 'required',
            'author_title' => 'required',
            'author_image' => 'nullable', 'image', 'mimes:jpeg,png,jpg,webp',
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp'],
            'category_id' => 'required',
        ]);

        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->description = $request->description;
        $post->introduction = $request->introduction;
        $post->content_table = $request->content_table;
        $post->first_paragraph = $request->first_paragraph;
        $post->author_name = $request->author_name;
        $post->author_title = $request->author_title;
        if ($request->has('image')) {
            Storage::disk('public')->delete($post->image);
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $post->image = $image->storeAs('photos/blogs', $filename, ['disk' => 'public']);
        }
        if ($request->has('published')) {
            if ( $post->published == false) {
                $post->published = true;
                $mytime = Carbon::now();
                $post->published_at = $mytime->toDateTimeString();
            }

        } else {

            $post->published = false;
            $post->published_at = null;
        }

        $post->category_id = $request->category_id;
        $post->save();

        $post->tags()->sync($request->tags);

        return redirect()->route('dashboard.posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $post->tags()->detach();
        $post->delete();

        return redirect()->route('dashboard.posts.index')->with('success', 'Post deleted successfully.');
    }
}
