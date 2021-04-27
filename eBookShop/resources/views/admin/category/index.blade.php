@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-4">
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
                                    @include('admin.category.iconsvg.plus')
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
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                                data-target="#collapse2" aria-expanded="false"
                                                aria-controls="collapse2">
                                            Tác giả
                                        </button>
                                    </div>

                                    <div id="collapse2" class="collapse" aria-labelledby="heading2"
                                         data-parent="#accordion3">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod
                                            tempor
                                            incididunt ut labore et dolore magna aliqua.enim
                                            ad minim veniam quis nostrud exer citation ullamco laboris nisi ut aliquip
                                            ex ea
                                            commodo consequat duis aute.
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header" id="heading3">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                                data-target="#collapse3" aria-expanded="false"
                                                aria-controls="collapse3">
                                            Hat Black Suits
                                        </button>
                                    </div>

                                    <div id="collapse3" class="collapse" aria-labelledby="heading3"
                                         data-parent="#accordion3">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod
                                            tempor
                                            incididunt ut labore et dolore magna aliqua.enim
                                            ad minim veniam quis nostrud exer citation ullamco laboris nisi ut aliquip
                                            ex ea
                                            commodo consequat duis aute.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-8 float-right">
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

@endsection
@section('script')



    <link rel="stylesheet" type="text/css"
          href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css"/>
    <script type="text/javascript"
            src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
    <script src="{{asset('fillparentCategory/fillparentCategory.js')}}"></script>
    <script src="{{asset('fillparentCategory/fill_parent_category_update.js')}}"></script>
    <script>
        $(document).ready(function () {

            $.fn.fill_parent_category();
            $.fn.fill_parent_category_update();
            //  fill_treeviews();

            {{--function fill_treeviews() {--}}
            {{--    $.ajax({--}}
            {{--        url: "{{route('category.index')}}",--}}
            {{--        dataType: "json",--}}
            {{--        success: function (data) {--}}

            {{--            data:data;--}}
            {{--        }--}}
            {{--    })--}}
            {{--}--}}

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
                        fill_treeviews();
                        $.fn.fill_parent_category();
                        $('#tree-form')[0].reset();

                        console.log(data.success);
                        alert(data);
                    },
                    error: function (error) {
                        console.log(error);
                        $.fn.handlerError(error);
                    }
                })
            });
        });

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
        function myText(edit){
            $.fn.fill_parent_category_update();
            id = edit.value;
            edit.na
            console.log(id);
            <?php


            ?>

        }


    </script>
    <script type="text/javascript">
        jQuery(function ($) {
            $("#treeview").shieldTreeView();

        });

    </script>
@endsection



