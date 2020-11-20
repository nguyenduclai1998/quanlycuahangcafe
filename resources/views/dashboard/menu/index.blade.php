@extends('layouts.app_master_dashboard')
@section('content')
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Quản lý thực đơn</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Quản lý thực đơn</li>
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
                    @if(Auth::user()->role_id == 0)
                    <button type="button" class="btn btn-primary block" data-toggle="modal"
                        data-target="#exampleModalCenter">
                    Thêm mới 
                    </button>
                    @endif
                    <!-- Vertically Centered modal Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                            role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Thêm mới thực đơn</h5>
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
                                                            <form class="form form-vertical" action="{{route('post.create.menu')}}" method="POST">
                                                                @csrf
                                                                <div class="form-body">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="first-name-vertical">Mã đồ uống</label>
                                                                                <input type="text" class="form-control" name="drinks_code"
                                                                                    placeholder="Mã đồ uống">
                                                                                    <label for="text" class="error"></label>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="first-name-vertical">Tên đồ uống</label>
                                                                                <input type="text" class="form-control" name="name"
                                                                                    placeholder="Tên đồ uống">
                                                                                    <label for="text" class="error"></label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="email-id-vertical">Giá tiền</label>
                                                                                <input type="number" class="form-control" name="price"
                                                                                    placeholder="Giá tiền">
                                                                                    <label for="text" class="error"></label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="contact-info-vertical">Đơn vị tính</label>
                                                                                <input type="text" class="form-control" name="unit"
                                                                                    placeholder="Đơn vị tính">
                                                                                    <label for="text" class="error"></label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="password-vertical">Trạng thái</label>
                                                                                <fieldset class="form-group">
                                                                                    <select class="form-select" name="status">
                                                                                        <option value="">---Chọn trạng thái---</option>   
                                                                                        <option value="0">Còn hàng</option>
                                                                                        <option value="1">Hết hàng</option>
                                                                                    </select>
                                                                                    <label for="text" class="error"></label>
                                                                                </fieldset>
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
        @if(isset($menu))
        <div class="card">
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã đồ uống</th>
                            <th>Tên</th>
                            <th>Giá tiền</th>
                            <th>Đơn vị tính</th>
                            <th>Trạng thái</th>
                            @if(Auth::user()->role_id == 0 || Auth::user()->role_id == 2)
                            <th>Thao tác</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($menu as $k => $mn)
                            <tr>
                                <td>{{$k + 1}}</td>
                                <td>{{$mn->drinks_code}}</td>
                                <td>{{$mn->name}}</td>
                                <td>{{$mn->price}}</td>
                                <td>{{$mn->unit}}</td>
                                @if($mn->status == 0)
                                    <td>
                                        <span class="badge bg-primary">Còn hàng</span>
                                    </td>
                                @else
                                    <td>
                                        <span class="badge bg-danger">Hết hàng</span>
                                    </td>
                                @endif
                                <td class="active">
                                    <div class="card" style="box-shadow:none; background-color:unset; margin-bottom: 0;">
                                        <div class="card-content">
                                            <div class="card-body" style="padding: 0;">
                                                    @if(Auth::user()->role_id == 0 || Auth::user()->role_id == 2)
                                                    <span data-toggle="modal" data-target="#updateMenu{{$k + 1}}"><i data-feather="edit" width="20"></i>  Sửa</span>
                                                    @endif
                                                <!-- Vertically Centered modal Modal -->
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
                                                                                        <form class="form form-vertical" action="{{route('post.update.menu', $mn->id)}}" method="POST">
                                                                                            @csrf
                                                                                            <div class="form-body">
                                                                                                <div class="row">
                                                                                                    <div class="col-12">
                                                                                                        <div class="form-group">
                                                                                                            <label for="first-name-vertical">Mã đồ uống</label>
                                                                                                            <input style="pointer-events:none;" type="text" class="form-control" name="drinks_code" value="{{$mn->drinks_code}}" placeholder="Mã đồ uống" >
                                                                                                            <label for="text" class="error"></label>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="col-12">
                                                                                                        <div class="form-group">
                                                                                                            <label for="first-name-vertical">Tên đồ uống</label>
                                                                                                            @if(Auth::user()->role_id == 0)
                                                                                                            <input type="text" class="form-control" name="name" value="{{$mn->name}}" placeholder="Tên đồ uống">
                                                                                                            @elseif(Auth::user()->role_id == 2)
                                                                                                            <input style="pointer-events:none;" type="text" class="form-control" name="name" value="{{$mn->name}}" placeholder="Tên đồ uống">
                                                                                                            @endif
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-12">
                                                                                                        <div class="form-group">
                                                                                                            <label for="email-id-vertical">Giá tiền</label>
                                                                                                            @if(Auth::user()->role_id == 0)
                                                                                                            <input type="number" class="form-control" name="price" value="{{$mn->price}}" placeholder="Giá tiền">
                                                                                                            @elseif(Auth::user()->role_id == 2)
                                                                                                            <input style="pointer-events:none;" type="number" class="form-control" name="price" value="{{$mn->price}}" placeholder="Giá tiền">
                                                                                                            @endif
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-12">
                                                                                                        <div class="form-group">
                                                                                                            <label for="contact-info-vertical">Đơn vị tính</label>
                                                                                                            @if(Auth::user()->role_id == 0)
                                                                                                            <input type="text" class="form-control" name="unit" value="{{$mn->unit}}" placeholder="Đơn vị tính">
                                                                                                            @elseif(Auth::user()->role_id == 2)
                                                                                                            <input style="pointer-events:none;" type="text" class="form-control" name="unit" value="{{$mn->unit}}" placeholder="Đơn vị tính">
                                                                                                            @endif
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-12">
                                                                                                        <div class="form-group">
                                                                                                            <label for="password-vertical">Trạng thái</label>
                                                                                                            <fieldset class="form-group">
                                                                                                                <select class="form-select" name="status">
                                                                                                                    <option value="">---Chọn trạng thái---</option>   
                                                                                                                    <option value="0" {{$mn->status == 0 ? "selected='seleted'" : ""}}>Còn hàng</option>
                                                                                                                    <option value="1"{{$mn->status == 1 ? "selected='seleted'" : ""}}>Hết hàng</option>
                                                                                                                </select>
                                                                                                                <label for="text" class="error"></label>
                                                                                                            </fieldset>
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
                                    @if(Auth::user()->role_id == 0 )
                                    <a href="{{ route('get.delete.menu', $mn->id) }}" class='sidebar-link'>
                                        <i data-feather="trash" width="20"></i> 
                                        <span>Xóa</span>
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