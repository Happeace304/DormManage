<div class="col-md-4 " id="mysidebar" >
    <form method="get" action="{{route('User.Search')}}">
   <input name="q" type="text">
        <select name="select">
            <option value="name">Name</option>
            <option value="room">Room</option>
        </select>
    <button class="fas fa-search"></button>
    </form>
</div>


