<a href="{{ route("courses.create") }}">Thêm</a>
<h1>Danh sách khóa học</h1>
@if ($errors->any())
        <span>
            <ul>
                @foreach ($errors->get("course") as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </span>
    @endif
<table border="1" width="100%">
    <caption>
        <form>
            Search:<input type="search" name="q" value="{{ $search }}" >
        </form>
    </caption>
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Created At</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($courses as $course )
            <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->name }}</td>
                <td>{{ $course->getDateHuman() }}</td>
                <td>
                    <a href="{{ route("courses.edit",$course->id) }}">Sửa</a>
                </td>
                <td>
                    <form action="{{ route("courses.destroy",$course->id) }}" method="post">
                        @csrf
                        @method("DELETE")
                        <button>Delete</button>
                    </form>
                </td>

            </tr>
        @endforeach
    </tbody>
</table>
{{ $courses->links() }}

