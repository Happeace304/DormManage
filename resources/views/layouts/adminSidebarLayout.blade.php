<div class="col-md-4 " id="mysidebar" >
    <form method="get" action="{{route('User.Search')}}">
   <input name="q" type="text">
        @if(\Illuminate\Support\Facades\Auth::user()->role ==1)
        <select name="select">
            <option value="name">Tên</option>
            <option value="room">Phòng</option>
        </select>

        @else <input name="select" value="name" hidden>
        @endif
        <button class="fas fa-search"></button>
    </form>
</div>


