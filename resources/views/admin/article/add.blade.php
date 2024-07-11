@extends('layouts.admin')

@section('page_title', 'Tambah Article')

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
            <form action="{{ route('admin.article.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="thumbnail" class="form-label">Thumbnail</label>
                    <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea name="content" id="content" rows="5" class="form-control"></textarea>
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
            })
        });
    </script>
@endpush
