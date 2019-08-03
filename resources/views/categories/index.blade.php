
@extends('layouts.app')

@section('content')




  <div class="card card-default">
    <div class="card-header">
      Categories
      <a href="{{ route('categories.create') }}" class="btn btn-success btn-sm float-right">Add Category</a>
    </div>

    <div class="card-body">
      @if ($categories->count() > 0)
        <table class="table table-sm">
          <tr class="font-weight-bold">
            <td>Name</td>
            <td></td>
          </tr>
          @foreach ($categories as $category)
            <tr>
              <td>{{ $category->name }}</td>
              <td>
                <a class="btn btn-info btn-sm" href="{{ route('categories.edit', $category->id) }}">Edit</a>
                <button onclick="deleteCatetory({{ $category->id }})" class="btn btn-danger btn-sm">Delete</button onclick="deleteCatetory({{ $category->id }})">
              </td>
            </tr>
          @endforeach
        </table>

        <form action="" method="post" id="deleteCatetoryForm">
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
                  Are you sure to delete this category?
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
        <h3 class="text-center">No categories yet.</h3>
      @endif
    </div>
  </div>
@endsection


@section('scripts')
  <script type="text/javascript">
    function deleteCatetory(id) {
      var form = document.getElementById('deleteCatetoryForm');
      form.action = '/categories/' + id;
      $('#deleteModal').modal('show');
      // console.log('Deleting ', form);
    }
  </script>
@endsection
