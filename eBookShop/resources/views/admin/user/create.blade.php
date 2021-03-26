@extends('layouts.main')
@section('content')


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





    @if(count($errors) >0)
        <div class="alert alert-danger">

            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection

 @section('script')
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
