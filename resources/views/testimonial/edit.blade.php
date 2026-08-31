<x-app-layout>
    <div class="container-fluid">
        <div class="mb-4">
            @if($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-red-600">{{$error}}</li>
                @endforeach
            </ul>
            @endif
        </div>
        <h1 class="text-2xl font-bold mb-4">Edit Testimonial</h1>
        <form method="POST" action="{{route('testimonial.update', ['testimonial' => $testimonial])}}" class="card-body" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                <input type="text" name="title" id="title" placeholder="Title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" value="{{ $testimonial->title }}">
            </div>
            <div class="mb-4">
                <label for="designation" class="block text-gray-700 text-sm font-bold mb-2">Designation</label>
                <input type="text" name="designation" id="designation" placeholder="Designation" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" value="{{ $testimonial->designation }}">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                <input type="text" name="description" id="description" placeholder="Description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" value="{{ $testimonial->description }}">
            </div>        
            <div class="mb-4">
                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image</label>
                <input type="file" name="image" id="image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <input type="submit" value="Update Testimonial" class="bg-indigo-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            </div>
        </form>
    </div>
</x-app-layout>
