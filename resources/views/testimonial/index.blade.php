<x-app-layout>   
    <div class="container-fluid">
        <h1 class="text-2xl font-bold mb-4">Testimonials</h1>
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
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Designation</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach ($testimonials as $testimonial)
                <tr>
                    <td>{{$testimonial->id}}</td>
                    <td>{{$testimonial->title}}</td>
                    <td>{{$testimonial->description}}</td>
                    <td>{{$testimonial->designation}}</td>
                    <td><img src="{{asset($testimonial->image)}}" alt="Image" style="width: 70px; height:70px"></td>
                    
                    <td>
                        <form action="{{ route('testimonial.edit', ['testimonial' => $testimonial]) }}" method="GET">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>                        
                    </td>
                    <td><form method="post" action="{{route('testimonial.delete', ['testimonial' => $testimonial])}}">
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
        <a href="{{ route('testimonial.create') }}" class="btn btn-primary">Create a New Testimonial</a>
    </div>
    </div>
</x-app-layout>