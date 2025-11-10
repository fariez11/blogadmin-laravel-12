<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostDashboardController;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/posts', function () {
    $posts = Post::with(['author', 'category'])->latest()
        ->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString();
    return view('posts', ['posts' => $posts]);
});

Route::get('/posts/{posts:slug}', function (Post $posts) {
    return view('post', ['blog' => $posts]);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About Us']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Us']);
});

// Route::get('/dashboard', function () {                                   ~> menggunakan closure
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', fn()  => view('dashboard'))->middleware(['auth','verified'])->name('dashboard');               // ~> arrow function version

// Route::get('/dashboard', [PostDashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard/posts', [PostDashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('post.read');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
