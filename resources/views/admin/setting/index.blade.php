@extends('admin.admin')
@section('content_admin')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <h2 class="mb-5">Setting</h2>
    <div class="form-group">
        @if(count($posts) == 0)
            No dataaviable
        @else
            <form action="{{ route('setting.store') }}" method="POST">
                <label>First Post</label>
                {{ csrf_field() }}
                <select class="form-control mb-4" name="first_post">
                    @foreach($posts as $post)
                        <option {{ $data->first_post == $post->id ? 'selected' : '' }} value="{{ $post->id }}">{{ $post->name }}</option>
                    @endforeach
                </select>
                <label>Second Post</label>
                <select class="form-control mb-5" name="second_post">
                    @foreach($posts as $post)
                        <option {{ $data->second_post == $post->id ? 'selected' : '' }} value="{{ $post->id }}">{{ $post->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn save_post text-white pt-2 pb-2 pr-4 pl-4 float-right">Save</button>
            </form>
        @endif
    </div>
@endsection
