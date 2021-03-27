@extends('layouts.main')
@section('content')

    @if(Session::has('update-user'))
        <div class="alert alert-success" role="alert">
            <p >{{session('update-user')}}</p>
        </div>
    @endif

    @if(Session::has('assignRole-user'))
        <div class="alert alert-success" role="alert">
            <p >{{session('assignRole-user')}}</p>
        </div>
    @endif

    @if(Session::has('delete-user'))
        <div class="alert alert-danger" role="alert">
            <p >{{session('delete-user')}}</p>
        </div>
    @endif

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">All User</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">

            <table id="table" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Role Name</th>
              </tr>
              </thead>
              <tbody class="searchable">
              @foreach($user as $users )
                <tr>
                    <td>{{$users->id}}</td>
                    <td>  <a href="{{route('user.show',$users->id)}}">{{$users->lastName . " " . $users->firstName }}</a> </td>
                    <td>{{$users->userName}}</td>
                    <td>{{$users->email}}</td>

                  @if(count($users->roles) ==0)
                  <td>{{__('No active')}}</td>
                  @else
                        <td>
                      @foreach($users->roles as $role)
                             <span class="badge badge-info">{{$role->name}}</span>
                        @endforeach
                        </td>
                 @endif

              </tr>

              @endforeach
              </tbody>
              <tfoot>
              <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>User Name</th>
                  <th>Email</th>
                  <th>Role Name</th>
              </tr>
              </tfoot>
            </table>

              {{ Form::button('Create User', ['class' => 'btn btn-primary', 'type' => 'submit', 'data-toggle'=>'modal', 'data-target'=>'#exampleModal']) }}

                 @include('admin.user.create')
          </div>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->


        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->


  <!-- Page specific script -->

@endsection
@if(count($errors) >0)
<div class="alert alert-danger">

    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

@section('script')
    <!-- DataTables  & Plugins -->
<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/plugins/jszip/jszip.min.js"></script>
<script src="/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>


 <script>
     $('#btn-submit').click(function (e){
         e.preventDefault();
         $.ajax({
             type:'POST',
             cache:false,
             url:"{{route('user.store')}}",
             data:{
                 "_token":'{{csrf_token()}}',
                 "lastName": $('#lastName').val(),
                 "firstName":$('#firstName').val(),
                 "userName":$('#userName').val(),
                 "email":$('#email').val(),
                 "password":$('#password').val()
             },
             success:function (data){
                 console.log(data.success);
                 $("#msg").append( `<p>${data.success}</p>`);
                 setInterval('location.reload()', 1000);
             },
             error:function (data){
                 console.log('error');
                 console.log(data);
             },
         });
     });

 </script>
@endsection

