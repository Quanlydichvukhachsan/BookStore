@extends('layouts.main')
@section('content')
    @if(session('genres-delete'))
        <div class="alert alert-primary" role="alert">
            {{ session('genres-delete') }}
        </div>
    @endif
    @if(session('update-genres'))
        <div class="alert alert-primary" role="alert">
            {{ session('update-genres') }}
        </div>
    @endif
    @if(session('genres-create'))
        <div class="alert alert-primary" role="alert">
            {{ session('genres-create') }}
        </div>
    @endif


    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <aside>
                    <input type="text" class="form-control" placeholder="Theo mã, tên sản phẩm">
                </aside>
                <div class="card border-success">
                    <div class="card-header">
                        <h3 class="card-title">Thể loại</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item active">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-inbox"></i> Truyện 18+
                                    <span class="badge bg-primary float-right">12</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-envelope"></i> Văn học
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-envelope"></i> Thi ca
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-envelope"></i> Công nghệ
                                </a>
                            </li>

                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">Tác giả</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item active">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-inbox"></i> Nguyên Triển
                                    <span class="badge bg-primary float-right">12</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-envelope"></i> Xuân Quỳnh
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">Hình thức bao bì</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item active">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-inbox"></i> Bìa cứng
                                    <span class="badge bg-primary float-right">12</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-envelope"></i> Bìa mềm
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

            <div class="col-9 float-right">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Sản phẩm</h3>

                        <button type="button" class="btn btn-success float-right" data-toggle=modal data-target='#exampleModal'>Thêm sản phẩm

                        </button>
                        @include('admin.product.create')
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover" style="border-collapse:collapse;">
                            <thead>

                            <th>Mã sách</th>
                            <th>Tên sách</th>
                            <th>Tên thể loại</th>
                            <th>Giá</th>
                            </tr>
                            </thead>

                            <tbody class="searchable">
                            <tr colspan="6" data-toggle="collapse" data-target="#demo1" class="accordion-toggle">
                                <td>1</td>
                                <td>Ma Làng</td>
                                <td>Truyện 18+</td>
                                <td>150.000</td>


                            </tr>
                            <tr class="p">
                                <td colspan="6" class="hiddenRow">
                                    <div class="accordian-body collapse p-3" id="demo1">
                                        <h3><span>Ma làng</span></h3>

                                        <div class="left col-6 float-left">
                                            <p>Mã sách : <span>1</span></p>
                                            <p>Thể loại: <span>Truyện 18+</span></p>
                                            <p>Giá : <span>150.000</span></p>
                                        </div>
                                        <div class="right col-6 float-right">
                                            <p>Tác giả: <span>Triển Nguyễn</span></p>
                                            <p>Nhà xuất bản: <span>Kim Đồng</span></p>
                                            <p>Hình thức bìa: <span>Bìa cứng</span></p>
                                        </div>
                                        <div class="btn float-right">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cập
                                                nhật
                                            </button>
                                            <button type="button" class="btn btn-danger">Xoá bỏ</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>

                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Categories name</th>
                                <th>Tools</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div><!-- /.card-body -->
                </div>
            </div>
        </div>
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


