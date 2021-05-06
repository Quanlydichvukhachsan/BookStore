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
                                            aria-expanded="true" aria-controls="collapse1">
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
                                        @include('admin.category.iconsvg.plus',['parameter'=>'#exampleModal'])
                                    </div>

                                    <div id="collapse3" class="collapse" aria-labelledby="heading3"
                                         data-parent="#accordion3">
                                        <div class="card-body">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">First</th>
                                                    <th scope="col">Last</th>
                                                    <th scope="col">Handle</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                <tr class="table-secondary">
                                                    <td scope="row">1</td>
                                                    <td>Lucia</td>
                                                    <td>Christ</td>
                                                    <td>@Lucia</td>
                                                </tr>

                                                <tr class="table-primary">
                                                    <td scope="row">2</td>
                                                    <td>Catrin</td>
                                                    <td>Seidl</td>
                                                    <td>@catrin</td>
                                                </tr>

                                                <tr class="table-info">
                                                    <td scope="row">3</td>
                                                    <td>Lilli</td>
                                                    <td>Kirsh</td>
                                                    <td>@lilli</td>
                                                </tr>

                                                <tr class="table-success">
                                                    <td scope="row">4</td>
                                                    <td>Else</td>
                                                    <td>Voigt</td>
                                                    <td>@voigt</td>
                                                </tr>

                                                <tr class="table-danger">
                                                    <td scope="row">5</td>
                                                    <td>Ursel</td>
                                                    <td>Harms</td>
                                                    <td>@ursel</td>
                                                </tr>

                                                <tr class="table-warning">
                                                    <td scope="row">6</td>
                                                    <td>Anke</td>
                                                    <td>Sauter</td>
                                                    <td>@Anke</td>
                                                </tr>
                                                </tbody>
                                            </table>
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
                                 setTimeout(function (){
                                location.reload();
                                },1000)

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
            //   var id =  $('#parent_id option:selected').val(splitstr[index]);
            //  var category =  $('#parent_id option:selected').val(splitstr[index]);
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

        $.ajax({
            type:'GET',
            url:'{{route('author.index')}}',
            cache:false,
            success: function (data){
                console.log(data);
            }
        })

    </script>
    <script type="text/javascript">
        jQuery(function ($) {
            $("#treeview").shieldTreeView();
        });

    </script>
@endsection




