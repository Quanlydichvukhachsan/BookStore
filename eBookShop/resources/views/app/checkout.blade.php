@extends('app.home')

@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{route('cart')}}">Shopping cart </a></li>
                <li class="active">Checkout</li>
            </ol>
        </div>
        <form id="form-order" method="post">
            @csrf
            @method('POST')
        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-3">
                    <div class="shopper-info">
                        <p>Thông tin người mua hàng</p>
                        <form>

                        </form>

                    </div>
                </div>
                <div class="col-sm-5 clearfix">
                    <div class="bill-to">
                        <p>Chi tiết hoá đơn</p>
                        <div class="form-one">
                            <form>
                                <input type="text" id="nameReceive"  name="nameReceive" placeholder="Họ và Tên người nhận" value="{{Auth::user()->full_name}}">
                                <div class="invalid-feedback nameReceive"></div>
                                <input type="text" id="email" name="email" readonly placeholder="Email*" value="{{Auth::user()->email}}">
                                <div class="invalid-feedback email"></div>
                                <input type="text" id="phoneNumber" name="phoneNumber" placeholder="Số điện thoại *">
                                <div class="invalid-feedback phoneNumber"></div>
                            </form>
                        </div>
                        <div class="form-two">
                            <form>

                                <select id="national">
                                    <option>-- Quốc gia --</option>
                                    <option>Việt Nam</option>
                                    <option>Mỹ</option>
                                    <option>Anh</option>
                                    <option>Ấn Độ</option>
                                    <option>Pakistan</option>
                                    <option>Trung Quốc</option>
                                    <option>Hàn Quốc</option>
                                    <option>Nhật Bản</option>
                                </select>
                                <select id="city">
                                    <option>-- Tỉnh/Thành phố --</option>
                                    <option>Cần Thơ</option>
                                    <option>Đà Nẵng</option>
                                    <option>Hải Phòng</option>
                                    <option>Hà Nội</option>
                                    <option>TP HCM</option>
                                    <option>An Giang</option>
                                    <option>Bà Rịa - Vũng Tàu</option>
                                    <option>Bắc Giang</option>
                                    <option>Bắc Kạn</option>
                                    <option>Bạc Liêu</option>
                                    <option>Bắc Ninh</option>
                                    <option>Bến Tre</option>
                                    <option>Bình Định</option>
                                    <option>Bình Dương</option>
                                    <option>Bình Phước</option>
                                    <option>Bình Thuận</option>
                                    <option>Cà Mau</option>
                                    <option>Cao Bằng</option>
                                    <option>Đắk Lắk</option>
                                    <option>Đắk Nông</option>
                                    <option>Điện Biên</option>
                                    <option>Đồng Nai</option>
                                    <option>Đồng Tháp</option>
                                    <option>Gia Lai</option>
                                    <option>Hà Giang</option>
                                    <option>Hà Nam</option>
                                    <option>Hà Tĩnh</option>
                                    <option>Hải Dương</option>
                                    <option>Hậu Giang</option>
                                    <option>Hòa Bình</option>
                                    <option>Hưng Yên</option>
                                    <option>Khánh Hòa</option>
                                    <option>Kiên Giang</option>
                                    <option>Kon Tum</option>
                                    <option>Lai Châu</option>
                                    <option>Lâm Đồng</option>
                                    <option>Lạng Sơn</option>
                                    <option>Lào Cai</option>
                                    <option>Long An</option>
                                    <option>Nam Định</option>
                                    <option>Nghệ An</option>
                                    <option>Ninh Bình</option>
                                    <option>Ninh Thuận</option>
                                    <option>Phú Thọ</option>
                                    <option>Quảng Bình</option>
                                    <option>Quảng Nam</option>
                                    <option>Quảng Ngãi</option>
                                    <option>Quảng Ninh</option>
                                    <option>Quảng Trị</option>
                                    <option>Sóc Trăng</option>
                                    <option>Sơn La</option>
                                    <option>Tây Ninh</option>
                                    <option>Thái Bình</option>
                                    <option>Thái Nguyên</option>
                                    <option>Thanh Hóa</option>
                                    <option>Thừa Thiên Huế</option>
                                    <option>Tiền Giang</option>
                                    <option>Trà Vinh</option>
                                    <option>Tuyên Quang</option>
                                    <option>Vĩnh Long</option>
                                    <option>Vĩnh Phúc</option>
                                    <option>Yên Bái</option>
                                    <option>Phú Yên</option>


                                </select>
                                <select id="district">
                                    <option>-- Quận/Huyện --</option>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>
                                <input type="text" id="address" name="address" placeholder="Địa chỉ nhận hàng">
                                <div class="invalid-feedback address"></div>
                                <select id="payment">
                                    <option>-- Phương thức thanh toán --</option>
                                    <option>Thanh toán khi nhận hàng</option>

                                </select>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="order-message">
                        <p>Ghi chú</p>
                        <textarea name="message" id="message" placeholder="" rows="16"></textarea>
                        <label><input type="checkbox">Vận chuyển đến địa điểm thanh toán</label>
                    </div>
                </div>
            </div>
        </div>


        <div class="review-payment">
            <h2>Kiểm tra & Thanh toán</h2>
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

        <button type="submit" class="btn btn-dathang" >Đặt hàng</button>
        </form>
    </div>



@endsection

@section('script')
    <script src={{asset("error-handler/exception.js")}}></script>
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
            var totalFixed = total.toFixed(0);
            iconShoppingP.innerHTML = no;
            var formatSum = (Number(totalFixed)).toLocaleString(
                undefined,
                { minimumFractionDigits: 3 }
            );
            //787500+300000 +30000
            var formattransportFee =(Number(totalFixed) +30).toLocaleString(
                undefined,
                { minimumFractionDigits: 3 }
            );


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
                      tableData+='<tr>'+
                          '<td colspan="4">&nbsp;</td> ' +
                          '<td colspan="2">'+
                              '<table class="table table-condensed total-result">'+
                                  '<tr >'+
                                      '<td>Tổng sản phẩm</td>'+
                                      '<td class="totalQuantity">'+no+'</td>'+
                                  '</tr>'+
                                  '<tr>'+
                                      '<td>Tổng tiền sản phẩm</td>'+
                                      '<td class="totalSum">'+formatSum +'đ'+'</td>'+
                                  '</tr>'+
                                  '<tr class="shipping-cost">'+
                                      '<td>Phí vận chuyển</td>'+
                                      '<td>30.000 đ</td>'+
                                  '</tr>'+
                                  '<tr>'+
                                      '<td>Tổng tiền</td>'+
                                      '<td class="totalPrice"><span>'+ formattransportFee +'đ'+'</span></td>'+
                                  '</tr>'+
                              '</table>'+
                          '</td>'+
                      '</tr>';
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
                if(!isNaN(amount)){
                    sum +=amount;
                }

                var formatSum = (sum).toLocaleString(
                    undefined,
                    { minimumFractionDigits: 3 }
                );
                var totalPriceFixed = sum.toFixed(0);
                $(this).find('.cart_total_price').text(''+value);
                   if(!isNaN(quantity)){
                       countQuantity += parseInt(quantity);
                   }
                var totalQuantity =  $('.total-result tr').eq(0).find('.totalQuantity').text("");
                totalQuantity.text(countQuantity.toString());

                var total =  $('.total-result tr').eq(1).find('.totalSum').text("");
               total.text(formatSum.toString());

                var formattransportFee =(Number(totalPriceFixed) +30).toLocaleString(
                    undefined,
                    { minimumFractionDigits: 3 }
                );
                var totalPrice =  $('.total-result tr').eq(3).find('.totalPrice span').text("");
                totalPrice.text(formattransportFee.toString());

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

        $('button.btn-dathang').on('click',function(event) {
            event.preventDefault();
          var arrBook =[];
            const localItems =  JSON.parse(localStorage.getItem('items'));
            localItems.map(data=>{
                   var book ={};
                   book.id =data.id;
                   book.no =data.no;
                arrBook.push(book);
            });

            var nameReceive = $('#nameReceive').val();
            var phoneNumber = $('#phoneNumber').val();
            var national =$('#national').val();
            var city = $('#city').val();
            var district =$('#district').val();
            var address = $('#address').val();
            var payment = $('#payment').val();
            var message = $('#message').val();
            var quantity =parseInt($('.totalQuantity').text());
            var totalPriceOrder = $('.totalPrice').text().split("đ")[0];
            var totalPrice = $('.totalSum').text().split("đ")[0];
            console.log(nameReceive);

         //  $overlay.appendTo("body");
           // $('#overlay').show();
            setTimeout(function (){
                $.ajax({
                    method :"POST",
                    url: '{{route('cart.order',Auth::user()->id)}}',
                    cache:false,
                    data:{
                        "_token": '{{csrf_token()}}',
                        'name':nameReceive,
                        'phoneNumber':phoneNumber,
                        'national':national,
                        'city':city,
                        'district':district,
                        'address' :address,
                        'payment':payment,
                        'message':message,
                        'book':arrBook,
                        'quantity':quantity,
                        'totalPriceOrder':totalPriceOrder,
                        'totalPrice':totalPrice
                    },

                    success: function(data) {
                        console.log(data.result);
                     //   $('#overlay').hide();

                     //   window.location.reload();
                    },
                    error:function (error){
                        console.log(error);
                            $.fn.handlerError(error);
                    }
                });
            },500);
            return false;
        });

    </script>
@endsection
