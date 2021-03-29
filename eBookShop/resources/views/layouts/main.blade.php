<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<body class="antialiased">
<div class="page">
@include('layouts.header')
@include('layouts.navbar')
    <div class="content">
        <div class="container-xl">
            @include('layouts.page-title')
            @include('layouts.overview-order')
            @include('layouts.footer')
        </div>
    </div>
</div>

<script src="/dist/libs/apexcharts/dist/apexcharts.min.js"></script>
<!-- Tabler Core -->
<script src="/dist/js/tabler.min.js"></script>
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>

