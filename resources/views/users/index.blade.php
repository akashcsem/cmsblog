
@extends('layouts.app')

@section('title')
  CMS BLOG - Users
@endsection

@section('content')



  <div class="card card-default">
    <div class="card-header">
      Users
    </div>


    <div class="card-body">
      @if ($users->count() > 0)
        <table class="table table-sm">
          <tr>
            <th>Image</th>
            <th>Name</th>
            <th colspan="2">Email</th>
            {{-- <th>Action</th> --}}
          </tr>
          @foreach ($users as $user)
            <tr>
              <td><img height="40px" width="40" style="border-radius:50%" src="{{ Gravatar::src($user->email) }}" alt=""> </td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>
                @if (!$user->isAdmin())
                  <form action="{{ route('users.make-admin', $user->id) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-success btn-sm" name="button">Make Admin</button>
                  </form>
                @endif
              </td>
            </tr>
          @endforeach
        </table>
      @else
        <h3 class="text-center">No user yet.</h3>
      @endif
    </div>
  </div>
@endsection
