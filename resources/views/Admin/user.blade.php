@extends('layouts.app')

@section('content')

    <div class="col-md-8">
        <h2  style="color: #2176BD;">Danh sách người dùng </h2>
        @if($user !=null)
        <table class="table dark">
            <thead>
            <th>STT</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Phòng</th>
            <th>Sđt</th>
            <th>Sửa</th>
            <th>Xóa</th>
            </thead>
            @php($i=1)

            @foreach($user as $item)

            <tr>
                <td>{{$i}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->roomName['roomName']}}</td>
                <td>{{$item->phone}}</td>
                <td><a href="{{route('User.Edit',['id'=>$item->userId]) }}"><button class="fas fa-edit"></button></a></td>
                <td><form method="post" action="{{route('User.Delete',['id'=> $item->userId])}}">
                        @method('delete')
                        @csrf
                        <button class="fas fa-eraser"></button>
                    </form>
                </td>
            </tr>
                @php($i++)
                @endforeach
        </table>
    @else
        <h2>Không tìm thấy kết quả</h2>
            @endif
    </div>


@endsection
