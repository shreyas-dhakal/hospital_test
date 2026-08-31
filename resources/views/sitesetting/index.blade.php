<x-app-layout>   
    <div class="container-fluid">
        <h1 class="text-2xl font-bold mb-4 text-center">Site Settings</h1>
        <div>
            @if(session()->has('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Logo</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Email 1</th>
                        <th>Email 2</th>
                        <th>Phone Number 1</th>
                        <th>Phone Number 2</th>
                        <th>Link 1</th>
                        <th>Link 2</th>
                        <th>Link 3</th>
                        <th>Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sitesettings as $sitesetting)
                    <tr>
                        <td>{{ $sitesetting->id }}</td>
                        <td><img src="{{ asset($sitesetting->logo) }}" alt="Logo" class="img-fluid" style="max-height: 50px; object-fit: cover;"></td>
                        <td>{{ $sitesetting->name }}</td>
                        <td>{{ $sitesetting->address }}</td>
                        <td>{{ $sitesetting->email1 }}</td>
                        <td>{{ $sitesetting->email2 }}</td>
                        <td>{{ $sitesetting->phone_number1 }}</td>
                        <td>{{ $sitesetting->phone_number2 }}</td>
                        <td>{{ $sitesetting->link1 }}</td>
                        <td>{{ $sitesetting->link2 }}</td>
                        <td>{{ $sitesetting->link3 }}</td>
                        <td><img src="{{ asset($sitesetting->image) }}" alt="Image" class="img-fluid" style="max-height: 50px; object-fit: cover;"></td>
                        <td>
                            <form action="{{ route('sitesetting.edit', ['sitesetting' => $sitesetting]) }}" method="GET" class="d-inline-block">
                                <button type="submit" class="btn btn-primary btn-sm">Edit</button>
                            </form>
                        </td>
                        <td>
                            <form method="post" action="{{ route('sitesetting.delete', ['sitesetting' => $sitesetting]) }}" class="d-inline-block">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            <a href="{{ route('sitesetting.create') }}" class="btn btn-primary">Create Settings Entry</a>
        </div>
    </div>
</x-app-layout>
