@extends('layouts.layoutAdmin')
@section('content')
    <div class="row">
        <!-- start of weather widget -->
        <div class="col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Thông tin phòng</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li>
                            <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" id="condition-search">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="TenPhong">Tên phòng</label>
                                <input class="form-control" name="TenPhong" id="TenPhong" tabindex="1" readonly="readonly"
                                value="{{$room->roomName}}"/>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="SoLuong">Số lượng</label>
                                <input class="form-control" name="SoLuong" id="SoLuong" tabindex="2" readonly="readonly"
                                value="{{count($user)}}"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Danh sách sinh viên trong phòng</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li>
                            <a class="collapse-link" tabindex="4"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" id="div-table-course">
                    <div class=" table-result" id="table-result" link-del="#" link-update-show="#" link-update-state="#">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered jambo_table">
                                <thead>
                                <tr>
                                    <th class="text-center col-checkbox">
                                        <input type="checkbox" id="check-all" class="flat" onclick="checkAll()">
                                    </th>
                                    <th class="text-center">Sửa</th>
                                    <th class="text-center">Tên sinh viên</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Số điện thoại</th>
                                    <th class="text-center">Địa chỉ</th>
                                    <th class="text-center">Ngày hết hạn phòng</th>
                                    <th class="text-center">Gia hạn</th>
                                    <th class="text-center">Xóa</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($user as $item)
                                    <tr>
                                        <td class="text-center middle col-checkbox">
                                            <input type="checkbox" class="flat check-item" name="check-remove" id="{{$item->userId}}">
                                        </td>
                                        <td class="text-center middle">
                                            <a href="{{route('EditFormSinhVien',['id'=>$item->userId])}}" onclick="event.preventDefault();
                                                    document.getElementById('editform#{{$item->userId}}').submit();">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                            <form id="editform#{{$item->userId}}" action="{{route('EditFormSinhVien',['id'=>$item->userId])}}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </td>
                                        <td class="text-center middle">
                                            {{$item->name}}
                                        </td>
                                        <td class="text-center middle">
                                            {{$item->email}}
                                        </td>
                                        <td class="text-center middle">
                                            {{$item->phone}}
                                        </td>
                                        <td class="text-center middle">
                                            {{$item->address}}
                                        </td>
                                        <td class="text-center middle">
                                            {{date('d-m-Y',strtotime($item->expire_date))}}
                                        </td>
                                        <td class="text-center middle">
                                            <form method="post" action="{{route('User.Recharge',['id'=> $item->userId])}}">
                                                @method('put')
                                                @csrf
                                                <button class="btn btn-xs btn-primary" >
                                                    <i class="fa fa-hourglass-start" aria-hidden="true"></i>
                                                </button>
                                            </form>

                                        </td>
                                        <td class="text-center middle">
                                            <form method="post" id='del#{{$item->userId}}'action="{{route('XoaUser',['id'=> $item->userId])}}">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-xs btn-danger btn-delete" >
                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                        </div>
                        <div class="col-xs-3 pl-0">
                            <button type="button" class="btn btn-danger btn-delete-selected">Xóa các mục đã chọn</button>
                        </div>
                        <div class="col-xs-9 pr-0">
                            <div  style="float:right;">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Thông tin hóa đơn tiền điện nước</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li>
                            <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" id="div-table-course">
                    <div class=" table-result" id="table-result" link-del="#" link-update-show="#" link-update-state="#">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered jambo_table">
                                <thead>
                                <tr>
                                    <th class="text-center">STT</th>
                                    <th class="text-center">Thời gian</th>
                                    <th class="text-center">Số tiền</th>
                                    <th class="text-center">Trạng thái</th>
                                    <th class="text-center">Ghi chú</th>
                                    <th class="text-center">Thanh toán</th>


                                </tr>
                                </thead>
                                <tbody>
                                @foreach($bill as $index=>$item1)
                                <tr>
                                    <td class="text-center middle">
                                       {{$index}}
                                    </td>
                                    <td class="text-center middle">
                                        {{\Illuminate\Support\Carbon::parse($item1->month)->format('m-Y')}}

                                    </td>
                                    <td class="text-center middle">
                                        {{number_format($item1->total,'0','.',',')}} VNĐ
                                    </td>
                                    <td class="text-center middle">
                                        {{$item1->state==1?'Chưa thanh toán':'Đã thanh toán'}}
                                    </td>
                                    <td class="text-center middle">
                                        {{$item1->note}}
                                    </td>
                                    <td class="text-center middle">
                                        <form method="post" action="{{route('ThanhToanHoaDon',['id'=> $item1->roomId])}}">
                                            @method('put')
                                            @csrf
                                            <button class="btn btn-xs btn-primary" >
                                                <i class="fa fa-money" aria-hidden="true"></i>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        <div class="col-xs-3 pl-0">

                        </div>
                        <div class="col-xs-9 pr-0">
                            <div  style="float:right;">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
