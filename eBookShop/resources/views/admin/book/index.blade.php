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

                <button id="btn-show-all-children" type="button">Expand All</button>
                <button id="btn-hide-all-children" type="button">Collapse All</button>
            </div>

            <div class="card-body">
                    <table id="expendable-data-table" class="display" cellspacing="0" width="100%">
                        <thead>
                        <tr>

                            <th>Title</th>
                            <th>Author</th>
                            <th>Publisher</th>
                            <th>Publication_Date</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th class="none">id</th>
                            <th class="none">image</th>
                            <th class="none">weight</th>
                            <th class="none">size</th>
                            <th class="none">number of pages</th>
                            <th class="none">formality</th>
                            <th class="none">Type</th>
                            <th class="none">discount</th>
                            <th class="none">create_at</th>

                        </tr>
                        </thead>

                        <tbody>
                        @foreach($books as $item)
                        <tr>
                               <td>{{$item->title}}</td>
                                <td>{{$item->author->full_name}}</td>
                                <td>{{$item->publisher->full_name}}</td>
                                <td>{{$item->publication_date}}</td>
                                <td>{{$item->categories->name}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->id}}</td>
                                <td>
                                    @if($item->imagebooks->count())
                            @foreach($item->imagebooks as $image)
                                        <img src="{{$image->file}}" alt="image_{{$item->title}}" border=3 height=100 width=100></img>
                                @endforeach
                                    @else
                                        no image
                                    @endif
                                </td>
                                    <td>{{$item->weight}}</td>
                                <td>{{$item->size}}</td>
                                <td>{{$item->number_of_pages}}</td>
                                <td>{{$item->formality}}</td>

                                    @if($item->foreign_book ===0)
                                    <td>Nuoc ngoai</td>
                                @else
                                    <td>Trong nuoc</td>
                                   @endif
                                <td>{{$item->percent_discount}}</td>
                                <td>{{$item->create_at}}</td>

                        </tr>
                        @endforeach
                        </tbody>
                    </table>
           </div>
    </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function (){
            var table = $('#expendable-data-table').DataTable({
                'responsive': true
            });

            // Handle click on "Expand All" button
            $('#btn-show-all-children').on('click', function(){
                // Expand row details
                table.rows(':not(.parent)').nodes().to$().find('td:first-child').trigger('click');
            });

            // Handle click on "Collapse All" button
            $('#btn-hide-all-children').on('click', function(){
                // Collapse row details
                table.rows('.parent').nodes().to$().find('td:first-child').trigger('click');
            });
        });
    </script>

@endsection
