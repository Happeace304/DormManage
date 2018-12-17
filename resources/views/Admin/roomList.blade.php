@extends('layouts.app')

@section('content')

<div class="col-md-8">
    <div class="card-header"><h2  style="color: #2176BD;">Danh sách phòng </h2></div>
    <div class="card-body">
        @if($room !=null)
        <table class="table dark">
            <thead>
                <th>STT</th>
                <th>Phòng</th>
                <th>Số lượng</th>
                <th>Tình trạng</th>

            </thead>


            @foreach($room as $index=>$item)
                @if($item->billList >0)
                    <tr style="background: #e9605c">
                @else
                <tr>
                @endif
                <td>{{$index+$room->firstItem()}}</td>
                <td>{{$item->roomName}}</td>
                <td>{{$item->peopleCount}}</td>
                <td>{{$item->state==1?'Đầy':'Trống'}}</td>
            </tr>

            @endforeach
        </table>
        {{ $room->links() }}
        @else
        <h2>Không tìm thấy kết quả</h2>
        @endif
    </div>

</div>
@endsection
