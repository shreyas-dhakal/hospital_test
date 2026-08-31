<x-app-layout>
    <div class="container-fluid">
        <div>
            @if(session()->has('success'))
            <div>
                {{ session('success') }}
            </div>
            @endif
        </div>
        <div>
            <div>
                <table border="1" class="table table-striped">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Phone Number</th>
                        <th>Department</th>
                        <th>Doctor</th>
                        <th>Appointment Day</th>
                         <th>Appointment Date</th>
                        <th>Appointment Time</th>
                        <th>Status</th>
                    </tr>
                    @foreach ($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->name }}</td>
                        <td>{{ $appointment->email }}</td>
                        <td>{{ $appointment->gender }}</td>
                        <td>{{ $appointment->phone }}</td>
                        <td>{{ $appointment->department->name }}</td>
                        <td>{{ $appointment->doctor->name }}</td>
                        <td>{{ $appointment->appointment_date }}</td>
                        <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('Y-m-d') }}</td>

                        <td>{{$appointment->start_time}} - {{$appointment->end_time}}</td>
                        <td>
                            <form method="post" action="{{ url('/appointment/'.$appointment->id.'/archive') }}">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-outline-dark">Done</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
                {{ $appointments->links() }}
            </div>
            <div>
                <a href="{{ route('appointment.create') }}" class="btn btn-primary">Create an Appointment</a>
            </div>
        </div>
    </div>
</x-app-layout>
