@extends('app.home')
@section('pageWrapper')
    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>Cart</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="{{route('home')}}">Trang chủ</a>
                    </li>
                    <li class="is-marked">
                        <a href="{{route('cart.checkout')}}">Thanh toán</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->
@endsection
@section('content')
    <!-- Checkout-Page -->
    <div class="page-checkout u-s-p-t-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <form>
                        <div class="row">
                            <!-- Billing-&-Shipping-Details -->
                            <div class="col-lg-6">
                                <h4 class="section-h4">Chi tiết thanh toán</h4>
                                <!-- Form-Fields -->
                                <div class="group-inline u-s-m-b-13">
                                        <label for="nameReceive">Họ và tên người nhận
                                            <span class="astk">*</span>
                                        </label>
                                        <input name="nameReceive" type="text" id="nameReceive" class="text-field" value="{{Auth::user()->full_name}}">
                                    <div class="invalid-feedback nameReceive"></div>
                                </div>
                                <div class="u-s-m-b-13">
                                    <label for="national">Quốc gia
                                        <span class="astk"> *</span>
                                    </label>
                                    <div class="select-box-wrapper">
                                        <select class="select-box"  id="national" name="national">
                                            <option selected="selected" value="">-- Quốc gia --</option>
                                            <option>Việt Nam</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="u-s-m-b-13">
                                    <label for="select-country">Thành phố
                                        <span class="astk">*</span>
                                    </label>
                                    <div class="select-box-wrapper">
                                        <select class="select-box" name="city" id="city">
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

                                        <div class="invalid-feedback city"></div>
                                    </div>
                                </div>
                                <div class="u-s-m-b-13">
                                    <label for="district">Quận/Huyện
                                        <span class="astk">*</span>
                                    </label>
                                    <div class="select-box-wrapper">
                                        <select class="select-box"  id="district" name="district">
                                            <option>-- Quận/Huyện --</option>
                                            <option>-- Quận/Huyện --</option>
                                            <option>Huyện Hóc Môn</option>
                                            <option>Quận Gò Vấp</option>
                                            <option>Quận Tân Phú</option>
                                            <option>Huyện Bình Chánh</option>
                                            <option>Quận Bình Tân</option>
                                            <option>Quận Bình Thạnh</option>
                                            <option>Huyện Cần Giờ</option>
                                            <option>Huyện Nhà Bè</option>
                                        </select>
                                        <div class="invalid-feedback district"></div>

                                    </div>
                                </div>
                                <div class="street-address u-s-m-b-13">
                                    <label for="address">Địa chỉ nhận hàng
                                        <span class="astk">*</span>
                                    </label>
                                    <input type="text" name="address" id="address" class="text-field" placeholder="Địa chỉ nhận hàng">
                                    <div class="invalid-feedback address"></div>
                                </div>


                                <div class="group-inline u-s-m-b-13">
                                    <div class="group-1 u-s-p-r-16">
                                        <label for="email">Email address
                                            <span class="astk">*</span>
                                        </label>
                                        <input name="email" type="text" id="email" class="text-field" value="{{Auth::user()->email}}">
                                        <div class="invalid-feedback email"></div>
                                   </div>
                                    <div class="group-2">
                                        <label for="phoneNumber">Số điện thoại
                                            <span class="astk">*</span>
                                        </label>
                                        <input name="phoneNumber" type="text" id="phoneNumber" class="text-field" placeholder="Nhập số điện thoại">
                                        <div class="invalid-feedback phoneNumber"></div>
                                    </div>

                                </div>

                                <div>
                                    <label for="message">Ghi chú</label>
                                    <textarea name="message" id="message" class="text-area"  placeholder="Ghi chú về đơn hàng."></textarea>
                                </div>
                            </div>
                            <!-- Billing-&-Shipping-Details /- -->
                            <!-- Checkout -->
                            <div class="col-lg-6">
                                <h4 class="section-h4">Đơn hàng của bạn</h4>
                                <div class="order-table">
                                    <table class="u-s-m-b-13">
                                        <thead>
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Giá</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <h3 class="order-h3">Tổng tiền</h3>
                                            </td>
                                            <td>
                                                <h3 class="order-h3 subtotal"></h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h3 class="order-h3">Phí giao hàng</h3>
                                            </td>
                                            <td>
                                                <h3 class="order-h3">30.000 VND</h3>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <h3 class="order-h3">Tổng tiền thu</h3>
                                            </td>
                                            <td>
                                                <h3 class="order-h3 totalPrice"></h3>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="u-s-m-b-13">
                                        <input type="radio" class="radio-box" name="payment-method" id="cash-on-delivery">
                                        <label class="label-text" for="cash-on-delivery">Thanh toán khi nhận hàng</label>
                                    </div>

                                    <div class="u-s-m-b-13">
                                        <input type="radio" class="radio-box" name="payment-method" id="paypal">
                                        <label class="label-text" for="paypal">Thanh toán qua thẻ</label>
                                    </div>
                                    <button type="submit" class="button button-outline-secondary">Đặt hàng</button>
                                </div>
                            </div>
                            <!-- Checkout /- -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout-Page /- -->



@endsection

@section('script')

    <script src={{asset("error-handler/exception.js")}}></script>
   <script>
       $('.cart-anchor').show();
       window.onload = function() {
           if (localStorage.getItem("items") !== null && JSON.parse(localStorage.getItem('items')).length > 0) {
               $('.coupon-area').show();
               $('.checkout').show();
           }
           // adding data to shopping cart
           const iconShoppingP = document.querySelector('#mini-cart-trigger span');
           const totalPrice = document.querySelector('#mini-cart-trigger').children[2];
           let no = 0;
           let priceTotal = 0;
           JSON.parse(localStorage.getItem('items')).map(data => {
               no = no + parseInt(data.no);
               priceTotal = priceTotal + (parseInt(data.no) * data.price);
               var formatPrice = (data.price).toLocaleString(
                   undefined,
                   {minimumFractionDigits: 3}
               );
               $html = '<li class="clearfix">' +
                   '<a href="http://127.0.0.1:8000/home/' + data.name + '/' + data.id + '">' +
                   '<img src="' + data.img + '" alt="Product">' +
                   '<span class="mini-item-name">' + data.name + '</span>' +
                   '<span class="mini-item-price">' + formatPrice + ' VND</span>' +
                   '<span class="mini-item-quantity"> x ' + data.no + '</span>' +
                   '</a>' +
                   '</li>';
               $('.mini-cart-list').append($html);
           });

           let formatPrice = (priceTotal).toLocaleString(
               undefined,
               {minimumFractionDigits: 3}
           );

           if (formatPrice !== "0.000") {
               var formatPriceTotal = (parseFloat(priceTotal + 30.000)).toLocaleString(
                   undefined,
                   {minimumFractionDigits: 3}
               );
               iconShoppingP.innerHTML = no;
               totalPrice.innerHTML = formatPrice + "VND";
               $('.totalPrice').text(formatPriceTotal + " VND")
               $('.mini-total-price').text(formatPrice + ' VND');
               $('.subtotal').text(formatPrice + ' VND');
           }
           const cartBox = document.querySelector('.order-table');
           const cardBoxTable = cartBox.querySelector('tbody');
           let tableData = '';
           JSON.parse(localStorage.getItem('items')).map(data=>{
               tableData += '<tr>'+
                   '<td>'+
                   '<h6 class="order-h6">'+data.name+'</h6>'+
               '<span class="order-span-quantity"> x ' +data.no+'</span>'+
           '</td>'+
           '<td>'+
           '<h6 class="order-h6">'+(data.price * data.no).toFixed(3)+' VND</h6>'+
           '</td>'+
           '</tr>';
           });
           tableData+= '<tr>'+
               '<td>'+
               '<h3 class="order-h3">Tổng tiền</h3>'+
               '</td>'+
               '<td>'+
               '<h3 class="order-h3 subtotal">'+formatPrice+' VND</h3>'+
               '</td>'+
               '</tr>'+
               '<tr>'+
               '<td>'+
               '<h3 class="order-h3">Phí giao hàng</h3>'+
               '</td>'+
               '<td>'+
               '<h3 class="order-h3">30.000 VND</h3>'+
               '</td>'+
               '</tr>'+

               '<tr>'+
               '<td>'+
               '<h3 class="order-h3">Tổng tiền thu</h3>'+
               '</td>'+
               '<td>'+
               '<h3 class="order-h3 totalPrice">'+formatPriceTotal +' VND</h3>'+
               '</td>'+
               '</tr>';
           cardBoxTable.innerHTML =tableData;
       }

   </script>
@endsection
