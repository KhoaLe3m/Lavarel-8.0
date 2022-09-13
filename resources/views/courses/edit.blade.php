<form action="{{ route("courses.update",$course) }}" method="post">
    @csrf
    @method("PUT")
    <label for="name">Name</label>
    <input type="text" name="name" value="{{ $course->name }}">
    <br>
    <button>Edit</button>
</form>