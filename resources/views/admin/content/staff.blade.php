@section('content')

<div class="p-5">
<a href="/register" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah Staff</a>
</div>
<hr class="mx-auto w-32 h-1 bg-gray-100 rounded border-0 md:my-10 dark:bg-gray-700">

<div class="overflow-x-auto relative p-5">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-900 uppercase dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Name
                </th>
                <th scope="col" class="py-3 px-6">
                    Email
                </th>
                <th scope="col" class="py-3 px-6">
                    Status
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $data)
                <tr class="bg-white dark:bg-gray-800">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $data->name }}
                    </th>
                    <td class="py-4 px-6">
                        <a href="mailto:{{ $data->email }}" target="_blank">{{ $data->email }}</a>
                    </td>
                    <td class="py-4 px-6">
                        {{ $data->is_admin }}
                    </td>
                </tr>
             @endforeach
        </tbody>
    </table>

</div>

@endsection