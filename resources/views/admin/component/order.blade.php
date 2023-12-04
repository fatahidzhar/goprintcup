@yield('navbar')
<div class="flex flex-row justify-center">
    <div class="basis-1/4">@yield('sidebar')</div>
    <div class="w-full bg-gray-50 rounded-lg mr-4">
        @yield('content')
    </div>
  </div>
