@extends("layout.main")
@section("content")
<h1>dasboard</h1>
<form action="{{ Route("logout") }}" method="post">
    @csrf
<button type="submit">logout</button>
</form>
@endsection
