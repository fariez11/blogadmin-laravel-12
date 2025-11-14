<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Post
        </h2>
    </x-slot>

    <x-form.post :post="$post" :action="route('post.update', $post)" method="PATCH" :categories="$categories" />

</x-app-layout>
