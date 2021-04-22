@extends('layouts.main')
@section('name')
    <h1>Access</h1>
@endsection
@section('root')
    App
@endsection
@section('model')
    role-permission
@endsection
@section('content')

    <div class="col-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom d-flex justify-content-between">
                <h2>Data Table Access</h2>
                <button class="btn btn-outline-primary" type="button" data-toggle="modal"
                        data-target="#exampleModal">
                    <i class=" mdi mdi-plus-circle"></i> Create Role
                </button>

            </div>

            <div class="card-body">
                <div class="basic-data-table">
                    <table id="basic-data-table" class="table nowrap" style="width:100%">
              <thead>
              <tr>
                <th>Id</th>
                <th>Role</th>
                <th>Permissions</th>
                  <th>Tools</th>
              </tr>
              </thead>
              <tbody>
              @foreach($role as $roles )
                <tr id="sid={{$roles->id}}">
                <td>{{$roles->id}}</td>
                <td>{{$roles->name}}</td>
                <td>

                    @if($roles->name === "Administrator")
                        <span class="badge badge-info">
                        {{ __('Full Permission') }}
                        </span>
                    @endif

                  @foreach($roles->permissions as $permissionsName)
                <span class="badge badge-info">
                        {{$permissionsName->name}}
                </span>
                  @endforeach
                </td>
                    <td>
                        <button class="mb-1 btn btn-success" data-toggle="modal"
                                data-target="#exampleModalForm" data-value="{{$roles->id}}" onclick="getRoleId(this)">
                           <span><i class="mdi mdi-pencil"></i></span>
                        </button>
                         <button class="mb-1 btn btn-danger" data-value="{{$roles->id}}" onclick="getRoleId(this)">
                            <span><i class="mdi mdi-trash-can"></i></span>
                         </button>

                    </td>
              </tr>

              @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>Id</th>
                <th>Role</th>
                <th>Permissions</th>
                  <th>Tools</th>
              </tr>
              </tfoot>
            </table>
                    @include('admin.role.create')

                    <div class="modal fade" id="exampleModalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalFormTitle">Edit role</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="form-role">
                                        @csrf
                                        @method('POST')
                                    </form>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="remove()" class="btn btn-secondary btn-pill" data-dismiss="modal">Close</button>
                                    <button type="submit" id="btn-submit" class="btn btn-primary btn-pill">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
        </div>
      </div>
    </div>

@endsection

@section('script')
    <script src={{asset("error-handler/exception.js")}}></script>
    <script>
    $overlay = $('<div id="overlay"/>').css({
    position: 'fixed',
    display: 'none',
    top: 0,
    left: 0,
    color: '#adbcbf',
    width: '100%',
    height: $(window).height() + 'px',
    opacity: 0.4,
    background: '#f5f6f7 url("/images/Blocks-1s-200px.gif") no-repeat center'
    });

    $('#role-submit').click(function (e) {
    e.preventDefault();
    $overlay.appendTo("#exampleModal");
    $('#overlay').show();
    setTimeout(function () {
    $.ajax({
    type: 'POST',
    catch: false,
    url: "{{route('role.store')}}",
    data: {
    "_token": '{{csrf_token()}}',
    'name': $('#name').val()
    },
    success: function (data) {

        var tools = '<td>'+' <button class="mb-1 btn btn-success"'+' data-value='+'"' +data.role.id +'"'
            +' onclick="getRoleId(this)"' + '>'+
            ' <span><i class="mdi mdi-pencil"></i></span> </button>' +
             ' <button class="mb-1 btn btn-danger"'+' data-value='+'"' +data.role.id +'"'
            +' onclick="getRoleId(this)"' + '>'+
            ' <span><i class="mdi mdi-trash-can"></i></span> </button>' +
            '</td>';

        var $row = $('<tr id="sid'+data.role.id+'"' +'>' +
            '<td>' + data.role.id + '</td>' +
            '<td>' + data.role.name + '</td>' +
            '<td>' + '</td>' +
            tools +
            '</tr>');
        var rowPermission = '<span>No permission</span>';
        if (typeof data.role.permissions !== "undefined") {
            var array = data.role.permissions;
            array.forEach(function (item) {
                rowPermission = '<span class="badge badge-info">' + item.name + '</span>' + '  ';
                $row.find("td").eq(2).append(rowPermission);
            })
        } else {

            $row.find("td").eq(2).append(rowPermission);
        }
        $('table> tbody:last').append($row);
        $(".alert-highlighted span").text(data.success);
        $('.alert-highlighted').show();
        $('#overlay').hide();
        $('#exampleModal').modal('hide');
        $('.alert-highlighted').fadeOut(5000);
    },
    error: function (error){
        console.log(error);
        $.fn.handlerError(error);
      }
    })
    },1000)
    })
    let id;
    function getRoleId(item){
       id=  item.getAttribute("data-value");
        console.log(id);
        $.ajax({
            type: 'GET',
            catch: false,
            url: 'role/' + id + '/edit',
            data: {
                "_token": '{{csrf_token()}}',
            },
            success: function (data) {
                console.log(data.role);
                console.log(data.permissions);
                console.log(data.arrayRoleHasPermission);

              var html =
                  $('<div class="form-group">'+
                '<label for="name" class="col-form-label">Name</label> ' +
                '<input name="name" id="name" type="text" class="form-control" placeholder="role name" value='+'"'+data.role.name +'"'+'>'+
                   ' <div class="invalid-feedback name"></div>'+
           +' </div>'+
                  '<div class="form-group">'+
                  '<label>Permission</label>'
                  +'<div id="checkPermission" class="row">' +
                  '</div>'+
                  '</div>') ;


              if(data.role.name ==="Administrator"){
                    html += '<label>You have full permission!</label>';
              }else{
                  var roleHasPermission =data.permissions;

                  roleHasPermission.forEach(function (item) {
                      if(jQuery.inArray(item.id,data.arrayRoleHasPermission) !== -1 && jQuery.isArray(data.arrayRoleHasPermission)){
                          $row1 = '<div class="col-sm-4">'
                              + '<div class="form-group">'+
                              '<div class="form-check">'+

                              '<input   name="arrayIdPermission[]" type="checkbox" value='+'"'+
                              item.name+'"' + ' checked="checked"' +'>'
                              +   '<label class="control outlined control-checkbox">'+ item.name + '</label>'
                              +'</div>'
                              +'</div>'
                              +'</div>';
                          $(html).find("#checkPermission").append($row1);
                      }else{
                          $row = '<div class="col-sm-4">'
                              + '<div class="form-group">'+
                              '<div class="form-check">'+

                              '<input   name="arrayIdPermission[]" type="checkbox" value='+'"'+
                              item.name+'"' + '' +'>'
                              +   '<label class="control outlined control-checkbox">'+ item.name + '</label>'
                              +'</div>'
                              +'</div>'
                              +'</div>';
                          $(html).find("#checkPermission").append($row);
                      }

                  })

              }
            $('#form-role').append(html);

            },
            error: function (error){
                console.log(error);
            }
        })

    }

    function remove(){
        $('#form-role').children().remove();
    }

  </script>

@endsection

