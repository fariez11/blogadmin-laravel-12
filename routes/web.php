<?php

use App\Http\Controllers\PostDashboardController;
use App\Http\Controllers\ProfileController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

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

// Route::get('/dashboard', function () {                    ~> menggunakan closure
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// versi satu satunya
// Route::get('/dashboard', fn() => view('dashboard'))->middleware(['auth', 'verified'])->name('dashboard'); // ~> arrow function version
// Route::get('/dashboard/post', [PostDashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('post.read');
// Route::get('/dashboard/post/create', [PostDashboardController::class, 'create'])->middleware(['auth', 'verified'])->name('post.create');
// Route::get('/dashboard/post/store', [PostDashboardController::class, 'store'])->middleware(['auth', 'verified'])->name('post.store');
// Route::get('/dashboard/post/delete', [PostDashboardController::class, 'destroy'])->middleware(['auth', 'verified'])->name('post.delete');
// Route::get('/dashboard/post/{post:slug}', [PostDashboardController::class, 'show'])->middleware(['auth', 'verified'])->name('post.show');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard'); // ~> arrow function version
    Route::get('/dashboard/post', [PostDashboardController::class, 'index'])->name('post.read');
    Route::get('/dashboard/post/create', [PostDashboardController::class, 'create'])->name('post.create');
    Route::get('/dashboard/post/store', [PostDashboardController::class, 'store'])->name('post.store');
    Route::delete('/dashboard/post/{post:slug}', [PostDashboardController::class, 'destroy'])->name('post.delete');
    Route::get('/dashboard/post/{post:slug}', [PostDashboardController::class, 'edit'])->name('post.edit');
    Route::get('/dashboard/post/{post:slug}', [PostDashboardController::class, 'show'])->name('post.show');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
