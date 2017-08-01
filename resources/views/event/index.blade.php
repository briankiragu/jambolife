@extends('admin.layouts.master')

@section('css')
  <link href="{{ asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('content')
  <div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
      <h2>Events</h2>
      <ol class="breadcrumb">
        <li>
          <a href="{{ route('admin.dash') }}">Home</a>
        </li>
        <li class="active">
          <strong>Events</strong>
        </li>
      </ol>
    </div>
    <div class="col-lg-2"></div>
  </div>
  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
      <div class="col-lg-12">
        <div class="ibox float-e-margins">
          <div class="ibox-title">
            <h5>Registered events</h5>
            <div class="ibox-tools">
              <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
              </a>
            </div>
          </div>
          <div class="ibox-content">
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover events-table" >
                <thead>
                  <tr>
                    <th>Event Name</th>
                    <th>City</th>
                    <th>Description</th>
                    <th>Sales Close</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Organiser</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($payload['events'] as $event)
                    <tr class="gradeX">
                      <td>{{ $event->name }}</td>
                      <td>{{ $event->city }}</td>
                      <td class="center">{{ $event->description }}</td>
                      <td class="center">{{ \Carbon\Carbon::parse($event->sales_close)->toFormattedDateString() }}</td>
                      <td class="center">{{ \Carbon\Carbon::parse($event->event_start)->toFormattedDateString() }}</td>
                      <td class="center">{{ \Carbon\Carbon::parse($event->event_end)->toFormattedDateString() }}</td>
                      <td class="center">JamboLife</td>
                      <td class="center">Edit</td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Event Name</th>
                    <th>City</th>
                    <th>Description</th>
                    <th>Sales Close</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Organiser</th>
                    <th>Actions</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script src="{{ asset('js/plugins/dataTables/datatables.min.js') }}"></script>

  <script type="text/javascript">
      $(document).ready(function(){
          $('.events-table').DataTable({
              pageLength: 25,
              responsive: true,
              dom: '<"html5buttons"B>lTfgitp',
              buttons: [
                  { extend: 'copy' },
                  { extend: 'csv' },
                  { extend: 'excel', title: 'ExampleFile' },
                  { extend: 'pdf', title: 'ExampleFile' },
                  { extend: 'print', customize: function (win) {
                      $(win.document.body).addClass('white-bg');
                      $(win.document.body).css('font-size', '10px');
                      $(win.document.body).find('table')
                          .addClass('compact')
                          .css('font-size', 'inherit');
                      }
                  }
              ]
          });
      });
  </script>
@endsection
