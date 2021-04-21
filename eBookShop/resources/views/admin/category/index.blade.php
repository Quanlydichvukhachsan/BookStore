@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-xl-3">
            <div class="card card-default mb-4 mb-lg-5" data-scroll-height="389" id="card">

                <div class="card-header card-header-border-bottom">
                    <h2>Thể Loại</h2>
                </div>


                {{--                {!! $html !!}--}}
                {{--                <aside class="left-card bg-card">--}}

{{--                category--}}
                <div class="card-body slim-scroll p-0">
                    <div id="sidebar" class="sidebar">
                        <div class="col-12">

                            <ul class="nav sidebar-inner" id="sidebar-menu">
                                <cript class="has-sub">


                                    <div class="flex-row d-flex col-12">
                                        <div class="col-10">
                                            <a class="sidenav-item-link" style="color: #8a909d"
                                               href="javascript:void(0)" data-toggle="collapse"
                                               data-target="#category"
                                               aria-expanded="false" aria-controls="pages">
                                                <i class="mdi mdi-image-filter-none"></i>
                                                <span class="nav-text">Category</span> <b class="caret"></b>
                                            </a>
                                        </div>
                                        @include('admin.category.iconsvg.plus')
                                    </div>
                                </cript>
                                {!! $html !!}
                            </ul>
                        </div>

                    </div>

                </div>
{{----}}

                {{--                </aside>--}}


                <div class="mt-3"></div>
            </div>

        </div>


        <div class="col-xl-9 float-right">
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
                        <span class=" font-size-12 d-inline-block"><i class="mdi mdi-clock-outline"></i> 10 AM</span>
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
                        <span class=" font-size-12 d-inline-block"><i class="mdi mdi-clock-outline"></i> 10 AM</span>
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
                        <span class=" font-size-12 d-inline-block"><i class="mdi mdi-clock-outline"></i> 10 AM</span>
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


@endsection
@section('script')
    <script src="{{asset("error-handler/exception.js")}}"></script>
    <script src="{{asset("fillParentCategory/fillParentCategory.js")}}"></script>
    <script type="text/javascript">
        $("#demo").treeMultiselect({maxSelections: 1, sortable: true, searchable: true});

    </script>


    <script>

        $(document).ready(function(){
            fill_parent_category();
            formatText();
            $.fn.fill_parent_category(0,"--lựa chọn nhóm cha--");
            {{--function fill_parent_category()--}}
            {{--{--}}
            {{--    $.ajax({--}}
            {{--        url:'{{route('category.create')}}',--}}
            {{--        success:function(data){--}}
            {{--            $('#parent_id').html(data);--}}
            {{--        }--}}
            {{--    })--}}
            {{--}--}}

            $('#tree-form').on('submit',function (event){
                event.preventDefault();
                $.ajax({
                    url:"{{route('category.store')}}",
                    method:"POST",
                     data:{
                         "_token": '{{csrf_token()}}',
                         "name": $('#name').val(),
                         "parent_id":$('#parent_id').val()
                     },
                    success:function (data){
                        fill_parent_category();
                        $('#tree-form')[0].reset();
                        console.log(data.success);
                    },
                    error:function (error){
                        console.log(error);
                        $.fn.handlerError(error);
                    }

                })
            });


        });
        function formatText(){

            var id = $("#parent_id").val();
            console.log(id);
            var text= $('#parent_id option:selected').text();
            console.log(text);
            var splitstr = text.split(/\s{4}/);
            console.log(splitstr);
            var index =(splitstr.length)-1;
            $(`#parent_id option:selected[value=${id}]`).text(splitstr[index]);
            $.fn.fill_parent_category();

        }

    </script>

@endsection



