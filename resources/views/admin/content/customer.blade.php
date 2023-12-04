@section('content')
<div class="overflow-x-auto relative p-5">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-900 uppercase dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Name Customer
                </th>
                <th scope="col" class="py-3 px-6">
                    Address
                </th>
                <th scope="col" class="py-3 px-6">
                    City
                </th>
                <th scope="col" class="py-3 px-6">
                    Zip Code
                </th>
                <th scope="col" class="py-3 px-6">
                    No Phone
                </th>
                <th scope="col" class="py-3 px-6">
                    Total
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customer as $data)
            <tr class="bg-white dark:bg-gray-800">

                    <td class="py-4 px-6">
                        {{ $data->name_customer }}    
                    </td>
                    <td class="py-4 px-6">
                        <p class="truncate w-48">{{ $data->address }}</p>    
                    </td>
                    <td class="py-4 px-6">
                        {{ $data->city }}    
                    </td>
                    <td class="py-4 px-6 text-center">
                        {{ $data->zip_code }}    
                    </td>
                    <td class="py-4 px-6">
                        {{ $data->no_phone }}    
                    </td>
                    <td class="py-4 px-6 text-center">
                        {{ $data->total }}
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
</div>
@endsection