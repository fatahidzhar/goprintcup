
@section('content')
<div class="flex flex-row p-5">
    <div class="basis-1/4 w-full">
        <div class="p-6 w-64 bg-white rounded-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex flex-row justify-between">
                <div class="basis-1/4">
                    <a href="#">
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Income</p>
                    </a>
                </div>
                <div class="basis-1/4">
                    <i class="bi bi-box-arrow-up-right"></i>
                </div>
              </div>
            @foreach ($income as $data)
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Rp.&nbsp;{{ number_format($data->income) }}</h5>
            @endforeach
        </div>
    </div>
    <div class="basis-1/4 w-full">
        <div class="p-6 w-64 bg-white rounded-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex flex-row justify-between">
                <div class="basis-1/4">
                    <a href="#">
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Down Payment</p>
                    </a>
                </div>
                <div class="basis-1/4">
                    <i class="bi bi-box-arrow-up-right"></i>
                </div>
              </div>
              @foreach ($dp as $data)
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $data->dp }}</h5>
              @endforeach
        </div>
    </div>
    <div class="basis-1/2 w-full">
        <div class="p-6 w-64 bg-white rounded-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex flex-row justify-between">
                <div class="basis-1/4">
                    <a href="#">
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Customer</p>
                    </a>
                </div>
                <div class="basis-1/4">
                    <i class="bi bi-box-arrow-up-right"></i>
                </div>
              </div>
              
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ count($customer) }}</h5>
          
        </div>
    </div>
    <div class="basis-1/2 w-56">
        <div class="p-6 w-36 bg-white rounded-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex flex-row justify-between">
                <div class="basis-1/4">
                    <a href="#">
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Orders</p>
                    </a>
                </div>
                <div class="basis-1/4">
                    <i class="bi bi-box-arrow-up-right"></i>
                </div>
              </div>
              @foreach ($order as $data)
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $data->status_count }}</h5>
              @endforeach
        </div>
    </div>
</div>
<hr class="mx-auto w-32 h-1 bg-gray-100 rounded border-0 md:my-10 dark:bg-gray-700">
<div class="p-5 overflow-x-auto relative sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Invoice
                </th>
                <th scope="col" class="py-3 px-6">
                    Name Customer
                </th>
                <th scope="col" class="py-3 px-6">
                    Qty
                </th>
                <th scope="col" class="py-3 px-6">
                    Status DP
                </th>
                <th scope="col" class="py-3 px-6">
                    Status
                </th>
                <th scope="col" class="py-3 px-6">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $data)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $data->invoice }}
                    </th>
                    <td class="py-4 px-6">
                        {{ $data->name_customer }}
                    </td>
                    <td class="py-4 px-6">
                        {{ $data->qty }}
                    </td>
                    <td class="py-4 px-6">
                        @if ($data->status_dp == 1)
                            <span class="bg-red-100 text-red-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">YA</span>
                        @else
                            <span class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">TIDAK</span>
                        @endif
                    </td>
                    <td class="py-4 px-6">
                        @if ($data->status == 0)
                            <span class="bg-red-100 text-red-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">PENDING</span>
                        @elseif ($data->status == 1)
                            <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">PROSESS</span>
                        @else
                            <span class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">SELESAI</span>
                        @endif
                    </td>
                    <td class="py-4 px-6 text-right">
                        <a href="/order" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection