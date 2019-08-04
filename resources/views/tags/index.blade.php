
@extends('layouts.app')

@section('content')




  <div class="card card-default">
    <div class="card-header">
      Tags
      <a href="{{ route('tags.create') }}" class="btn btn-success btn-sm float-right">Add Tag</a>
    </div>

    <div class="card-body">
      @if ($tags->count() > 0)
        <table class="table table-sm">
          <tr class="font-weight-bold">
            <th>Name</th>
            <th>Post count</th>
            <th>Action</th>
          </tr>
          @foreach ($tags as $tag)
            <tr>
              <td>{{ $tag->name }}</td>
              <td>{{ $tag->posts->count() }}</td>
              <td>
                <a class="btn btn-info btn-sm" href="{{ route('tags.edit', $tag->id) }}">Edit</a>
                <button onclick="deleteTag({{ $tag->id }})" class="btn btn-danger btn-sm">Delete</button onclick="deleteTag({{ $tag->id }})">
              </td>
            </tr>
          @endforeach
        </table>

        <form action="" method="post" id="deleteTagForm">
          @method('delete')
          @csrf
          <!-- Modal -->
          <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Delete Modal</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Are you sure to delete this tag?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No, Go Back</button>
                  <button type="submit" class="btn btn-danger btn-sm">Yes, Delete</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      @else
        <h3 class="text-center">No Tags yet.</h3>
      @endif
    </div>
  </div>
@endsection


@section('scripts')
  <script type="text/javascript">
    function deleteTag(id) {
      var form = document.getElementById('deleteTagForm');
      form.action = '/tags/' + id;
      $('#deleteModal').modal('show');
      // console.log('Deleting ', form);
    }
  </script>
@endsection
