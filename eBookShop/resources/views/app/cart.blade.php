@extends('app.home')

@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info cartBox">
            <table class="table table-condensed" id="table-cart">
                <thead>
                <tr class="cart_menu">
                    <td class="image">Mục Sản Phẩm</td>
                    <td class="description"></td>
                    <td class="price">Giá</td>
                    <td class="quantity">Số Lượng</td>
                    <td class="total">Tổng Tiền</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
    <section id="do_action">
        <div class="container">
            <div class="heading">
                <p>Bạn phải đăng ký mới được thanh toán. </p>
            </div>
            <div class="row">
                <div class="col-sm-6">

                        <div class="col-md-6">
                            @if(!Auth::check())
                            <div class="login-form"><!--login form-->
                                <h2>Đăng nhập tài khoản</h2>
                                <form action="#">
                                    <input type="text" placeholder="Email" />
                                    <input type="email" placeholder="Mật khẩu" />
                                    <span>
								<input type="checkbox" class="checkbox">
								Lưu mật khẩu
							</span>
                                    <button type="submit" class="btn btn-default">Đăng nhập</button>
                                </form>
                            </div><!--/login form-->
                                @endif
                        </div>



                </div>
                <div class="col-sm-6">

                    <div class="total_area">

                        <ul class="total_price">
                            <li>Tổng Số Giỏ Hàng <span>1</span></li>
                            <li>Tổng Tiền <span>300.000 đ</span></li>
                        </ul>
                        <a class="btn btn-default update" href="{{route('cart.checkout')}}">Đặt Hàng</a>

                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->
@endsection




@section('script')
    <script>
        window.onload = function() {

            // adding data to shopping cart
            const iconShoppingP = document.querySelector('.notification span');
            let no = 0;
            let total =0;
            //update amount and quantity total
            JSON.parse(localStorage.getItem('items')).map(data=>{
                no = no+data.no;
                total = total + (parseFloat(data.price) * data.no);
                	});
            iconShoppingP.innerHTML = no;
            var formatSum = (total).toLocaleString(
                undefined,
                { minimumFractionDigits: 3 }
            );
            var  totalQuantity =$('.total_price li:first-child span').text("");
            totalQuantity.text(no);
         var totalPrice =   $('.total_price li:last-child span').text("");
           totalPrice.text(formatSum+' đ');

                //adding cartbox data in table
            const cartBox = document.querySelector('.cartBox');
            const cardBoxTable = cartBox.querySelector('tbody');
            let tableData = '';
            if(JSON.parse(localStorage.getItem('items'))[0] === null){
                tableData += '<tr><td colspan="5">No items found</td></tr>'
            }else{
                JSON.parse(localStorage.getItem('items')).map(data=>{

                    tableData +=  '<tr>'+
                        '<td class="cart_product">'+
                            '<a href=""><img src="'+data.img+'" width ="100"  height="100" alt=""></a>'+
                        '</td>'+
                        '<td class="cart_description">'+
                            '<h4><a href="">'+data.name+'</a></h4>'+
                            '<p>'+ 'Tác giả:' + data.author +'</p>'+
                        '</td>'+
                        '<td class="cart_price">'+
                            '<p class="price_product">'+data.price+'</p>'+
                        '</td>'+
                        '<td class="cart_quantity">'+
                            '<div class="cart_quantity_button">'+
                                '<a class="cart_quantity_up" href="">' +'+'+ '</a>'+
                                '<input class="cart_quantity_input" type="text" data-value="'+data.id+'" name="quantity" value="'+data.no+'" autocomplete="off" size="2">'+
                                    '<a class="cart_quantity_down" href="">'+ '-'+ '</a>'
                            +'</div>'+
                        '</td>'+
                        '<td class="cart_total">'+
                            '<p class="cart_total_price">' + (data.price * data.no).toFixed(3) +'</p>'
                        +'</td>'+
                        '<td class="cart_delete">'+
                            '<a class="cart_quantity_delete" data-value="'+data.id+'" onclick="deleteCart(this)" href=""><i class="fa fa-times"></i></a>'+
                        '</td>'+
                    '</tr>';
                });
            }
            cardBoxTable.innerHTML = tableData;

            $(document).ready(function (){
                $('.cart_quantity_input').on('keyup keypress',function (e){
                    update_amounts();
                })
              //increment quantity
                $(".cart_quantity_up").click(function (e){
                    e.preventDefault();
                    var $n = $(this).parent(".cart_quantity_button").find(".cart_quantity_input");
                    $n.val(Number($n.val())+1);
                    update_amounts();
                })
                //decrement quantity
                $(".cart_quantity_down").click(function (e){
                    e.preventDefault();
                    var $n = $(this).parent(".cart_quantity_button").find(".cart_quantity_input");
                    $n.val(Number($n.val())-1);
                    update_amounts();
                })

            });

        }
        function deleteCart(item){
            let items =[];
           const id = item.getAttribute('data-value');
              JSON.parse(localStorage.getItem('items')).map(data=>{
                  if(data.id != id){
                       items.push(data);
                  }
              });
              localStorage.setItem('items',JSON.stringify(items));
              window.location.reload();
        }

        function update_amounts(){
            var sum =0;
         var countQuantity =0;
            $('#table-cart > tbody >tr').each(function (){
                var quantity =$(this).find('.cart_quantity_input').val();

                var price = $(this).find('.price_product').text();
                var amount =(quantity * price);
                var value = (amount).toLocaleString(
                    undefined,
                    { minimumFractionDigits: 3 }
                );
                sum +=amount;
                var formatSum = (sum).toLocaleString(
                    undefined,
                    { minimumFractionDigits: 3 }
                );

                $(this).find('.cart_total_price').text(''+value);
                 var  totalQuantity =$('.total_price li:first-child span').text("");
                countQuantity += parseInt(quantity);
                totalQuantity.text(countQuantity);
               var total =   $('.total_price li:last-child span').text("");
                    total.text(formatSum+' đ');
                var id = $(this).find('.cart_quantity_input').attr('data-value');

                const localItems =  JSON.parse(localStorage.getItem('items'));
                localItems.map(data=>{
                    if(data.id === id){
                        data.no = parseInt(quantity);
                    }
                });
                localStorage.setItem('items', JSON.stringify(localItems));
                const iconShoppingP = document.querySelector('.notification span');
                iconShoppingP.innerHTML =countQuantity;
            })
        }



    </script>
@endsection

