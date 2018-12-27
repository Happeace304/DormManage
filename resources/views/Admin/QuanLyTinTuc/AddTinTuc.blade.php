@extends('layouts.layoutAdmin')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Tin Tức</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{$action}}" enctype="multipart/form-data">
                        @csrf
                        @if(isset($user)) @method('PUT') @endif
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tiêu đề <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="title" name="title" required="required" class="form-control col-md-7 col-xs-12"
                                       value="{{ isset($user)?$user->title:''}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Ảnh bìa</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" id="image" name="image" class="form-control col-md-7 col-xs-12">
                                @if(isset($user))<input type="text" hidden name="old_image" value="{{$user->imgLink}}"> @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Nội dung</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class="form-control" id="summary-ckeditor" name="content"></textarea>
                            </div>
                        </div>
                        <input type="text" hidden name='userId' value="{{\Illuminate\Support\Facades\Auth::user()->userId}}">

                         <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button class="btn btn-danger" type="button">Xóa sinh viên</button>
                                <button type="submit" class="btn btn-success" style="float: right;">Lưu thông tin sinh viên</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- CKEDITOR -->
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'summary-ckeditor' );
    </script>
@endsection
