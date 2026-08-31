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
                    <th>Phone Number</th>
                    <th>Message</th>
                    <th>Status</th>
                    
                </tr>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ $contact->message}}</td>
                        <td>
                        <form method="post" action="{{ url('/contact/'.$contact->id.'/archive') }}">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-outline-dark">Done</button>
                        </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $contacts->links() }}
        </div>
    </div>
    </div>
</x-app-layout>
