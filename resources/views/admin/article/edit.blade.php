@extends('layouts.admin')

@section('page_title', 'Ubah Artikel')

@push('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@push('page-style')
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Form data</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.article.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    @if ($article->thumbnail)
                        <div style="max-width: 300px">
                            <img src="{{ $article->thumbnail_link }}" alt="Thumbnail {{ $article->title }}"
                                class="img-fluid">
                        </div>
                    @endif
                    <label for="thumbnail" class="form-label">Ganti Thumbnail</label>
                    <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $article->title }}">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Konten</label>
                    <textarea name="content" id="content" rows="5" class="form-control">{{ $article->content }}</textarea>
                </div>
                <div class="d-flex justify-content-end mt-5">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>


@endsection

@push('page-script')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            // Set the CSRF token in the AJAX headers
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#content').summernote({
                tabsize: 2,
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'striketrough', 'clear']],
                    ['fontname', ['fontname', 'fontsize']],
                    ['color', ['forecolor', 'backcolor']],
                    ['para', ['ul', 'ol', 'paragraph', 'hr']],
                    ['insert', ['link', 'picture', ]],
                    ['view', ['fullscreen', 'help']],
                ],
                callbacks: {
                    onMediaDelete: function(target) {
                        let imgSrc = target[0].src

                        $.ajax({
                            url: '/admin/article/media', // Your image deletion URL
                            method: 'POST',
                            data: {
                                path: imgSrc
                            },
                        })
                    }
                }
            })
        });
    </script>
@endpush
