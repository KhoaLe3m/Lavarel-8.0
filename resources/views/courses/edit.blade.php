<form action="{{ route("courses.update",$course) }}" method="post">
    @csrf
    @method("PUT")
    <label for="name">Name</label>
    <input type="text" name="name" value="{{ $course->name }}">
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
    <button>Edit</button>
</form>