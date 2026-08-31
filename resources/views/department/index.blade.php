<x-app-layout>  
    <div class="container-fluid">
        <h1 class="text-2xl font-bold mb-4">Departments</h1>
        <div>
            @if(session()->has('success'))
                <div>
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div>
            <table border="1" class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Department Name</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @php
                    $counter = ($departments->currentPage() - 1) * $departments->perPage() + 1;
                @endphp
                @foreach ($departments as $department)
                    <tr>
                        <td>{{ $counter }}</td>
                        <td>{{ $department->name }}</td>
                        <td><img src="{{ asset($department->image) }}" alt="Department" style="width: 70px; height:70px"></td>
                        <td>{{ $department->description }}</td>
                        <td>
                            <form action="{{ route('department.edit', ['department' => $department]) }}" method="GET">
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>                        
                        </td>
                        <td>
                            <form method="post" action="{{ route('department.delete', ['department' => $department]) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @php
                        $counter++;
                    @endphp
                @endforeach
            </table>
        </div>
        <div>
            {{ $departments->links() }}
        </div>
        <div>
            <a href="{{ route('department.create') }}" class="btn btn-primary">New Department Entry</a>
        </div>
    </div>
</x-app-layout>
