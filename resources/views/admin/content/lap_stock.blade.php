@section('content')
<div class="overflow-x-auto relative p-5">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-900 uppercase dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Name Product
                </th>
                <th scope="col" class="py-3 px-6">
                    Size
                </th>
                <th scope="col" class="py-3 px-6 text-center">
                    Name Category
                </th>
                <th scope="col" class="py-3 px-6 text-center">
                    Qty
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stock as $data)
            <tr class="bg-white dark:bg-gray-800">

                    <td class="py-4 px-6">
                        {{ $data->name_product }}    
                    </td>
                    <td class="py-4 px-6">
                        {{ $data->name_size }}   
                    </td>
                    <td class="py-4 px-6 text-center">
                        {{ $data->name_category }}    
                    </td>
                    <td class="py-4 px-6 text-center">
                        {{ $data->qty }}    
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
</div>
@endsection