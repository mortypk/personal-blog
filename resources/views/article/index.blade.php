@extends('layouts.main')
@section('contents')
    <section class="body-font overflow-hidden text-gray-600">
        <div class="container mx-auto px-5 py-24">
            <div class="-m-12 flex flex-wrap">
                {{-- Article --}}
                @foreach ($articles as $article)
                <div class="flex flex-col items-start p-12 md:w-1/2 hover:shadow hover:border border-gray-50">
                    <span class="inline-block rounded bg-indigo-50 py-1 px-2 text-xs font-medium tracking-widest text-indigo-500">
                        {{ $article->category->name }}
                    </span>
                    <h2 class="title-font mt-4 mb-4 text-2xl font-medium text-gray-900 sm:text-3xl">
                        {{ $article->title }}
                    </h2>
                    <p class="mb-8 leading-relaxed">
                        @if ($article->getFirstMediaUrl())
                        <img class="w-24 h-24" src="{{ $article->getFirstMediaUrl()}}" />
                        @endif
                        {{ substr($article->full_text, 0, 200)." ..." }}
                    </p>
                    <div class="mb-1 mt-auto flex w-full flex-wrap items-center border-b-2 border-gray-100 pb-4">
                        <a href="{{ route('article.show', $article->id) }}" class="inline-flex items-center text-indigo-500">Learn More
                            <svg class="ml-2 h-4 w-4" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                                <path d="M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                        <span class="mr-3 ml-auto inline-flex items-center py-1 pr-3 text-sm leading-none text-gray-400">
                            <svg class="mr-1 h-4 w-4" stroke="currentColor" stroke-width="2" fill="none"
                                stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                            1.2K
                        </span>
                    </div>
                    <div>
                        @foreach ($article->tags as $tag)
                        <span class="inline-block mr-1 rounded bg-gray-50 py-1 px-2 text-xs font-medium tracking-widest text-gray-600">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                </div>
                @endforeach
                {{--  --}}
            </div>
            {{--  --}}
        </div>
    </section>
@endsection
