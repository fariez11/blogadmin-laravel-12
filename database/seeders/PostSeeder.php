<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // $post = Post::all();                                                            ~> mengambil semua data post
        // $post->find(2);                                                                 ~> mencari data post dengan id 2
        // $post->where('title', 'like', '%artikel%')->get();                              ~> mencari data post dengan title mengandung kata 'artikel'
        // $post->pluck('title');                                                          ~> mengambil semua title dari data post
        // $post->count();                                                                 ~> menghitung jumlah data post
        // $post->first();                                                                 ~> mengambil data post pertama
        // $post->last();                                                                  ~> mengambil data post terakhir
        // $post->skip(5)->take(10)->get();                                                ~> melewati 5 data post pertama, lalu mengambil 10 data post berikutnya
        // $post->orderBy('created_at', 'desc')->get();                                    ~> mengurutkan data post berdasarkan created_at secara descending
        // $post->groupBy('category_id');                                                  ~> mengelompokkan data post berdasarkan category_id
        // $post->distinct()->get();                                                       ~> mengambil data post dengan nilai unik
        // $post->whereIn('id', [1, 2, 3])->get();                                         ~> mencari data post dengan id 1, 2, atau 3
        // $post->whereNull('deleted_at')->get();                                          ~> mencari data post yang belum dihapus (deleted_at bernilai null)
        // $post->whereBetween('created_at', ['2023-01-01', '2023-12-31'])->get();         ~> mencari data post yang dibuat antara 1 Januari 2023 hingga 31 Desember 2023
        // $post->find(2)->delete();                                                       ~> menghapus data post dengan id 2
        // $post->update(['title' => 'Judul Baru']);                                       ~> mengupdate title dari data post



        // $user = App\Models\User::first();                                               ~> mengambil user pertama
        // $user->posts->count();                                                          ~> menghitung jumlah post milik user pertama

        // $post = App\Models\Post::first();                                               ~> mengambil post pertama
        // $post->author;                                                                  ~> mengambil author dari post pertama

        // contoh penggunaan recycle untuk relasi many to one (digunakan di seeder / tinker)
        // App\Models\Post::factory(50)->recycle(User::factory(5)->create())->create();

        // jika ingin menambahkan 2 recycle sekaligus
        // Post::factory(30)->recycle([Category::factory(3)->create(),User::factory(5)->create()])->create();           ~> jika menggunakan factory
        Post::factory(30)->recycle([Category::all(), User::factory(5)->create()])->create();                             // jika menggunakan seeder
    }
}
