@extends('layouts.app_master_dashboard')
@section('content')
@if(isset($bill))
@if(isset($billDetail))
<div class="main-content container-fluid">
    <div class="page-title no-print">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Chi tiết hóa đơn bán hàng: {{$bill->bill_code}}</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Quản lý hóa đơn bán hàng</li>
                    </ol>
                </nav>
            </div>
        </div>

    </div>
        @if($bill->status == 1 || $bill->status == 2)
            @if(Auth::user()->role_id == 1)
                <button class="btn btn-primary print" id="printThis" style="margin-top: 20px">In hóa đơn</button>
            @endif
        @endif
        @if($bill->status == 1)
            @if(Auth::user()->role_id == 2)
            <a href="{{route('updateStatus.servedinks', [2, $bill->billId])}}" style="margin-top: 20px" class="btn btn-primary print"><span>Phục vụ</span></a>
            @endif
        @endif
    
    <div class="container" style="display: none;">
        <div class="row printThis" style="padding: 25px 0px">
            <h3 class="text-center" style="font-weight: 900;">QUẢN LÝ CỬA HÀNG CAFE</h3>
            <h5 class="text-center" style="font-weight: 900; margin-top: 10px">PHIẾU THANH TOÁN</h3>
            <div class="col-6">
                <div class="row">

                    <div class="col-4">
                        <label>Mã hóa đơn:</label>
                    </div>
                    <div class="col-8 form-group">
                        <span>{{$bill->bill_code}}</span>
                    </div>
                    <div class="col-4">
                        <label>NV tạo hóa đơn:</label>
                    </div>
                    <div class="col-8 form-group">
                        {{$bill->name}}
                    </div>
                    <div class="col-4">
                        <label>NV phục vụ</label>
                    </div>
                    <div class="col-8 form-group">
                        {{$bill->bartender}}
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="row">
                    <div class="col-4">
                        <label>Số bàn</label>
                    </div>
                    <div class="col-8 form-group">
                        <label>Bàn {{$bill->number}}</label>
                    </div>
                    <div class="col-4">
                        <label>Ngày lập phiếu</label>
                    </div>
                    <div class="col-8 form-group">
                        {{$bill->bill_date}}
                    </div>
                    <div class="col-4">
                        <label>Trạng thái:</label>
                    </div>
                    <div class="col-8 form-group">
                       @if($bill->status == 0)
                            Mới
                        @elseif($bill->status == 1)
                            Đã thanh toán
                        @else
                            Đã phục vụ
                        @endif
                    </div>
                </div>
            </div>
            <div class="card">
            <div class="card-body">
                <table class='table table-striped'>
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên món</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($billDetail as $k => $value)
                            <tr>
                                <td>{{$k + 1}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->amount}}</td>
                                <td>{{$value->price}}</td>
                                <td>{{number_format($value->price * $value->amount, 0, '', ',')}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-6">
                        <h5 style="font-weight: 900;">Tổng cộng:  </h5>
                    </div>
                    <div class="col-6 form-group">
                        <input type="text" style="pointer-events:none; border: none; text-align: right;" id ="amouts" class="form-control" name="amouts">
                    </div>
                    <h6 class="text-center" style="font-style: italic; font-weight: 900;">Chúc quý khách vui vẻ, hẹn gặp lại!</h6>
                </div>
            </div>
        </div>
        </div>
    </div>

    <div class="container">
        <div class="row" style="padding: 25px 0px">
            <div class="col-6">
                <div class="row">

                    <div class="col-4">
                        <label>Mã hóa đơn:</label>
                    </div>
                    <div class="col-8 form-group">
                        <span>{{$bill->bill_code}}</span>
                    </div>
                    <div class="col-4">
                        <label>NV tạo hóa đơn:</label>
                    </div>
                    <div class="col-8 form-group">
                        {{$bill->name}}
                    </div>
                    <div class="col-4">
                        <label>NV phục vụ</label>
                    </div>
                    <div class="col-8 form-group">
                        {{$bill->bartender}}
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="row">
                    <div class="col-4">
                        <label>Số bàn</label>
                    </div>
                    <div class="col-8 form-group">
                        <label>Bàn {{$bill->number}}</label>
                    </div>
                    <div class="col-4">
                        <label>Ngày lập phiếu</label>
                    </div>
                    <div class="col-8 form-group">
                        {{$bill->bill_date}}
                    </div>
                    <div class="col-4">
                        <label>Trạng thái:</label>
                    </div>
                    <div class="col-8 form-group">
                       @if($bill->status == 0)
                            Mới
                        @elseif($bill->status == 1)
                            Đã thanh toán
                        @else
                            Đã phục vụ
                        @endif
                    </div>
                </div>
            </div>
            <div class="card">
            <div class="card-body">
                <table class='table table-striped'>
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên món</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($billDetail as $k => $value)
                            <tr>
                                <td>{{$k + 1}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->amount}}</td>
                                <td>{{$value->price}}</td>
                                <td>{{number_format($value->price * $value->amount, 0, '', ',')}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-6">
                        <h5 style="font-weight: 900;">Tổng cộng:  </h5>
                    </div>
                    <div class="col-6 form-group">
                        <input type="text" style="pointer-events:none; border: none; text-align: right;" id ="amouts1" class="form-control" name="amouts">
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var billDetail = <?php echo json_encode($billDetail, JSON_HEX_TAG); ?>;
    var amouts = 0;
    billDetail.forEach(function(value) {
        amouts = amouts + parseInt(value.amount)*parseInt(value.price)
    })
    $("#amouts").val(amouts.toLocaleString('it-IT', {style : 'currency', currency : 'VND'}));
    $("#amouts1").val(amouts.toLocaleString('it-IT', {style : 'currency', currency : 'VND'}));
</script>
<script type="text/javascript">
    $('#printThis').on("click", function () {
        $('.printThis').printThis({
            base: "https://jasonday.github.io/printThis/"
        });
    });
</script>
@endif
@endif
@stop