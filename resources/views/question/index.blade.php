@extends('layouts.app')

@section('content')
    <form action="{{ route('question.next') }}" method="post">
        @csrf
        <div class="min-h-screen bg-linen">
            <div class="bg-white py-4 pt-8">
                <div class="container flex justify-center">
                    <h1 class="text-4xl font-black text-light-coral text-center">{{ config('app.name') }}</h1>
                </div>
            </div>
            <x-progress step="{{ $step }}" />
            <div class="container px-8 py-12">

                @switch($step)
                    @case(1)
                        @include('question.profile.name')
                    @break

                    @case(2)
                        @include('question.profile.age')
                    @break

                    @case(3)
                        @include('question.profile.gender')
                    @break

                    @case(session('totalStep'))
                        <div class="flex flex-col items-center justify-center gap-y-32">
                            <div class="flex flex-col items-center gap-y-10">
                                <img src="{{ asset('assets/face-mask.png') }}" alt="icon" class="aspect-square w-32">
                                <h1 class="capitalize text-7xl text-center font-bold">Selesai!</h1>
                                <p class="text-xl font-medium text-gray-600">Sebentar ya, kami sedang menganalisa
                                    kriteria kulit kamu</p>
                            </div>
                        </div>
                    @break

                    @default
                        @if ($question)
                            <x-question :question="$question" />
                        @endif
                @endswitch

            </div>
            <nav class="mt-auto py-12">
                <div class="container px-8 flex justify-center gap-4">
                    @if ($step > 1)
                        <button type="button" id="prevButton"
                            class="bg-red-400 text-white text-xl max-md:text-base font-semibold px-14 max-md:px-8 py-4 rounded-xl flex gap-2 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="size-6 max-md:size-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 16.811c0 .864-.933 1.406-1.683.977l-7.108-4.061a1.125 1.125 0 0 1 0-1.954l7.108-4.061A1.125 1.125 0 0 1 21 8.689v8.122ZM11.25 16.811c0 .864-.933 1.406-1.683.977l-7.108-4.061a1.125 1.125 0 0 1 0-1.954l7.108-4.061a1.125 1.125 0 0 1 1.683.977v8.122Z" />
                            </svg>

                            <span>
                                Kembali
                            </span>
                        </button>
                    @endif

                    @if ($step == session('totalStep'))
                        <button type="submit"
                            class="bg-red-400 text-white text-xl max-md:text-base font-semibold px-14 max-md:px-8 py-4 rounded-xl flex gap-2 items-center">
                            Lihat hasil
                        </button>
                    @else
                        <button type="submit"
                            class="bg-red-400 text-white text-xl max-md:text-base font-semibold px-14 max-md:px-8 py-4 rounded-xl flex gap-2 items-center">
                            <span>
                                Lanjut
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061A1.125 1.125 0 0 1 3 16.811V8.69ZM12.75 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061a1.125 1.125 0 0 1-1.683-.977V8.69Z" />
                            </svg>
                        </button>
                    @endif
                </div>
                @if (session('name'))
                    <div class="flex justify-center ">
                        <button type="button" class="text-light-coral text-base mt-8" id="resetButton">Isi ulang</button>
                    </div>
                @endif
            </nav>
        </div>
    </form>
    <form action="{{ route('question.prev') }}" method="POST" id="backForm">
        @csrf
    </form>
    <form action="{{ route('reset') }}" method="POST" id="resetForm">
        @csrf
        @method('DELETE')
    </form>
@endsection

@push('page-script')
    <script>
        $(document).ready(() => {
            // Back Button
            $('#prevButton').click(() => $('#backForm').submit())
            // Reset Button
            $('#resetButton').click(() => $('#resetForm').submit())

            // Name input
            $('#name').on('input', function() {
                let text = $(this).val();
                text = text.replace(/\d+/g, '');
                $(this).val(text);
            })

            // Age input
            $('#age').on('input', function() {
                const max = parseInt($(this).attr('max'));
                const min = parseInt($(this).attr('min'));
                let value = parseInt($(this).val());

                value > max && $(this).val(max)
                value < min && $(this).val(min)
            });
        })
    </script>
@endpush
