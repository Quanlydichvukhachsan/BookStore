@extends('layouts.main')
@section('content')

    <div class="container rounded bg-white">
        <div id="msg">

        </div>
        <form>
            @csrf
        @method('POST')
            <div class="row">

        <div class="p-3 py-3">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="text-right">Crate Users</h4>
            </div>
            <div class="row mt-3">

                <div class="col-md-3">
                    <label for="firstName" class="labels">First Name</label>
                    <input name="firstName" id="firstName" type="text" class="form-control" placeholder="first name" value="">
                </div>
                <div class="col-md-6"><label for="lastName" class="labels">Last Name</label>
                    <input name="lastName" id="lastName" type="text" class="form-control" value="" placeholder="lastname">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-12"><label for="userName" class="labels">User name</label>
                    <input name="userName" id="userName" type="text" class="form-control" placeholder="enter phone number" value=""></div>
                <div class="col-md-12"><label for="email" class="labels">Email</label>
                    <input name="email" id="email" type="text" class="form-control" placeholder="enter address" value=""></div>
                <div class="col-md-12"><label for="password" class="labels">Password</label>
                    <input name="password" id="password" type="password" class="form-control" placeholder="password" value=""></div>
                <div class="col-md-12">
                    <label for="password_confirmation" class="labels">Confirm Password</label>
                    <input name="password_confirmation"  id="password_confirmation" type="password" class="form-control" placeholder="password confirm" value="">
                </div>
            </div>

        </div>
            </div>
            <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit" id="btn-submit">Create</button></div>
            </form>

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
                     $("#msg").append( "<p>Successful Request!</p>" );
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
