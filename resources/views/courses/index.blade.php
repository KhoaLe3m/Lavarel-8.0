<a href="{{ route("courses.create") }}">Thêm</a>
<h1>Danh sách khóa học</h1>
<table border="1" width="100%">
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