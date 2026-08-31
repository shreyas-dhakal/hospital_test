<x-app-layout>   
    <div class="container-fluid">
        <h1 class="text-2xl font-bold mb-4">Teams</h1>
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
                <th>Name</th>
                <th>Designation</th>
                <th>Image</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach ($teams as $team)
                <tr>
                    <td>{{ $team->id }}</td>
                    <td>{{ $team->name }}</td>
                    <td>{{ $team->designation }}</td>
                    <td><img src="{{asset($team->image)}}" alt="" style="width: 70px; height:70px"></td>
                    <td>{{ $team->description }}</td>
                    <td>
                        <form action="{{ route('team.edit', ['team' => $team]) }}" method="GET">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>                        
                    </td>
                    <td><form method="post" action="{{route('team.delete', ['team' => $team])}}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <a href="{{ route('team.create') }}" class="btn btn-primary">New Team Entry</a>
    </div>
    </div>
</div>
</x-app-layout>