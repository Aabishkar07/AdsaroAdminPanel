<!DOCTYPE html>
<html lang="en" x-data="{ sidebarOpen: false, rightSidebarOpen: false }" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <title>Right Sidebar Example</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="">

    <div class="">

        <!-- Top Navbar Section -->
        <section class="flex  justify-end items-center  py-2  border-b-2 border-gray-200">
            <!-- Right Icons -->
            <div class="flex gap-x-2 p-1">
                <!-- Right Sidebar Open Button -->
                <div class="relative  mr-3">
                    <a href="{{ route('admin.tag.index') }}">

                        <div class="relative block overflow-hidden  focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path
                                    d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                                <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                            </svg>
                        </div>
                    </a>
                </div>
                <!-- User Dropdown -->
            </div>
            {{-- <div class="flex gap-x-2 p-1">
                <!-- Right Sidebar Open Button -->
                <div class="relative h-6 w-6 mr-3">
                    <button @click="rightSidebarOpen = true"
                        class="relative block overflow-hidden h-6 w-6 focus:outline-none">
                        <img class="object-cover w-full h-full" src="{{ asset('icons/menu.png') }}" alt="tagphoto">
                    </button>
                </div>
                <!-- User Dropdown -->
            </div> --}}
            <div x-data="{ dropdownOpen: false }" class="relative shadow-[0_3px_10px_rgb(0,0,0,0.2)] h-6 w-6 rounded-full mr-3">
                <button @click="dropdownOpen = !dropdownOpen"
                    class="relative block overflow-hidden rounded-full h-6 w-6 focus:outline-none">
                    <img class="object-cover w-full h-full" src="{{ asset('img/favicon.png') }}"
                        alt="user">
                </button>

                <div x-cloak x-show="dropdownOpen" @click="dropdownOpen = false"
                    class="fixed inset-0 z-10 w-full h-full"></div>

                <div x-cloak x-show="dropdownOpen"
                    class="absolute right-0 z-10 w-48 mt-2 overflow-hidden bg-white rounded-md shadow-xl">
                    <a href="{{ route('admin.logout') }}"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Logout</a>
                </div>
            </div>
        </section>
    </div>
    <!-- Right Sidebar Overlay and Panel -->
    <div x-cloak x-show="rightSidebarOpen" class="fixed inset-0 z-40" x-transition>
        <!-- Overlay Background -->
        <div @click="rightSidebarOpen = false" class="absolute inset-0 bg-black bg-opacity-30"></div>

        <!-- Sidebar Panel -->
        <div class="absolute right-0 top-0 h-full w-64 bg-white shadow-xl transition-transform transform"
            x-transition:enter="transition ease-out duration-700" x-transition:enter-start="translate-x-full"
            x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full">
            <div class="flex items-center justify-between px-4 py-3 border-b">
                <h2 class="text-lg font-semibold">Adsaro Store</h2>
                <button @click="rightSidebarOpen = false"
                    class="text-gray-500 hover:text-black text-2xl font-bold">&times;</button>
            </div>
            <div class="p-4 space-y-3">

                <ul class="text-sm space-y-2">
                    <li>
                        <a class="hover:text-[#201d67] flex items-center justify-start  py-2 text-[#201d67]"
                            href="{{ route('admin.store.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.25">
                                <path
                                    d="M6.331 8h11.339a2 2 0 0 1 1.977 2.304l-1.255 8.152a3 3 0 0 1 -2.966 2.544h-6.852a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304z" />
                                <path d="M9 11v-5a3 3 0 0 1 6 0v5" />
                            </svg>
                            <span class="ml-3">Adsaro Store</span>
                        </a>
                    </li>

                    <li>
                        <a class="hover:text-[#201d67] flex items-center justify-start  py-2 text-[#201d67]"
                            href="{{ route('admin.product.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.25">
                                <path d="M10 16v-8h2.5a2.5 2.5 0 1 1 0 5h-2.5" />
                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                            </svg>
                            <span class="ml-3">Adsaro Product</span>
                        </a>
                    </li>

                    <li>
                        <a class="hover:text-[#201d67] flex items-center justify-start  py-2 text-[#201d67]"
                            href="{{ route('admin.productenquire.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.25">
                                <path
                                    d="M20 6v12a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2z" />
                                <path d="M10 16h6" />
                                <path d="M13 11m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                <path d="M4 8h3" />
                                <path d="M4 12h3" />
                                <path d="M4 16h3" />
                            </svg>
                            <span class="ml-3">Product Enquire</span>
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </div>

</body>

</html>
