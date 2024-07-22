@extends('layouts.admin')

@section('content')
    <div class="d-flex flex-column align-items-stretch justify-content-center row-gap-5" style="min-height: 70vh">
        <h1 class="text-5xl text-light-coral font-bold text-center">Selamat Datang Admin!</h1>
        <div class="row flex-1 mt-5">
            <div class="col-md-4">
                <div class="card border-top-0 border-end-0 border-bottom-0 border-warning border-5">
                    <div class="card-body">
                        <div class="d-flex flex-column row-gap-2">
                            <span style="width: 24px">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                                </svg>
                            </span>
                            <h4 class="card-title">Pertanyaan</h4>
                            <p class="fs-1 fw-bold">{{ $questions_count }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-top-0 border-end-0 border-bottom-0 border-success border-5">
                    <div class="card-body">
                        <div class="d-flex flex-column row-gap-2">
                            <span style="width: 24px">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" />
                                </svg>
                            </span>
                            <h4 class="card-title">Jawaban</h4>
                            <p class="fs-1 fw-bold">{{ $responses_count }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-top-0 border-end-0 border-bottom-0 border-dark border-5">
                    <div class="card-body">
                        <div class="d-flex flex-column row-gap-2">
                            <span style="width: 24px">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                </svg>
                            </span>
                            <h4 class="card-title">Artikel</h4>
                            <p class="fs-1 fw-bold">{{ $articles_count }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
