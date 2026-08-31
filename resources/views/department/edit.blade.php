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

        <h1 class="text-2xl font-bold mb-4">Edit Department</h1>
        <form method="POST" action="{{ route('department.update', ['department' => $department]) }}" enctype="multipart/form-data" class="card-body">
            @csrf
            @method('put')
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Department Name</label>
                <input type="text" id="name" name="name" placeholder="Name" value="{{ $department->name }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" id="image" name="image" class="form-input mt-1 block w-full rounded-md border-gray-300" value="{{ $department->image }}">
            </div>        
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <input type="text" id="description" name="description" placeholder="Description" value="{{ $department->description }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <input type="submit" value="Update Department" class="bg-indigo-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            </div>
        </form>
    </div>
</x-app-layout>
