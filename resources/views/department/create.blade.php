<x-app-layout>         
    <div class="container-fluid">
        <h1 class="text-2xl font-bold mb-4">Create a Department</h1>
        <div>
            @if($errors->any())
            <ul class="text-red-500">
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
            @endif
        </div>
        <form method="POST" action="{{ route('department.store') }}" class="card-body" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Department Name</label>
                <input type="text" id="name" name="name" placeholder="Name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image</label>
                <input type="file" id="image" name="image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                <textarea id="description" name="description" placeholder="Description" rows="5" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
            </div>
            <div class="mb-4">
                <button type="submit" class="bg-indigo-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Save Department</button>
            </div>
        </form>
    
    </div>
</x-app-layout>
