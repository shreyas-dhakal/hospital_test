<x-app-layout>         
    <div class="container-fluid">

    <h1 class="text-2xl font-bold mb-4">Create a Slider</h1>
    <div>
        @if($errors->any())
        <ul class="text-red-500">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                
            @endforeach
        </ul>
        @endif
    </div>
    <form method="POST" action="{{route('slider.store')}}" class="card-body" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
            <input type="text" name="title" id="title" placeholder="Title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
            <input type="text" name="description" id="description" placeholder="Description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>
        <div class="mb-4">
            <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image</label>
            <input type="file" name="image" id="image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>      
        <div class="mb-4">
            <input type="submit" value="Save Slider" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
        </div>
    </form>
    </div>
</x-app-layout>
