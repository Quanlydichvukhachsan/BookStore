@extends('app.home')

@section('sidebar')
    @include('app.sidebarOverview')
@endsection
@section('content')
    <div class="col-sm-9 padding-right">
        <div class="product-details"><!--product-details-->
            <div class="col-sm-5">
                <div class="view-product">
                    <img  src="{{$productDetail->getListImages()[0]}}" alt="" />
                    <h3>ZOOM</h3>
                </div>
                <div id="similar-product" class="carousel slide" data-ride="carousel">

                    <!-- Wrapper for slides -->
                    @foreach($productDetail->getListImages() as $item)
                    <div class="carousel-inner">
                        <div class="item active">
                            <a href=""><img src="{{$item}}" alt="{{$item}}"></a>
                        </div>
                            <div class="item">
                                <a href=""><img src="{{$item}}" alt="{{$item}}"></a>
                            </div>
                    </div>
                @endforeach
                    <!-- Controls -->
                    <a class="left item-control" href="#similar-product" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="right item-control" href="#similar-product" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
            <div class="col-sm-7">
                <div class="product-information"><!--/product-information-->
                    <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                    <h2 class="title-book">{{$productDetail->getTitle()}}</h2>
                    <p>Nhà xuất bản: {{$productDetail->getPublisher()}}</p>
                    <span>
									<span class="price-book">{{$productDetail->getPrice()}} đ</span>
									<label>Quantity:</label>
									<input id="quantity-book" type="text" value="1"/>
									<button type="button" data-img="{{$productDetail->getListImages()[0]}}" data-author ="{{$productDetail->getAuthor()}}" data-value="{{$productDetail->getId()}}" class="btn btn-fefault cart attToCart">
										<i class="fa fa-shopping-cart"></i>
										Thêm Vào Giỏ
									</button>
								</span>
                    <p><b>Tác giả:</b>{{$productDetail->getAuthor()}}</p>
                    <p><b>Tình Trạng:</b> Mới</p>
                    <p><b>BookShop:</b> THT Store</p>
{{--                    <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>--}}
                </div><!--/product-information-->
            </div>
        </div><!--/product-details-->

        <div class="category-tab shop-details-tab"><!--category-tab-->
            <div class="col-sm-12">
                <ul class="nav nav-tabs">
                    <li><a href="#details" data-toggle="tab">Details</a></li>
                    <li><a href="#companyprofile" data-toggle="tab">Description</a></li>
                </ul>
            </div>

            <div class="tab-content">

                    <div class="tab-pane fade" id="details" >
                        <div class="table-responsive cart_info cartBox">
                            <table class="table table-condensed" id="table-cart">
                                <thead>
                                <tr class="cart_menu">
                                    <td></td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        Tác giả
                                    </td>
                                    <td>
                                        {{$productDetail->getAuthor()}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Nhà xuất bản
                                    </td>
                                    <td>
                                        {{$productDetail->getPublisher()}}
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        Trọng lượng (gr)
                                    </td>
                                    <td>
                                        {{$productDetail->getWeight()}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Số trang
                                    </td>
                                    <td>
                                        {{$productDetail->getNumber_of_pages()}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Hình thức
                                    </td>
                                    <td>
                                        @if($productDetail->getFormality() === "Hard Cover")
                                        Bìa cứng
                                        @else
                                            Bìa mềm
                                        @endif

                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                <div class="tab-pane fade" id="companyprofile" >
                        {!!  $productDetail->getDescribe() !!}
                </div>


            </div>
        </div><!--/category-tab-->

        <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center"> Các Danh Mục Được Đề Xuất</h2>

            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active">
                        @foreach($productDetail->getListBookAll() as $book)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{$book->getImages()}}" alt="" />
                                        <h2>{{$book->getPrice()}}</h2>
                                        <p><a  class="nav-item nav-product" href="{{route('home.productDetail',[$book->getTitleSlug(),$book->getId()])}}">{{$book->getTitle()}}</a></p>
                                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm Vào Giỏ</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <div class="item">

                    </div>
                </div>
                <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div><!--/recommended_items-->

    </div>
@endsection

@section('script')
    <script>
        window.onload = function() {
            // adding data to localstorage
            const attToCartBtn = document.getElementsByClassName('attToCart');
            const  title = $('.title-book').text();
             const  price =$('.price-book').text();
            let items = [];
            for(let i=0; i<attToCartBtn.length; i++){
                attToCartBtn[i].addEventListener("click",function(e){
                    e.preventDefault();

                    if(typeof(Storage) !== 'undefined'){
                        let item = {
                            id:this.getAttribute('data-value'),
                            name:title,
                            price:price.replace('đ',''),
                            author:this.getAttribute('data-author'),
                            img :this.getAttribute('data-img'),
                            no: parseInt($('#quantity-book').val())
                        };

                        if(JSON.parse(localStorage.getItem('items')) === null){
                            items.push(item);
                            localStorage.setItem("items",JSON.stringify(items));
                            window.location.reload();
                        }else{
                            const localItems = JSON.parse(localStorage.getItem("items"));
                            localItems.map(data=>{
                                if(item.id == data.id){
                                    item.no =Number(data.no) + parseInt($('#quantity-book').val());

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
                no = no+ parseInt(data.no);
                ;	});
            iconShoppingP.innerHTML = no;

        }

    </script>
@endsection
