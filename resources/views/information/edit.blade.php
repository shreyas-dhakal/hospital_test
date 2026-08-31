<x-app-layout>
    <div class="container-fluid">
        <h1 class="text-2xl font-bold mb-4">Edit Information</h1>
        <div class="mb-4">
            @if($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-red-600">{{$error}}</li>
                @endforeach
            </ul>
            @endif
        </div>
        <form method="POST" action="{{ route('information.update', ['information' => $information]) }}" enctype="multipart/form-data" class="card-body">
            @csrf
            @method('put')
            <div class="mb-4">
                <label for="logo" class="block text-sm font-medium text-gray-700">Logo</label>
                <input type="file" id="logo" name="logo" class="form-input mt-1 block w-full rounded-md border-gray-300" value="{{ asset($information->logo) }}">
            </div>       
            <div class="mb-4">
                <label for="footer" class="block text-sm font-medium text-gray-700">Footer</label>
                <input type="text" id="footer" name="footer" placeholder="Footer" value="{{ $information->footer }}">
            </div> 
            <div class="mb-4">
                <label for="story_image" class="block text-sm font-medium text-gray-700">Story Image</label>
                <input type="file" id="story_image" name="story_image" class="form-input mt-1 block w-full rounded-md border-gray-300" value="{{ asset($information->story_image) }}">
            </div>    
            <div class="mb-4">
                <label for="story1" class="block text-sm font-medium text-gray-700">Story Para 1</label>
                <input type="text" id="story1" name="story1" placeholder="Story" value="{{ $information->story1 }}">
            </div> 
            <div class="mb-4">
                <label for="story2" class="block text-sm font-medium text-gray-700">Story Para 2</label>
                <input type="text" id="story2" name="story2" placeholder="Story" value="{{ $information->story2 }}">
            </div> 
            <div class="mb-4">
                <label for="vision_image" class="block text-sm font-medium text-gray-700">Vision Image</label>
                <input type="file" id="vision_image" name="vision_image" class="form-input mt-1 block w-full rounded-md border-gray-300" value="{{ asset($information->vision_image) }}">
            </div>   
            <div class="mb-4">
                <label for="vision" class="block text-sm font-medium text-gray-700">Vision</label>
                <input type="text" id="vision" name="vision" placeholder="Vision" value="{{ $information->vision }}">
            </div>
            <div class="mb-4">
                <label for="greeting_image" class="block text-sm font-medium text-gray-700">Greeting Image</label>
                <input type="file" id="greeting_image" name="greeting_image" class="form-input mt-1 block w-full rounded-md border-gray-300" value="{{ asset($information->greeting_image) }}">
            </div>   
            <div class="mb-4">
                <label for="greeting" class="block text-sm font-medium text-gray-700">Greeting</label>
                <input type="text" id="greeting" name="greeting" placeholder="Greeting" value="{{ $information->greeting }}" >
            </div>
            <div class="mb-4">
                <label for="message_image" class="block text-sm font-medium text-gray-700">Message Image</label>
                <input type="file" id="message_image" name="message_image" class="form-input mt-1 block w-full rounded-md border-gray-300" value="{{ asset($information->message_image) }}">
            </div>   
            <div class="mb-4">
                <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                <input type="text" id="message" name="message" placeholder="Message" value="{{ $information->message }}" >
            </div>

                <input type="submit" value="Update Information" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            </div>
        </form>
    </div>
</x-app-layout>
