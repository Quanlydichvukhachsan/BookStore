@extends('layouts.main')
@section('name')
    <h1>Books</h1>
@endsection
@section('root')
    <a href="{{route('admin.index')}}">
        App
    </a>

@endsection
@section('model')
    Books
@endsection
@section('content')
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom d-flex justify-content-between">
                <h2>Expendable Data Table</h2>

                <a href="https://datatables.net/examples/api/row_details.html" target="_blank" class="btn btn-outline-primary btn-sm text-uppercase">
                    <i class=" mdi mdi-link mr-1"></i> Docs
                </a>
            </div>

            <div class="card-body">
                <div class="expendable-data-table">
                    <table id="expendable-data-table" class="table display nowrap" style="width:100%">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Publisher</th>
                            <th>Publication_Date</th>
                            <th>Type</th>
                            <th>Price</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <td class="details-control"></td>
                             @foreach($books as $item)
                               <td>{{$item->title}}</td>
                                <td>{{$item->author->full_name}}</td>
                                <td>{{$item->publisher->full_name}}</td>
                                <td>{{$item->publication_date}}</td>
                                <td>{{$item->categories->name}}</td>
                                <td>{{$item->price}}</td>
                            @endforeach
                        </tr>
                        </tbody>
                    </table>
               </div>
           </div>
    </div>
    </div>
@endsection

@section('script')
    <script>
        function format () {

            return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+

                '<tr>'+
                '<td>Full name:</td>'+
                '<td>Name...</td>'+
                '<tr>'+
                '<tr>'+
                '<td>Extension number:</td>'+
                '<td>123</td>'+
                '<tr>'+
                '<tr>'+
                '<td>Extra info:</td>'+
                '<td>And any further details here (images etc)...</td>'+
                '<tr>'+
                '</table>';
        }
        $(document).ready(function() {
            var table = $('#expendable-data-table').DataTable( {
                "className":  'details-control',
                "order": [[0, 'asc']],
                "aLengthMenu": [[20, 30, 50, 75, -1], [20, 30, 50, 75, "All"]],
                "pageLength": 20,
                "dom": '<"row align-items-center justify-content-between top-information"lf>rt<"row align-items-center justify-content-between bottom-information"ip><"clear">'
            });

            $('#expendable-data-table tbody').on('click', 'td.details-control', function () {
                var tr = $(this).closest('tr');
                var row = table.row( tr );
                if ( row.child.isShown() ) {
                    row.child.hide();
                    tr.removeClass('shown');
                }
                else {
                    row.child( format(row.data()) ).show();
                    tr.addClass('shown');
                }
            });
        });

    </script>

@endsection
