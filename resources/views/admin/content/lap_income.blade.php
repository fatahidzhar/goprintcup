@section('content')
<div class="overflow-x-auto relative p-5">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-900 uppercase dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Name Product
                </th>
                <th scope="col" class="py-3 px-6 text-center">
                    Name Size
                </th>
                <th scope="col" class="py-3 px-6 text-center">
                    Total Terjual
                </th>
                <th scope="col" class="py-3 px-6">
                    Total Keseluhan
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($income as $data)
            <tr class="bg-white dark:bg-gray-800">

                    <td class="py-4 px-6">
                        {{ $data->name_product }}    
                    </td>
                    <td class="py-4 px-6 text-center">
                        {{ $data->name_size }}    
                    </td>
                    <td class="py-4 px-6 text-center">
                        {{ $data->barang_terjual }}    
                    </td>
                    <td class="py-4 px-6 text-left">
                        Rp.&nbsp;<?= number_format("$data->total") ?>  
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
</div>
@endsection