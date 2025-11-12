<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('detail post') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xs sm:rounded-lg py-10">
                <article class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                    <a href="{{ route('post.read') }}"
                        class="font-medium text-blue-500 no-underline mb-3 inline-flex items-center">
                        <svg class="w-6 h-6" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m14 8-4 4 4 4" />
                        </svg>

                        <span class="ml-1">back to all post</span>
                    </a>
                    <header class="mb-4 lg:mb-6 not-format">
                        <address class="flex items-center mb-6 not-italic">
                            <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                                <img class="mr-4 w-16 h-16 rounded-full"
                                    src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese Leos">
                                <div>
                                    <a href="/posts?author={{ $post->author->username }}"
                                        rel="{{ $post->author->name }}"
                                        class="text-xl font-bold text-gray-900 dark:text-white">{{ $post->author->name }}</a>
                                    <div>
                                        <span
                                            class="{{ $post->category->color }} text-neutral-50 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                            {{ $post->category->name }}
                                        </span>
                                    </div>
                                    <p class="text-base text-gray-500 dark:text-gray-400">
                                        {{ $post->created_at->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                        </address>

                        <h2
                            class="mb-4 text-3xl font-extrabold leading-none text-gray-900 lg:mb-6 lg:text-3xl dark:text-white text-center">
                            {{ $post->title }}
                        </h2>
                    </header>
                    <p class="text-justify">{{ $post->body }}</p>

                </article>
            </div>
        </div>
    </div>
</x-app-layout>
