<form action="{{url('/auth/register')}}" method="post">
    @csrf
    <input type="text" name="name" id="">
    <input type="email" name="email" id="">
    <input type="password" name="password" id="">
    <button type="submit">Register</button>
</form>