@extends('layouts.app_master_dashboard')
@section('content')
@if(isset($goodDeliveryNoteDetail))
{{-- {{dd($goodDeliveryNoteDetail)}} --}}
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Chi tiết phiếu nhập kho: {{$goodDeliveryNoteDetail[0]['goods_delivery_note_code']}}</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Quản lý hàng hóa nhập kho</li>
                    </ol>
                </nav>
            </div>
        </div>

    </div>
    <section class="section">
        <div class="card" style="box-shadow:none; background-color:#F7FAFF;">
            <div class="card-content">
                <div class="card-body" style="padding-left: 0px">
                    <!-- button trigger for  Vertically Centered modal -->
                    <button type="button" class="btn btn-primary block" data-toggle="modal"
                        data-target="#exampleModalCenter">
                    Thêm mới 
                    </button>
                    <!-- Vertically Centered modal Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                            role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Thêm mới hàng hóa nhập kho</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <section id="basic-vertical-layouts">
                                        <div class="row match-height">
                                            <div class="col-md-12 col-12">
                                                <div class="card" style="box-shadow:none;">
                                                    <div class="card-content">
                                                        <div class="card-body">
                                                            <form class="form form-vertical" action=" {{ route('post.create.goodDeliveryNoteDetail', $goodDeliveryNoteDetail[0]['required_import_goods_id']) }}" method="POST" id="createMenu">
                                                                @csrf
                                                                <div class="form-body">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="first-name-vertical">Mã phiếu</label>
                                                                                <input type="text" style="pointer-events:none;" class="form-control" value="{{$goodDeliveryNoteDetail[0]['goods_delivery_note_code']}}" name="goods_delivery_note_code"
                                                                                    placeholder="Mã nhà cung cấp">
                                                                                    <label for="text" class="error"></label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="email-id-vertical">Hàng hóa</label>
                                                                                <fieldset class="form-group">
                                                                                    <select class="choices form-select" name="matterials_id">
                                                                                        @if(isset($matterial))
                                                                                            @foreach($matterial as $element)
                                                                                                <option value="{{$element->id}}">{{$element->name}}</option>
                                                                                            @endforeach
                                                                                        @endif
                                                                                    </select>
                                                                                </fieldset>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="email-id-vertical">Số lượng</label>
                                                                                <input type="number" class="form-control" name="amount"
                                                                                    placeholder="Số lượng">
                                                                                    <label for="text" class="error"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix" style="padding-top: 15px;">
                                                                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Hủy</span>
                                                                    </button>
                                                                    <button type="submit" class="btn btn-primary float-right">Thêm mới</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
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
                            <th>Mã phiếu nhập kho</th>
                            <th>Nhà cung cấp</th>
                            <th>Tên hàng hóa</th>
                            <th>Số lượng</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($goodDeliveryNoteDetail as $k => $value)
                            <tr>
                                <td>{{$k + 1}}</td>
                                <td>{{$value->goods_delivery_note_code}}</td>
                                <td>{{$value->staffIsName}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->deliver}}</td>
                                <td class="active">
                                    <div class="card" style="box-shadow:none; background-color:unset; margin-bottom: 0;">
                                        <div class="card-content">
                                            <div class="card-body" style="padding: 0;">
                                                    <span data-toggle="modal" data-target="#updateMenu{{$k + 1}}"><i data-feather="edit" width="20"></i>  Sửa</span>
                                                <div class="modal fade" id="updateMenu{{$k + 1}}" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Sửa thực đơn</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <i data-feather="x"></i>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <section id="basic-vertical-layouts">
                                                                    <div class="row match-height">
                                                                        <div class="col-md-12 col-12">
                                                                            <div class="card" style="box-shadow:none;">
                                                                                <div class="card-content">
                                                                                    <div class="card-body">
                                                                                        <form class="form form-vertical" action="" method="POST">
                                                                                            @csrf
                                                                                            <div class="form-body">
                                                                                                <div class="row">
                                                                                                    <div class="col-12">
                                                                                                        <div class="form-group">
                                                                                                            <label for="first-name-vertical">Mã nhà hàng hóa</label>
                                                                                                            <input style="pointer-events:none;" type="text" class="form-control" name="matterials_code" value="{{$value->matterials_code}}" placeholder="Mã nhà cung cấp" >
                                                                                                            <label for="text" class="error"></label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-12">
                                                                                                        <div class="form-group">
                                                                                                            <label for="email-id-vertical">Tên tên hàng hóa</label>
                                                                                                            <input type="text" id="number" class="form-control" name="name" value="{{$value->name}}" placeholder="Số bàn">
                                                                                                            <label for="text" class="error"></label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-12">
                                                                                                        <div class="form-group">
                                                                                                            <label for="email-id-vertical">Đơn vị tính</label>
                                                                                                            <input type="text" id="unit" class="form-control" name="unit" value="{{$value->unit}}" placeholder="Số bàn">
                                                                                                            <label for="text" class="error"></label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="clearfix" style="padding-top: 15px;">
                                                                                                <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                                                <span class="d-none d-sm-block">Hủy</span>
                                                                                                </button>
                                                                                                <button type="submit" class="btn btn-primary float-right">Cập nhật</button>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </section>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="" class='sidebar-link'>
                                        <i data-feather="trash" width="20"></i> 
                                        <span>Xóa</span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endif
@stop