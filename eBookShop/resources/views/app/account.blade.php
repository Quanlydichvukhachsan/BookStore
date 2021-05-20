@extends('app.home')

@section('content')


        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Thông tin tài khoản</h2>
                        <form action="#">
                            <input type="text" placeholder="Email" value="{{Auth()->user()->email}}" />
                            <input type="text" placeholder="User name" value="{{Auth()->user()->userName}}" />
                            <a href="http://127.0.0.1:8000/sales/order/{{Auth()->user()->id}}/history" class="btn btn-default">Đơn hàng của tôi</a>
                        </form>
                    </div><!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>Cập nhật tài khoản</h2>
                        {!! Form::open(['method' => 'POST']) !!}
                            <input type="hidden" name="userId" id="userId" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                        <div class="invalid-feedback userId"></div>
                            <input type="text" id="lastName" name="lastName" placeholder="Last name" value="{{Auth()->user()->lastName}}"/>
                            <div class="invalid-feedback lastName"></div>
                            <input type="text" id="firstName" name="firstName" placeholder="First name" value="{{Auth()->user()->firstName}}"/>
                            <div class="invalid-feedback firstName"></div>
                            <input type="email" id="email" name="email" placeholder="Email" value="{{Auth()->user()->email}}"/>
                        <div class="invalid-feedback email"></div>
                            <input type="text" id="phoneNumber" name="phoneNumber" placeholder="Số điện thoại" value="{{Auth()->user()->phoneNumber}}"/>
                        <div class="invalid-feedback phoneNumber"></div>
                            <input type="password" required id="passwordOld" name="passwordOld" placeholder="Mật khẩu cũ"/>
                        <div class="invalid-feedback passwordOld"></div>
                            <input type="password" required id="password" name="password" placeholder="Mật khẩu mới"/>
                        <div class="invalid-feedback password"></div>
                            <input type="password" required id="password_confirmation" name="password_confirmation" placeholder="Xác nhận mật khẩu"/>
                        <div class="invalid-feedback password-confirm"></div>
                            <button type="submit" class="btn btn-default">Lưu</button>
                        {!! Form::close() !!}
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>

@endsection
@section('script')
    <script src={{asset("error-handler/exception.js")}}></script>
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
        $('button.btn-default').on('click',function(event) {
            event.preventDefault();
            var lastName = $('#lastName').val();
            var id = $('#userId').val();
            var phoneNumber = $('#phoneNumber').val();
            var firstName = $('#firstName').val();
            var email = $('#email').val();
            var passwordOld = $('#passwordOld').val();
            var password = $('#password').val();
            var password_confirmation = $('#password_confirmation').val();
            $overlay.appendTo("body");
            $('#overlay').show();
            setTimeout(function (){
                $.ajax({
                    method :"POST",
                    url: '/customer/' +id +'/account/update',
                    cache:false,
                    data:{
                        "_token": '{{csrf_token()}}',
                        'lastName':lastName,
                        'firstName':firstName,
                        'phoneNumber':phoneNumber,
                        'email':email,
                        'passwordOld':passwordOld,
                        'password':password,
                    'password_confirmation':password_confirmation
                    },
                    success: function(data) {
                        console.log(data.result);
                        if(!data.result.localeCompare("Sai password!")){
                            $(".alert-highlighted").removeClass('alert-success');
                            $(".alert-highlighted").addClass('alert-danger');
                            $(".alert-highlighted span").text(data.result);

                        }else{
                            $(".alert-highlighted").removeClass('alert-danger');
                            $(".alert-highlighted").addClass('alert-success');
                            $(".alert-highlighted span").text(data.result);

                        }
                        $('.alert-highlighted').show();
                        $('#overlay').hide();
                        $('.alert-highlighted').fadeOut(10000);
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

