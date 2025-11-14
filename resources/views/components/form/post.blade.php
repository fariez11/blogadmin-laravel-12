@props([
    'post' => null,
    'action',
    'method' => 'POST',
    'categories' => [],
])


<div class="py-12">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

        <div class=" p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                @if ($method !== 'POST')
                    @method($method)
                @endif

                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div>
                        <label for="title"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                        <input type="text" name="title" id="title"
                            class="capitalize border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('title') border-red-600 bg-red-100 placeholder:text-red-500 focus:ring-red-600 focus:border-red-600 @enderror"
                            placeholder="Type product title" value="{{ old('title') ?? $post?->title }}" autofocus>
                        @error('title')
                            <span class="text-red-500 text-sm lowercase">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="category"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <select id="category" name="category_id"
                            class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('category_id') border-red-600 bg-red-100 placeholder:text-red-500 focus:ring-red-600 focus:border-red-600 @enderror">
                            <option selected="" value="">Select category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected((old('category_id') ?? $post?-> category->id ) == $category->id)>
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
                            placeholder="Write post body here">{{ old('body') ?? $post?->body }}</textarea>
                        @error('body')
                            <span class="text-red-500 text-sm lowercase">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-end gap-3 mt-5">

                    <x-ui.button variant="danger" href="{{ route('post.read') }}">
                        <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm7.707-3.707a1 1 0 0 0-1.414 1.414L10.586 12l-2.293 2.293a1 1 0 1 0 1.414 1.414L12 13.414l2.293 2.293a1 1 0 0 0 1.414-1.414L13.414 12l2.293-2.293a1 1 0 0 0-1.414-1.414L12 10.586 9.707 8.293Z"
                                clip-rule="evenodd" />
                        </svg>
                        Cancel
                    </x-ui.button>

                    <x-ui.button variant="primary" type="submit">
                        <svg class="w-5 h-5 text-white dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z"
                                clip-rule="evenodd" />
                        </svg>

                        {{ $method === 'POST' ? 'Save Post' : 'Update Post' }}
                    </x-ui.button>
                </div>
            </form>

        </div>
    </div>
</div>
