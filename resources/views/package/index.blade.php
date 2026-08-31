<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-6 text-center">Packages</h1>
        <div>
            @if(session()->has('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-md">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($packages as $package)
                <div class="border rounded-lg shadow-lg p-6 bg-white mb-4">
                    <h2 class="text-xl text-center font-bold mb-2 text-indigo-600">{{ $package->title }}</h2>
                    <p class="text-gray-800 mb-2"><strong>Description:</strong> {{ $package->description }}</p>
                    <p class="text-gray-800 mb-2"><strong>Price:</strong> ${{ number_format($package->price, 2) }}</p>
                    
                    <div class="flex justify-between mt-4">
                        <form action="{{ route('package.edit', ['package' => $package]) }}" method="GET">
                            <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Edit</button>
                        </form>
                        <form method="post" action="{{ route('package.delete', ['package' => $package]) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-6 text-center">
            <a href="{{ route('package.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">Create a Package</a>
        </div>
    </div>
</x-app-layout>
