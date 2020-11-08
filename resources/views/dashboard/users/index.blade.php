@extends('layouts.app_master_dashboard')
@section('content')
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Quản nhân viên</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Quản nhân viên</li>
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
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Thêm mới nhân viên</h5>
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
                                                            <form class="form form-vertical" action="{{route('post.create.user')}}" method="POST" id="createMenu">
                                                                @csrf
                                                                <div class="form-body">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="first-name-vertical">Mã nhân viên</label>
                                                                                <input type="text" class="form-control" name="user_code"
                                                                                    placeholder="Mã nhân viên">
                                                                                    <label for="text" class="error"></label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="first-name-vertical">Họ và tên</label>
                                                                                <input type="text" class="form-control" name="name"
                                                                                    placeholder="Họ và tên">
                                                                                    <label for="text" class="error"></label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="first-name-vertical">Email</label>
                                                                                <input type="email" class="form-control" name="email"
                                                                                    placeholder="Email">
                                                                                    <label for="text" class="error"></label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="email-id-vertical">Số CMND</label>
                                                                                <input type="number" id="number" class="form-control" name="id_card"
                                                                                    placeholder="Số CMND">
                                                                                    <label for="text" class="error"></label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="first-name-vertical">Mật khẩu</label>
                                                                                <input type="password" class="form-control" name="password"
                                                                                    placeholder="Mật khẩu">
                                                                                    <label for="text" class="error"></label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="password-vertical">Giới tính</label>
                                                                                <fieldset class="form-group">
                                                                                    <select class="form-select" name="gender">
                                                                                        <option value="">---Chọn Giới tính---</option>   
                                                                                        <option value="0">Nam</option>
                                                                                        <option value="1">Nữ</option>
                                                                                    </select>
                                                                                    <label for="text" class="error"></label>
                                                                                </fieldset>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="password-vertical">Vị trí làm việc</label>
                                                                                <fieldset class="form-group">
                                                                                    <select class="form-select" name="role_id">
                                                                                        <option value="">---Chọn vị trí làm việc---</option>   
                                                                                        <option value="0">Quản lý</option>
                                                                                        <option value="1">Thu ngân</option>
                                                                                        <option value="2">Pha chế</option>
                                                                                    </select>
                                                                                    <label for="text" class="error"></label>
                                                                                </fieldset>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="password-vertical">Trạng thái</label>
                                                                                <fieldset class="form-group">
                                                                                    <select class="form-select" name="status">
                                                                                        <option value="">---Chọn trạng thái---</option>   
                                                                                        <option value="0">Đang làm việc</option>
                                                                                        <option value="1">Đã nghỉ việc</option>
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
        @if(isset($users))
        <div class="card">
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã nhân viên</th>
                            <th>Họ và tên</th>
                            <th>Số CMND</th>
                            <th>Vị trí làm việc</th>
                            <th>Giới tính</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $k => $user)
                            <tr>
                                <td>{{$k + 1}}</td>
                                <td>{{$user->user_code}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->id_card}}</td>
                                @if($user->role_id == 0)
                                    <td>Quản lý</td>
                                @elseif($user->role_id == 1)
                                    <td>Thu ngân</td>
                                @else
                                    <td>Pha chế</td>
                                @endif
                                @if($user->gender == 0) 
                                    <td>Nam</td>
                                @else 
                                    <td>Nữ</td>
                                @endif
                                @if($user->status ==0)
                                    <td>
                                        <span class="badge bg-primary">Đang làm việc</span>
                                    </td>
                                @else
                                    <td>
                                        <span class="badge bg-danger">Đã nghỉ việc</span>
                                    </td>
                                @endif
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
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Sửa thông tin nhân viên</h5>
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
                                                                                        <form class="form form-vertical" action="{{route('post.update.user', $user->id)}}" method="POST">
                                                                                            @csrf
                                                                                            <div class="form-body">
                                                                                                <div class="row">
                                                                                                    <div class="col-12">
                                                                                                            <div class="form-group">
                                                                                                                <label for="first-name-vertical">Mã nhân viên</label>
                                                                                                                <input  style="pointer-events:none;"type="text" class="form-control" name="user_code" value="{{$user->user_code}}" placeholder="Mã nhân viên">
                                                                                                                    <label for="text" class="error"></label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-12">
                                                                                                            <div class="form-group">
                                                                                                                <label for="first-name-vertical">Họ và tên</label>
                                                                                                                <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Họ và tên">
                                                                                                                    <label for="text" class="error"></label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-12">
                                                                                                            <div class="form-group">
                                                                                                                <label for="email-id-vertical">Số CMND</label>
                                                                                                                <input type="number" id="id_card" class="form-control" name="id_card" value="{{$user->id_card}}" placeholder="Số CMND">
                                                                                                                    <label for="text" class="error"></label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-12">
                                                                                                            <div class="form-group">
                                                                                                                <label for="password-vertical">Vị trí làm việc</label>
                                                                                                                <fieldset class="form-group">
                                                                                                                    <select class="form-select" name="role_id">
                                                                                                                        <option value="">---Chọn vị trí làm việc---</option>   
                                                                                                                        <option value="0"{{$user->role_id == 0 ? "selected='seleted'" : ""}}>Quản lý</option>
                                                                                                                        <option value="1" {{$user->role_id == 1 ? "selected='seleted'" : ""}}>Thu ngân</option>
                                                                                                                        <option value="2" {{$user->role_id == 2 ? "selected='seleted'" : ""}}>Pha chế</option>
                                                                                                                    </select>
                                                                                                                    <label for="text" class="error"></label>
                                                                                                                </fieldset>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-12">
                                                                                                            <div class="form-group">
                                                                                                                <label for="password-vertical">Giới tính</label>
                                                                                                                <fieldset class="form-group">
                                                                                                                    <select class="form-select" name="gender">
                                                                                                                        <option value="">---Chọn Giới tính---</option>   
                                                                                                                        <option value="0" {{$user->gender == 0 ? "selected='seleted'" : ""}}>Nam</option>
                                                                                                                        <option value="1" {{$user->gender == 1 ? "selected='seleted'" : ""}}>Nữ</option>
                                                                                                                    </select>
                                                                                                                    <label for="text" class="error"></label>
                                                                                                                </fieldset>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-12">
                                                                                                            <div class="form-group">
                                                                                                                <label for="password-vertical">Trạng thái</label>
                                                                                                                <fieldset class="form-group">
                                                                                                                    <select class="form-select" name="status">
                                                                                                                        <option value="">---Chọn trạng thái---</option>   
                                                                                                                        <option value="0" {{$user->status == 0 ? "selected='seleted'" : ""}}>Đang làm việc</option>
                                                                                                                        <option value="1" {{$user->status == 1 ? "selected='seleted'" : ""}}>Đã nghỉ việc</option>
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
                                                                    </div>
                                                                </section>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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