@extends('backend.index')
@section('title','Categorie & Tag')
@section('content')
<div class="row gy-6">
<!-- Categorie List Table -->
<div class="col-lg-6">
    <div class="card">
        <div class="card-header border-bottom">
            <h6 class="card-title mb-0 text-center">Data Categories</h6>
            <a href="javascript:void(0)" class="btn btn-primary" id="createCategorie">Add Categorie</a>
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

<!-- Add Categorie Modal -->
<div class="modal fade" id="addNewCategorie" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-address">
      <div class="modal-content">
        <div class="modal-body p-0">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-6">
            <h4 class="address-title mb-2" id="judulModal"></h4>
            <p class="address-subtitle" id="deskripsiModal"></p>
          </div>
          <form id="categorieForm" class="row g-5" name="categorieForm">
            <input type="hidden" name="id" id="id"> @csrf
            <div class="col-12">
              <div class="form-floating form-floating-outline">
                <input type="text" oninput="listingslug(this.value)" id="name" name="name" class="form-control" required />
                <label for="name">Name</label>
              </div>
            </div>
            <div class="col-12">
              <div class="form-floating form-floating-outline">
                <input type="text" id="slug" name="slug" class="form-control" required />
                <label for="slug">Slug</label>
              </div>
            </div>
            <div class="col-12 text-center">
              <button type="submit" class="btn btn-primary me-3" id="simpan" value="create">Submit</button>
              <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
<!--/ Add Categorie Modal -->

<div class="col-lg-6">
    <div class="card">
        <div class="card-header border-bottom">
            <h6 class="card-title mb-0 text-center">Data Tags</h6>
            <a href="javascript:void(0)" class="btn btn-primary" id="createTag">Add Tag</a>
        </div>
        <div class="card-datatable table-responsive">
          <table class="datatables-project table" id="table-tag">
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

<!-- Add Tag Modal -->
<div class="modal fade" id="addNewTag" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-address">
      <div class="modal-content">
        <div class="modal-body p-0">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-6">
            <h4 class="address-title mb-2" id="judulModalTag"></h4>
            <p class="address-subtitle" id="deskripsiModalTag"></p>
          </div>
          <form id="tagForm" class="row g-5" name="tagForm">
            <input type="hidden" name="idtag" id="idtag"> @csrf
            <div class="col-12">
              <div class="form-floating form-floating-outline">
                <input type="text" oninput="listingslugtag(this.value)" id="nametag" name="nametag" class="form-control" required />
                <label for="name">Name</label>
              </div>
            </div>
            <div class="col-12">
              <div class="form-floating form-floating-outline">
                <input type="text" id="slugtag" name="slugtag" class="form-control" required />
                <label for="slug">Slug</label>
              </div>
            </div>
            <div class="col-12 text-center">
              <button type="submit" class="btn btn-primary me-3" id="simpan" value="create">Submit</button>
              <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
<!--/ Add Tag Modal -->

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
                    $('#judulModal').html("Edit Categorie");
                    $('#deskripsiModal').html("Edit Categorie for Portfolio ");
                    $('#simpan').val("edit-categorie");
                    $('#addNewCategorie').modal('show');
                    $('#id').val(data.id);
                    $('#name').val(data.name);
                    $('#slug').val(data.slug);
                })
            });


            $('#categorieForm').submit(function(e) {
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
                            $('#categorieForm').trigger("reset");
                            $('#addNewCategorie').modal('hide');
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
                            $('#categorieForm').find(".print-error-msg").find("ul").html('');
                            $('#categorieForm').find(".print-error-msg").css('display','block');
                            $.each( response.responseJSON.errors, function( key, value ) {
                                $('#categorieForm').find(".print-error-msg").find("ul").append('<li>'+value+'</li>');
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

        // Table Tag
        $(document).ready(function(){
            let table = $('#table-tag').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('tags.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'slug', name: 'slug'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            $('#createTag').click(function () {
                $('#simpan').val("create-tag");
                $('#id').val('');
                $('#tagForm').trigger("reset");
                $('#judulModalTag').html("Create New Tag");
                $('#deskripsiModalTag').html("Add new Tag for Portfolio ");
                $('#addNewTag').modal('show');
            });

            $('body').on('click', '.editBtnTag', function () {
                var id = $(this).data('id');
                $.get("{{ route('tags.index') }}" +'/' + id +'/edit', function (data) {
                    $('#judulModalTag').html("Edit Tag");
                    $('#deskripsiModalTag').html("Edit Tag for Portfolio ");
                    $('#simpan').val("edit-tag");
                    $('#addNewTag').modal('show');
                    $('#idtag').val(data.id);
                    $('#nametag').val(data.name);
                    $('#slugtag').val(data.slug);
                })
            });


            $('#tagForm').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
                $('#simpan').html('Sending...');
                    $.ajax({
                        type:'POST',
                        url: "{{ route('tags.store') }}",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: (response) => {
                            $('#simpan').html('Submit');
                            $('#tagForm').trigger("reset");
                            $('#addNewTag').modal('hide');
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
                            $('#tagForm').find(".print-error-msg").find("ul").html('');
                            $('#tagForm').find(".print-error-msg").css('display','block');
                            $.each( response.responseJSON.errors, function( key, value ) {
                                $('#tagForm').find(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                            });
                        }
                });

            });

            $('body').on('click', '.deleteBtnTag', function () {
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
                            url: "{{route('tags.store')}}"+"/"+id,
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
    function slugify(text) {
        return text
            .toString()
            .toLowerCase()
            .normalize('NFD')
            .trim()
            .replace(/\s+/g, '-')
            .replace(/[^\w\-]+/g, '')
            .replace(/\-\-+/g, '-');
        }

        function listingslug(text) {
            document.getElementById("slug").value = slugify(text);
        }
        function listingslugtag(text) {
            document.getElementById("slugtag").value = slugify(text);
        }
</script>
@endsection
