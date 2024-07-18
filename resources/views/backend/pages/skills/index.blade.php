@extends('backend.index')
@section('title','Skills')

@section('content')
<!-- Skill List Table -->
<div class="card">
    <div class="card-header border-bottom">
        <h6 class="card-title mb-0 text-center">Data Skills</h6>
        <a href="javascript:void(0)" class="btn btn-primary" id="createSkill">Add Skill</a>
    </div>
    <div class="card-datatable table-responsive">
      <table class="datatables-project table" id="table-skill">
        <thead>
          <tr>
            <th></th>
            <th>Name</th>
            <th>Level</th>
            <th>Icon</th>
            <th>Actions</th>
          </tr>
        </thead>
      </table>
    </div>
</div>

  <!-- Add Skill Modal -->
<div class="modal fade" id="addNewSkill" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
      <div class="modal-content">
        <div class="modal-body p-0">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-6">
            <h4 class="address-title mb-2" id="judulModal"></h4>
            <p class="address-subtitle" id="deskripsiModal"></p>
          </div>
          <form id="skillForm" class="row g-5" name="skillForm">
            <input type="hidden" name="id" id="id"><input type="hidden" name="user_id" id="user_id" value="1"> @csrf
            <div class="col-12">
              <div class="form-floating form-floating-outline">
                <input type="text" id="name" name="name" class="form-control" required />
                <label for="title">Name Skill</label>
              </div>
            </div>
            <div class="col-12">
              <div class="form-floating form-floating-outline">
                <select class="form-select" id="level" name="level" required>
                    <option value="" selected disabled>Chose level</option>
                    <option value="Beginner">Beginner</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Experienced">Experienced</option>
                </select>
                <label for="level">Level Skill</label>
              </div>
            </div>
            <div class="col-12">
                <div class="form-floating form-floating-outline">
                  <input type="file" id="image" name="image" class="form-control" />
                  <label for="image">Icon Skill</label>
                </div>
                <img src="" width="300px">
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
  <!--/ Add Skill Modal -->

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
            let table = $('#table-skill').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('skills.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'level', name: 'level'},
                    {data: 'image', name: 'image'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            $('#createSkill').click(function () {
                $('#simpan').val("create-skill");
                $('#id').val('');
                $('#skillForm').trigger("reset");
                $('#judulModal').html("Create New Skill");
                $('#deskripsiModal').html("Add new Skill for Portfolio");
                $('#addNewSkill').modal('show');
            });

            $('body').on('click', '.editBtn', function () {
                var id = $(this).data('id');
                $.get("{{ route('skills.index') }}" +'/' + id +'/edit', function (data) {
                    $('#judulModal').html("Edit Skill");
                    $('#deskripsiModal').html("Edit Skill for Portfolio");
                    $('#simpan').val("edit-skill");
                    $('#addNewSkill').modal('show');
                    $('#id').val(data.id);
                    $('#user_id').val(data.user_id);
                    $('#name').val(data.name);
                    $('#level').val(data.level);
                    $('#image').html(data.image);
                })
            });


            $('#skillForm').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
                $('#simpan').html('Sending...');
                    $.ajax({
                        type:'POST',
                        url: "{{ route('skills.store') }}",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: (response) => {
                            $('#simpan').html('Submit');
                            $('#skillForm').trigger("reset");
                            $('#addNewSkill').modal('hide');
                            Swal.fire({
                                title: "Success",
                                text: `${response.message}`,
                                icon: "success"
                            });
                            table.draw();
                        },
                        error: function(response){
                            $('#simpan').html('Submit');
                            $('#skillForm').find(".print-error-msg").find("ul").html('');
                            $('#skillForm').find(".print-error-msg").css('display','block');
                            $.each( response.responseJSON.errors, function( key, value ) {
                                $('#skillForm').find(".print-error-msg").find("ul").append('<li>'+value+'</li>');
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
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, deleted",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{route('skills.store')}}"+"/"+id,
                            type: "DELETE",
                            data: {id},
                            success: function(response) {
                                Swal.fire({
                                title: "Terhapus!",
                                text: `${response.message}`,
                                icon: "success"
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
