<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Edit Article
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('article.update', $article->id) }}" method="POST" >
                        @csrf
                        @method('PUT')
                        <div class="mb-2">
                            <label for="title" class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-300">Title</label>
                            <input type="text" name="title" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500" 
                    value="{{ $article->title }}" placeholder="Enter Title" required="">
                        </div>
                        <div class="mb-2">
                            <label for="full_text" class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-300">Full Text</label>
                            <textarea class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500" name="full_text" cols="30" rows="10">{{ $article->full_text }}</textarea>
                        </div>
                        <div class="mb-2">
                            @if ($article->getFirstMediaUrl())
                                <img class="w-24 h-24" src="{{ $article->getFirstMediaUrl()}}" />
                            @endif
                            <label for="image_url" class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-300">
                                image_url
                                @error('image_url')<span class="text-xs text-red-600">*{{ $message }}</span>@enderror
                            </label>
                            <input type="file" id="image_url" name="image_url" 
                            class="block rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            >
                        </div>
                        <div class="mb-2">
                            <label for="publish" class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-300">Publish</label>
                            <input type="checkbox" id="publish" name="publish" {{ $article->publish == true ? "checked" : "" }} 
                            class="block rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm ">
                        </div>
                        
                        <div class="mb-2">
                            <label for="tags" class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-300">Tags</label>
                            <select name="tags[]" multiple="" id="tags" 
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                                @foreach (\App\Models\Tag::all() as $tag)
                                    @if($article->tags->contains('id' ,$tag->id))
                                        <option selected="" value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @else
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endif    
                                @endforeach
                                </select>
                            </div>
                        <div class="mb-2">
                            <label for="category_id" class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-300">Category</label>
                            <select name="category_id" id="category_id" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                                <option value="{{ $article->category_id }}">{{ $article->category->name }}</option>
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
