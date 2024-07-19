@extends('backend.index')
@section('title','Categorie & Tag')
@section('content')
<div class="row gy-6">
<!-- Categorie List Table -->
<div class="col-lg-6">
    <div class="card">
        <div class="card-header border-bottom">
            <h6 class="card-title mb-0 text-center">Data Categories</h6>
            <a href="javascript:void(0)" class="btn btn-primary" id="createProject">Add Categorie</a>
        </div>
        <div class="card-datatable table-responsive">
          <table class="datatables-project table" id="table-categorie">
            <thead>
              <tr>
                <th></th>
                <th>Name</th>
                <th>Slug</th>
                <th>Actions</th>
              </tr>
            </thead>
          </table>
        </div>
    </div>
</div>
<div class="col-lg-6">
    <div class="card">
        <div class="card-header border-bottom">
            <h6 class="card-title mb-0 text-center">Data Tags</h6>
            <a href="javascript:void(0)" class="btn btn-primary" id="createProject">Add Tag</a>
        </div>
        <div class="card-datatable table-responsive">
          <table class="datatables-project table" id="table-project">
            <thead>
              <tr>
                <th></th>
                <th>Name</th>
                <th>Slug</th>
                <th>Actions</th>
              </tr>
            </thead>
          </table>
        </div>
    </div>
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
        $(document).ready(function(){
            let table = $('#table-categorie').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('categories.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'slug', name: 'slug'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            $('#createCategorie').click(function () {
                $('#simpan').val("create-categorie");
                $('#id').val('');
                $('#categorieForm').trigger("reset");
                $('#judulModal').html("Create New Categorie ");
                $('#deskripsiModal').html("Add new categorie for Portfolio ");
                $('#addNewCategorie').modal('show');
            });

            $('body').on('click', '.editBtn', function () {
                var id = $(this).data('id');
                $.get("{{ route('categories.index') }}" +'/' + id +'/edit', function (data) {
                    $('#judulModal').html("Edit Project");
                    $('#deskripsiModal').html("Edit project for Portfolio ");
                    $('#simpan').val("edit-project");
                    $('#addNewProject').modal('show');
                    $('#id').val(data.id);
                    $('#name').val(data.name);
                    $('#slug').val(data.slug);
                })
            });


            $('#projectForm').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
                $('#simpan').html('Sending...');
                    $.ajax({
                        type:'POST',
                        url: "{{ route('categories.store') }}",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: (response) => {
                            $('#simpan').html('Submit');
                            $('#projectForm').trigger("reset");
                            $('#addNewProject').modal('hide');
                            Swal.fire({
                                title: "Success",
                                text: `${response.message}`,
                                icon: "success",
                                customClass: { confirmButton: "btn btn-success" },
                                buttonsStyling: !1,
                            });
                            table.draw();
                        },
                        error: function(response){
                            $('#simpan').html('Submit');
                            $('#projectForm').find(".print-error-msg").find("ul").html('');
                            $('#projectForm').find(".print-error-msg").css('display','block');
                            $.each( response.responseJSON.errors, function( key, value ) {
                                $('#projectForm').find(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                            });
                        }
                });

            });

            $('body').on('click', '.deleteBtn', function () {
                var id = $(this).data("id");
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, deleted",
                    customClass: {
                        confirmButton: "btn btn-primary me-3",
                        cancelButton: "btn btn-label-secondary",
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{route('categories.store')}}"+"/"+id,
                            type: "DELETE",
                            data: {id},
                            success: function(response) {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: `${response.message}`,
                                    icon: "success",
                                    customClass: { confirmButton: "btn btn-success" },
                                });
                                table.draw();
                            }
                        });
                    }
                });
            });
        });
    });
</script>
@endsection
