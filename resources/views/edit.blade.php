<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body>
    <div class="flex h-screen justify-center items-center">
        <div class="w-96 p-5 container border rounded bg-blue-100">
            <h1 class="font-semibold text-2xl text-blue-900">Update Data</h1>
            <form action="{{ url('update-page') }}" method="POST" enctype="multipart/form-data"
                class="flex space-y-4 flex-col mt-2">
                @csrf
                <input type="hidden" class="" value="{{ $input->id }}" name="id">
                <label class="block">
                    <span class="block text-sm font-medium">
                        Name
                    </span>
                    <input type="text" name="name"
                        class="mt-1 px-2 py-1 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none block w-full rounded-md sm:text-sm tracking-wider"
                        value="{{ $input->name }}" />
                </label>
                <label class="block">
                    <span class="block text-sm font-medium">
                        Mobile number
                    </span>
                    <input type="tel" name="mobile"
                        class="mt-1 px-2 py-1 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none block w-full rounded-md sm:text-sm tracking-wider"
                        value="{{ $input->mobile_number }}" />
                </label>
                <div>
                    <span class="block text-sm font-medium">
                        Gender
                    </span>
                    <label>Male
                        <input id="draft" class="peer/draft" type="radio" name="gender" value="male"
                            @if ($input->gender == 'male') checked @endif />
                    </label>
                    <label>Female
                        <input id="published" class="peer/published" type="radio" name="gender" value="female"
                            @if ($input->gender == 'female') checked @endif />
                    </label>
                </div>
                <div>
                    <label for="countries" class="block text-sm font-medium">Select
                        your place</label>
                    <select id="countries"
                        class="bg-white border border-slate-300 rounded-md block w-full px-2 py-1 mt-1 text-sm outline-none"
                        name="country">
                        <option value="">Choose a country</option>
                        <option value="America"  {{$input->place == "America" ?  "selected" : ""}}>United States</option>
                        <option value="Canada" {{$input->place == "Canada" ?  "selected" : ""}}>Canada</option>
                        <option value="France" {{$input->place == "France" ?  "selected" : ""}}>France</option>
                        <option value="Germany" {{$input->place == "Germany" ?  "selected" : ""}}>Germany</option>
                    </select>
                </div>
                <div>
                    <span class="block text-sm font-medium">
                        Choose image
                    </span>
                    <input type="file" name="mage"
                        class="my-1 block w-full text-sm text-slate-500 file:mr-4 file:py-1 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-white hover:file:bg-slate-50" />
                    @if ($input->image_url)
                        <img src=" {{ asset($input->image_url) }}" class="w-10 h-10 rounded-full" alt="" />
                    @else
                        <img src="{{ asset('images/images.jpg') }}" class="w-14 h-14 rounded-full"
                            alt="" />
                    @endif
                    @if($input->image_url !== null)
                    <button type="submit" class="p-1 bg-red-100 text-xs text-red-900 font-medium mt-1 rounded" name="remove_mage">Remove image</button>
                    @endif
                </div>
                @php
                    $likes = json_decode($input->likes);
                @endphp
                <div>
                    <span class="block text-sm font-medium">
                        Hobbies
                    </span>
                    <div class="flex mt-1">
                        <div class="flex items-center mr-4">
                            <input id="inline-checkbox" type="checkbox" value="games" class="w-4 h-4 rounded"
                                name="hobbies[]" {{ in_array('games', $likes) ? 'checked' : '' }}>
                            <label for="inline-checkbox" class="ml-2 text-sm">Games</label>
                        </div>
                        <div class="flex items-center mr-4">
                            <input id="inline-2-checkbox" type="checkbox" value="reading"
                                class="w-4 h-4 rounded border-none" name="hobbies[]"
                                {{ in_array('reading', $likes) ? 'checked' : '' }}>
                            <label for="inline-2-checkbox" class="ml-2 text-sm">Reading</label>
                        </div>
                        <div class="flex items-center mr-4">
                            <input id="inline-2-checkbox" type="checkbox" value="cycling"
                                class="w-4 h-4 rounded border-none" name="hobbies[]"
                                {{ in_array('cycling', $likes) ? 'checked' : '' }}>
                            <label for="inline-2-checkbox" class="ml-2 text-sm">Cycling</label>
                        </div>
                    </div>
                </div>
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 active:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300 tracking-widest text-white font-bold rounded py-1">
                    Save changes
                </button>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="text-xs p-2 bg-red-200 rounded w-full mx-auto">
                            <p class="text-semibold text-red-800">{{ $error }}</p>
                        </div>
                    @endforeach
                @endif
            </form>
        </div>
    </div>
</body>

</html>
