<x-app-layout>
    <div class="container-fluid">
        <h1 class="text-2xl font-bold mb-4">Create a Doctor</h1>
        <div class="mb-4">
            @if($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-red-600">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <form method="POST" action="{{ route('doctor.store') }}" enctype="multipart/form-data" class="card-body">
            @csrf
            @method('post')
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name" placeholder="Name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="designation" class="block text-sm font-medium text-gray-700">Designation</label>
                <input type="text" id="designation" name="designation" placeholder="Designation" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" id="image" name="image" class="form-input mt-1 block w-full rounded-md border-gray-300">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <input type="text" id="description" name="description" placeholder="Description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="nmc_reg" class="block text-sm font-medium text-gray-700">NMC Registration Number</label>
                <input type="text" id="nmc_reg" name="nmc_reg" placeholder="NMC Registration Number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="department_id" class="block text-sm font-medium text-gray-700">Department</label>
                <select id="department_id" name="department_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Select Department</option>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Availability</label>
                <div id="availabilities">
                    <div class="availability-item mb-4">
                        <label for="day" class="block text-sm font-medium text-gray-700">Day</label>
                        <select name="availabilities[0][day]" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="Sunday">Sunday</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                            <option value="On_Call">On Call</option>
                        </select>
                        <label for="start_time" class="block text-sm font-medium text-gray-700">Start Time</label>
                        <input type="time" name="availabilities[0][start_time]" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <label for="end_time" class="block text-sm font-medium text-gray-700">End Time</label>
                        <input type="time" name="availabilities[0][end_time]" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <button type="button" class="remove-availability mt-2 bg-red-500 text-white px-2 py-1 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">Remove</button>
                    </div>
                </div>
                <button type="button" id="add-availability" class="mt-4 bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">Add Availability</button>
            </div>
            <div>
                <button type="submit" class="bg-indigo-600 mb-4 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save doctor</button>
            </div>
        </form>
    </div>

    <script>
        let availabilityIndex = 1;

        document.getElementById('add-availability').addEventListener('click', function() {
            let availabilities = document.getElementById('availabilities');
            let availabilityItem = document.createElement('div');
            availabilityItem.classList.add('availability-item', 'mb-4');
            availabilityItem.innerHTML = `
                <label for="day" class="block text-sm font-medium text-gray-700">Day</label>
                <select name="availabilities[${availabilityIndex}][day]" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="Sunday">Sunday</option>
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                    <option value="On_Call">On Call</option>
                </select>
                <label for="start_time" class="block text-sm font-medium text-gray-700">Start Time</label>
                <input type="time" name="availabilities[${availabilityIndex}][start_time]" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <label for="end_time" class="block text-sm font-medium text-gray-700">End Time</label>
                <input type="time" name="availabilities[${availabilityIndex}][end_time]" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <button type="button" class="remove-availability mt-2 bg-red-500 text-white px-2 py-1 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">Remove</button>
            `;
            availabilities.appendChild(availabilityItem);
            availabilityIndex++;
        });

        document.addEventListener('click', function(event) {
            if (event.target && event.target.classList.contains('remove-availability')) {
                event.target.parentElement.remove();
            }
        });
    </script>
</x-app-layout>
