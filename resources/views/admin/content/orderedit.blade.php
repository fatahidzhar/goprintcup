@section('content')

@if ($errors->any())
<div class="p-5">
    <div id="alert-2" class="flex p-4 mb-4 bg-red-100 rounded-lg dark:bg-red-200" role="alert">
        <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-red-700 dark:text-red-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Info</span>
        <div class="ml-3 text-sm font-medium text-red-700 dark:text-red-800">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-red-200 dark:text-red-600 dark:hover:bg-red-300" data-dismiss-target="#alert-2" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
</div>
@endif

@foreach ($orders as $data)
<form class="p-5" method="POST" action="{{ route('order.update', $data->id_customer) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')   
    <div class="grid gap-6 mb-6 md:grid-cols-2">       
        <div>
            <label for="name_customer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name Customer</label>
            <input type="text" name="name_customer" value="{{ $data->name_customer }}" id="name_customer" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            <input type="hidden" name="id_product" value="{{ $data->id_product }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            <input type="hidden" name="id_customer" value="{{ $data->id_customer }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            <input type="hidden" name="id_transaksi" value="{{ $data->id_transaksi }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>
        <div>
            <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name Vendor/Penerima</label>
            <input type="text" name="vendor" value="{{ $data->vendor }}" id="company" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>  
        <div>
            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Address</label>
            <textarea id="message" name="address" rows="5" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your Address...">{{ $data->address }}</textarea>
        </div>
        <div>
            <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">City</label>
            <input type="text" name="city" value="{{ $data->city }}" id="city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            <label for="zip" class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-gray-300">Zip</label>
            <input type="text" name="zip_code" value="{{ $data->zip_code }}" id="zip" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>  
    </div>
    <div class="grid gap-6 mb-6 md:grid-cols-3">  
        <div>
            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Phone number</label>
            <input type="text" name="no_phone" value="{{ $data->no_phone }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123-45-678" required>
        </div>
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="file_input">Upload file</label>
            <input name="image" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
            
        </div>
        <div>
            <label for="invoice" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">INVOICE</label>
            <input name="invoice" type="text" id="invoice" readonly value="{{ $data->invoice }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
        </div>
        @endforeach
        
        <div class="grid gap-6 mb-6">
            <div class="owl-carousel" style="width: 60em;">
                @foreach ($stocks as $data)
                    <div class="mr-2">
                        <input type="radio" onclick="myFunction()" id="{{ $data->total_price }}" value="{{ $data->id_product }}" name="id_product" class="hidden peer">
                        <label for="{{ $data->total_price }}" class="inline-flex items-center p-5 w-full text-gray-500 bg-white rounded-lg border border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">                           
                            <div class="block w-full">
                                    <div id="{{ $data->name_product }}" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                                        {{ $data->name_product }}
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                                <div data-tooltip-target="{{ $data->name_product }}" class="w-full text-lg font-semibold truncate md:text-clip">{{ $data->name_product }}</div>
                                    <div class="flex flex-row">
                                        <div class="w-full">
                                            <div class="w-full pt-3 pb-3 font-semibold">
                                                {{ $data->name_size }}
                                            </div>
                                            @if ($data->qty > 500)
                                                <span class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">STOCK {{ $data->qty }} </span>
                                            @else
                                                <span class="bg-red-100 text-red-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">STOCK {{ $data->qty }} SEGERA ISI</span>
                                            @endif
                                        </div>
                                        <div class="pt-3 pb-3 justify-self-end">
                                        <div>
                                            Rp.&nbsp;{{ number_format($data->total_price) }}
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </label> 
                    </div>
                @endforeach
            </div>
            @foreach ($orders as $data)
            <img class="w-full h-36 object-cover rounded-lg" src="/image/{{ $data->image_product }}" alt="">
           
            <div class="grid gap-6 md:grid-cols-3">  
                 
                <div>
                    <label for="qty" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Qty</label>
                    <input type="number" onkeyup="sum()" name="qty" value="{{ $data->qty_customer }}" min="1" id="qty" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div> 
                <div>
                    <label for="unit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Unit Price</label>
                    <input type="text" onkeyup="sum()" name="total_price" id="unit" value="{{ $data->total_price }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly required>
                </div> 
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Total Price</label>
                    <input type="text" id="total" name="total_price" value="{{ $data->total }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly required>
                </div> 
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-3">   
                <div class="mb-6">
                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                    <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="{{ $data->status }}">
                            @if ($data->status == 0)
                                <span class="bg-red-100 text-red-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">--PENDING--</span>
                            @elseif ($data->status == 1)
                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">--PROSESS--</span>
                            @else
                                <span class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">--SELESAI--</span>
                            @endif
                        </option>
                        <option value="0">PENDING</option>
                        <option value="1">PROSES</option>
                        <option value="2">SELESAI</option>
                    </select>
                </div> 
                <div class="mb-6">
                    <label for="unit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">DP</label>
                    <input type="number" name="dp" value="{{ $data->dp }}" id="dp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div> 
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Total DP</label>
                    <input type="text" id="total_dp" value="{{ $data->total_dp }}" name="total_dp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly>
                    <input type="hidden" id="status_dp" name="status_dp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly>
                </div> 
            </div>
            @endforeach
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js" integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
            $(document).ready(function(){
                $(".owl-carousel").owlCarousel();
            });
        
            function myFunction() {
                let id = event.srcElement.id;
                document.getElementById("unit").value = id;
            }
        
            function sum() {
                var txtFirst = document.getElementById('qty').value;
                var txtSecond = document.getElementById('unit').value;
                var result = parseInt(txtFirst) * parseInt(txtSecond);
        
                if(!isNaN(result)) {
                    document.getElementById('total').value = result;
                }
            }
            
            $(document).ready(function(){
                $("#dp").keyup(function(){
                    var total  = parseInt($("#total").val());
                    var dp  = parseInt($("#dp").val());
                    var total_price = (total*(dp/100));
                    $("#total_dp").val(total_price);
                    $("#status_dp").val('1');
                });
            });
        </script>

    @endsection