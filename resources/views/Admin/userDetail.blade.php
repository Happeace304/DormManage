@extends('layouts.app')
@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Details') }}</div>
            <div class="card-body">
               <form style="font-weight: bold">
                   <div >
                       <label>Tên:</label> <span>{{$user->name}}</span>
                   </div>
                   <div>
                       <label>Ngày sinh:</label> <span>{{$user->roomName}}</span>
                   </div>
                   <div>
                       <label>Email:</label> <span>{{$user->email}}</span>
                   </div>
                   <div>
                       <label>Phòng:</label> <span>{{$user->roomName}}</span>
                   </div>
                   <div>
                       <label>SĐT:</label> <span>{{$user->phone}}</span>
                   </div>
                   <div>
                       <label>Địa chỉ:</label> <span>{{$user->address}}</span>
                   </div>
                   <div>
                       <label>Vị trí:</label> <span>@if($user->role == 0) {{'Admin'}}
                           @elseif($user->role == 1) {{'Nhân viên'}}
                                                        @else {{'Sinh viên'}}
                                                        @endif
                       </span>
                   </div>
                   <div>
                       <label>Ngày tạo:</label> <span>{{$user->created_at}}</span>
                   </div>
               </form>
            </div>
        </div>
    </div>
    <style>

    </style>
@endsection