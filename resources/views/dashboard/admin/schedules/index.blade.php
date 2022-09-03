@extends('dashboard.layouts.admin.default')

@section('ccs_files')
<link rel="stylesheet" href="{{asset('#dashboard/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('dashboard/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('dashboard/plugins/datatables-scroller/css/dataTables.scroller.min.css')}}">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap5.min.css">
@endsection


@section('module_title','Shows')
@section('active_module_schedules', 'active')
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
          <table class="table bordered" id="datatable">
              <thead>
                  <tr>
                      <th scope="col">Type</th>
                      <th scope="col">Start Time</th>
                      <th scope="col">End Time</th>
                      <th scope="col">day</th>
                       <th scope="col">Planning</th>
                      <th scope="col">Created</th>
                      <th scope="col">Actions</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($schedules as $schedule)
                
                <tr>
                <td>{{$schedule->title}}</td>
                <td>{{$schedule->starttime}}</td>
                <td>{{$schedule->endtime}}</td>
                <td>{{$schedule->days}}</td>
                <td>{{$schedule->playdate}}</td>
                <td>{{$schedule->created_at}}</td>
                <td>
                    <div>

                    <form action="{{route('schedules.delete', $schedule->id)}}" method="post">
                        @csrf
                        @method('delete')
                       
                        <a href="{{route('schedules.edit', $schedule->id)}}" class="btn btn-xs btn-primary">Edit</a>
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
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{asset('#plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('#dashboard/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('#dashboard/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/datatables-scroller/js/dataTables.scroller.min.js')}}"></script>
@endsection

@section('js_scripts')
<script>
        $(function(){

           var table = $('#datatable').DataTable({
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": true,
                    "info": false,
                    "autoWidth": false,
                    "responsive": true,
                    "pagingType": "full_numbers",
                    columnDefs: [
                        {"orderable": false,targets: 6,},
                        ],
                })
        });
    </script>
@endsection
