<form action="{{ route("courses.store") }}" method="post">
    @csrf
    <label for="name">Name</label>
    <input type="text" name="name" value="{{ old("name") }}">
    @if ($errors->any())
        <span>
            <ul>
                @foreach ($errors->get("name") as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </span>
    @endif
    <br>
    <input type="submit" value="Add">
</form>