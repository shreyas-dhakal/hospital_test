<x-app-layout>   
    <div class="container-fluid">
        <h1 class="text-2xl font-bold mb-4">Doctors</h1>
        <div>
            @if(session()->has('success'))
                <div>
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div>
            <table border="1" class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>NMC Registration Number</th>
                        <th>Department</th>
                        <th>Availability</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($doctors as $doctor)
                        <tr>
                            <td>{{ $doctor->name }}</td>
                            <td>{{ $doctor->designation }}</td>
                            <td><img src="{{ asset($doctor->image) }}" alt="" style="width: 70px; height:70px"></td>
                            <td>{{ $doctor->description }}</td>
                            <td>{{ $doctor->nmc_reg }}</td>
                            <td>{{ $doctor->department->name }}</td>
                            <td>
                                @foreach ($doctor->availabilities->take(2) as $availability)
                                    <p>{{ $availability->day }}: {{ $availability->start_time }} - {{ $availability->end_time }}</p>
                                @endforeach
                            </td>
                            <td>
                                <form action="{{ route('doctor.edit', ['doctor' => $doctor]) }}" method="GET">
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </form>                        
                            </td>
                            <td>
                                <form method="post" action="{{ route('doctor.delete', ['doctor' => $doctor]) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $doctors->links() }} <!-- Pagination links -->
            </div>
            <a href="{{ route('doctor.create') }}" class="btn btn-primary mb-5">New Doctor Entry</a>
        </div>
    </div>
</x-app-layout>
