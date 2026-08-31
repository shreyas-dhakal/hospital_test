<x-app-layout>         
    <div class="container-fluid">

    <h1 class="text-2xl font-bold mb-4">Create a Setting</h1>
    <div class="mb-4">
        @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-red-600">{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="POST" action="{{route('sitesetting.store')}}" class="card-body" enctype="multipart/form-data">
        @csrf
        @method('post')
        
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" id="name" name="name" placeholder="Name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>
        
        <div class="mb-4">
            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
            <input type="text" id="address" name="address" placeholder="Address" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div class="mb-4">
            <label for="logo" class="block text-sm font-medium text-gray-700">Logo</label>
            <input type="file" id="logo" name="logo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>
        
        <div class="mb-4">
            <label for="email1" class="block text-sm font-medium text-gray-700">Email 1</label>
            <input type="email" id="email1" name="email1" placeholder="Email 1" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>
        
        <div class="mb-4">
            <label for="email2" class="block text-sm font-medium text-gray-700">Email 2</label>
            <input type="email" id="email2" name="email2" placeholder="Email 2" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>
        
        <div class="mb-4">
            <label for="phone_number1" class="block text-sm font-medium text-gray-700">Phone Number 1</label>
            <input type="tel" id="phone_number1" name="phone_number1" placeholder="Phone Number 1" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>
        
        <div class="mb-4">
            <label for="phone_number2" class="block text-sm font-medium text-gray-700">Phone Number 2</label>
            <input type="tel" id="phone_number2" name="phone_number2" placeholder="Phone Number 2" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>
        
        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
            <input type="file" id="image" name="image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>
        
        <div class="mb-4">
            <label for="link1" class="block text-sm font-medium text-gray-700">Link 1</label>
            <input type="url" id="link1" name="link1" placeholder="Link 1" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>
        
        <div class="mb-4">
            <label for="link2" class="block text-sm font-medium text-gray-700">Link 2</label>
            <input type="url" id="link2" name="link2" placeholder="Link 2" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>
        
        <div class="mb-4">
            <label for="link3" class="block text-sm font-medium text-gray-700">Link 3</label>
            <input type="url" id="link3" name="link3" placeholder="Link 3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>
           
        <div>
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save Settings</button>
        </div>
    </form>
</div>
</x-app-layout>