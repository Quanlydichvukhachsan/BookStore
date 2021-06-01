@extends('app.home')

@section('content')
    <div class="container">
    <div class="sec-maker-header text-center">
        <h3 class="sec-maker-h3">BOOKS</h3>
        <ul class="nav tab-nav-style-1-a justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#men-latest-products">Latest Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#men-best-selling-products">Best Selling</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#men-top-rating-products">Top Rating</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#men-featured-products">Featured Products</a>
            </li>
        </ul>
    </div>
        <div class="wrapper-content">
            <div class="outer-area-tab">
                <div class="tab-content">
                    <div class="tab-pane active show fade" id="men-latest-products">
                        <div class="slider-fouc">
                            <div class="products-slider owl-carousel" data-item="4">
                                      @foreach($products->getListBook() as $item)
                                    <div class="item">
                                        <div class="image-container">
                                            <a class="item-img-wrapper-link" href="single-product.html">
                                                <img src="{{$item->getImages()}}" alt="img-{{$item->getTitle()}}">
                                            </a>
                                            <div class="item-action-behaviors">
                                                <a class="item-quick-look" data-nameCategory="{{$item->getCategory()}}" data-categoryId="{{$item->getIdCategory()}}" data-id="{{$item->getId()}}" data-value="{{$item->getTitle()}}" onclick="setValueQuickView(this)" data-toggle="modal" href="#quick-view">Quick Look
                                                </a>
                                                <a class="item-mail" href="javascript:void(0)">Mail</a>
                                                <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist</a>
                                                <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <div class="what-product-is">
                                                <ul class="bread-crumb">
                                                    <li class="has-separator">
                                                        <a href="shop-v1-root-category.html">Sản phẩm</a>
                                                    </li>
                                                    <li class="is-marked">
                                                        <a class="ids{{$item->getIdCategory()}}" href='http://127.0.0.1:8000/product/{{$item->getCategorySlug()}}/{{$item->getIdCategory()}}'>{{$item->getCategory()}}</a>
                                                    </li>
                                                </ul>
                                                <h6 class="item-title">
                                                    <a href="{{route('home.productDetail',[$item->getTitle(),$item->getId()])}}">{{$item->getTitle()}}</a>
                                                </h6>
                                                <div class="item-stars">
                                                    <div class='star' title="0 out of 5 - based on 0 Reviews">
                                                        <span style='width:0'></span>
                                                    </div>
                                                    <span>(0)</span>
                                                </div>
                                            </div>
                                            <div class="price-template">
                                                <div class="item-new-price">
                                                    {{$item->getPrice()}} đ
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tag new">
                                            <span>NEW</span>
                                        </div>
                                    </div>
                              @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--<ul class="pagination">--}}
{{--    <!-- Array Of Links -->--}}
{{--    <li class="page-item"><a class="page-link" href="http://127.0.0.1:8000/home?page=1">1</a></li>--}}
{{--    <li class="page-item"><a class="page-link" href="http://127.0.0.1:8000/home?page=2">2</a></li>--}}
{{--    <li class="page-item"><a class="page-link" href="http://127.0.0.1:8000/home?page=3">3</a></li>--}}
{{--    <!-- Next Page Link -->--}}
{{--    <li class="page-item"><a class="page-link" href="http://127.0.0.1:8000/home?page=2" rel="next">&raquo;</a></li>--}}
{{--</ul>--}}


@endsection
@section('script')
    <script>
        window.onload = function() {
            // adding data to localstorage
            const attToCartBtn = document.getElementsByClassName('attToCart');
            let items = [];
            for(let i=0; i<attToCartBtn.length; i++){
                attToCartBtn[i].addEventListener("click",function(e){
                    e.preventDefault();

                    if(typeof(Storage) !== 'undefined'){
                        let item = {
                            id:this.getAttribute('data-value'),
                            name:e.target.parentElement.children[1].textContent,
                            price:e.target.parentElement.children[0].textContent.replace('đ',''),
                            author:this.getAttribute('data-author'),
                            img :this.getAttribute('data-img'),
                            no:1
                        };
                        if(JSON.parse(localStorage.getItem('items')) === null){
                            items.push(item);
                            localStorage.setItem("items",JSON.stringify(items));
                            window.location.reload();
                        }else{
                            const localItems = JSON.parse(localStorage.getItem("items"));
                            localItems.map(data=>{
                                if(item.id == data.id){
                                    item.no = data.no + 1;
                                }else{
                                    items.push(data);
                                }
                            });
                            items.push(item);
                            localStorage.setItem('items',JSON.stringify(items));
                           window.location.reload();
                        }

                    }else{
                        alert('local storage is not working on your browser');
                    }

                });
            }
            // adding data to shopping cart
            const iconShoppingP = document.querySelector('.notification span');
            let no = 0;
            JSON.parse(localStorage.getItem('items')).map(data=>{
                no = no+data.no
                ;	});
            iconShoppingP.innerHTML = no;

        }
        function setValueQuickView(item){
            $id= item.getAttribute('data-id');
            $title = item.getAttribute('data-value');
            var categoryId = item.getAttribute('data-categoryId');
            var nameCategory = item.getAttribute('data-nameCategory');
            $.ajax({
                method :"GET",
                url: '/home/'+$title + '/'+$id,
                contentType: "application/json",
                dataType: "json",
                success: function(data) {
                    clearDataBookDetail();
                   $('.description-book').append(data[0]);
                    $('.price h4').append(data[1] + "đ");
                    if(data[6].localeCompare("Hard Cover")){
                        $('.formality').append("Bìa cứng");
                    }else {
                        $('.formality').append("Bìa mềm");
                    }
                    $('.book-author').append(data[7]);
                    $('.book-publisher').append(data[8]);
                    var href = $('.ids'+categoryId).attr('href');
                    $('.category-root').attr('href',href);
                    $('.category-root').append(nameCategory);
                    var $img;
                   $img = '<img id="zoom-pro-quick-view" class="img-fluid" src="'+data[9][0]+'" data-zoom-image="images/product/product@4x.jpg" alt="Zoom Image">';
                   $imgZoom =  '<div id="gallery-quick-view" class="u-s-m-t-10">';
                    $img +=$imgZoom;
                    for (var i = 0; i < data[9].length; i++) {
                        var $html;
                        if(i===0){

                            $html =  '<a id="img-book" onclick="active(this)" class="active" data-image="'+data[9][0]+'" data-zoom-image="'+data[9][0]+'">'+
                                '<img src="'+data[9][0]+'" alt="Product">'+
                                '</a>';
                            $img +=$html;
                        }else{
                            $html =   '<a id="img-book" onclick="active(this)"  data-image="'+data[9][i]+'" data-zoom-image="'+data[9][i]+'">'+
                                '<img  src="'+data[9][i]+'" alt="Product">'+
                                '</a>';
                            $img +=$html;
                        }
                    }
                     $img += '</div>';
                       $('.zoom-area').append($img);

                    if(Math.round(parseInt(data[5])) !== 0){
                        $('.original-price').append('<span> Giá gốc : </span>' );
                        $('.original-price').append( '<span>'+ data[4] + '</span>');
                        $('.discount-price').append('<span> Giảm giá : </span>' );
                        $('.discount-price').append( Math.round(parseInt(data[5])) + '%');
                    }

                    console.log(data);
                }
            });
        }
        function clearDataBookDetail(){
            $('.description-book').text("");
            $('.price h4').text("");
            $('.original-price').text("");
            $('.discount-price').text("");
            $('.formality').text("");
            $('.book-author').text("");
            $('.book-publisher').text("");
            $('.book-publisher').text("");
            $('.zoom-area').text("");
            $('.category-root').text("");
        }
        function active(item){
             $('.zoom-area').find('.active').removeClass("active");
             $src = item.childNodes[0].getAttribute('src');
             $(item).addClass('active');
            $('#zoom-pro-quick-view').attr('src',$src);
        }
    </script>
@endsection
