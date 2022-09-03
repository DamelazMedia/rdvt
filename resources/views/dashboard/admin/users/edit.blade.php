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

@section('module_title','Users')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
<li class="breadcrumb-item"><a href="{{route('users.index')}}">Users</a></li>
<li class="breadcrumb-item active">Edit</li>
@endsection

@section('page_title','Edit')
@section('page_tools')
@endsection

@section('content')

<form action="{{route('users.update', $user->id)}}" method="post">
    @csrf @method('put')
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">User</a>
            <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
            <a class="nav-link" id="nav-roles-tab" data-toggle="tab" href="#nav-roles" role="tab" aria-controls="nav-roles" aria-selected="false">Roles</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <!-- user -->
        <div class="card-body tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

            <div class="row g-2">
                <div class="col-md-6 form-group">
                    <label for="inputEmail4" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$user->name}}">
                </div>
                <div class="col-md-6 form-group">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="{{$user->email}}">
                </div>
                <div class="col-md-6 form-group">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-4 ">
                    <div class="form-group clearfix">
                        <div class=" d-inline">
                            <input type="checkbox" id="verified" @if($user->email_verified_at != null) checked @endif name="verified" value="verified">
                            <label for="checkboxSuccess1">Verified Account</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end user -->
        <!-- user profile -->
        <div class="card-body tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

            <div class="row g-2">
                <div class="col-md-6 form-group">
                    <label for="inputEmail4" class="form-label">Dj Name</label>
                    <input type="text" class="form-control" name="dj_name" value="{{$user->userprofile->dj_name}}">
                </div>
                <div class="col-md-6 form-group">
                    <label for="inputEmail4" class="form-label">Profile url</label>
                    <input type="text" class="form-control" name="profile_slug" value="{{$user->userprofile->slug}}">
                </div>

            </div>
            <div class="row g-2">
                <div class="col form-group">
                    <label for="inputEmail4" class="form-label">Avatar</label>
                    <div class="row">

                        <div class="col-md-8">
                            <input type="text" class="form-control" name="avatar" value="{{$user->userprofile->avatar_slug}}">
                        </div>
                        <div class="col-md-4">
                        @if($user->userprofile->avatar_slug != null)
                            <img src="{{$user->userprofile->avatar_slug}}" class="img rounded mx-auto d-block" height="220px" width="180xp">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md form-group">
                    <label for="inputEmail4" class="form-label">Profile Cover</label>
                    <input type="text" class="form-control" name="cover" value="{{$user->userprofile->cover_slug}}">
                    <div class="py-2">
                        @if($user->userprofile->cover_slug != null)
                        <img src="{{$user->userprofile->cover_slug}}" class="img rounded mx-auto d-block" height="320px" width="100%">
                        @endif
                        
                    </div>
                </div>
            </div>
            <div class="row g-2">
                <div class="col form-group">
                    <label for="inputEmail4" class="form-label">Genries</label>
                    <input type="text" class="form-control" name="genries" value="{{$user->userprofile->genries}}">
                </div>
                <div class="col form-group">
                    <label for="inputEmail4" class="form-label">intrests</label>
                    <input type="text" class="form-control" name="intrests" value="{{$user->userprofile->intrests}}">
                </div>
            </div>
            <div class="row g-2">
                <div class="col form-group">
                    <label for="inputEmail4" class="form-label">birtday</label>
                    <input type="date" class="form-control" name="birthday" value="{{$user->userprofile->birthday}}">
                </div>
                <div class="col form-group">
                    <label for="inputEmail4" class="form-label">City</label>
                    <input type="text" class="form-control" name="city" value="{{$user->userprofile->city}}">
                </div>
            </div>
            <div class="row g-2">
                <div class="col form-group">
                    <label for="inputEmail4" class="form-label">Bio</label>
                    <textarea name="bio" id="summernote" cols="30" rows="10" class="form-control" value="{{$user->userprofile->bio}}">{!! $user->userprofile->bio !!}</textarea>

                </div>

            </div>
        </div>
        <!-- end user profile -->
        <!-- roles -->
        <div class="card-body tab-pane fade" id="nav-roles" role="tabpanel" aria-labelledby="nav-roles-tab">
            <div class="row g-2">
                <div class="col-md-12 form-group">
                    <label for="inputPassword4" class="form-label">Roles</label>
                    <select name="roles[]" class="duallistbox" multiple="multiple">
                                    @foreach($roles as $role)
                                    <option value="{{$role->id}}" @isset($role) @if(in_array($role->id, $user->roles->pluck('id')->toArray())) selected @endif @endisset >{{$role->name}}</option>
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
          theme: 'bootstrap4'
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
