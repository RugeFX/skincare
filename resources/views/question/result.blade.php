@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-mesh1 bg-cover">
        <div class="container py-20 px-8">
            <div class="flex justify-between items-center mb-12">
                <h1 class="text-4xl font-black">Hasil analisis kulitmu</h1>
                <div>
                    <form action="{{ route('reset') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn bg-red-400 text-white text-base max-md:text-sm rounded-full px-8 py-2">Coba
                            lagi</button>
                    </form>
                </div>
            </div>
            @if ($category)
                <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                    <div @class([
                        'card',
                        'lg:col-span-2' => $category->penyebab,
                        'lg:col-span-4' => !$category->penyebab,
                    ])>
                        <h5 class="card-title">Tipe Kulit {{ $category->name }}</h5>
                        <p>{{ $category->tipe }}</p>
                    </div>
                    @if ($category->penyebab)
                        <div class="card lg:col-span-2">
                            <h5 class="card-title">Penyebab Kulit {{ $category->name }}</h5>
                            <p>{{ $category->penyebab }}</p>
                        </div>
                    @endif
                    <div class="card">
                        <h5 class="card-title">Karakteristik</h5>
                        @foreach ($category->karakteristik as $item)
                            <p>{{ $item }}</p>
                        @endforeach
                    </div>
                    <div class="card lg:col-span-2">
                        <h5 class="card-title">Lakukan dan Jangan Lakukan</h5>
                        <p>Lakukan</p>
                        <ul>
                            @foreach ($dosDonts as $item)
                                @if ($item->group == 'dos')
                                    <li>{{ $item->todo }}</li>
                                @endif
                            @endforeach
                        </ul>
                        <p class="mt-4">Jangan Lakukan</p>
                        <ul>
                            @foreach ($dosDonts as $item)
                                @if ($item->group == 'donts')
                                    <li>{{ $item->todo }}</li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="card">
                        <h5 class="card-title">Skincare</h5>
                        <p class="mb-4">Berikut beberapa kandungan bahan skincare yang cocok untuk jenis kulit <span
                                class="lowercase">{{ $category->name }}</span></p>
                        <ul class="list-disc list-inside">
                            @foreach ($category->skincare as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @else
                <p class="font-bold px-6 py-4 bg-red-500 text-white rounded-xl">Terjadi kesalahan</p>
            @endif
        </div>
    </div>
@endsection
