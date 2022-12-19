<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b311425060.js" crossorigin="anonymous"></script>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="h-screen container mx-auto bg-blue-50 border">
        <div class="flex justify-between items-center h-10 p-8 border-b-slate-300 border bg-blue-200">
            <h1 class="font-bold text-xl">Data</h1>
            <a href="{{ url('insert-page') }}"
                class="font-medium p-1 px-2 rounded hover:bg-blue-800 active:bg-blue-700 bg-blue-600 text-white">Insert
                Data</a>
        </div>
        @if (session()->has('message'))
            <div class="mx-5 mt-5 text-xs p-2 text-green-900 bg-green-300 rounded font-medium">
                {{ session()->get('message') }}
            </div>
        @endif
        @if (session()->has('show'))
            <div class="mx-5 mt-5 text-xs p-2 text-red-900 bg-red-200 rounded font-medium">
                {{ session()->get('show') }}
            </div>
        @endif
        <div class="p-5">
            <table class="table-fixed w-full border-collapse">
                <thead class="text-sm">
                    <tr>
                        <th class="border-2 border-slate-300">Name</th>
                        <th class="border-2 border-slate-300">Number</th>
                        <th class="border-2 border-slate-300">Gender</th>
                        <th class="border-2 border-slate-300">Image</th>
                        <th class="border-2 border-slate-300">Likes</th>
                        <th class="border-2 border-slate-300">Place</th>
                        <th class="border-2 border-slate-300">Edit</th>
                        <th class="border-2 border-slate-300">Delete</th>
                    </tr>
                </thead>
                <tbody class="text-center text-xs">
                    @foreach ($vals as $values)
                        <tr>
                            <td class="border-2 p-2 border-slate-300">{{ $values->name }}</td>
                            <td class="border-2 p-2 border-slate-300">{{ $values->mobile_number }}</td>
                            <td class="border-2 p-2 border-slate-300">{{ $values->gender }}</td>
                            <td class="border-2 p-2 border-slate-300">
                                @if ($values->image_url)
                                    <img src=" {{ asset($values->image_url) }}" class="w-14 h-14 mx-auto rounded" alt="" />
                                @endif
                            </td>
                            <td class="border-2 p-2 border-slate-300">
                                @php
                                    $checks = json_decode($values->likes);
                                @endphp
                                @foreach ($checks as $check)
                                    {{ $check }}
                                @endforeach
                            </td>
                            <td class="border-2 p-2 border-slate-300">{{ $values->place }}</td>
                            <td class="border-2 p-2 border-slate-300 text-blue-500 text-xl">
                                <a href="{{ url('edited-page') }}/{{ $values->id }}">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                            </td>
                            <td class="border-2 p-2 border-slate-300 text-red-600 text-xl">
                                <a href="{{ url('deleted-page') }}/{{ $values->id }}">
                                    <i class="fa-regular fa-trash-can"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="my-5">
                {{ $vals->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
</body>

</html>
