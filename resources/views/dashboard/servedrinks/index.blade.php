@extends('layouts.app_master_dashboard')
@section('content')
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Phục vụ đồ uống</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Phục vụ đồ uống</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
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
                                @if(Auth::user()->role_id == 2)
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
                                    <td>
                                        {{-- @if(Auth::user()->role_id == 1)
                                            @if($value->status == 0)
                                                <a href="{{route('updateStatus.servedinks', [1, $value->id])}}" class='badge bg-primary'>
                                                    <span>Thanh toán</span>
                                                </a>
                                            @elseif($value->status == 1)
                                                    <span class='badge bg-primary'>Đã thanh toán</span>
                                                </a>
                                            @elseif($value->status == 2)
                                                    <span class='badge bg-primary'>Đã phục vụ</span>
                                                </a>
                                            @endif
                                        @elseif(Auth::user()->role_id == 2)
                                            @if($value->status == 0)
                                                    <span class='badge bg-primary'>Thanh toán</span>
                                                </a>
                                            @elseif($value->status == 1)
                                                <a href="{{route('updateStatus.servedinks', [2, $value->id])}}" class='badge bg-primary'>
                                                    <span>Đã thanh toán</span>
                                                </a>
                                            @elseif($value->status == 2)
                                                    <span class='badge bg-primary'>Đã phục vụ</span>
                                                </a>
                                            @endif
                                        @endif --}}
                                        @if(Auth::user()->role_id == 2)
                                        <a href="{{route('getDetail.billofsale', $value->id)}}" class='sidebar-link'>
                                            <i data-feather="delete" width="20"></i> 
                                            <span>Xem chi tiết</span>
                                        </a>
                                        @endif
                                    </td>
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