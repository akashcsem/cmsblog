
@extends('layouts.app')

@section('content')
  <div class="card card-default">
    <div class="card-header">
      Posts
      <a href="{{ route('myposts.create') }}" class="btn btn-success btn-sm float-right">Add Post</a>
    </div>

    <div class="card-body">
      @if ($posts->count() > 0)
        <table class="table table-sm">
          <tr>
            <th>Image</th>
            <th>Title</th>
            <th colspan="2">Action</th>
          </tr>
          @foreach ($posts as $post)
            <tr>
              <td><img src="{{ asset('posts/'. $post->image) }}" style="width: 120px; height: 60px" alt="{{ $post->image }}"> </td>
              <td>{{ $post->title }}</td>
              @if (!$post->trashed())
                <td><a class="btn btn-info btn-sm" href="{{ route('myposts.edit', $post->id) }}">Edit</a></td>

              @else
                <td>
                  <form action="{{ route('restore-posts', $post->id) }}" method="post">
                    @method('PUT')
                    @csrf
                    <button type="submit" class="btn btn-info text-light btn-sm">
                      Restore
                    </button>
                  </form>
                </td>
              @endif
              <td>
                <form action="{{ route('myposts.destroy', $post->id) }}" method="post">
                  @method('delete')
                  @csrf
                  <button type="submit" class="btn btn-danger btn-sm">
                    {{ $post->trashed() ? 'Delete' : 'Trash' }}
                  </button>
                </form>
              </td>
            </tr>
          @endforeach
        </table>
      @else
        <h3 class="text-center">No post yet.</h3>
      @endif
    </div>
  </div>
@endsection
