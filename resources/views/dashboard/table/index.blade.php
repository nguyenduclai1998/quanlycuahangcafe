@extends('layouts.app_master_dashboard')
@section('content')
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Quản lý bàn</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Quản lý bàn</li>
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
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Thêm mới bàn</h5>
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
                                                            <form class="form form-vertical" action="{{route('post.create.table')}}" method="POST" id="createMenu">
                                                                @csrf
                                                                <div class="form-body">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="first-name-vertical">Mã bàn</label>
                                                                                <input type="text" class="form-control" name="table_code"
                                                                                    placeholder="Mã bàn">
                                                                                    <label for="text" class="error"></label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="email-id-vertical">Số bàn</label>
                                                                                <input type="number" class="form-control" name="number"
                                                                                    placeholder="Số bàn">
                                                                                    <label for="text" class="error"></label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="password-vertical">Trạng thái</label>
                                                                                <fieldset class="form-group">
                                                                                    <select class="form-select" name="status">
                                                                                        <option value="">---Chọn trạng thái---</option>   
                                                                                        <option value="0">Trống</option>
                                                                                        <option value="1">Đã phục vụ</option>
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
        @if(isset($table))
        <div class="card">
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã bàn</th>
                            <th>Số bàn</th>
                            <th>Trạng thái</th>
                            @if(Auth::user()->role_id == 0)
                            <th>Thao tác</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($table as $k => $tb)
                            <tr>
                                <td>{{$k + 1}}</td>
                                <td>{{$tb->table_code}}</td>
                                <td>{{$tb->number}}</td>
                                @if($tb->status ==0)
                                    <td>
                                        <span class="badge bg-primary">Bàn trống</span>
                                    </td>
                                @else
                                    <td>
                                        <span class="badge bg-danger">Bàn đã phục vụ</span>
                                    </td>
                                @endif
                                @if(Auth::user()->role_id == 0)
                                <td class="active">
                                    <div class="card" style="box-shadow:none; background-color:unset; margin-bottom: 0;">
                                        <div class="card-content">
                                            <div class="card-body" style="padding: 0;">
                                                    <span data-toggle="modal" data-target="#updateMenu{{$k + 1}}"><i data-feather="edit" width="20"></i>  Sửa</span>
                                                <!-- Vertically Centered modal Modal -->
                                                <div class="modal fade" id="updateMenu{{$k + 1}}" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Sửa bàn</h5>
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
                                                                                        <form class="form form-vertical" action="{{route('post.update.table', $tb->id)}}" method="POST">
                                                                                            @csrf
                                                                                            <div class="form-body">
                                                                                                <div class="row">
                                                                                                    <div class="col-12">
                                                                                                        <div class="form-group">
                                                                                                            <label for="first-name-vertical">Mã bàn</label>
                                                                                                            <input style="pointer-events:none;" type="text" class="form-control" name="table_code" value="{{$tb->table_code}}" placeholder="Table code" >
                                                                                                            <label for="text" class="error"></label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-12">
                                                                                                        <div class="form-group">
                                                                                                            <label for="email-id-vertical">Số bàn</label>
                                                                                                            <input type="number" id="number" class="form-control" name="number" value="{{$tb->number}}" placeholder="Số bàn">
                                                                                                            <label for="text" class="error"></label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-12">
                                                                                                        <div class="form-group">
                                                                                                            <label for="password-vertical">Trạng thái</label>
                                                                                                            <fieldset class="form-group">
                                                                                                                <select class="form-select" name="status">
                                                                                                                    <option value="">---Chọn trạng thái---</option>   
                                                                                                                    <option value="0"{{$tb->status == 0 ? "selected='seleted'" : ""}}>Trống</option>
                                                                                                                    <option value="1" {{$tb->status == 1 ? "selected='seleted'" : ""}}>Đã phục vụ</option>
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
                                    <a href="{{ route('get.delete.table', $tb->id) }}" class='sidebar-link'>
                                        <i data-feather="trash" width="20"></i> 
                                        <span>Xóa</span>
                                    </a>
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