@extends('layouts.app_master_dashboard')
@section('content')
<style type="text/css">
    [data-action="addField"]::after {
        content: '\f067';
        display: inline-block;
        font-family: 'FontAwesome';
        font-weight: bold;
    }
    [data-action="addField"]:hover {
        cursor: pointer;
        background-color: #2196F3
    }
    [data-action="minusField"]:hover {
        cursor: pointer;
        background-color: #dc3333
    }

    [data-action="addField"] {
        background-color: #2196F3;
        border: none;
    }
    [data-action="minusField"] {
        background-color: #dc3333;
        border: none;
    }
    [data-action="minusField"]::after {
        content: '\f068';
        display: inline-block;
        font-family: 'FontAwesome';
        font-weight: bold;
    }



    [data-action="addField1"]::after {
        content: '\f067';
        display: inline-block;
        font-family: 'FontAwesome';
        font-weight: bold;
    }
    [data-action="addField1"]:hover {
        cursor: pointer;
        background-color: #2196F3
    }
    [data-action="minusField1"]:hover {
        cursor: pointer;
        background-color: #dc3333
    }

    [data-action="addField1"] {
        background-color: #2196F3;
        border: none;
    }
    [data-action="minusField1"] {
        background-color: #dc3333;
        border: none;
    }
    [data-action="minusField1"]::after {
        content: '\f068';
        display: inline-block;
        font-family: 'FontAwesome';
        font-weight: bold;
    }
</style>
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Quản lý phiếu nhập kho</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Quản lý phiếu nhập kho</li>
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
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Thêm mới phiếu nhập kho</h5>
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
                                                            <form class="form form-vertical" action="{{route('post.create.goodDeliveryNote')}}" method="POST" id="createMenu">
                                                                @csrf
                                                                <div class="form-body">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="first-name-vertical">Mã phiếu</label>
                                                                                <input type="text" class="form-control" name="goods_delivery_note_code"
                                                                                    placeholder="Mã phiếu">
                                                                                    <label for="text" class="error"></label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="email-id-vertical">Nhà cung cấp</label>
                                                                                <fieldset class="form-group">
                                                                                    <select class="choices form-select" name="supplier_id">
                                                                                        <option value="">--- Chọn nhà cung cấp ---</option>
                                                                                        @if(isset($supplier))
                                                                                            @foreach($supplier as $element)
                                                                                                <option value="{{$element->id}}">{{$element->name}}</option>
                                                                                            @endforeach
                                                                                        @endif
                                                                                    </select>
                                                                                </fieldset>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="email-id-vertical">Tên người giao hàng</label>
                                                                                <input type="text" class="form-control" name="deliver"
                                                                                    placeholder="Tên người giao hàng">
                                                                                    <label for="text" class="error"></label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="email-id-vertical">SĐT người giao hàng</label>
                                                                                <input type="number" class="form-control" name="deliver_phone_number"
                                                                                    placeholder="SĐT người giao hàng">
                                                                                    <label for="text" class="error"></label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div data-content="templateItem">
                                                                                <div class="row" >
                                                                                    <div class="col-7">
                                                                                        <div class="form-group">
                                                                                            <label for="email-id-vertical">Hàng hóa</label>
                                                                                            <fieldset class="form-group" id="matterials_id">
                                                                                                <select class="form-select" name="matterials_id[]">
                                                                                                    @if(isset($matterial))
                                                                                                        <option value="">---Chọn hàng hóa---</option>   
                                                                                                        @foreach($matterial as $element)
                                                                                                            <option value="{{$element->id}}">{{$element->name}} - {{$element->unit}}</option>
                                                                                                        @endforeach
                                                                                                    @endif
                                                                                                </select>
                                                                                            </fieldset>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-3">
                                                                                        <div class="form-group" id="amount">
                                                                                            <label for="email-id-vertical">Số lượng</label>
                                                                                            <input type="number" class="form-control" name="amount[]" id="amount" 
                                                                                            placeholder="Số lượng">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-2">
                                                                                         <label for="email-id-vertical"></label>
                                                                                         <button type="button" class="btn btn-primary" data-action="addField"></button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div data-content="templateItem2">
                                                                                        
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
        @if(isset($goodDeliveryNote))
        <div class="card">
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã phiếu nhập kho</th>
                            <th>Người lập phiếu</th>
                            <th>Nhà cung cấp</th>
                            <th>Tên người giao hàng</th>
                            <th>SĐT người giao hàng</th>
                            <th>Thời gian lập phiếu</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($goodDeliveryNote as $k => $value)
                            <tr>
                                <td>{{$k + 1}}</td>
                                <td>{{$value->goods_delivery_note_code}}</td>
                                <td>{{$value->staffIsName}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->deliver}}</td>
                                <td>{{$value->deliver_phone_number}}</td>
                                <td>{{$value->issue_date}}</td>
                                <td class="active">
                                    <a href="{{route('get.goodDeliveryNoteDetail', $value->id)}}" class='sidebar-link'>
                                        <i data-feather="delete" width="20"></i> 
                                        <span>Xem chi tiết</span>
                                    </a>
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
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Sửa phiếu nhập kho</h5>
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
                                                                                        <form class="form form-vertical" action="{{ route('post.update.goodDeliveryNote', $value->id) }}" method="POST">
                                                                                            @csrf
                                                                                            <div class="form-body">
                                                                                                <div class="row">
                                                                                                    <div class="col-12">
                                                                                                        <div class="form-group">
                                                                                                            <label for="first-name-vertical">Mã nhà hàng hóa</label>
                                                                                                            <input style="pointer-events:none;" type="text" class="form-control" name="goods_delivery_note_code" value="{{$value->goods_delivery_note_code}}" placeholder="Mã hàng hóa" >
                                                                                                            <label for="text" class="error"></label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-12">
                                                                                                        <div class="form-group">
                                                                                                            <label for="email-id-vertical">Nhà cung cấp</label>
                                                                                                            <fieldset class="form-group">
                                                                                                                <select class="choices form-select" name="supplier_id">
                                                                                                                    <option value="">--- Chọn nhà cung cấp ---</option>
                                                                                                                    @if(isset($supplier))
                                                                                                                        @foreach($supplier as $element)
                                                                                                                            <option value="{{$element->id}}"{{$element->id == $value->supplier_id ? "selected='seleted'" : "" }}>{{$element->name}}</option>
                                                                                                                        @endforeach
                                                                                                                    @endif
                                                                                                                </select>
                                                                                                            </fieldset>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-12">
                                                                                                        <div class="form-group">
                                                                                                            <label for="email-id-vertical">Tên người giao hàng</label>
                                                                                                            <input type="text" class="form-control" value="{{$value->deliver}}" name="deliver"
                                                                                                                placeholder="Tên người giao hàng">
                                                                                                                <label for="text" class="error"></label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-12">
                                                                                                        <div class="form-group">
                                                                                                            <label for="email-id-vertical">SĐT người giao hàng</label>
                                                                                                            <input type="number" class="form-control" value="{{$value->deliver_phone_number}}" name="deliver_phone_number"
                                                                                                                placeholder="SĐT người giao hàng">
                                                                                                                <label for="text" class="error"></label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-12">
                                                                                                        @foreach($goodDeliveryNoteDetails as $key => $deliveryNoteDetails)
                                                                                                        @if($value->id === $key)
                                                                                                            @foreach($deliveryNoteDetails as $deliveryNoteDetail)
                                                                                                                @foreach($deliveryNoteDetail as $delivery)
                                                                                                                    <div data-content="templateItem3">
                                                                                                                        <div class="row" >
                                                                                                                            <div class="col-7">
                                                                                                                                <div class="form-group">
                                                                                                                                    <label for="email-id-vertical">Hàng hóa</label>
                                                                                                                                    <fieldset class="form-group" id="matterials_id">
                                                                                                                                        <select class="form-select" name="matterials_id[]">
                                                                                                                                            @if(isset($matterial))
                                                                                                                                                <option value="">---Chọn hàng hóa---</option>   

                                                                                                                                                @foreach($matterial as $element)
                                                                                                                                                    <option value="{{$element->id}}" {{$element->id == $delivery->matterials_id ? "selected='seleted'" : "" }}>{{$element->name}} - {{$element->unit}}</option>
                                                                                                                                                @endforeach
                                                                                                                                            @endif
                                                                                                                                        </select>
                                                                                                                                    </fieldset>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col-3">
                                                                                                                                <div class="form-group" id="amount">
                                                                                                                                    <label for="email-id-vertical">Số lượng</label>
                                                                                                                                    <input type="number" class="form-control" value="{{$delivery->amount}}" name="amount[]" id="amount" 
                                                                                                                                    placeholder="Số lượng">
                                                                                                                                </div>
                                                                                                                            </div>

                                                                                                                            <div class="col-2">
                                                                                                                                 <label for="email-id-vertical"></label>
                                                                                                                                 <button type="button" class="btn btn-primary" data-action="minusField"></button>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div data-content="templateItem4">
                                                                                                                                
                                                                                                                    </div>
                                                                                                                @endforeach
                                                                                                            @endforeach
                                                                                                        @endif
                                                                                                        @endforeach
                                                                                                    </div>
                                                                                                    <div class="col-12">
                                                                                                        <div data-content="templateItem">
                                                                                                            <div class="row" >
                                                                                                                <div class="col-7">
                                                                                                                    <div class="form-group">
                                                                                                                        <label for="email-id-vertical">Hàng hóa</label>
                                                                                                                        <fieldset class="form-group" id="matterials_id">
                                                                                                                            <select class="form-select" name="matterials_id[]">
                                                                                                                                @if(isset($matterial))
                                                                                                                                    <option value="">---Chọn hàng hóa---</option>   
                                                                                                                                    @foreach($matterial as $element)
                                                                                                                                        <option value="{{$element->id}}">{{$element->name}} - {{$element->unit}}</option>
                                                                                                                                    @endforeach
                                                                                                                                @endif
                                                                                                                            </select>
                                                                                                                        </fieldset>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-3">
                                                                                                                    <div class="form-group" id="amount">
                                                                                                                        <label for="email-id-vertical">Số lượng</label>
                                                                                                                        <input type="number" class="form-control" name="amount[]" id="amount" 
                                                                                                                        placeholder="Số lượng">
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                                <div class="col-2">
                                                                                                                     <label for="email-id-vertical"></label>
                                                                                                                     <button type="button" class="btn btn-primary" data-action="addField"></button>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div data-content="templateItem2">
                                                                                                                    
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
                                    <a href="{{ route('get.delete.goodDeliveryNote', $value->id) }}" class='sidebar-link'>
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
        @endif
    </section>
</div>
<script type="text/javascript">

    function plusField(){
        let template = $('[data-content=templateItem]').html();

        $('body').on('click',' [data-action=addField]', function(){
            $('[data-content=templateItem2]').append(template);
``
            $(this).attr('data-action','minusField');
        });

        $('body').on('click', ' [data-action=minusField]', function(){ 
            $(this).parent().parent().remove();
        });
    }

    function plusField1(){
        let template1 = $('[data-content=templateItem3]').html();

        $('body').on('click',' [data-action=addField1]', function(){
            $('[data-content=templateItem4]').append(template1);
``
            $(this).attr('data-action','minusField1');
        });

        $('body').on('click', ' [data-action=minusField1]', function(){ 
            $(this).parent().parent().parent().remove();
        });
    }
</script>

<script>
    plusField('[data-wrap=templateItem2]');
    plusField1('[data-wrap=templateItem4]');
</script>
@stop