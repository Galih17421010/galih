@extends('backend.index')
@section('title','Article')
@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-header text-center">List Data Article</h5>
        <a href="{{url('article-create')}}" class="btn btn-primary">Add Article</a>
    </div>
    <div class="card-datatable table-responsive pt-0">
      <table class="table table-bordered" id="table-article">
        <thead>
          <tr>
            <th></th>
            <th>Category</th>
            <th>Title</th>
            <th>Slug</th>
            <th>Content</th>
            <th>Image</th>
            <th>Created At</th>
            <th>Action</th>
          </tr>
        </thead>
      </table>
    </div>
</div>

@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function () {
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        // Table Categorie
        $(document).ready(function(){
            let table = $('#table-article').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('articles.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'category_id', name: 'category_id'},
                    {data: 'title', name: 'title'},
                    {data: 'slug', name: 'slug'},
                    {data: 'body', name: 'body'},
                    {data: 'image', name: 'image'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
            });

        });
    });
</script>
@endsection
