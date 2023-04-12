@extends('admin.admin')
@section('content_admin')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <h2 class="mb-5">All Post</h2>
    <div class="table-block d-block">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Post Name</th>
                <th scope="col">Author</th>
                <th scope="col">Created at</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @if (count($posts) > 0)
                @foreach($posts as $k => $post)
                    <tr>
                        <th scope="row">{{ $k + 1 }}</th>
                        <td>{{ $post->post_name }}</td>
                        <td>{{ $post->author }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>
                            <form id="action-post" action="{{ route('post.destroy', $post->id) }}" method="POST" name="action">
                                @method('DELETE')
                                {{ csrf_field() }}
                                <a href="{{ route('post.edit', $post->id) }}">
                                    <i class="icon-admin icon-pencil"></i>
                                </a>
                                <i class="icon-admin icon-cancel-circled2"></i>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                No data available
            @endif
            </tbody>
        </table>
    </div>
@endsection
@section('js')
    @parent
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script>
        $('.icon-cancel-circled2').on('click', function () {
            if(!confirm("Do you really want to delete this post?")) {
                return false;
            }
            $(this).closest('#action-post').submit();
        })
    </script>
@endsection
