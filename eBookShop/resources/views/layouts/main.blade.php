<!DOCTYPE html>
<html lang="en" dir="ltr">
@include('layouts.head')

<body class="header-fixed sidebar-fixed sidebar-light header-light" id="body">

<script>
    NProgress.configure({ showSpinner: false });
    NProgress.start();
</script>

<div id="toaster"></div>
<div class="wrapper">
    <!-- Github Link -->
    <a href="https://github.com/coding-gang"  target="_blank" class="github-link">
        <svg width="70" height="70" viewBox="0 0 250 250" aria-hidden="true">
            <defs>
                <linearGradient id="grad1" x1="0%" y1="75%" x2="100%" y2="0%">
                    <stop offset="0%" style="stop-color:#896def;stop-opacity:1" />
                    <stop offset="100%" style="stop-color:#482271;stop-opacity:1" />
                </linearGradient>
            </defs>
            <path d="M 0,0 L115,115 L115,115 L142,142 L250,250 L250,0 Z" fill="url(#grad1)"></path>
        </svg>
        <i class="mdi mdi-github-circle"></i>
    </a>
    <!--
          ====================================
          ——— LEFT SIDEBAR WITH FOOTER
          =====================================
        -->
    @include('layouts.sidebar')

    <div class="page-wrapper">
        <!--
         ====================================
         ——— HEADER
         =====================================
       -->
@include('layouts.header')
        <div class="content-wrapper">
            <div class="content">
                <!--
        ====================================
        ——— OVERVIEW
        =====================================
      -->
              @include('layouts.overview-order')
                <div class="row">
                    <div class="col-12">
                        <!-- Recent Order Table -->
                        <div class="card card-table-border-none" id="recent-orders">
                            <div class="card-header justify-content-between">
                                <h2>Recent Orders</h2>
                                <div class="date-range-report ">
                                    <span></span>
                                </div>
                            </div>
                            <div class="card-body pt-0 pb-5">
                                <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Product Name</th>
                                        <th class="d-none d-lg-table-cell">Units</th>
                                        <th class="d-none d-lg-table-cell">Order Date</th>
                                        <th class="d-none d-lg-table-cell">Order Cost</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td >24541</td>
                                        <td >
                                            <a class="text-dark" href=""> Coach Swagger</a>
                                        </td>
                                        <td class="d-none d-lg-table-cell">1 Unit</td>
                                        <td class="d-none d-lg-table-cell">Oct 20, 2018</td>
                                        <td class="d-none d-lg-table-cell">$230</td>
                                        <td >
                                            <span class="badge badge-success">Completed</span>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown show d-inline-block widget-dropdown">
                                                <a class="dropdown-toggle icon-burger-mini" href="" role="button" id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order1">
                                                    <li class="dropdown-item">
                                                        <a href="#">View</a>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <a href="#">Remove</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >24541</td>
                                        <td >
                                            <a class="text-dark" href=""> Toddler Shoes, Gucci Watch</a>
                                        </td>
                                        <td class="d-none d-lg-table-cell">2 Units</td>
                                        <td class="d-none d-lg-table-cell">Nov 15, 2018</td>
                                        <td class="d-none d-lg-table-cell">$550</td>
                                        <td >
                                            <span class="badge badge-warning">Delayed</span>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown show d-inline-block widget-dropdown">
                                                <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdown-recent-order2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order2">
                                                    <li class="dropdown-item">
                                                        <a href="#">View</a>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <a href="#">Remove</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >24541</td>
                                        <td >
                                            <a class="text-dark" href=""> Hat Black Suits</a>
                                        </td>
                                        <td class="d-none d-lg-table-cell">1 Unit</td>
                                        <td class="d-none d-lg-table-cell">Nov 18, 2018</td>
                                        <td class="d-none d-lg-table-cell">$325</td>
                                        <td >
                                            <span class="badge badge-warning">On Hold</span>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown show d-inline-block widget-dropdown">
                                                <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdown-recent-order3" data-toggle="dropdown" aria-haspopup="true"
                                                   aria-expanded="false" data-display="static"></a>
                                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order3">
                                                    <li class="dropdown-item">
                                                        <a href="#">View</a>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <a href="#">Remove</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >24541</td>
                                        <td >
                                            <a class="text-dark" href=""> Backpack Gents, Swimming Cap Slin</a>
                                        </td>
                                        <td class="d-none d-lg-table-cell">5 Units</td>
                                        <td class="d-none d-lg-table-cell">Dec 13, 2018</td>
                                        <td class="d-none d-lg-table-cell">$200</td>
                                        <td >
                                            <span class="badge badge-success">Completed</span>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown show d-inline-block widget-dropdown">
                                                <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdown-recent-order4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order4">
                                                    <li class="dropdown-item">
                                                        <a href="#">View</a>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <a href="#">Remove</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >24541</td>
                                        <td >
                                            <a class="text-dark" href=""> Speed 500 Ignite</a>
                                        </td>
                                        <td class="d-none d-lg-table-cell">1 Unit</td>
                                        <td class="d-none d-lg-table-cell">Dec 23, 2018</td>
                                        <td class="d-none d-lg-table-cell">$150</td>
                                        <td >
                                            <span class="badge badge-danger">Cancelled</span>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown show d-inline-block widget-dropdown">
                                                <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdown-recent-order5" data-toggle="dropdown" aria-haspopup="true"
                                                   aria-expanded="false" data-display="static"></a>
                                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order5">
                                                    <li class="dropdown-item">
                                                        <a href="#">View</a>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <a href="#">Remove</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @include('layouts.footer')
    </div>
</div>
<!-- jQuery -->
@include('layouts.script')
</body>
</html>

