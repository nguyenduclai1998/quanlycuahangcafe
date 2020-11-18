@extends('layouts.app_master_dashboard')
@section('content')
@if(isset($bill))
@if(isset($billDetail))
<div class="main-content container-fluid">
    <div class="page-title">
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
    <section class="section">
        <div class="row" style="padding: 25px 0px">
            <div class="col-md-6 col-12">
                <div class="row">
                    <div class="col-md-4">
                        <label>Mã hóa đơn:</label>
                    </div>
                    <div class="col-md-8 form-group">
                        <span>{{$bill->bill_code}}</span>
                    </div>
                    <div class="col-md-4">
                        <label>Nhân viên tạo hóa đơn:</label>
                    </div>
                    <div class="col-md-8 form-group">
                        {{$bill->name}}
                    </div>
                    <div class="col-md-4">
                        <label>Nhân viên phục vụ/ pha chế:</label>
                    </div>
                    <div class="col-md-8 form-group">
                        {{$bill->bartender}}
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-12">
                <div class="row">
                    <div class="col-md-4">
                        <label>Số bàn</label>
                    </div>
                    <div class="col-md-8 form-group">
                        <label>Bàn {{$bill->number}}</label>
                    </div>
                    <div class="col-md-4">
                        <label>Ngày lập phiếu</label>
                    </div>
                    <div class="col-md-8 form-group">
                        {{$bill->bill_date}}
                    </div>
                    <div class="col-md-4">
                        <label>Trạng thái:</label>
                    </div>
                    <div class="col-md-8 form-group">
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
        </div>

        <div class="card">
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên món</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($billDetail as $k => $value)
                            <tr>
                                <td>{{$k + 1}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->amount}}</td>
                                <td>{{$value->price * $value->amount}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endif
@endif
@stop