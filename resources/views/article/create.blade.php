<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            New Article
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <label for="title" class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-300">
                                Title 
                                @error('title')<span class="text-xs text-red-600">*{{ $message }}</span>@enderror
                            </label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                placeholder="Enter Title" required="">
                        </div>
                        <div class="mb-2">
                            <label for="full_text" class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-300">
                                Full Text
                                @error('full_text')<span class="text-xs text-red-600">*{{ $message }}</span>@enderror
                            </label>
                            <textarea name="full_text" id="full_text" cols="30" rows="10"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500" >
                            {{ old('full_text') }}
                            </textarea>
                        </div>
                        <div class="mb-2">
                            <label for="image_url" class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-300">
                                image_url
                                @error('image_url')<span class="text-xs text-red-600">*{{ $message }}</span>@enderror
                            </label>
                            <input type="file" id="image_url" name="image_url" 
                            class="block rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            >
                        </div>
                        <div class="mb-2">
                            <label for="publish" class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-300">
                                Publish
                                @error('publish')<span class="text-xs text-red-600">*{{ $message }}</span>@enderror
                            </label>
                            <input type="checkbox" id="publish" name="publish" 
                            class="block rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            >
                        </div>
                        <div class="mb-2">
                        <label for="tags" class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-300">Tags</label>
                        <select name="tags[]" multiple="" id="tags" 
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                            @foreach (\App\Models\Tag::all() as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="category_id" class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-300">
                                Category
                                @error('category_id')<span class="text-xs text-red-600">*{{ $message }}</span>@enderror
                            </label>
                            <select name="category_id" id="category_id" 
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                            @foreach (\App\Models\Category::all() as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                            </select>
                        </div>
                        <button type="submit"
                            class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
