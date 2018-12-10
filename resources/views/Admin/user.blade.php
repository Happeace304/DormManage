@extends('layouts.app')

@section('content')

    <div class="col-md-8">
        <h2  style="color: #2176BD;">Danh sách người dùng Sinh Viên</h2>
        <table class="table dark">
            <thead>
            <th>STT</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Phòng</th>
            <th>Sđt</th>
            <th></th>
            <th></th>
            </thead>
            @php($i=1)
            @foreach($user as $item)

            <tr>
                <td>{{$i}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->roomName['roomName']}}</td>
                <td>{{$item->phone}}</td>
                <td><a href="#"><i class="fas fa-edit"></i></a></td>
                <td><a href="#"><i class="fas fa-eraser"></i></a></td>
            </tr>
                @php($i++)
                @endforeach
        </table>

    </div>


@endsection
