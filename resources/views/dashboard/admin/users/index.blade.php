@extends('dashboard.layouts.admin.default')

@section('ccs_files')
@endsection


@section('module_title','Users')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item"><a href="#">Layout</a></li>
<li class="breadcrumb-item active">Fixed Navbar Layout</li>
@endsection

@section('page_title','List')

@section('page_tools')
<div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
@endsection

@section('content')
<div class="card-body table-responsive">
          <table class="table bordered">
              <thead>
                  <tr>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Verified</th>
                      <th scope="col">User</th>
                      <th scope="col">Roles</th>
                      <th scope="col">Created</th>
                      <th scope="col">Actions</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    @if($user->email_verified_at == $user->created_at)
                    Verified
                    @else
                    Not Verified
                    @endif
                </td>
                <td>{{$user->userprofile->dj_name}}</td>
                <td>
                        <span>
                    @foreach($user->getRoleNames() as $role)

                    {{$role}}
                    @endforeach</span>
                    </td>
                <td>{{$user->created_at}}</td>
                <td>
                    <div>

                    <form action="{{route('users.destroy', $user->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <a href="{{route('users.show', $user->id)}}" class="btn btn-xs btn-success">View</a>
                        <a href="{{route('users.edit', $user->id)}}" class="btn btn-xs btn-primary">Edit</a>
                    <button type="submit" class="btn btn-xs btn-danger">Delete</button>
                    </form>
                    </div>
                </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      Footer
    </div>
    <!-- /.card-footer-->
@endsection

@section('js_files')
@endsection

@section('js_scripts')
@endsection
