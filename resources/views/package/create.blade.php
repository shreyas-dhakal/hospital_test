<x-app-layout>         
    <div class="container-fluid">

    <h1 class="text-2xl font-bold mb-4">Create a Package</h1>
    <div class="mb-4">
        @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-red-600">{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="POST" action="{{route('package.store')}}" class="card-body" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" id="title" name="title" placeholder="Title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <input type="text" id="description" name="description" placeholder="Description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>
        <div class="mb-4">
            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
            <input type="text" id="price" name="price" placeholder="Price" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>    

        @for ($i = 1; $i <= 25; $i++)
            <div class="mb-4">
                <label for="field_{{ $i }}" class="block text-sm font-medium text-gray-700">Field {{ $i }}</label>
                <input type="text" id="field_{{ $i }}" name="field_{{ $i }}" placeholder="Field {{ $i }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>
        @endfor

        <div>
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save Package</button>
        </div>
    </form>
    </div>
</x-app-layout>
