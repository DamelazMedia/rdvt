@extends('dashboard.layouts.admin.default')
@section('ccs_files')
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('dashboard/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="{{asset('dashboard/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{asset('dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/plugins/summernote/summernote-bs4.min.css')}}">
@endsection

@section('module_title','Show')
@section('active_module_shows', 'active')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
<li class="breadcrumb-item"><a href="{{route('shows.index')}}">Shows</a></li>
<li class="breadcrumb-item active">Create</li>
@endsection

@section('page_title','Create')
@section('page_tools')
@endsection

@section('content')

<form action="{{route('shows.store')}}" method="post">
    @csrf
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Show</a>
            <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">DJ/DJ's</a>
            <a class="nav-link" id="nav-roles-tab" data-toggle="tab" href="#nav-roles" role="tab" aria-controls="nav-roles" aria-selected="false">Schemas</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <!-- user -->
        <div class="card-body tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

          <div class="form-group">
              <label for="inputEmail4" class="form-label">Title</label>
              <input type="text" class="form-control" name="title" placeholder="show title">
          </div>
          <div class="form-group">
              <label for="inputEmail4" class="form-label">WebPage</label>
              <input type="text" class="form-control" name="slug" placeholder="show-slug">
          </div>
          <div class="form-group">
              <label for="inputEmail4" class="form-label">Description</label>
              <textarea name="description" id="summernote" cols="30" rows="10" class="form-control" placeholder="show description"></textarea>
            </div>
            <div class="form-group">
                <label for="inputEmail4" class="form-label">Status</label>
                <select class="form-control" name="status">

                  <option selected>Select</option>
                  <option value="published" >Published</option>
                  <option value="draft">Draft</option>

                </select>

            </div>
            <div class="form-group">
                <label for="inputEmail4" class="form-label">Genries</label>
              <input type="text" class="form-control" name="genry" placeholder="genries">
            </div>
            <div class="form-group">
                <label for="inputEmail4" class="form-label">WebSite</label>
              <input type="text" class="form-control" name="website" placeholder="https://www.example.tld">
            </div>

        </div>
        <!-- end user -->
        <!-- user profile -->
        <div class="card-body tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

            <div class="form-group">
              <label for="">DJ/DJ's</label>
              <select class="select2bs4" name="users[]" multiple="multiple">
                  @foreach($users as $user)

                <option value="{{$user->id}}">{{$user->dj_name}}</option>

                    @endforeach          </select>
            </div>


        </div>
        <!-- end user profile -->
        <!-- roles -->
        <div class="card-body tab-pane fade" id="nav-roles" role="tabpanel" aria-labelledby="nav-roles-tab">
            <div class="row g-2">
                <div class="col-md-12 form-group">
                    <label for="inputPassword4" class="form-label">Schemas</label>
                    <select name="timetables[]" class="duallistbox" multiple="multiple">
                                    @foreach($TimeTables as $RadioTimeTable)
                                    <option value="{{$RadioTimeTable->id}}"><b>{{$RadioTimeTable->title}}</b>-<u>{{$RadioTimeTable->starttime}}/{{$RadioTimeTable->endtime}}</u></option>
                                       @endforeach
                                   </select>
                </div>
            </div>
            <!-- end roles -->

        </div>
    </div>

    <!-- /.card-body -->
    <div class="card-footer">
        <div class="row g-2">
            <div class="col-12">
                <button type="submit" class="btn btn-sm btn-success" name="save">Save</button>
                <button type="submit" class="btn btn-sm btn-primary" name="saveedit" value="edit">Save & Edit</button>
                <a href="{{route('shows.index')}}" class="btn btn-sm btn-danger">Cancel</a>
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
<script src="{{asset('dashboard/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/summernote/lang/summernote-nl-NL.min.js')}}"></script>
@endsection

@section('js_scripts')
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
          theme: 'bootstrap4',
          tags: true
        })

        $('.duallistbox').bootstrapDualListbox({
  nonSelectedListLabel: 'Non-selected',
  selectedListLabel: 'Selected',
  preserveSelectionOnMove: 'moved',
  moveOnSelect: false,
});
// Summernote
$('#summernote').summernote({
    tabsize: 2,
        height: 300,
        lang: 'nl-NL',
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
]
})

    })

</script>
@endsection
