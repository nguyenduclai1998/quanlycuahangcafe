@extends('layouts.app_master_dashboard')
@section('content')
@if(isset($goodDeliveryNoteDetail))
@if(isset($goodDeliveryNote))
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Chi tiết phiếu nhập kho: {{$goodDeliveryNoteDetail[0]['goods_delivery_note_code']}}</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Quản lý hàng hóa nhập kho</li>
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
                        <label>Mã phiếu:</label>
                    </div>
                    <div class="col-md-8 form-group">
                        <span>{{$goodDeliveryNote[0]['goods_delivery_note_code']}}</span>
                    </div>
                    <div class="col-md-4">
                        <label>Tên người giao hàng:</label>
                    </div>
                    <div class="col-md-8 form-group">
                        {{$goodDeliveryNote[0]['deliver']}}
                    </div>
                    <div class="col-md-4">
                        <label>SĐT người giao hàng:</label>
                    </div>
                    <div class="col-md-8 form-group">
                        {{$goodDeliveryNote[0]['deliver_phone_number']}}
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-12">
                <div class="row">
                    <div class="col-md-4">
                        <label>Nhà cung cấp</label>
                    </div>
                    <div class="col-md-8 form-group">
                        {{$goodDeliveryNote[0]['name']}}
                    </div>
                    <div class="col-md-4">
                        <label>Ngày lập phiếu</label>
                    </div>
                    <div class="col-md-8 form-group">
                        {{$goodDeliveryNote[0]['issue_date']}}
                    </div>
                    <div class="col-md-4">
                        <label>Người lập phiếu:</label>
                    </div>
                    <div class="col-md-8 form-group">
                       {{$goodDeliveryNote[0]['staffIsName']}}
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
                            <th>Tên hàng hóa</th>
                            <th>Đơn vị tính</th>
                            <th>Số lượng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($goodDeliveryNoteDetail as $k => $value)
                            <tr>
                                <td>{{$k + 1}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->unit}}</td>
                                <td>{{$value->amount}}</td>
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