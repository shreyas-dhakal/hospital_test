<x-app-layout>         
    <div class="container-fluid">

    <h1 class="text-2xl font-bold mb-4">Create a User</h1>
    <div>
        @if($errors->any())
        <ul class="text-red-500">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                
            @endforeach
        </ul>
        @endif
    </div>
    <form method="POST" action="{{route('user.store')}}" class="card-body">
        @csrf
        @method('post')
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
            <input type="text" name="name" id="name" placeholder="Name" class="block w-full px-4 py-2 mt-1 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring">
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
            <input type="email" name="email" id="email" placeholder="Email" class="block w-full px-4 py-2 mt-1 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring">
        </div>
        <div class="mb-4">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
            <input type="password" name="password" id="password" placeholder="Password" class="block w-full px-4 py-2 mt-1 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring">
        </div>    
        <div class="mb-4">
            <input type="submit" value="Save User" class="bg-indigo-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        </div>
    </form>
    </div>
</x-app-layout>
