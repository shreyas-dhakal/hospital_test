<x-app-layout>   
    <div class="container-fluid">
        <h1 class="text-2xl font-bold mb-4">Users</h1>
    <div>
        @if(session()->has('success'))
            <div>
                {{session('success')}}
            </div>
        @endif
    </div>
    <div>
        <table border="1" class="table table-striped">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <!--
                <th>Password</th>
                -->
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <!--
                    <td>{{$user->password}}</td>
                    -->
                    
                    <td>
                        <form action="{{ route('user.edit', ['user' => $user]) }}" method="GET">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>                        
                    </td>
                    <td><form method="post" action="{{route('user.delete', ['user' => $user])}}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div>
        <a href="{{ route('user.create') }}" class="btn btn-primary">New User Entry</a>
    </div>
    </div>
</x-app-layout>