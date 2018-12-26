@extends('layouts.layoutAdmin')
@section('content')
    <div class="row">
        <!-- start of weather widget -->
        <div class="col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Điều kiện tìm kiếm</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li>
                            <a class="collapse-link" tabindex="4"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" id="condition-search">
                    <form class="form-horizontal input_mask" id="form-search" action="#" accept-charset="UTF-8" method="get">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="Email">Email</label>
                                    <input class="form-control" name="Email" id="Email" tabindex="1"/>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="TenNhanVien">Tên nhân viên</label>
                                    <input class="form-control" name="TenNhanVien" id="TenNhanVien" tabindex="2" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <button type="button" class="btn btn-primary" id="btn-search" link-search="#" tabindex="3">Tìm kiếm</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Danh sách nhân viên</h2>
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
                                        <input type="checkbox" id="check-all" class="flat">
                                    </th>
                                    <th class="text-center">Sửa</th>
                                    <th class="text-center">Tên nhân viên</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Số điện thoại</th>
                                    <th class="text-center">Địa chỉ</th>
                                    <th class="text-center">Xóa</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($user as $index=>$item)
                                    <tr>
                                        <td class="text-center middle col-checkbox">
                                            <input type="checkbox" class="flat check-item" name="check-remove" id-del="">
                                        </td>
                                        <td class="text-center middle">
                                            <a href="#">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <td class="text-center middle">
                                            Tên nhân viên
                                        </td>
                                        <td class="text-center middle">
                                            Email
                                        </td>
                                        <td class="text-center middle">
                                            Số điện thoại
                                        </td>
                                        <td class="text-center middle">
                                            Địa chỉ
                                        </td>
                                        <td class="text-center middle">
                                            <button type="button" class="btn btn-xs btn-danger btn-delete" id-del="">
                                                <i class="fa fa-times" aria-hidden="true"></i>
                                            </button>
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
                                {{ $user->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
