@extends('layouts.main')
@section('name')
    <h1>Users</h1>
@endsection
@section('root')
    App
@endsection
@section('model')
    Users
@endsection
@section('content')

    <div class="col-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom d-flex justify-content-between">
                <h2>Basic Data Table</h2>

                <button class="btn btn-outline-primary" type="submit" data-toggle="modal" data-target ="#exampleModalForm">
                    <i class=" mdi mdi-plus-circle"></i> Create User

                </button>

            </div>

            <div class="card-body">
                <div class="basic-data-table">
                    <table id="basic-data-table" class="table nowrap" style="width:100%">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Last name</th>
                            <th>First name</th>
                            <th>User Name</th>
                            <th>E-mail</th>
                            <th>Role Name</th>
                            <td></td>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($user as $users )
                            <tr>
                                <td>{{$users->id}}</td>
                                <td> {{$users->lastName }}</td>
                                <td> {{$users->firstName }} </td>
                                <td>  <a href="{{route('user.show',$users->id)}}"> {{$users->userName}}</a></td>
                                <td>{{$users->email}}</td>

                                @if(count($users->roles) ==0)
                                    <td>{{__('No active')}}</td>
                                @else
                                    <td>
                                        @foreach($users->roles as $role)
                                            <span class="mb-2 mr-2 badge badge-pill badge-info">{{$role->name}}</span>
                                        @endforeach
                                    </td>
                                @endif
                                <td class="text-right">
                                    <div class="dropdown show d-inline-block widget-dropdown">
                                        <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdown-recent-order5" data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false" data-display="static"></a>
                                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order5">
                                            <li class="dropdown-item">
                                                <a href="{{route('user.show',$users->id)}}">View</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="{{route('user.destroy',$users->id)}}">Remove</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @include('admin.user.create',['arrRoles'=>$arrRole])
                </div>
            </div>
        </div>
    </div>

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
                    "password_confirmation":$("#password_confirmation").val(),
                    "arrayRole":$('#arrayRole').val()
                },
                success:function (data){
                    console.log(data.user);
                    var tools = '<td class="text-right">'+
                        '<div class="dropdown show d-inline-block widget-dropdown">'+
                        '<a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdown-recent-order5" data-toggle="dropdown" aria-haspopup="true" '+
                    'aria-expanded="false" data-display="static"></a>'+
                    '<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order5">'+
                        '<li class="dropdown-item">'+
                            '<a href="'+'user'+'/show/'+data.user.id+'">'+'View'+'</a>'+
                        '</li>'+
                        '<li class="dropdown-item">'+
                            '<a href="'+'user'+'/destroy/'+data.user.id+'">'+'Remove'+'</a>'+
                        '</li>'+
                    '</ul>'+
                '</div>'+
                '</td>';

                    var rowName =  '<td>'+'<a href="/user/'+data.user.id+'">' + data.user.userName +'</a>' +'</td>'
                    var $row = $('<tr>'+
                        '<td>'+data.user.id+'</td>'+
                        '<td>'+data.user.lastName+'</td>'+
                        '<td>'+data.user.firstName+'</td>'+
                        rowName+
                        '<td>'+data.user.email+'</td>'+
                        '<td>'+'</td>'+
                        tools+
                        '</tr>');
                    var rowRoles ='<span>No active</span>';
                    if( data.user.roles.length !==0) {
                        var array=data.user.roles;
                        array.forEach(function (item){
                            rowRoles = '<span class="mb-2 mr-2 badge badge-pill badge-info">'+item.name+'</span>'+'  ';
                            $row.find("td").eq(5).append(rowRoles);
                        })
                    }else{

                        $row.find("td").eq(5).append(rowRoles);
                    }
                    $('table> tbody:last').append($row);
                },
                error:function (data){
                    console.log('error');
                    console.log(data);
                },
            });
        });
    </script>
@endsection



