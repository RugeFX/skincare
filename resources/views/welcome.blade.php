@extends('layouts.app')

@section('content')
    <section class="bg-fixed bg-mesh bg-cover min-h-screen">
        <div class="container px-8">
            <div class="h-[80vh] flex flex-col items-center justify-center gap-y-32">
                <div class="flex flex-col gap-y-10">
                    <h1 class="text-5xl font-black text-red-400 text-center mb-8">MySkin</h1>
                    <h1 class="capitalize text-7xl text-light-coral text-center font-bold">Skin Test</h1>
                    <p class="text-2xl font-medium">Cari tahu tipe jenis kulitmu</p>
                </div>
                <a href="{{ route('question') }}" class="btn rounded-full bg-light-coral text-white">Mulai</a>
            </div>
            <div class="text-center py-20">
                <a href="#articles">
                    <h3 class="text-4xl font-semibold mb-4">Lihat Artikel Kami</h3>
                </a>
                <p class="text-gray-600">Jelajahi segudang pengetahuan dan tips untuk mendapatkan kulit yang sehat dan
                    bercahaya.</p>

                <div id="articles" @class([
                    'mt-12',
                    'grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 items-stretch justify-center gap-6' =>
                        count($articles) > 0,
                    'text-center' => count($articles) == 0,
                ])>
                    @forelse ($articles as $article)
                        <a href="{{ route('article', $article->id) }}" class="card text-start">
                            <img src="{{ $article->thumbnail_link }}" alt="thumbnail" class="w-full h-32 object-cover">
                            <h5 class="card-title mt-4">{{ $article->title }}</h5>
                            <p>{!! $article->content_text_limit !!}</p>
                        </a>
                    @empty
                        <p class="font-black text-2xl">Comming soon</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
@endsection
