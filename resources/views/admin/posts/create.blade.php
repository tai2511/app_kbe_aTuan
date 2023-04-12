@extends('admin.admin')
@section('css_file')
    @parent
    <link rel="stylesheet" href="{{  asset("assets/css/admin/quill.css") }}">
@endsection
@section('content_admin')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @php
        $countries = config('app.countries');
    @endphp
    <h3 class="mb-5 h3">Add Post</h3>
    <form class="form-post" action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
        <div class="form-group mb-5">
            <label>Post name:</label>
            <input class="form-control" name="post_name" value="{{ old('post_name') }}">
        </div>
        <div class="form-group mb-5">
            <label>Image:</label>
            <div class="upload_container" onclick="document.getElementById('upload_file').click();">
                <input data-action="{{ route('upload.file') }}" type="file" id="upload_file" name="file" style="display: none;" data-value="" accept="image/*">
                <input type="hidden" name="photo" id="file_name" value="{{ old('photo') }}">
                <span class="icon-upload"></span>
            </div>
        </div>
        <div class="form-group mb-5">
            <label>Layout</label>
            <select class="form-control" name="layout">
                <option {{ old('layout') == 'vertical-1' ? 'selected' : '' }} value="vertical-1">Vertical (text right)</option>
                <option {{ old('layout') == 'vertical-2' ? 'selected' : '' }} value="vertical-2">Vertical (text left)</option>
                <option {{ old('layout') == 'horizontal' ? 'selected' : '' }} value="horizontal">Horizontal</option>
            </select>
        </div>
        {{ csrf_field() }}
        <ul class="nav nav-tabs" role="tablist">
            @foreach($countries as $k => $country)
                <li class="nav-item">
                    <a class="nav-link {{ $k == 1 ? 'active' : '' }}" href="#{{ $country }}" role="tab" data-toggle="tab" style="text-transform: capitalize;">{{ $country }}</a>
                </li>
            @endforeach
        </ul>
        <div class="tab-content content-post p-4 mb-4">
            @foreach($countries as $k => $country)
                <div role="tabpanel" class="tab-pane fade {{ $k == 1 ? 'active show' : '' }}" id="{{ $country }}">
                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control title" name="{{ $country }}_title" value="{{ old($country. '_title') }}">
                    </div>
                    <div class="form-group country mb-5">
                        <label style="text-transform: capitalize;">{{ $country }}</label>
                        <div class="form-control editor {{ $country }}" id="{{ 'editor'.$k }}"></div>
                        <input type="hidden" class="country_post content" name="{{ $country }}" value="{{ old($country) }}">
                    </div>
                    <div class="d-flex">
                        <span data-action="{{ route('preview') }}" class="btn save_post preview text-white pt-2 pb-2 pr-4 pl-4 ml-auto d-flex">Preview</span>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex">
            <a href="{{ route('post.index') }}" class="btn save_post text-white mr-4 pt-2 pb-2 pr-4 pl-4 ml-auto">
                Cancel
            </a>
            <button type="submit" class="btn save_post text-white pt-2 pb-2 pr-4 pl-4">Save</button>
        </div>
    </form>
@endsection
@section('js')
    @parent
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script src="{{  asset("assets/js/admin/quill.js") }}"></script>
    <script>
        $(document).ready(function() {
            var toolbarOptions = [
                ['bold', 'italic', 'underline', 'strike'],
                ['blockquote', 'code-block'],
                // [{ 'header': 1 }, { 'header': 2 }],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'script': 'sub'}, { 'script': 'super' }],
                // [{ 'indent': '-1'}, { 'indent': '+1' }],
                // [{ 'direction': 'rtl' }],
                [{ 'size': ['small', false, 'large', 'huge'] }],
                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                [{ 'color': [] }, { 'background': [] }],
                // [{ 'font': [] }],
                [{ 'align': [] }],
                ['clean']
            ];
            for(let i = 1; i <= 6; i++) {
                let quill = new Quill('#editor' + i, {
                    modules: {
                        toolbar: toolbarOptions
                    },
                    theme: 'snow'
                });
            }

            for (let i = 1; i <= 6; i++) {
                let id = '#editor' + i;
                let html = $(id).closest('.country').find('.country_post').val();
                $(id).find('.ql-editor').html(html)
            }

            if ($('#file_name').val() !== '') {
                let image_link = '{{ asset('storage/storage') }}' + '/' + $('#file_name').val();
                $('.upload_container').css("background-image", "url('" + image_link + "')");
            }

        });
    </script>
@endsection
