<script src="assets/plugins/jquery/jquery.min.js"></script>
<script src="assets/plugins/slimscrollbar/jquery.slimscroll.min.js"></script>
<script src="assets/plugins/jekyll-search.min.js"></script>
<script src="assets/plugins/charts/Chart.min.js"></script>
<script src="assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
<script src="assets/plugins/jvectormap/jquery-jvectormap-world-mill.js"></script>
<script src="assets/plugins/daterangepicker/moment.min.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="assets/plugins/toastr/toastr.min.js"></script>
<script src="assets/js/sleek.bundle.js"></script>
<script src="assets/plugins/data-tables/jquery.datatables.min.js"></script>
<script src="assets/plugins/data-tables/datatables.bootstrap4.min.js"></script>
<script src="assets/plugins/jquery-mask-input/jquery.mask.min.js"></script>
<script src="assets/plugins/select2/js/select2.full.min.js"></script>

<script>
    jQuery(document).ready(function() {
        jQuery('#basic-data-table').DataTable({
            "dom": '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">'
        });
    });
    $(function () {
        $('.select2').select2()
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

    });

    $(document).ready(function(){

        // Create overlay and append to body:
        $('<div id="overlay"/>').css({
            position: 'fixed',
            display:'none',
            top: 0,
            left: 0,
            color:'#adbcbf',
            width: '100%',
            height: $(window).height() + 'px',
            opacity:0.4,
            background: '#f5f6f7 url("/images/Blocks-1s-200px.gif") no-repeat center'
        }).appendTo('#exampleModalForm');

    });
</script>