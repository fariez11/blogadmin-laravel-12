<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::latest();

        if (! Auth::user()->is_admin) {
            $post->where('author_id', Auth::user()->id);
        }

        if (request('search')) {
            $post->where('title', 'like', '%' . request('search') . '%');
        }

        return view('pages.post.index', ['posts' => $post->paginate(6)->withQueryString()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::get();

        return view('pages.post.create', ['categories' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title'       => 'required|unique:posts|min:10|max:100',
            'category_id' => 'required',
            'body'        => 'required',
        ]);

        // Validator::make($request->all(), [
        //     'title'       => 'required|unique:posts|min:10|max:100',
        //     'category_id' => 'required',
        //     'body'        => 'required',

        // ],[
        //     'required' => 'field :attribute ini harus diisi',
        //     'category_id.required' => 'pilih salah satu dari :attribute ini',
        //     'body.require' => 'field body ini tidak boleh kosong'
        // ],[
        //     'title' => 'judul',
        //     'category_id' => 'kategori',
        //     'body' => 'isi blog '
        // ])->validate();

        Post::create([
            'title'       => Str::title($request->title),
            'slug'        => Str::slug($request->title),
            'author_id'   => Auth::user()->id,
            'category_id' => $request->category_id,
            'body'        => $request->body,
        ]);

        return redirect(route('post.read'))->with(['success' => 'your post has been saved']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('pages.post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect(route('post.read'))->with(['success' => 'your post has been removed']);
    }
}
