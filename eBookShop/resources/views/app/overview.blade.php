@extends('app.home')

@section('sidebar')
     @include('app.sidebarOverview')
@endsection
@section('content')
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

                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content item-info">
                                <h2>{{$item->getPrice()}}đ</h2>
                                <p>{{$item->getTitle()}}</p>
                                <input type="hidden" value="{{$item->getId()}}">
                                <a data-img="{{$item->getImages()}}" data-author="{{$item->getAuthor()}}" data-value="{{$item->getId()}}" class="btn btn-default add-to-cart attToCart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
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
@endsection
@section('script')
    <script>
        window.onload = function() {
            // adding data to localstorage
            const attToCartBtn = document.getElementsByClassName('attToCart');
            console.log(attToCartBtn);
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


    </script>
@endsection
