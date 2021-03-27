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

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Create user</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form>
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label for="firstName" class="col-form-label">First Name</label>
                                        <input name="firstName" id="firstName" type="text" class="form-control" placeholder="first name" value="">
                                </div>
                                <div class="form-group">
                                    <label for="lastName" class="col-form-label">Last Name</label>
                                    <input name="lastName" id="lastName" type="text" class="form-control" value="" placeholder="lastname">
                                </div>
                                <div class="form-group">
                                   <label for="email" class="col-form-label">Email</label>
                                        <input name="email" id="email" type="text" class="form-control" placeholder="enter address" value="">
                                </div>
                                <div class="form-group">
                                    <label for="firstName" class="col-form-label">User Name</label>
                                    <input name="userName" id="userName" type="text" class="form-control" placeholder="enter phone number" value="">
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-form-label">Password</label>
                                    <input name="password" id="password" type="password" class="form-control" placeholder="password" value="">
                                </div>
                                <div class="form-group">
                                <label for="password_confirmation" class="col-form-label">Confirm Password</label>
                                <input name="password_confirmation"  id="password_confirmation" type="password" class="form-control" placeholder="password confirm" value="">
                                </div>
                            </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="button" id="btn-submit" class="btn btn-primary">Create user</button>
                            </div>

                           </div>
                        </div>
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

   /* $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
 modal.find('.modal-body input').val(recipient)
})*/
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
                 "password":$('#password').val(),
                 "password_confirmation":$('#password_confirmation').val()
             },
             success:function (data){
                 console.log(data.success);
                 $("#msg").append( `<p>${data.success}</p>` );
                 //alert(data.success);
             },
             error:function (data){
                 console.log('error');
                 console.log(data);
             },
         });
     });

 </script>


@endsection

