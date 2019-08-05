


  <!-- Sidebar Widgets Column -->
  <div class="col-md-4">

    <!-- Search Widget -->
    <div class="card my-4">
      <h5 class="card-header">Search</h5>
      <div class="card-body">
        <form action="" method="get">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="search" placeholder="Search a post" value="{{ request()->query('search') }}">
            <div class="input-group-append">
              <span class="input-group-text">Search</span>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- Categories Widget -->
    <div class="card my-4">
      <h5 class="card-header">Categories</h5>
      <div class="card-body">
        <div class="row">
          @foreach ($categories as $category)
            <div class="width-50"><a class="text-muted" href="{{ route('blog.category', $category->id) }}">{{ $category->name }}</a></div>
          @endforeach
        </div>
      </div>
    </div>

    <!-- Tags Widget -->
    <div class="card my-4">
      <h5 class="card-header">Tags</h5>
      <div class="card-body">
        <div class="row">
          @foreach ($tags as $tag)
            <div class="width-33"><a class="text-muted" href="{{ route('blog.tag', $tag->id) }}">{{ $tag->name }}</a></div>
          @endforeach
        </div>
      </div>
    </div>


  </div>
  <!-- End Sidebar Widgets Column -->
