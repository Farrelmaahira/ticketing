<h1>
    ini dashboard user
</h1>
<form action="{{url('/auth/logout')}}" method="post">
    @csrf
    <button type="submit">Logout</button>
</form>