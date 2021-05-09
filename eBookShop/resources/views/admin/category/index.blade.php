@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-5">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Thông tin</h2>
                </div>
                <div class="card-body slim-scroll p-0">
                    <div class="card-body">

                        <div id="accordion3" class="accordion accordion-bordered ">
                            <div class="card">
                                <div class="card-header col-12" id="heading1">
                                    <button class="btn btn-link col-9" data-toggle="collapse" data-target="#collapse1"
                                            aria-expanded="false" aria-controls="collapse1">
                                        Thê loại
                                    </button>
                                    @include('admin.category.iconsvg.plus',['parameter'=>'#exampleModal'])
                                </div>


                                <div id="collapse1" class="collapse show" aria-labelledby="heading1"
                                     data-parent="#accordion3">
                                    <div class="card-body">
                                        <ul id="treeview">
                                            {!! $html !!}
                                        </ul>
                                    </div>
                                </div>


                                <div class="card">
                                    <div class="card-header" id="heading2">
                                        <button class="btn btn-link collapsed  col-9" data-toggle="collapse"
                                                data-target="#collapse2" aria-expanded="false"
                                                aria-controls="collapse2">
                                            Tác giả
                                        </button>
                                        @include('admin.category.iconsvg.plus',['parameter'=>'#add-author'])
                                    </div>

                                    <div id="collapse2" class="collapse" aria-labelledby="heading2"
                                         data-parent="#accordion3">
                                        <div class="card-body">
                                            @include('admin.author.index')
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header" id="heading3">
                                        <button class="btn btn-link collapsed col-9" data-toggle="collapse"
                                                data-target="#collapse3" aria-expanded="false"
                                                aria-controls="collapse3">
                                            Nhà xuất bản
                                        </button>
                                        @include('admin.category.iconsvg.plus',['parameter'=>'#add_publisher'])
                                    </div>

                                    <div id="collapse3" class="collapse" aria-labelledby="heading3"
                                         data-parent="#accordion3">
                                        <div class="card-body">
                                            @include('admin.publisher.index')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-7 float-right">
            <div class="card card-default mb-4 mb-lg-5" data-scroll-height="389">
                <div class="card-header card-header-border-bottom">
                    <h2>Team Activity</h2>
                </div>

                <div class="card-body slim-scroll p-0">
                    <div class="media py-3 align-items-center justify-content-between border-bottom px-5">
                        <div
                            class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-primary text-white">
                            <i class="mdi mdi-cart-outline font-size-20"></i>
                        </div>
                        <div class="media-body pr-3">
                            <a class="mt-0 mb-1 font-size-15 text-dark" href="#">Emma Smith</a>
                            <p>Lorem ipsum dolor sit amet</p>
                        </div>

                        <span class=" font-size-12 d-inline-block"><i
                                class="mdi mdi-clock-outline"></i> 1 min ago</span>
                    </div>

                    <div class="media py-3 align-items-center justify-content-between border-bottom px-5">
                        <div
                            class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-success text-white">
                            <i class="mdi mdi-email-outline font-size-20"></i>
                        </div>
                        <div class="media-body pr-3">
                            <a class="mt-0 mb-1 font-size-15 text-dark" href="#">Sophia Amanda</a>
                            <p>Donec sit amet justo dignissim</p>
                        </div>
                        <span class=" font-size-12 d-inline-block"><i
                                class="mdi mdi-clock-outline"></i> 5 min ago</span>
                    </div>

                    <div class="media py-3 align-items-center justify-content-between border-bottom px-5">
                        <div
                            class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-warning text-white">
                            <i class="mdi mdi-stack-exchange font-size-20"></i>
                        </div>
                        <div class="media-body pr-3">
                            <a class="mt-0 mb-1 font-size-15 text-dark" href="#">Emily Disuja</a>
                            <p>At efficitur turpis hendrerit id</p>
                        </div>
                        <span class=" font-size-12 d-inline-block"><i
                                class="mdi mdi-clock-outline"></i> 1 day ago</span>
                    </div>

                    <div class="media py-3 align-items-center justify-content-between border-bottom px-5">
                        <div
                            class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-primary text-white">
                            <i class="mdi mdi-cart-outline font-size-20"></i>
                        </div>
                        <div class="media-body pr-3">
                            <a class="mt-0 mb-1 font-size-15 text-dark" href="#">William Camble</a>
                            <p>Lorem ipsum dolor sit amet</p>
                        </div>
                        <span class=" font-size-12 d-inline-block"><i
                                class="mdi mdi-clock-outline"></i> 10 AM</span>
                    </div>

                    <div class="media py-3 align-items-center justify-content-between border-bottom px-5">
                        <div
                            class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-info text-white">
                            <i class="mdi mdi-calendar-blank font-size-20"></i>
                        </div>
                        <div class="media-body pr-3">
                            <a class="mt-0 mb-1 font-size-15 text-dark" href="">Comapny Meetup</a>
                            <p>Donec sit amet justo dignissim</p>
                        </div>
                        <span class=" font-size-12 d-inline-block"><i
                                class="mdi mdi-clock-outline"></i> 10 AM</span>
                    </div>

                    <div class="media py-3 align-items-center justify-content-between border-bottom px-5">
                        <div
                            class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-warning text-white">
                            <i class="mdi mdi-stack-exchange font-size-20"></i>
                        </div>
                        <div class="media-body pr-3">
                            <a class="mt-0 mb-1 font-size-15 text-dark" href="#">Support Ticket</a>
                            <p>At efficitur turpis hendrerit id</p>
                        </div>
                        <span class=" font-size-12 d-inline-block"><i
                                class="mdi mdi-clock-outline"></i> 10 AM</span>
                    </div>

                    <div class="media py-3 align-items-center justify-content-between px-5">
                        <div
                            class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-success text-white">
                            <i class="mdi mdi-email-outline font-size-20"></i>
                        </div>
                        <div class="media-body pr-3">
                            <a class="mt-0 mb-1 font-size-15 text-dark" href="#">New Enquiry</a>
                            <p>Phileine has placed an new order</p>
                        </div>
                        <span class=" font-size-12 d-inline-block"><i class="mdi mdi-clock-outline"></i> 9 AM</span>
                    </div>
                </div>
                <div class="mt-3"></div>
            </div>
        </div>
    </div>

    @include('admin.category.addCategory')
    @include('admin.category.Edit')
    @include('admin.author.edit')
    @include('admin.author.add')
    @include('admin.publisher.add')
    @include('admin.publisher.edit')
@endsection
@section('script')



    <link rel="stylesheet" type="text/css"
          href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css"/>
    <script type="text/javascript"
            src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
    <script src="{{asset('fillparentCategory/fillparentCategory.js')}}"></script>
    <script src="{{asset('error-handler/exception.js')}}"></script>

    <script>
        $(document).ready(function () {
            $.fn.fill_parent_category();
            loadauthor();
            $('#tree-form').on('submit', function (event) {
                event.preventDefault();
                $.ajax({
                    url: "{{route('category.store')}}",
                    method: "POST",
                    data: {
                        "_token": '{{csrf_token()}}',
                        "name": $('#name').val(),
                        "parent_id": $('#parent_id').val(),
                    },
                    success: function (data) {
                        $('#exampleModal').hide();
                        $.fn.fill_parent_category();
                        $('#tree-form')[0].reset();
                        $(".alert-highlighted").removeClass('alert-danger');
                        $(".alert-highlighted").addClass('alert-success');
                        $('.alert-highlighted').text('Thêm thể loại thành công');
                        $('.alert-highlighted').show();
                        $('.alert-highlighted').fadeOut(5000);
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    },
                    error: function (error) {
                        console.log(error);
                        $.fn.handlerError(error);
                    }
                })
            });
        });

        $('#btn-update-category').click(function (e) {
            e.preventDefault();
            $.ajax({
                url: 'category/update',
                method: "PATCH",
                data: $('#tree-form_update').serialize(),
                success: function (data) {

                    $result = data.result;
                    if ($result !== 'error') {
                        $('#exampleModal1').hide();
                        $(".alert-highlighted").removeClass('alert-danger');
                        $(".alert-highlighted").addClass('alert-success');
                        $('.alert-highlighted').text('Cập nhật thành công');
                        $('.alert-highlighted').show();
                        //  $('.alert-highlighted').fadeOut(5000);
                        location.reload();
                    } else {
                        $('#exampleModal1').hide()
                        setTimeout(function () {
                            $('#exampleModal1').show()
                        }, 2000)
                        $('.alert-highlighted').removeClass('alert-success');
                        $('.alert-highlighted').addClass('alert-highlighted');
                        $('.alert-highlighted').text('Tồn tài tên loại , kiểm tra lại!');
                        $('.alert-highlighted').show();
                        $('.alert-highlighted').fadeOut(5000);

                    }
                },
                error: function (error) {
                    console.log(error);
                }

            })
        });


        $('#btn-delete-category').click(function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure delete role ?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#29CC97',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        url: 'category/destroy',
                        method: "DELETE",
                        data: $('#tree-form_update').serialize(),

                        success: function (data) {
                            $result = data.result;

                            if ($result !== 'error') {

                                $('#exampleModal1').hide();
                                $(".alert-highlighted").removeClass('alert-danger');
                                $(".alert-highlighted").addClass('alert-success');
                                $('.alert-highlighted span').text('Xoá thành công');
                                $('.alert-highlighted').show();
                                $('.alert-highlighted').fadeOut(5000);
                                setTimeout(function () {
                                    location.reload();
                                }, 1000)

                            } else {
                                console.log($result);

                                $('#exampleModal1').hide()
                                setTimeout(function () {
                                    $('#exampleModal1').show()
                                }, 2000)
                                $(".alert-highlighted").removeClass('alert-success');
                                $(".alert-highlighted").addClass('alert-danger');
                                $(".alert-highlighted span").text("Không thể xoá");
                                $('.alert-highlighted').show();
                                $('.alert-highlighted').fadeOut(5000);
                            }
                        },
                        error: function (error) {
                            console.log(error);
                        }
                    })
                }
            })
        })


        function formatText() {

            var text = $('#parent_id option:selected').text();
            console.log(text);
            var splitstr = text.split(/\s{4}/);

            var index = (splitstr.length) - 1;

            var category = splitstr[index];
            //  console.log(category);
//            getCategory(category);
            //   $('#parent_id').html(category);
        }

        function getCategory(text) {
            console.log(text);
            //document.getElementById('parent_id').value = text;
            $('#parent_id').val(text);
        }


        function myText(edit) {
            clear_option();
            $.fn.fill_parent_category();
            console.log(edit.getAttribute('data-value'));
            $('#name_update').val(edit.getAttribute('data-value'));
            $('#idCategory').val(edit.value);
            $('#parent_id option').appendTo("#parent_id_update");
            $('#parent_id_update option:selected').html(edit.name);
            $("select[id=parent_id_update] option:last").remove();
        }

        function clear_option() {
            $('#parent_id_update').children().remove();
        }

        function getID(item) {
            id = item.getAttribute('data-value');
        }

        // Author
        function loadauthor() {
            $.ajax({
                type: 'GET',
                url: '{{route('author.index')}}',
                cache: false,
                success: function (data) {
                    $(".listAuthor").empty();
                    for (i in data) {
                        var result = Object.keys(data[i]).map( (key)=> {
                            return [key, data[i][key]];
                        });
                        console.log(result);
                        var html = '<li class="col-12 divAuthor"><a href="" class="col-10">' + data[i]['full_name'] + '</a>' +
                            '<button class="col-2" data-toggle="modal"'
                            + 'data-target="#edit-author" id="btn-author-edit" onclick="bind_Author(\''+result+'\')">'
                           +'<i class="mdi mdi-account-edit"></i></button></li>';

                        $(".listAuthor").append(html)
                    //    console.log(Object.values(data[i]));
                    }
                },
                error: function (error) {

                    console.log(error)
                }
            })
        }

        $('#btn-add-author').click(function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '{{route('author.store')}}',
                data: $("#form-add-author").serialize(),
                cache: false,
                success: function (data) {
                    loadauthor();
                    $('#add-author').modal('hide');
                    $(".alert-highlighted").removeClass('alert-danger');
                    $(".alert-highlighted").addClass('alert-success');
                    $('.alert-highlighted').text('Thêm thành công');
                    $('.alert-highlighted').show();
                    $('.alert-highlighted').fadeOut(5000);
                    console.log(data)
                },
                error: function (error) {
                    console.log(error)
                    $.fn.handlerError(error);
                }
            })
        })
        function bind_Author(result) {
            console.log(result);
                var data = result.split(',');
                var  Author ={};
                Author.id =data[1];
                Author.firstName =data[3];
                Author.lastName = data[5];
                 $('#lastname_edit_author').val(Author.lastName);
                 $('#firstname_edit_author').val(Author.firstName);
                 $('#idAuthor').val(Author.id);
        }
        $("#btn-edit-author").click(function (e){
            e.preventDefault();
            $.ajax({
                type:'PATCH',
                url:'author/update',
                data:$("#edit_author").serialize(),
                success:function (data){
                    loadauthor();
                    $('#edit-author').modal('hide');
                    $(".alert-highlighted").removeClass('alert-danger');
                    $(".alert-highlighted").addClass('alert-success');
                    $('.alert-highlighted').text(data.result);
                    $('.alert-highlighted').show();
                    $('.alert-highlighted').fadeOut(5000);
                }
            })
        });
        $('#btn-delete-author').click(function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Bạn có chắc chắn sẽ xoá ?',
                text: "Sẽ không phục hồi !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#29CC97',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng ý, xoá!'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        url: 'author/destroy',
                        method: "DELETE",
                        data: $('#edit_author').serialize(),

                        success: function (data) {
                            $result = data.result;
                            if ($result !== 'error') {
                                loadauthor();
                                $('#edit-author').modal('hide');
                                $(".alert-highlighted").removeClass('alert-danger');
                                $(".alert-highlighted").addClass('alert-success');
                                $('.alert-highlighted span').text('Xoá thành công');
                                $('.alert-highlighted').show();
                                $('.alert-highlighted').fadeOut(5000);
                            } else {

                                $('#edit-author').modal('hide');
                                setTimeout(function () {
                                    $('#edit-author').show()
                                }, 2000)
                                $(".alert-highlighted").removeClass('alert-success');
                                $(".alert-highlighted").addClass('alert-danger');
                                $(".alert-highlighted span").text("Không thể xoá");
                                $('.alert-highlighted').show();
                                $('.alert-highlighted').fadeOut(5000);
                            }
                        },
                        error: function (error) {
                            console.log(error);
                        }
                    })
                }
            })
        });

        //publisher
        loadPublisher();
        function loadPublisher() {
            $.ajax({
                type: 'GET',
                url: '{{route('publisher.index')}}',
                cache: false,
                success: function (data) {
                    $(".listPublisher").empty();
                    for (i in data) {

                        console.log(data)

                        var result = Object.keys(data[i]).map( (key)=> {
                            return [key, data[i][key]];
                        });
                        console.log(result);
                        var html = '<li class="col-12 divAuthor"><a href="" class="col-10">' + data[i]['name'] + '</a>' +
                            '<button class="col-2" data-toggle="modal"'
                            + 'data-target="#edit_publisher" id="btn-publisher-edit" onclick="bind_Publisher(\''+result+'\')">'
                            +'<i class="mdi mdi-account-edit"></i></button></li>';
                        $(".listPublisher").append(html)
                    }
                },
                error: function (error) {
                    console.log(error)
                }
            });
        }

        $('#btn-add-publisher').click(function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '{{route('publisher.store')}}',
                data: $("#form-add-publisher").serialize(),
                cache: false,
                success: function (data) {
                    loadPublisher();
                    $result = data.result;
                    if ($result === 'success'){
                        loadPublisher();
                        $('#add_publisher').modal('hide');
                        $(".alert-highlighted").removeClass('alert-danger');
                        $(".alert-highlighted").addClass('alert-success');
                        $('.alert-highlighted').text('Thêm thành công');
                        $('.alert-highlighted').show();
                        $('.alert-highlighted').fadeOut(5000);
                    }else {
                        $("#add_publisher").hide();
                        setTimeout(function () {
                            $('#add_publisher').show()
                        }, 2000)
                        $(".alert-highlighted").removeClass('alert-success');
                        $(".alert-highlighted").addClass('alert-danger');
                        $(".alert-highlighted span").text("Tên đã tồn tại");
                        $('.alert-highlighted').show();
                        $('.alert-highlighted').fadeOut(5000);
                    }

                },
                error: function (error) {
                    console.log(error)
                    $.fn.handlerError(error);
                }
            })
        })
        function bind_Publisher(result) {
            console.log(result);
            var data = result.split(',');
            var  Publisher ={};
            Publisher.id =data[1];
            Publisher.name =data[3];

            $('#edit_name_publisher').val( Publisher.name);
            $('#idPublisher').val(Publisher.id);
        }

        $('#btn_update_publisher').click(function (e){
            e.preventDefault();
            $.ajax({
                url:'publisher/update',
                type:'PATCH',
                cache: false,
                data: $("#form_update_publisher").serialize(),
                success:function (data){
                   loadPublisher();
                   $result = data.result;
                   if ($result ==='success'){
                       $('#edit_publisher').modal('hide');
                       $(".alert-highlighted").removeClass('alert-danger');
                       $(".alert-highlighted").addClass('alert-success');
                       $('.alert-highlighted').text('Cập nhật thành công');
                       $('.alert-highlighted').show();
                       $('.alert-highlighted').fadeOut(5000);
                   }else {
                       $("#edit_publisher").hide();
                       setTimeout(function () {
                           $('#edit_publisher').show()
                       }, 2000)
                       $(".alert-highlighted").removeClass('alert-success');
                       $(".alert-highlighted").addClass('alert-danger');
                       $(".alert-highlighted span").text("Kiểm tra lại thông tin");
                       $('.alert-highlighted').show();
                       $('.alert-highlighted').fadeOut(5000);
                   }
               }
            });
        });
        $('#btn_delete_publisher').click(function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Bạn có chắc chắn sẽ xoá ?',
                text: "Sẽ không phục hồi !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#29CC97',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng ý, xoá!'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        url: '{{route('publisher.destroy')}}',
                        method: "DELETE",
                        data: $('#form_update_publisher').serialize(),
                        success: function (data) {
                            $result = data.result;
                            if ($result !== 'error') {
                                loadPublisher();
                                $('#edit_publisher').modal('hide');
                                $(".alert-highlighted").removeClass('alert-danger');
                                $(".alert-highlighted").addClass('alert-success');
                                $('.alert-highlighted span').text('Xoá thành công');
                                $('.alert-highlighted').show();
                                $('.alert-highlighted').fadeOut(5000);
                            } else {

                                $('#edit_publisher').modal('hide');
                                setTimeout(function () {
                                    $('#edit_publisher').show()
                                }, 2000)
                                $(".alert-highlighted").removeClass('alert-success');
                                $(".alert-highlighted").addClass('alert-danger');
                                $(".alert-highlighted span").text("Không thể xoá");
                                $('.alert-highlighted').show();
                                $('.alert-highlighted').fadeOut(5000);
                            }
                        },
                        error: function (error) {
                            console.log(error);
                        }
                    })
                }
            })
        });


    </script>

    <script type="text/javascript">
        jQuery(function ($) {
            $("#treeview").shieldTreeView();
        });

    </script>
@endsection




