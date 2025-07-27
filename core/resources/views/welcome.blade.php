<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
</head>

<body>

    <body>
        <h1 class="text-3xl  w-fit mx-auto px-4 py-2  font-bold underline text-center bg-blue-100">Social Link</h1>

        <form action="{{ route('add-item') }}" method="POST">
            @csrf
            <div class="justify-center flex my-4">
                <input type="text" name="item" class="w-[300px] p-2 rounded-[5px] border border-gray-300">
                <input type="submit" value="Add"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            </div>
        </form>



        <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
            <table class="w-[60%] mx-auto text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 ">
                    <tr>
                        <th scope="col" class="px-6 py-3 ">
                            Item
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Option</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr
                            class="border-b bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                            @if ($item->status == 1)
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-white line-through whitespace-nowra">
                                    {{ $item->name }}
                                </th>
                            @else
                                <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowra">
                                    {{ $item->name }}
                                </th>
                            @endif
                            <td class="flex gap-2 justify-end px-6 py-4 text-right">
                                @if ($item->status == 1)
                                    <a href="/status-change/{{ $item->id }}"
                                        class="font-medium text-white px-1 py-1 !aspect-square rounded-[5px] bg-rose-600 dark:bg-rose-500 hover:underline"><i class="fa-solid fa-circle-xmark"></i></a>
                                @else
                                    <a href="/status-change/{{ $item->id }}"
                                        class="font-medium text-white px-1 py-1 !aspect-square rounded-[5px] bg-green-600 dark:bg-green-500 hover:underline">
                                        <i class="fa-solid fa-circle-check"></i></a>
                                @endif

                                <a href="#" data-modal-target="static-modal-{{ $item->id }}"
                                    data-modal-toggle="static-modal-{{ $item->id }}"
                                    class="font-medium text-white px-1 py-1 !aspect-square rounded-[5px] bg-blue-600 dark:bg-blue-500 hover:underline">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="/delete-item/{{ $item->id }}"
                                    class="font-medium text-white px-1 py-1 !aspect-square rounded-[5px] bg-red-600 dark:bg-red-500 hover:underline">
                                    <i class="fa-solid fa-trash"></i></a>
                                <a href="https://www.google.com/search?q={{ $item->name }}" target="_blank"
                                    class="font-medium text-white px-1 py-1 !aspect-square rounded-[5px] bg-cyan-500 dark:bg-cyan-500 hover:underline">
                                    <i class="fa-brands fa-google"></i>
                                </a>
                            </td>
                        </tr>
                        <!-- Main modal -->
                        <div id="static-modal-{{ $item->id }}" data-modal-backdrop="static" tabindex="-1"
                            aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-900">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Edit Item
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="static-modal-{{ $item->id }}">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-4 md:p-5 space-y-4">
                                        <form action="{{ route('update-item', $item->id) }}" method="POST">
                                            @csrf
                                            <div class="justify-center flex my-4">
                                                <input type="text" value="{{ $item->name }}" name="item"
                                                    class="w-[300px] p-2 rounded-[5px] border border-gray-300">
                                                <input type="submit" value="Update"
                                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>





    </body>

</html>
