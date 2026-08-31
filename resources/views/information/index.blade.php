<x-app-layout>
    <style>
        .table td {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 150px; /* Adjust as needed */
        }
        
        .table img {
            max-height: 50px;
            object-fit: cover;
        }
        </style>
        
    <div class="container-fluid">
        <h1 class="text-2xl font-bold mb-4 text-center">Information</h1>
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
                        <th>Footer</th>
                        <th>Story Para 1</th>
                        <th>Story Para 2</th>
                        <th>Story Image</th>
                        <th>Vision</th>
                        <th>Vision Image</th>
                        <th>Greeting</th>
                        <th>Greeting Image</th>
                        <th>Message</th>
                        <th>Message Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($informations as $information)
                    <tr>
                        <td>{{ $information->id }}</td>
                        <td><img src="{{ asset($information->logo) }}" alt="Logo" class="img-fluid"></td>
                        <td class="truncate">{{ $information->footer }}</td>
                        <td class="truncate">{{ $information->story1 }}</td>
                        <td class="truncate">{{ $information->story2 }}</td>
                        <td><img src="{{ asset($information->story_image) }}" alt="Story Image" class="img-fluid"></td>
                        <td class="truncate">{{ $information->vision }}</td>
                        <td><img src="{{ asset($information->vision_image) }}" alt="Vision Image" class="img-fluid"></td>
                        <td class="truncate">{{ $information->greeting }}</td>
                        <td><img src="{{ asset($information->greeting_image) }}" alt="Greeting Image" class="img-fluid"></td>
                        <td class="truncate">{{ $information->message }}</td>
                        <td><img src="{{ asset($information->message_image) }}" alt="Message Image" class="img-fluid"></td>
                        <td>
                            <form action="{{ route('information.edit', ['information' => $information]) }}" method="GET" class="d-inline-block">
                                <button type="submit" class="btn btn-primary btn-sm">Edit</button>
                            </form>
                        </td>
                        <td>
                            <form method="post" action="{{ route('information.delete', ['information' => $information]) }}" class="d-inline-block">
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
            <a href="{{ route('information.create') }}" class="btn btn-primary">New Information Entry</a>
        </div>
    </div>
</x-app-layout>
