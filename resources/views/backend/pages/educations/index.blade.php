@extends('backend.index')
@section('title','Educations')

@section('content')
<!-- Education List Table -->
<div class="card">
    <div class="card-header border-bottom">
        <h6 class="card-title mb-0 text-center">Data Educations</h6>
        <a href="javascript:void(0)" class="btn btn-primary" id="createEducation">Add Education</a>
    </div>
    <div class="card-datatable table-responsive">
      <table class="datatables-project table" id="table-education">
        <thead>
          <tr>
            <th></th>
            <th>Institution</th>
            <th>Degree</th>
            <th>Field Of Study</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Actions</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>

<!-- Add Education Modal -->
<div class="modal fade" id="addNewEducation" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
      <div class="modal-content">
        <div class="modal-body p-0">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-6">
            <h4 class="address-title mb-2" id="judulModal"></h4>
            <p class="address-subtitle" id="deskripsiModal"></p>
          </div>
          <form id="educationForm" class="row g-5" name="educationForm">
            <input type="hidden" name="id" id="id"><input type="hidden" name="user_id" id="user_id" value="1"> @csrf
            <div class="col-12">
              <div class="form-floating form-floating-outline">
                <input type="text" id="institution" name="institution" class="form-control" required />
                <label for="institution">Institution</label>
              </div>
            </div>
            <div class="col-12">
              <div class="form-floating form-floating-outline">
                <input type="text" id="degree" name="degree" class="form-control" required />
                <label for="degree">Degree</label>
              </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-floating form-floating-outline">
                  <input type="date" id="start_date" name="start_date" class="form-control" required />
                  <label for="start_date">Start Date</label>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-floating form-floating-outline">
                  <input type="date" id="end_date" name="end_date" class="form-control" value="" />
                  <label for="end_date">End Date</label>
                </div>
            </div>
            <div class="col-12">
                <div class="form-floating form-floating-outline">
                  <textarea type="text" id="field_of_study" name="field_of_study" class="form-control h-px-100" rows="3" maxlength="255" required ></textarea>
                  <label for="field_of_study">Field Of Study</label>
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
  <!--/ Add Project Modal -->
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
            let table = $('#table-education').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('educations.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'institution', name: 'institution'},
                    {data: 'degree', name: 'degree'},
                    {data: 'field_of_study', name: 'field_of_study'},
                    {data: 'start_date', name: 'start_date'},
                    {data: 'end_date', name: 'end_date'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            $('#createEducation').click(function () {
                $('#simpan').val("create-education");
                $('#id').val('');
                $('#educationForm').trigger("reset");
                $('#judulModal').html("Create New Education");
                $('#deskripsiModal').html("Add new Education for Portfolio");
                $('#addNewEducation').modal('show');
            });


            $('body').on('click', '.editBtn', function () {
                var id = $(this).data('id');
                $.get("{{ route('educations.index') }}" +'/' + id +'/edit', function (data) {
                    $('#judulModal').html("Edit Education");
                    $('#deskripsiModal').html("Edit Education for Portfolio");
                    $('#simpan').val("edit-education");
                    $('#addNewEducation').modal('show');
                    $('#id').val(data.id);
                    $('#user_id').val(data.user_id);
                    $('#institution').val(data.institution);
                    $('#degree').val(data.degree);
                    $('#field_of_study').html(data.field_of_study);
                    $('#start_date').val(data.start_date);
                    $('#end_date').val(data.end_date);
                })
            });


            $('#educationForm').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
                $('#simpan').html('Sending...');
                    $.ajax({
                        type:'POST',
                        url: "{{ route('educations.store') }}",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: (response) => {
                            $('#simpan').html('Submit');
                            $('#educationForm').trigger("reset");
                            $('#addNewEducation').modal('hide');
                            Swal.fire({
                                title: "Success",
                                text: `${response.message}`,
                                icon: "success"
                            });
                            table.draw();
                        },
                        error: function(response){
                            $('#simpan').html('Submit');
                            $('#educationForm').find(".print-error-msg").find("ul").html('');
                            $('#educationForm').find(".print-error-msg").css('display','block');
                            $.each( response.responseJSON.errors, function( key, value ) {
                                $('#educationForm').find(".print-error-msg").find("ul").append('<li>'+value+'</li>');
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
                            url: "{{route('educations.store')}}"+"/"+id,
                            type: "DELETE",
                            data: {id},
                            success: function(response) {
                                Swal.fire({
                                title: "Deleted!",
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
