@extends('layouts.main')
@section('name')
    <h1>Orders</h1>
@endsection
@section('root')
    <a href="{{route('admin.index')}}">
        App
    </a>

@endsection
@section('model')
    Orders
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <!-- Recent Order Table -->
            <div class="card card-table-border-none" id="recent-orders">
                <div class="card-header justify-content-between">
                    <h2>Orders</h2>
                    <div class="date-range-report ">
                        <span></span>
                    </div>
                </div>
                <div class="card-body pt-0 pb-5">
                    <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                        <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer Name</th>
                            <th class="d-none d-lg-table-cell">Order Date</th>
                            <th>Status</th>
                            <th>Action</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td >
                                <a class="text-dark" href="{{route('order.orderShow',[$item->id,$item->user->id])}}">{{$item->user->full_name}}</a>
                            </td>
                            <td class="d-none d-lg-table-cell">{{$item->created_at}}</td>
                            <td>
                                @if($item->status === "Waiting accepted")
                                <span class="badge badge-warning">{{$item->status}}</span>
                                    @elseif($item->status === "Waiting delivery")
                                    <span class="badge badge-secondary">{{$item->status}}</span>
                                @elseif($item->status === "Successfully delivered")
                                    <span class="badge badge-success">{{$item->status}}</span>
                                @else
                                    <span class="badge badge-danger">{{$item->status}}</span>
                                    @endif
                            </td>
                            <td>
                                    <select class="form-select" data-value="{{$item->id}}" id="setColor{{$item->id}}" onchange="getColor(this)">
                                       <option class="badge badge-info" value="0">Accepted</option>
                                        <option class="badge badge-warning" value="1">Waiting accepted</option>
                                        <option class="badge badge-secondary" value="2">Waiting delivery</option>
                                        <option class="badge badge-success" value="3">Successfully delivered</option>
                                        <option class="badge badge-danger" value="4">Cancel</option>
                                    </select>
                            </td>
                            <td>
                                <button class="mb-1 btn btn-sm btn-primary" type="button">Save</button>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
       function getColor(item){
             var id =  item.getAttribute("data-value");
             var htmlId = "#setColor"+id;
               var val = $(htmlId).find('option:selected').text();
               console.log(val);
               $(htmlId).removeClass('btn-info');
               $(htmlId).removeClass('btn-success');
               $(htmlId).removeClass('btn-warning');
               $(htmlId).removeClass('btn-danger');
               $(htmlId).removeClass('btn-secondary');
               if(val === "Waiting delivery"){
                   $(htmlId).addClass('btn-secondary');
               }
               else if(val === "Successfully delivered"){
                   $(htmlId).addClass('btn-success');
               }
               else if(val === "Accepted"){
                   $(htmlId).addClass('btn-info');
               }
               else if(val === "Cancel"){
                   $(htmlId).addClass('btn-danger');
               }else if (val === "Waiting accepted"){
                   $(htmlId).addClass('btn-warning');
               }
       }

    </script>

@endsection
