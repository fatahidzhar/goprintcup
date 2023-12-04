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

@foreach ($r_stocks as $data)
<form class="p-5" action="{{ route('product.update', $data->id_product) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')   
    <div class="grid gap-6 mb-6 md:grid-cols-2">
        <div>
            <label for="name_product" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama Product</label>
            <input type="hidden" name="id_product" value="{{ $data->id_product }}" id="id_product" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            <input type="text" name="name_product" value="{{ $data->name_product }}" id="name_product" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select Category</label>
                <select id="category" name="id_category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option>Choose a Size</option>
                    @foreach ($r_stocks as $data)
                        <option selected value="{{ $data->id_category }}">{{ $data->name_category }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="size" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select Size</label>
                <select id="size" name="id_size" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option>Choose a Size</option>
                    @foreach ($r_stocks as $data)
                        <option selected value="{{ $data->id_size }}">{{ $data->name_size }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div>
            <div class="flex flex-row justify-between">
                <div class="basis-1/4">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="file_input">Upload Photo</label>
                </div>
                <div class="basis-1/4">
                    <p class="text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG, JPEG(MAX. 1MB).</p> 
                </div>
            </div>   
            <input class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" name="image" id="file_input" type="file">
            <div>
                <label for="stock" class="block mt-6 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Stock Product</label>
                <input type="number" name="qty" value="{{ $data->qty }}" id="stock" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
            </div>
        </div>  
        <div>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="selling" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Selling Price</label>
                    <input type="text" value="{{ $data->selling_price }}" onkeyup="sum()" name="selling_price" id="selling" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>
                <div>
                    <label for="income" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Price Income</label>
                    <input type="text" value="{{ $data->price_income }}" onkeyup="sum()" name="price_income" id="income" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>
            </div>
            <label for="total" class="block mt-3 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Total Price</label>
            <input type="text" name="total_price" value="{{ $data->total_price }}" id="total" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required readonly>
        </div>
    </div>
    <img class="w-full h-36 object-cover rounded-lg" src="/image/{{ $data->image }}" alt="">
    @endforeach
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
 
        
    function sum() {
        var txtFirst = document.getElementById('selling').value;
        var txtSecond = document.getElementById('income').value;
        var result = parseInt(txtFirst) + parseInt(txtSecond);

        if(!isNaN(result)) {
            document.getElementById('total').value = result;
        }
    }

    $(document).ready(function () {
           $('#category').change(function () {
             var id = $(this).val();

             $('#size').find('option').not(':first').remove();

             $.ajax({
                url:'/product/'+id,
                type:'get',
                dataType:'json',
                success:function (response) {
                    var len = 0;
                    if (response.data != null) {
                        len = response.data.length;
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                            var id_size = response.data[i].id_size;
                            var name_size = response.data[i].name_size;
                            var option = "<option value='"+id_size+"'>"+name_size+"</option>"; 
                            $("#size").append(option);
                        }
                    }
                }
            })
        });
    });
</script>
@endsection