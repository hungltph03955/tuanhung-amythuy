@extends('layouts.admin.master')
@section('content')
    @extends('error')

    <section class="content-header content-child">
        <h1> Danh đơn hàng
            <small>(Danh sách)</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản trị hệ thống</a></li>
            <li><a href="#">Danh sách đơn hàng</a></li>
            <li class="active"><a href="#">Danh sách</a></li>
        </ol>
        <p></p>
    </section>
    <p></p>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Danh sách</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-hover dataTable">
                            <thead>
                            <tr>
                                <th>Thứ tự</th>
                                <th>Tên khách hàng</th>
                                <th>Mã đơn hàng</th>
                                <th>Trạng thái</th>
                                <th>Tổng tiền</th>
                                <th>Mô tả</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $stt = 0 ?>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->customer->name }}</td>
                                    <td>{{ $order->order_code}}</td>
                                    <td>
                                        @if($order->order_status === 0)
                                            <span class="label label-info">{{ 'Đơn hàng mới' }}</span>
                                        @elseif($order->order_status === 1)
                                            <span class="label label-warning">{{ 'Đơn hàng đang giao' }}</span>
                                        @elseif($order->order_status === 2)
                                            <span class="label label-success">{{ 'Đơn hàng đã được giao' }}</span>
                                        @elseif($order->order_status === 3)
                                            <span class="label label-danger">{{ 'Đơn hàng đã hủy' }}</span>
                                        @elseif($order->order_status === 4)
                                            <span class="label label-dismissible">{{ 'Hết hàng' }}</span>
                                        @endif
                                    </td>
                                    <td>{{MONEY}} {{ $order->total }}</td>
                                    <td>{{$order->cancel_description}}</td>
                                    <td>
                                        <a href="{!! action('Admin\OrderDetailController@show', $order->id) !!}"
                                           class="btn btn-primary">Show</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="productPagin">
                            {!! $orders->appends(['search' => $search])->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function ConfirmDelete() {
            var x = confirm("Bạn có chắc chắc muốn xóa đơn hàng này?");
            if (x)
                return true;
            else
                return false;
        }
    </script>
@endsection



