@extends('layouts.app_master_dashboard')
@section('content')
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Lập hóa đơn bán hàng</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Lập hóa đơn bán hàng</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        @if(Auth::user()->role_id == 1)
        <a type="button" class="btn btn-primary block" href="{{route('create.billofsale')}}" style="margin-bottom: 55px; margin-top: 25px;"> Thêm mới</a>
        @endif
        @if(isset($bill))
            <div class="card">
                <div class="card-body">
                    <table class='table table-striped' id="table1">
                        <thead>
                            <tr>
                                <th>Mã hóa đơn</th>
                                <th>Người lập hóa đơn</th>
                                <th>Bàn</th>
                                <th>Ngày lập hóa đơn</th>
                                <th>Trạng thái</th>
                                @if(Auth::user()->role_id == 1)
                                <th>Thao tác</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bill as $value)
                                <tr>
                                    <td>{{$value->bill_code}}</td>
                                    <td>{{$value->name}}</td>
                                    <td>Bàn {{$value->number}}</td>
                                    <td>{{$value->bill_date}}</td>
                                    @if($value->status == 0)
                                        <td>
                                            <span class="badge bg-primary">Mới</span>
                                        </td>
                                    @elseif($value->status == 1)
                                        <td>
                                            <span class="badge bg-primary">Đã thanh toán</span>
                                        </td>
                                    @else
                                        <td>
                                            <span class="badge bg-primary">Đã phục vụ</span>
                                        </td>
                                    @endif
                                    @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 0)
                                    <td>
                                        <a href="{{route('getDetail.billofsale', $value->id)}}" class='sidebar-link'>
                                            <i data-feather="delete" width="20"></i> 
                                            <span>Xem chi tiết</span>
                                        </a> <br>
                                        @if(Auth::user()->role_id == 1)
                                        @if($value->status == 0)
                                            <a href="{{route('edit.billofsale', $value->id)}}" class='sidebar-link'>
                                                <i data-feather="edit" width="20"></i> 
                                                <span>Sửa</span>
                                            </a> <br>
                                            <a href="{{route('delete.billofsale', $value->id)}}" class='sidebar-link'>
                                                <i data-feather="trash" width="20"></i> 
                                                <span>Xóa</span>
                                            </a>
                                        @endif
                                        @endif
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </section>
</div>
@stop