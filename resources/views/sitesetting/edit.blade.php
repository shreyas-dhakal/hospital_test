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
        <h1 class="text-2xl font-bold mb-4">Edit a Setting</h1>
        <form method="POST" action="{{route('sitesetting.update', ['sitesetting' => $sitesetting])}}" class="card-body" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-4">
                <label for="logo" class="block text-gray-700 text-sm font-bold mb-2">Logo</label>
                <input type="file" id="logo" name="logo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                <input type="text" id="name" name="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" value="{{ $sitesetting->name }}">
            </div>
            
            <div class="mb-4">
                <label for="address" class="block text-gray-700 text-sm font-bold mb-2">Address</label>
                <input type="text" id="address" name="address" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" value="{{ $sitesetting->address }}">
            </div>
            
            <div class="mb-4">
                <label for="email1" class="block text-gray-700 text-sm font-bold mb-2">Email 1</label>
                <input type="email" id="email1" name="email1" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" value="{{ $sitesetting->email1 }}">
            </div>
            
            <div class="mb-4">
                <label for="email2" class="block text-gray-700 text-sm font-bold mb-2">Email 2</label>
                <input type="email" id="email2" name="email2" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" value="{{ $sitesetting->email2 }}">
            </div>
            
            <div class="mb-4">
                <label for="phone_number1" class="block text-gray-700 text-sm font-bold mb-2">Phone Number 1</label>
                <input type="tel" id="phone_number1" name="phone_number1" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" value="{{ $sitesetting->phone_number1 }}">
            </div>
            
            <div class="mb-4">
                <label for="phone_number2" class="block text-gray-700 text-sm font-bold mb-2">Phone Number 2</label>
                <input type="tel" id="phone_number2" name="phone_number2" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" value="{{ $sitesetting->phone_number2 }}">
            </div>
            
            <div class="mb-4">
                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image</label>
                <input type="file" id="image" name="image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            
            <div class="mb-4">
                <label for="link1" class="block text-gray-700 text-sm font-bold mb-2">Link 1</label>
                <input type="url" id="link1" name="link1" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" value="{{ $sitesetting->link1 }}">
            </div>
            
            <div class="mb-4">
                <label for="link2" class="block text-gray-700 text-sm font-bold mb-2">Link 2</label>
                <input type="url" id="link2" name="link2" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" value="{{ $sitesetting->link2 }}">
            </div>
            
            <div class="mb-4">
                <label for="link3" class="block text-gray-700 text-sm font-bold mb-2">Link 3</label>
                <input type="url" id="link3" name="link3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" value="{{ $sitesetting->link3 }}">
            </div>
               
            <div class="mb-4">
                <input type="submit" value="Update Setting" class="bg-indigo-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            </div>
        </form>
    </div>
</x-app-layout>
