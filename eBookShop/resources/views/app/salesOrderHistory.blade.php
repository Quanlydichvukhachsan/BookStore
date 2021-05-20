@extends('app.home')

@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{route('home')}}"> Home </a></li>
                <li class="active">Sales order</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="image">Order Id</td>
                    <td class="name">Tên người nhận</td>
                    <td class="status">Trạng thái</td>
                    <td class="total">Tổng Tiền</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $order)
                <tr>
                    <td class="cart_total">
                        <p >MA{{$order->id}}</p>
                    </td>
                    <td class="cart_name">

                        <h4><a href="http://127.0.0.1:8000/sales/order/{{$order->id}}/customer/{{Auth::user()->id}}">{{$order->nameReceive}}</a></h4>
                    </td>
                    <td class="cart_status">
                        <p>{{$order->status}}</p>
                    </td>
                    <td class="cart_price">
                        <p>{{number_format($order->totalPriceFee, 0)}}đ</p>
                    </td>

                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

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


    </script>
@endsection

