@extends('dashboard.layouts.admin.default')
@section('ccs_files')
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('dashboard/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="{{asset('dashboard/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{asset('dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
@endsection

@section('module_title','Users')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
<li class="breadcrumb-item"><a href="{{route('users.index')}}">Users</a></li>
<li class="breadcrumb-item active">Create</li>
@endsection

@section('page_title','Create')
@section('page_tools')
@endsection

@section('content')
<form action="{{route('users.store')}}" method="post">
    @csrf
    <div class="card-body">
        <div class="row g-2">
            <div class="col-md-6 form-group">
                <label for="inputEmail4" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" focus>
            </div>
            <div class="col-md-6 form-group">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="col-md-6 form-group">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
        </div>

    </div>
    <div class="card-body">
        <div class="row g-2">
            <div class="col-md-12 form-group">
                <label for="inputPassword4" class="form-label">Roles</label>
                <select name="roles[]" class="duallistbox" multiple="multiple">
                                    @foreach($roles as $role)
                                   <option value="{{$role->id}}">{{$role->name}}</option>
                                       @endforeach
                                   </select>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <div class="row g-2">
            <div class="col-12">
                <button type="submit" class="btn btn-sm btn-success">Save</button>
                <button type="submit" class="btn btn-sm btn-primary" name="saveedit">Save & Edit</button>
                <a href="" class="btn btn-sm btn-danger">Cancel</a>
            </div>
        </div>
    </div>
</form>
<!-- /.card-footer-->
@endsection

@section('js_files')
<!-- Select2 -->
<script src="{{asset('dashboard/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{asset('dashboard/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
@endsection

@section('js_scripts')
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
          theme: 'bootstrap4'
        })

        $('.duallistbox').bootstrapDualListbox({
  nonSelectedListLabel: 'Non-selected',
  selectedListLabel: 'Selected',
  preserveSelectionOnMove: 'moved',
  moveOnSelect: false,
});


    })

</script>
@endsection
