@extends('layouts.app_master_dashboard')
@section('content')
<style type="text/css">
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
</style>
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Thêm mới đơn bán hàng</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Thêm mới đơn bán hàng</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
<!-- // Basic multiple Column Form section start -->
	<section id="multiple-column-form" style="margin-top: 35px">
	    <div class="row match-height">
	        <div class="col-12">
	            <div class="card">
	                <div class="card-content">
	                    <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                	@if(isset($menu))
	                                	<div class="row" >
		                                	@foreach($menu as $k => $value)
		                                    	<div class="col-3" data-action="addField" data-product-id="{{ $value->id }}" style="background: #ebebea!important; margin: 10px; text-align: center;">
		                                    		<img style="width: 100%; background-color:#ebebea" 
		                                    			data-action="addField"
		                                    			data-product-id="{{ $value->id }}"  
		                                    			src="{{asset('dashboard/assets/images/food.png')}}" 
		                                    			alt="">
		                                    		<strong >{{$value->name}}</strong>
		                                    		<div style="display: none;">
		                                    			<div data-product-id="{{$value->id}}" data-content="templateItem" >
			                                    			<div class="row" data-product-id="{{$value->id}}">
			                                    				<input type="hidden" id="productId" name="productId[]" value="{{$value->id}}">
		                                                        <div class="col-3">
		                                                            <div class="form-group">
		                                                                <label for="first-name-vertical" 
                                                                        class="form-control"  
                                                                        style="border: none; text-transform: none;">{{$value->name}}</label>
		                                                                <input type="hidden" name="name[]" value="{{$value->id}}">  
		                                                            </div>
		                                                        </div>
		                                                        <div class="col-2">
		                                                            <div class="form-group">
		                                                            	<input type="number" data-product-id="{{$value->id}}" data-action="changeAction" class="form-control" name="unit[]" placeholder="SL" value="1">
		                                                            </div>
		                                                        </div>
		                                                        <div class="col-2">
		                                                            <div class="form-group">
		                                                            	<input style="pointer-events:none; border: none" class="form-control" type="text"value="{{$value->price}}">   
		                                                                <input type="hidden"  name="price[]" data-product-id="{{$value->id}}" value="{{$value->price}}">   
		                                                            </div>
		                                                        </div>
		                                                        <div class="col-3">
		                                                            <div class="form-group">
		                                                            	<input type="number" data-action="changeAction" style="pointer-events:none; border: none" class="form-control" name="totalPrice[]" id="totalPrice_{{$value->id}}" data-product-id="{{$value->id}}" value="{{$value->price}}" >
		                                                            </div>
		                                                        </div>
		                                                        <div class="col-2">
		                                                           <button type="button" class="btn btn-primary"  data-product-id2="{{$value->id}}" data-action="minusField"></button>
		                                                        </div>
		                                                    </div>
		                                                </div>

		                                    		</div>
		                                    	</div>
		                                    @endforeach
		                                </div>
                                    @endif
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <form class="form form-vertical" action="{{route('store.billofsale')}}" method="POST">
                                            @csrf
                                            <div class="form-body">
			                                    <div class="form-group row align-items-center">
			                                        <div class="col-3">
			                                            <label style="font-weight:900;" class="col-form-label">Chọn bàn: </label>
			                                        </div>
			                                        <div class="col-9">
			                                            <fieldset class="form-group">
                                                            <select class="choices form-select" name="table_id">
                                                                <option value="">--- Chọn bàn ---</option>
                                                                @if(isset($table))
                                                                    @foreach($table as $element)
                                                                        <option value="{{$element->id}}">Bàn {{$element->number}}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </fieldset>
			                                        </div>
			                                    </div>      
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label style="font-weight:900;" for="first-name-vertical">Tên món</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label style="font-weight:900;" for="email-id-vertical">SL</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label style="font-weight:900;" for="email-id-vertical">Đơn giá</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label style="font-weight:900;" for="email-id-vertical">Thành tiền</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div data-content="templateItem2">
                                                                       
												</div>

												<div class="form-group row align-items-center">
			                                        <div class="col-3">
			                                            <label style="font-weight:900;" class="col-form-label">Tổng tiền: </label>
			                                        </div>
			                                        <div class="col-9">
			                                            <input type="text" style="pointer-events:none; border: none" id ="amouts" class="form-control" name="amouts" value="0">
			                                        </div>
			                                    </div>           
                                            </div>
                                            <div class="clearfix" style="padding-top: 15px;">
                                                <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Hủy</span>
                                                </button>
                                                <button type="submit" class="btn btn-primary float-right">Thanh toán</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>
<!-- // Basic multiple Column Form section end -->
</div>

<script type="text/javascript">
	var __PRODUCT_LIST = []

    function plusField(){
        $('body').on('click',' [data-action=addField]', function(){
        	let id = $(this).attr('data-product-id')
        	if(__PRODUCT_LIST.includes(id) == false) {
        		let template = $(`[data-content=templateItem][data-product-id="${id}"]`).html();
	            $('[data-content=templateItem2]').append(template);
           	 	__PRODUCT_LIST.push(id)
        	}
        });

        $('body').on('click', ' [data-action=minusField]', function(){ 
        	let idRemove = $(this).attr('data-product-id2');
        	__PRODUCT_LIST = __PRODUCT_LIST.filter(e => e !== idRemove)
            $(this).parent().parent().remove();
        });
    }

    function calculate() {
    	$('body').on('change',' [data-action=changeAction]', function(){
    		var amouts = 0;
			let idProduct = $(this).attr('data-product-id');
			let unit = $(`[data-content=templateItem2] [name="unit[]"][data-product-id="${idProduct}"]`).val();
			let price = $(`[data-content=templateItem2] [name="price[]"][data-product-id=${idProduct}]`).val();
			let totalPrice = parseInt(unit)*parseInt(price);
			$(`[data-content=templateItem2] [name="totalPrice[]"][data-product-id=${idProduct}]`).val(totalPrice);
    	});
    }

    $('body').on('click', function(){ 
    	var sum = 0;
		$('[data-content=templateItem2] input[id^="totalPrice_"][type="number"]').map(function(){

			sum = sum + parseInt(this.value) 

		})

		$("#amouts").val(function() {
		    return sum;
		});

	});
</script>

<script>
    plusField();
    calculate();
</script>
@stop

