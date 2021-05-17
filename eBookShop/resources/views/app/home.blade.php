<!DOCTYPE html>
<html lang="en">
@include('app.layouts.head')

<body>
@include('app.layouts.header')

<section class="show-sticky" id="advertisement">

</section>
@if(\Illuminate\Support\Facades\Route::currentRouteName()==="cart")
    <section id="cart_items">
    @yield('content')
    </section>

@else
<section class="sidebar-category">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                @yield('sidebar')
            </div>

            <div class="col-sm-9 padding-right product">
              @yield('content')
            </div>

        </div>
    </div>
</section>
@endif
@include('app.layouts.footer')


@include('app.layouts.script')
@yield('script')
</body>
</html>
