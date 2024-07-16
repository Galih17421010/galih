@extends('backend.index')
@section('title','Projects')

@section('content')
<div class="row g-6 mb-6">
    <div class="col-sm-6 col-xl-3">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div class="me-1">
              <p class="text-heading mb-1">Session</p>
              <div class="d-flex align-items-center">
                <h4 class="mb-1 me-2">21,459</h4>
                <p class="text-success mb-1">(+29%)</p>
              </div>
              <small class="mb-0">Total Users</small>
            </div>
            <div class="avatar">
              <div class="avatar-initial bg-label-primary rounded">
                <div class="ri-group-line ri-26px"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-3">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div class="me-1">
              <p class="text-heading mb-1">Paid Users</p>
              <div class="d-flex align-items-center">
                <h4 class="mb-1 me-2">4,567</h4>
                <p class="text-success mb-1">(+18%)</p>
              </div>
              <small class="mb-0">Last week analytics</small>
            </div>
            <div class="avatar">
              <div class="avatar-initial bg-label-danger rounded">
                <div class="ri-user-add-line ri-26px scaleX-n1"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-3">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div class="me-1">
              <p class="text-heading mb-1">Active Users</p>
              <div class="d-flex align-items-center">
                <h4 class="mb-1 me-2">19,860</h4>
                <p class="text-danger mb-1">(-14%)</p>
              </div>
              <small class="mb-0">Last week analytics</small>
            </div>
            <div class="avatar">
              <div class="avatar-initial bg-label-success rounded">
                <div class="ri-user-follow-line ri-26px"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-3">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div class="me-1">
              <p class="text-heading mb-1">Pending Users</p>
              <div class="d-flex align-items-center">
                <h4 class="mb-1 me-2">237</h4>
                <p class="text-success mb-1">(+42%)</p>
              </div>
              <small class="mb-0">Last week analytics</small>
            </div>
            <div class="avatar">
              <div class="avatar-initial bg-label-warning rounded">
                <div class="ri-user-search-line ri-26px"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Users List Table -->
  <div class="card">
    <div class="card-header border-bottom">
      <h6 class="card-title mb-0 text-center">Data Projects</h6>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewProject">Add Project</button>
    </div>
    <div class="card-datatable table-responsive">
      <table class="datatables-project table" id="table-project">
        <thead>
          <tr>
            <th></th>
            <th></th>
            <th>Title</th>
            <th>Description</th>
            <th>Projects_url</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Actions</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>

  <!-- Add New Project Modal -->
<div class="modal fade" id="addNewProject" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
      <div class="modal-content">
        <div class="modal-body p-0">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-6">
            <h4 class="address-title mb-2">Add New Project</h4>
            <p class="address-subtitle">Add new project for Portfolio</p>
          </div>
          <form id="addNewProject" class="row g-5" onsubmit="return false">
            <div class="col-12">
              <div class="form-floating form-floating-outline">
                <input type="text" id="title" name="title" class="form-control" required />
                <label for="title">Title Project</label>
              </div>
            </div>
            <div class="col-12">
              <div class="form-floating form-floating-outline">
                <input type="text" id="url_project" name="url_project" class="form-control" required />
                <label for="url_project">URL Project</label>
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
                  <textarea type="text" id="description" name="description" class="form-control h-px-100" rows="3" maxlength="255" required ></textarea>
                  <label for="description">Description Project</label>
                </div>
            </div>

            <div class="col-12 text-center">
              <button type="submit" class="btn btn-primary me-3">Submit</button>
              <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--/ Add New Project Modal -->
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
            var table = $('#table-project').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('project.data') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'user_id', name: 'user_id'},
                    {data: 'title', name: 'title'},
                    {data: 'description', name: 'description'},
                    {data: 'project_url', name: 'project_url'},
                    {data: 'start_date', name: 'start_date'},
                    {data: 'end_date', name: 'end_date'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

        });

    });
</script>
@endsection
