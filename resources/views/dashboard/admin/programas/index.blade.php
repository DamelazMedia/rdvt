@extends('dashboard.layouts.admin.default')

@section('ccs_files')
@endsection


@section('module_title','Shows')
@section('active_module_shows', 'active')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item"><a href="{{route('shows.index')}}">Shows</a></li>
<li class="breadcrumb-item active">List</li>
@endsection

@section('page_title','List')

@section('page_tools')
<div class="card-tools">

        <a href="{{route('shows.create')}}" type="button" class="btn btn-tool">New<i class="fas fa-plus"></i></a>
      </div>
@endsection

@section('content')
<div class="card-body table-responsive">
          <table class="table bordered">
              <thead>
                  <tr>
                      <th scope="col">Title</th>
                      <th scope="col">DJ/DJ's</th>
                      <th scope="col">Status</th>
                      <th scope="col">Genry</th>
                      <th scope="col">Created</th>
                      <th scope="col">Actions</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($programas as $programa)
                <tr>
                <td>{{$programa->title}}</td>
                <td>
                  @foreach($programa->users as $user)
                  <span>{{$user->dj_name}}</span>
@endforeach
                  </td>
                <td>@if($programa->status == 'published')
                  Active
                  @else
                  DeActive
                  @endif
                </td>
                <td>{{$programa->genry}}</td>
<td>{{$programa->created_at}}</td>

                <td>
                    <div>

                    <form action="{{route('shows.delete', $programa->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <a href="{{route('shows.show', $programa->slug)}}" class="btn btn-xs btn-success">View</a>
                        <a href="{{route('shows.edit', $programa->id)}}" class="btn btn-xs btn-primary">Edit</a>
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
