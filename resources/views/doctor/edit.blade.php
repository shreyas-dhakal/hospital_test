<x-app-layout>
    <div class="container-fluid">
        <h1 class="text-2xl font-bold mb-4">Edit a Doctor</h1>
        <div class="mb-4">
            @if($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-red-600">{{$error}}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <form method="POST" action="{{ route('doctor.update', ['doctor' => $doctor]) }}" enctype="multipart/form-data" class="card-body">
            @csrf
            @method('put')
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name" placeholder="Name" value="{{ $doctor->name }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="designation" class="block text-sm font-medium text-gray-700">Designation</label>
                <input type="text" id="designation" name="designation" placeholder="Designation" value="{{ $doctor->designation }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" id="image" name="image" class="form-input mt-1 block w-full rounded-md border-gray-300">
                @if($doctor->image)
                    <img src="{{ asset($doctor->image) }}" alt="Doctor Image" class="mt-2 w-32 h-32">
                @endif
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <input type="text" id="description" name="description" placeholder="Description" value="{{ $doctor->description }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="nmc_reg" class="block text-sm font-medium text-gray-700">NMC Registration Number</label>
                <input type="text" id="nmc_reg" name="nmc_reg" placeholder="NMC Registration Number" value="{{ $doctor->nmc_reg }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="department_id" class="block text-sm font-medium text-gray-700">Department</label>
                <select id="department_id" name="department_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Select Department</option>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}" {{ $doctor->department_id == $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="availabilities" class="block text-sm font-medium text-gray-700">Availability</label>
                <div id="availability" class="space-y-4">
                    @foreach($doctor->availabilities as $index => $availability)
                        <div class="availability-item flex space-x-4 items-center">
                            <div class="flex-1">
                                <label for="availabilities[{{ $index }}][day]" class="block text-sm font-medium text-gray-700">Day</label>
                                <input type="text" name="availabilities[{{ $index }}][day]" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                            <div class="flex-1">
                                <label for="availabilities[{{ $index }}][start_time]" class="block text-sm font-medium text-gray-700">Start Time</label>
                                <input type="time" name="availabilities[{{ $index }}][start_time]" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                            <div class="flex-1">
                                <label for="availabilities[{{ $index }}][end_time]" class="block text-sm font-medium text-gray-700">End Time</label>
                                <input type="time" name="availabilities[{{ $index }}][end_time]" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                            <button type="button" class="remove-availability bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">Remove</button>
                        </div>
                        <p class="block text-sm font-medium text-gray-700">Previous Availability Day : {{ $availability->day }} Time : {{ $availability->start_time }} to {{ $availability->end_time }}</p>
                    @endforeach
                </div>
                <button type="button" id="addAvailability" class="mt-4 bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">Add Availability</button>
            </div>
            <div>
                <input type="submit" value="Update doctor" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            </div>
        </form>
    </div>

    <script>
        let availabilityIndex = {{ $doctor->availabilities->count() }};
        
        document.getElementById('addAvailability').addEventListener('click', () => {
            const availability = document.createElement('div');
            availability.classList.add('availability-item', 'flex', 'space-x-4', 'items-center');
            availability.innerHTML = `
                <div class="flex-1">
                    <label for="availabilities[${availabilityIndex}][day]" class="block text-sm font-medium text-gray-700">Day</label>
                    <input type="text" name="availabilities[${availabilityIndex}][day]" placeholder="e.g., Monday" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div class="flex-1">
                    <label for="availabilities[${availabilityIndex}][start_time]" class="block text-sm font-medium text-gray-700">Start Time</label>
                    <input type="time" name="availabilities[${availabilityIndex}][start_time]" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div class="flex-1">
                    <label for="availabilities[${availabilityIndex}][end_time]" class="block text-sm font-medium text-gray-700">End Time</label>
                    <input type="time" name="availabilities[${availabilityIndex}][end_time]" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <button type="button" class="remove-availability bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">Remove</button>
            `;
            document.getElementById('availability').appendChild(availability);
            availabilityIndex++;
        });
    
        document.getElementById('availability').addEventListener('click', (e) => {
            if (e.target.classList.contains('remove-availability')) {
                const availabilityItem = e.target.parentElement;
                const previousAvailability = availabilityItem.nextElementSibling; // Get the next sibling (the p tag)
                if (previousAvailability && previousAvailability.tagName === 'P') {
                    previousAvailability.remove(); // Remove the paragraph tag
                }
                availabilityItem.remove(); // Remove the availability item
            }
        });
    </script>
</x-app-layout>
