<x-app-layout>   
    <div class="container-fluid">
        <h1 class="text-2xl font-bold mb-4">Sliders</h1>
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
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach ($sliders as $slider)
                <tr>
                    <td>{{$slider->id}}</td>
                    <td>{{$slider->title}}</td>
                    <td>{{$slider->description}}</td>
                    <td><img src="{{asset($slider->image)}}" alt="Image" style="width: 70px; height:70px"></td>
                    
                    <td>
                        <form action="{{ route('slider.edit', ['slider' => $slider]) }}" method="GET">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>                        
                    </td>
                    <td><form method="post" action="{{route('slider.delete', ['slider' => $slider])}}">
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
        <a href="{{ route('slider.create') }}" class="btn btn-primary">Create a New Slider</a>
    </div>
    </div>
</x-app-layout>