<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Post
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <div class=" p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                {{-- @if ($errors->any())
                    <div id="alert-additional-content-1"
                        class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-200 border border-brand-subtle"
                        role="alert">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 shrink-0 me-2" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <span class="sr-only">Info</span>
                                <span class="font-medium">Ensure that these requirements are met:</span>
                            </div>
                            <button type="button" data-dismiss-target="#alert-additional-content-1"
                                aria-label="Close"
                                class="ms-auto -mx-1.5 -my-1.5 rounded focus:ring-2 focus:ring-brand-medium hover:bg-brand-soft inline-flex items-center justify-center h-8 w-8">
                                <span class="sr-only">Close</span>
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                                </svg>
                            </button>
                        </div>
                        <ul class="ml-6 mt-2 list-disc list-inside space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
                <form action="{{ route('post.store') }}">
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label for="title"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                            <input type="text" name="title" id="title"
                                class="capitalize border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('title') border-red-600 bg-red-100 placeholder:text-red-500 focus:ring-red-600 focus:border-red-600 @enderror"
                                placeholder="Type product title" value="{{ old('title') }}" autofocus>
                            @error('title')
                                <span class="text-red-500 text-sm lowercase">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- oninput="slug.value = this.value.toLowerCase().replace(/[^a-z0-9]+/g,'-').replace(/^-|-$/g,'')" attr element untuk membuat slug otomatis dan langsung ditampilkan --}}

                        {{-- <div>
                            <label for="slug"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
                            <input type="text" name="slug" id="slug"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                readonly>
                        </div> --}}
                        {{-- <div>
                            <label for="author"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Author</label>
                            <input type="text"id="author" value="{{ Auth::user()->name }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                readonly>
                        </div> --}}
                        <div>
                            <label for="category"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                            <select id="category" name="category_id"
                                class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('category_id') border-red-600 bg-red-100 placeholder:text-red-500 focus:ring-red-600 focus:border-red-600 @enderror">
                                <option selected="" value="">Select category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                                        {{ $category->name }}</option>
                                @endforeach

                            </select>
                            @error('category_id')
                                <span class="text-red-500 text-sm lowercase">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="sm:col-span-2"><label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body</label>
                            <textarea id="body" rows="4" name="body"
                                class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('body') border-red-600 bg-red-100 placeholder:text-red-500 focus:ring-red-600 focus:border-red-600 @enderror"
                                placeholder="Write post body here">{{ old('body') }}</textarea>
                            @error('body')
                                <span class="text-red-500 text-sm lowercase">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-end gap-3 mt-4">
                        <a href="{{ route('post.read') }}"
                            class="flex items-center bg-red-700 hover:bg-red-800 text-white font-medium rounded-lg text-sm px-5 py-2.5">
                            <svg class="w-5 h-5 text-white me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm7.707-3.707a1 1 0 0 0-1.414 1.414L10.586 12l-2.293 2.293a1 1 0 1 0 1.414 1.414L12 13.414l2.293 2.293a1 1 0 0 0 1.414-1.414L13.414 12l2.293-2.293a1 1 0 0 0-1.414-1.414L12 10.586 9.707 8.293Z"
                                    clip-rule="evenodd" />
                            </svg>
                            cancel
                        </a>

                        <button type="submit"
                            class="flex items-center bg-primary-700 hover:bg-primary-800 text-white font-medium rounded-lg text-sm px-5 py-2.5">
                            <svg class="w-5 h-5 text-white me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z"
                                    clip-rule="evenodd" />
                            </svg>
                            add new post
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>

</x-app-layout>
