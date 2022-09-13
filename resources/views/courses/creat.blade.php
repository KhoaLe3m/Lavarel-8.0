<form action="{{ route("courses.store") }}" method="post">
    @csrf
    <label for="name">Name</label>
    <input type="text" name="name">
    <br>
    <input type="submit" value="Add">
</form>