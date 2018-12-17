@extends('layouts.app')

@section('content')

    <div class="col-md-8">
        <div class="card-header"><h2  style="color: #2176BD;">Danh sách người dùng </h2></div>
        <div class="card-body">
        <button><a href="{{route('register')}}">Thêm</a></button>

        @if($user !=null)
        <table class="table dark">
            <thead>
            <th>STT</th>
            <th>Tên</th>
            <th>Email</th>
            @if(\Illuminate\Support\Facades\Auth::user()->role == 1)
            <th>Phòng</th>
            @endif
            <th>Sđt</th>
            <th>Sửa</th>
            <th>Xóa</th>
            </thead>
            @php($i=1)

            @foreach($user as $index=>$item)

            <tr>
                <td>{{$index+$user->firstItem()}}</td>
                <td><a href="{{route('User.Detail',['id'=>$item->userId])}}">{{$item->name}}</a></td>
                <td>{{$item->email}}</td>
                @if(\Illuminate\Support\Facades\Auth::user()->role == 1)
                <td>{{$item->roomName['roomName']}}</td>
                @endif
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
                {{ $user->links() }}
    @else
        <h2>Không tìm thấy kết quả</h2>
            @endif
    </div>

    </div>
@endsection