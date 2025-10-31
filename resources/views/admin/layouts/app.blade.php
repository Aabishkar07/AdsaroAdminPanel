<!DOCTYPE html>
<html lang="{{ $page->language ?? 'en' }}">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('img/favicon.png') }}" rel="icon">

    @include('admin.links.style')
    @include('admin.links.javascript')
    <title>Adsaro | Admin</title>
</head>

<body>
    <div x-data="{ sidebarOpen: true }" class="relative flex">

        <!-- Sidebar -->
        <div :class="sidebarOpen ? 'w-64' : 'w-16'"
            class="fixed top-0 left-0 h-full bg-[#04033b] shadow-lg z-[1000] overflow-hidden transition-all duration-300 ease-in-out">
            @include('admin.layouts.sidebar')
        </div>

        <!-- Main Content Wrapper -->
        <main :class="sidebarOpen ? 'ml-64' : 'ml-16'"
            class="flex-1 w-full min-h-screen overflow-auto transition-all duration-300 ease-in-out">

            <!-- Fixed Navbar under Sidebar -->
            <div class="fixed top-0 left-0 right-0 z-[999] bg-[#eeeef7]">
                <div :class="sidebarOpen ? 'ml-64' : 'ml-16'"
                    class="flex justify-end pr-4 transition-all duration-300 ease-in-out">
                    @include('admin.layouts.navbar')
                </div>
            </div>

            <!-- Page Content -->
            <div class="w-full py-8 mt-8 bg-white">
                @yield('body')
            </div>
        </main>
    </div>

</body>

</html>
