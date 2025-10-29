<x-layout :title="$title ?? 'All Post'">

    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-5 lg:px-6">

        <form class="max-w-md mx-auto mb-10">
            @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            @if (request('author'))
                <input type="hidden" name="author" value="{{ request('author') }}">
            @endif
            <label for="default-search"
                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="default-search"
                    class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search Post Title" autofocus name="search" autocomplete="off" />
                <button type="submit"
                    class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form>

        <div class="mb-7">
            {{ $posts->links() }}
        </div>

        <div class="grid gap-8 lg:grid-cols-3 md:grid-cols-2">
            @forelse ($posts as $blog)
                <article
                    class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-between items-center mb-5 text-gray-500">
                        <a href="/posts?category={{ $blog->category->slug }}">
                            <span
                                class="{{ $blog->category->color }} text-neutral-50 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                {{ $blog->category->name }}
                            </span>
                        </a>
                        <span class="text-sm">{{ $blog->created_at->diffForHumans() }}</span>
                    </div>
                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        <a href="/posts/{{ $blog['slug'] }}">{{ $blog->title }}</a>
                    </h2>
                    <p class="mb-5 font-light text-gray-500 dark:text-gray-400">{{ Str::limit($blog['body'], 150) }}</p>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-4">
                            <a href="/posts?author={{ $blog->author->username }}">
                                <span class="font-medium dark:text-white">
                                    {{ Str::words($blog->author->name, 3, ' ') }}
                                </span>
                            </a>
                        </div>
                        <a href="/posts/{{ $blog['slug'] }}"
                            class="inline-flex text-xs  items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                            Read more ...
                        </a>
                    </div>
                </article>
            @empty
                <div class="col-span-3 text-center">
                    <p class="text-gray-500 dark:text-gray-400 mb-4 text-2xl">No article found.</p>
                    <a href="/posts" class="font-medium text-blue-500 hover:underline">back to all post</a>
                </div>
            @endforelse

        </div>
    </div>



</x-layout>
