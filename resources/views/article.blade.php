@extends('layouts.app')

@section('content')
    <img src="{{ $article->thumbnail_link }}" alt="thumbnail {{ $article->title }}"
        class="h-[50vh] max-md:h-[40vh] w-full object-cover brightness-50">

    <div class="container px-8 py-20">
        <h1 class="text-2xl md:text-4xl font-semibold capitalize text-light-coral text-center mb-12">{{ $article->title }}
        </h1>
        <article>
            {!! $article->content !!}
        </article>
    </div>
@endsection
