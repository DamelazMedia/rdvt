@extends('dashboard.layouts.admin.default')
@section('ccs_files')

@endsection

@section('module_title','Shows')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
<li class="breadcrumb-item"><a href="{{route('shows.index')}}">Shows</a></li>
<li class="breadcrumb-item active">Edit</li>
@endsection

@section('page_title')
Show: {{$RadioShow->title}}
@stop
@section('page_tools')
@endsection

@section('content')


    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Radio Show</a>
            <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Schedules</a>
            <a class="nav-link" id="nav-roles-tab" data-toggle="tab" href="#nav-roles" role="tab" aria-controls="nav-roles" aria-selected="false">DJ/DJ's</a>
            <a class="nav-link" href="{{route('shows.index')}}" role="tab" aria-selected="false" target="_blank">View Page</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <!-- user -->
        <div class="card-body tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="form-group">
                    <label for="inputEmail4" class="form-label">Title</label>
                    <input type="text" class="form-control" name="name" value="{{$RadioShow->title}}" disabled>
                </div>
                <div class="form-group">
                    <label for="inputEmail4" class="form-label">WebPage</label>
                    <a href="#" type="text" class="form-control" target="_blank">{{$RadioShow->slug}}</a>
                </div>
                <div class="form-group">
                    <label for="inputEmail4" class="form-label">Description</label>
                    <textarea name="bio" id="" cols="30" rows="10" class="form-control" disabled>{!! $RadioShow->description !!}</textarea>
                  </div>
                  <div class="form-group">
                      <label for="inputEmail4" class="form-label">Status</label>
                    <input type="text" class="form-control" name="name" value="{{$RadioShow->status}}" disabled>
                  </div>
                  <div class="form-group">
                      <label for="inputEmail4" class="form-label">Genries</label>
                    <input type="text" class="form-control" name="name" value="{{$RadioShow->genry}}" disabled>
                  </div>
                  <div class="form-group">
                      <label for="inputEmail4" class="form-label">WebSite</label>
                    <input type="text" class="form-control" name="name" value="{{$RadioShow->website}}" disabled>
                  </div>
                  <div class="form-group">
                      <label for="inputEmail4" class="form-label">Created at</label>
                    <input type="text" class="form-control" name="name" value="{{$RadioShow->created_at}}" disabled>
                  </div>
                  <div class="form-group">
                      <label for="inputEmail4" class="form-label">Last Updated</label>
                    <input type="text" class="form-control" name="name" value="{{$RadioShow->updated_at}}" disabled>
                  </div>
        </div>
        <!-- end user -->
        <!-- user profile -->
        <div class="card-body tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
          <table class="table">
            <thead>
<tr>
  <th>Start Time</th>
    <th>End Time</th>
      <th>Day</th>
      <th>PlayDate</th>
</tr>
            </thead>
            <tbody>

@foreach($RadioShow->timetables as $timetable)
              <tr>
                <td>{{$timetable->starttime}}</td>
                <td>{{$timetable->endtime}}</td>
                <th>{{$timetable->days}}</th>
                <th>{{$timetable->playdate}}</th>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- end user profile -->
        <!-- roles -->
        <div class="card-body tab-pane fade" id="nav-roles" role="tabpanel" aria-labelledby="nav-roles-tab">
          <table class="table">
            <thead>
<tr>
  <th>DJ/DJ's</th>

</tr>
            </thead>
            <tbody>
              @foreach($RadioShow->users as $user)
              <tr>
                <td>{{$user->dj_name}}</td>

              </tr>
            @endforeach
            </tbody>
          </table>

        </div>
    </div>

    <!-- /.card-body -->
    <div class="card-footer">
        <div class="row g-2">
            <div class="col-12">
              <a href="{{route('shows.edit', $RadioShow->id)}}" class="btn btn-sm btn-primary">Edit</a>
              <a href="{{route('shows.index')}}" class="btn btn-sm btn-danger">Cancel</a>
            </div>
        </div>
    </div>
</form>
<!-- /.card-footer-->
@endsection

@section('js_files')

@endsection

@section('js_scripts')

@endsection
