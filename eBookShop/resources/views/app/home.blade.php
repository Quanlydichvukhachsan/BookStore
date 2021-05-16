<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Shop | E-Shopper</title>
    <link href={{asset("assets/webApp/css/bootstrap.min.css")}} rel="stylesheet">
    <link href={{asset("assets/webApp/css/font-awesome.min.css")}} rel="stylesheet">
    <link href={{asset("assets/webApp/css/prettyPhoto.css")}} rel="stylesheet">
    <link href={{asset("assets/webApp/css/price-range.css")}} rel="stylesheet">
    <link href={{asset("assets/webApp/css/animate.css")}} rel="stylesheet">
    <link href={{asset("assets/webApp/css/main.css")}} rel="stylesheet">
    <link href={{asset("assets/webApp/css/responsive.css")}} rel="stylesheet">
    <link href={{asset("assets/webApp/css/style.css")}} rel="stylesheet">
</head><!--/head-->

<body>
<header id="header"><!--header-->
    <nav>
        <div class="container">
            <div class="row">
                <ul class="navbar-nav pull-left">
                    <li ><a href="" class="nav-link"><i class="fa fa-phone"></i> +0 95 01 88 821</a></li>
                    <li ><a href="" class="nav-link"><i class="fa fa-envelope"></i> info@gmail.com</a></li>
                </ul>
            </div>
        </div>
        <div class="container">
            <ul class="navbar-nav pull-right">
                <li class="nav-item active"><i class="fa fa-user"></i> <a href="#" class="nav-link"> Home </a> </li>
                <li class="nav-item"><i class="fa fa-star"></i> <a href="#" class="nav-link"> Account </a> </li>
                <li class="nav-item"><i class="fa fa-crosshairs"></i> <a href="#" class="nav-link"> Wishlist </a> </li>
                <li class="nav-item"><i class="fa fa-shopping-cart"></i> <a href="#" class="nav-link"> Cart </a> </li>
                <li class="nav-item"><i class="fa fa-lock"></i> <a href="#" class="nav-link"> Login </a> </li>
            </ul>
        </div>
    </nav>
</header>

<section class="show-sticky" id="advertisement">

</section>

<section class="sidebar-category">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
               @include('app.layouts.sidebar')
            </div>

            <div class="col-sm-9 padding-right product">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Mục Sản Phẩm</h2>
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
                </div><!--features_items-->

            </div>



        </div>
    </div>
</section>

<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2><span>THT</span>Store</h2>
                        <p>THT Store com nhận đặt hàng trực tuyến và giao hàng tận nơi. KHÔNG hỗ trợ đặt mua và nhận hàng trực tiếp tại văn phòng cũng như tất cả Hệ Thống Fahasa trên toàn quốc.</p>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="address">
                        <img src="images/home/map.png" alt="" />
                        <p>70 Phù đổng thiên vương, Đà Lạt, Lâm đồng VN(VietNam)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Service</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="">Online Help</a></li>
                            <li><a href="">Contact Us</a></li>
                            <li><a href="">Order Status</a></li>
                            <li><a href="">Change Location</a></li>
                            <li><a href="">FAQ’s</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Quock Shop</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="">Literature Book</a></li>
                            <li><a href="">Children's books</a></li>
                            <li><a href="">History - Geography - Religion</a></li>
                            <li><a href="">Economy</a></li>
                            <li><a href="">Foreign language books</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Policies</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="">Terms of Use</a></li>
                            <li><a href="">Privecy Policy</a></li>
                            <li><a href="">Refund Policy</a></li>
                            <li><a href="">Billing System</a></li>
                            <li><a href="">Ticket System</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>About Shopper</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="">Github</a></li>
                            <li><a href="">FaceBook</a></li>
                            <li><a href="">Instagram</a></li>
                            <li><a href="">TwitTer</a></li>
                            <li><a href="">THTStore</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>About Shopper</h2>
                        <form action="#" class="searchform">
                            <input type="text" placeholder="Your email address" />
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                            <p>Get the most recent updates from <br />our site and be updated your self...</p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
                <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->


<script src={{asset("assets/webApp/js/jquery.js")}}></script>
<script src={{asset("assets/webApp/js/price-range.js")}}></script>
<script src={{asset("assets/webApp/js/jquery.scrollUp.min.js")}}></script>
<script src={{asset("assets/webApp/js/bootstrap.min.js")}}></script>
<script src={{asset("assets/webApp/js/jquery.prettyPhoto.js")}}></script>
<script src={{asset("assets/webApp/js/main.js")}}></script>
<script src={{asset("assets/webApp/js/jquery.waypoints.min.js")}}></script>
<script src={{asset("assets/webApp/js/script.js")}}></script>

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
          function getBookByCategory(id,title){
             var strTitle = removeVietnameseTones(title);
             var arraySplit =strTitle.split(' ');
             var arrClean = cleanArray(arraySplit);
             var name =  arrClean.join('-');
              console.log(name);
              console.log(id);
             $.ajax({
                  url: '/product/' + name +'/' +id,
                  method: 'GET',
                 catch: false,

              });
          }
</script>
</body>
</html>
