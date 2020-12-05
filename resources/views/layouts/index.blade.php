@extends('layouts.app_master_dashboard')
@section('content')
<style type="text/css">
    label.error {
        color: red;
    }
</style>
    <div class="row mb-2">
        <div class="col-12 col-md-3">
            <div class="card card-statistic overflow-hidden" style="max-height: 150px">
                <div class="card-body p-0">
                    <div class="d-flex flex-column">
                        <div class='px-3 py-3 d-flex justify-content-between'>
                            <h3 class='card-title'>Tổng doanh thu</h3>
                            <div class="card-right d-flex align-items-center">
                                @if(isset($totalMoney))
                                    <p>{{number_format($totalMoney)}}VND</p>
                                @endif
                            </div>
                        </div>
                        <div class="chart-wrapper">
                            <canvas id="canvas1" style="height:100px !important"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="card card-statistic overflow-hidden" style="max-height: 150px">
                <div class="card-body p-0">
                    <div class="d-flex flex-column">
                        <div class='px-3 py-3 d-flex justify-content-between'>
                            <h3 class='card-title'> số món</h3>
                            <div class="card-right d-flex align-items-center">
                                @if(isset($totalDish))
                                    <p>{{$totalDish}} Món</p>
                                @endif
                            </div>
                        </div>
                        <div class="chart-wrapper">
                            <canvas id="canvas2" style="height:100px !important"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="card card-statistic overflow-hidden" style="max-height: 150px">
                <div class="card-body p-0">
                    <div class="d-flex flex-column">
                        <div class='px-3 py-3 d-flex justify-content-between'>
                            <h3 class='card-title'> Đơn hàng</h3>
                            <div class="card-right d-flex align-items-center">
                                @if(isset($totalBill))
                                    <p>{{$totalBill}} Đơn hàng</p>
                                @endif
                            </div>
                        </div>
                        <div class="chart-wrapper">
                            <canvas id="canvas3" style="height:100px !important"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="card card-statistic overflow-hidden" style="max-height: 150px">
                <div class="card-body p-0">
                    <div class="d-flex flex-column">
                        <div class='px-3 py-3 d-flex justify-content-between'>
                            <h3 class='card-title'>Doanh thu hôm nay</h3>
                            <div class="card-right d-flex align-items-center">
                                @if(isset($statisticalToday))
                                    <p>{{number_format($statisticalToday)}}VND</p>
                                @endif
                            </div>
                        </div>
                        <div class="chart-wrapper">
                            <canvas id="canvas4" style="height:100px !important"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class='card-heading p-1 pl-3'>Thống kê doanh thu theo ngày</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('statistical')}}" method="POST" id="statistical">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-6">
                                <label for="">Ngày bắt đầu</label>
                                <input type="date" class="form-control" name="startTime">
                                <label for="masv" class="error"></label>
                            </div>
                            <div class="col-md-6 col-6">
                                <label for="">Ngày kết thúc</label>
                                <input type="date" class="form-control" name="endTime" >
                                <label for="masv" class="error"></label>
                            </div>
                        </div>
                        <button type="submit" style="float: right;" class="btn btn-primary block">Tra cứu</button>
                    </form>
                    @if(isset($statistical))
                    <table class='table table-striped'>
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Ngày</th>
                                <th>Số lượng hóa đơn</th>
                                <th>Tổng doanh thu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($statistical as $k => $value)
                                <tr>
                                    <td>{{$k + 1}}</td>
                                    <td>{{$value['date']}}</td>
                                    <td>{{$value['countBill']}}</td>
                                    <td>{{number_format($value['total'])}} VND</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#statistical").validate({
                rules: {
                    startTime: {
                        required: true,
                    },
                    endTime: {
                        required: true,
                    },
                },
                messages: {
                    startTime: {
                        required: "Vui lòng chọn thời gian bắt đầu.",
                    },
                    endTime: {
                        required: "Vui lòng chọn thời gian kết thúc.",
                    }
                }
            });
        });
    </script>
@stop