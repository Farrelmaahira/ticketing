<form action="{{url('/auth/login')}}" method="post">
    @csrf
    <input type="email" name="email" id="">
    <input type="password" name="password" id="">
    <button type="submit">Login</button>
    <a href="{{url('/register')}}">Register</a>
</form>