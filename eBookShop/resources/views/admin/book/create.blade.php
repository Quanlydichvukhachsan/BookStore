@extends('layouts.main')
@section('name')
    <h1>Create</h1>
@endsection
@section('root')
    <a href="{{route('book.index')}}">
        Books
    </a>

@endsection
@section('model')
    Create book
@endsection
@section('content')
    <div class="container rounded bg-white">
        <form method="POST" action={{route('book.store')}} enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="row">
                <div class="p-3 py-3">
                    <div class="row mt-12">

                        <div class="col-md-12">
                            <label for="title" class="labels">Title</label>
                            <input id="title" name="title" type="text" class="form-control" placeholder="title name" value="">
                        </div>

                    </div>
                    <div class="row mt-4">
                        <div class="col-md-3">
                            <label for="weight" class="labels">weight</label>
                            <input name="weight" id="weight" type="text" class="form-control" placeholder="number weight" value=""
                                   onkeypress="javascript:return isNumber(event)">
                        </div>
                        <div class="col-md-3">
                            <label for="size" class="labels">Size</label>
                            <input id="size" name="size" type="number" class="form-control" min="0" value="0" step="0.1" placeholder="number size">
                        </div>
                        <div class="col-md-3">
                            <label for="number_of_pages" class="labels">Number of pages</label>
                            <input name="number_of_pages" id="number_of_pages" type="text" class="form-control" placeholder="number page" value=""
                                   onkeypress="javascript:return isNumber(event)">
                        </div>
                        <div class="col-md-3">
                            <label for="formality" class="labels">Formality</label>
                            <input name="formality" type="text" class="form-control" placeholder="enter formality" value="">
                        </div>

                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <label>Author</label>
                            <select  class="form-control selectpicker" data-live-search="true" name="author_id">
                                <option value="1">Hot Dog, Fries and a Soda</option>
                                <option value="2">Burger, Shake and a Smile</option>

                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Publisher</label>
                            <select class="form-control selectpicker" data-live-search="true" name="publisher_id">
                                <option value="1">Hot Dog, Fries and a Soda</option>
                                <option data-tokens="mustard">Burger, Shake and a Smile</option>
                                <option data-tokens="frosting">Sugar, Spice and all things nice</option>
                            </select>
                        </div>
                    </div>
                    <div  class="row mt-4">
                        <div class="col-md-3">
                            <label>Category</label>
                            <select class="form-control selectpicker" data-live-search="true" name="categories_id">
                                <option value="1">Hot Dog, Fries and a Soda</option>
                                <option data-tokens="mustard">Burger, Shake and a Smile</option>
                                <option data-tokens="frosting">Sugar, Spice and all things nice</option>
                            </select>
                        </div>
                        <div class="col-md-3"><label for="foreign_book" class="labels">Foreign book</label>
                            <select class="form-control" name="foreign_book">
                                <option value="0">Nuoc ngoai</option>
                                <option value="1">Trong nuoc</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="publication_date">Publisher date (date and time)</label>
                            <input class="form-control" type="date" id="publication_date"   name="publication_date">
                        </div>

                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6"><label for="inputfile" class="labels">Images</label>
                            <input  multiple="multiple" name="inputfile[]" id="inputfile" type="file" class="form-control" onChange='getoutput()'>
                        </div>
                        <div class="col-md-6"><label for="price" class="labels">Price</label>
                            <input name="price" type="text" class="form-control"
                                   onkeypress="javascript:return isNumber(event)"
                                   placeholder="enter price" value="">
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-12">
                        <label for="describe" class="labels">Describe</label>
                      <textarea name="describe" class="form-control" rows="10" id="describe"></textarea>
                        </div>
                   </div>
                </div>

            </div>
            <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Create</button></div>
        </form>

    </div>
    @if(count($errors) >0)
        <div class="alert alert-danger">

            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
@section('script')
    <script src={{asset("https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js")}}></script>
    <script>

        function isNumber(evt) {
            var iKeyCode = (evt.which) ? evt.which : evt.keyCode
            if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
                return false;
            return true;
        }
        ClassicEditor
            .create( document.querySelector( '#describe' ) )
            .catch( error => {
                console.error( error );
            } );

    </script>


@endsection
