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
                        </div>



                </div>
                <div class="col-sm-6">

                    <div class="total_area">

                        <ul>
                            <li>Tổng Số Giỏ Hàng <span>1</span></li>

                            <li>Giá Vận Chuyển <span>Free</span></li>
                            <li>Tổng Tiền <span>300.000 đ</span></li>
                        </ul>
                        <a class="btn btn-default update" href="">Đặt Hàng</a>

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
            JSON.parse(localStorage.getItem('items')).map(data=>{
                no = no+data.no
                ;	});
            iconShoppingP.innerHTML = no;
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
                            '<p>'+data.price+'</p>'+
                        '</td>'+
                        '<td class="cart_quantity">'+
                            '<div class="cart_quantity_button">'+
                                '<a class="cart_quantity_up" href="#">' +'+'+ '</a>'+
                                '<span class="cart_quantity_input">'+data.no+'</span>'+
                                    '<a class="cart_quantity_down" href="#">'+ '-'+ '</a>'
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

            const table = document.getElementById("table-cart");
            for (var i = 0, row; row = table.rows[i]; i++) {
                //iterate through rows
                console.log(row.cells[2].firstChild.innerHTML)
                //rosws would be accessed using the "row" variable assigned in the for loop
                    var amount = row.cells[3].childNodes[0].childNodes[1];

                console.log(amount.text());
            }

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

    </script>
@endsection

