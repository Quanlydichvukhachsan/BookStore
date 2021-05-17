@extends('app.home')

@section('sidebar')
    @include('app.sidebarProduct')
@endsection
@section('content')
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Mục Sản Phẩm</h2>
        @if(count($products->getListBook()))
        @foreach($products->getListBook() as $item)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{$item->getImages()}}" alt="img-{{$item->getTitle()}}" />
                            <h2>{{$item->getPrice()}} đ</h2>
                            <p>{{$item->getTitle()}}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>{{$item->getPrice()}} đ</h2>
                                <p>{{$item->getTitle()}}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
                            </div>
                        </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href=""><i class="fa fa-plus-square"></i>Thêm Vào Danh Sách Yêu Thích</a></li>

                        </ul>
                    </div>
                </div>
            </div>

        @endforeach
            <ul class="pagination">
                <li class="active"><a href="">1</a></li>
                <li><a href="">2</a></li>
                <li><a href="">3</a></li>
                <li><a href="">&raquo;</a></li>
            </ul>
        @else
             <div class="content-404">
                 <p>Sản phẩm không có</p>
             </div>

          @endif

    </div><!--features_items-->
@endsection
@section('script')
    <script>
        function removeVietnameseTones(str) {
            str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");
            str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");
            str = str.replace(/ì|í|ị|ỉ|ĩ/g,"i");
            str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");
            str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");
            str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");
            str = str.replace(/đ/g,"d");
            str = str.replace(/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/g, "A");
            str = str.replace(/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/g, "E");
            str = str.replace(/Ì|Í|Ị|Ỉ|Ĩ/g, "I");
            str = str.replace(/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/g, "O");
            str = str.replace(/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/g, "U");
            str = str.replace(/Ỳ|Ý|Ỵ|Ỷ|Ỹ/g, "Y");
            str = str.replace(/Đ/g, "D");
            // Some system encode vietnamese combining accent as individual utf-8 characters
            // Một vài bộ encode coi các dấu mũ, dấu chữ như một kí tự riêng biệt nên thêm hai dòng này
            str = str.replace(/\u0300|\u0301|\u0303|\u0309|\u0323/g, ""); // ̀ ́ ̃ ̉ ̣  huyền, sắc, ngã, hỏi, nặng
            str = str.replace(/\u02C6|\u0306|\u031B/g, ""); // ˆ ̆ ̛  Â, Ê, Ă, Ơ, Ư
            // Remove extra spaces
            // Bỏ các khoảng trắng liền nhau
            str = str.replace(/ + /g," ");
            str = str.trim();
            // Remove punctuations
            // Bỏ dấu câu, kí tự đặc biệt
            str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'|\"|\&|\#|\[|\]|~|\$|_|`|-|{|}|\||\\/g," ");
            return str;
        }
        function cleanArray(actual) {
            var newArray = new Array();
            for (var i = 0; i < actual.length; i++) {
                if (actual[i]) {
                    newArray.push(actual[i]);
                }
            }
            return newArray;
        }
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

        $('a#category').click(function(event) {
            event.preventDefault();
            var href;
            var id =$(this).attr('data-value');
            var name =$(this).attr('data-name');
            var nameSort =$(this).attr('data-sort');
            var type =$(this).attr('data-type');
            if(type === "sort"){
                href  = '/product/'+name+'/' +id +'?sort=' +nameSort;
            }else if(type === "sortname"){
                href  = '/product/'+name+'/' +id +'?sortname=' +nameSort;
            }else if(type === "sortFormality"){
                href  = '/product/'+name+'/' +id +'?sortFormality=' +nameSort;
            }
            else{
                href  = '/product/'+name+'/' +id;
            }
            console.log(href);
            $overlay.appendTo("body");
            $('#overlay').show();
            setTimeout(function (){
                $.ajax({
                    method :"GET",
                    url: href,
                    success: function(data) {
                        $(".features_items").html("");
                        var html ='<h2 class="title text-center">Mục Sản Phẩm</h2>';
                        html +=data;
                        $(".features_items").append(html);
                        $('#overlay').hide();
                        window.history.pushState("", "", href);

                    }
                });
            },500);
            return false;
        });


    </script>
@endsection
