<x-layout :title=" 'Single Post'">

    <main class="pt-5 pb-10 lg:pt-10 lg:pb-12 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article
                class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese Leos">
                            <div>
                                <a href="/posts?author={{ $blog->author->username }}" rel="{{ $blog->author->name }}"
                                    class="text-xl font-bold text-gray-900 dark:text-white">{{ $blog->author->name }}</a>
                                {{-- <p class="text-base text-gray-500 dark:text-gray-400">{{ $blog->category->name }}</p> --}}
                                <div>
                                    <a href="/posts?category={{ $blog->category->slug }}">
                                        <span
                                            class="{{ $blog->category->color }} text-neutral-50 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                            {{ $blog->category->name }}
                                        </span>
                                    </a>
                                </div>
                                <p class="text-base text-gray-500 dark:text-gray-400"> {{ $blog->created_at->diffForHumans() }} </p>
                            </div>
                        </div>
                    </address>

                    <h2
                        class="mb-4 text-2xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-3xl dark:text-white">
                        {{ $blog->title }}</h2>
                </header>
                <p class="text-justify">{{ $blog->body }}</p>

                <a href="/posts" class="font-medium text-blue-500 hover:underline">back to all post</a>

            </article>
        </div>
    </main>



</x-layout>
