<!-- Sidebar Container -->
<div class="h-full flex flex-col">
    <!-- Header Section -->
    <div class="p-4 border-b border-gray-700">
        <div class="flex items-center justify-between">
            <!-- Logo/Title -->
            <div class="flex items-center space-x-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="text-white">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M6 21v-2a4 4 0 0 1 4 -4h2" />
                    <path d="M22 16c0 4 -2.5 6 -3.5 6s-3.5 -2 -3.5 -6c1 0 2.5 -.5 3.5 -1.5c1 1 2.5 1.5 3.5 1.5z" />
                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                </svg>
                <span x-show="sidebarOpen" x-transition class="text-white font-semibold text-sm">Admin Panel</span>
            </div>

            <!-- Toggle Button -->
            <button @click="sidebarOpen = !sidebarOpen"
                class="text-white hover:text-gray-300 transition-colors duration-200">
                <svg x-show="sidebarOpen" x-transition class="w-5 h-5" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 19l-7-7 7-7m8 14l-7-7 7-7"></path>
                </svg>
                <svg x-show="!sidebarOpen" x-transition class="w-5 h-5" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7">
                    </path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Navigation Menu -->
    <nav class="flex-1 px-3 py-4 space-y-2 overflow-y-auto">
        <!-- Dashboard -->
        <a href="{{ route('admin.dashboard') }}"
            class="{{ request()->segment(2) == 'dashboard' ? 'bg-[#8380d4] text-white' : 'text-gray-300 hover:bg-[#6a68AF] hover:text-white' }}
                  flex items-center px-3 py-2 rounded-lg transition-all duration-200 group">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6H8V5z"></path>
            </svg>
            <span x-show="sidebarOpen" x-transition class="ml-3 text-sm font-medium">Dashboard</span>
            <span x-show="!sidebarOpen" x-transition
                class="absolute left-0 ml-2 px-2 py-1 text-xs text-white bg-gray-800 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap">Dashboard</span>
        </a>

        @can('View Blog')
            <!-- Blogs -->
            <a href="{{ route('admin.blogs.index') }}"
                class="{{ request()->segment(2) == 'blogs' ? 'bg-[#8380d4] text-white' : 'text-gray-300 hover:bg-[#6a68AF] hover:text-white' }}
                  flex items-center px-3 py-2 rounded-lg transition-all duration-200 group">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                    </path>
                </svg>
                <span x-show="sidebarOpen" x-transition class="ml-3 text-sm font-medium">Blogs</span>
                <span x-show="!sidebarOpen" x-transition
                    class="absolute left-0 ml-2 px-2 py-1 text-xs text-white bg-gray-800 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap">Blogs</span>
            </a>
        @endcan
           @can('View Banner')
            <!-- Banner -->
            <a href="{{ route('admin.banner.index') }}"
                class="{{ request()->segment(2) == 'banner' ? 'bg-[#8380d4] text-white' : 'text-gray-300 hover:bg-[#6a68AF] hover:text-white' }}
                  flex items-center px-3 py-2 rounded-lg transition-all duration-200 group">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>
                </svg>
                <span x-show="sidebarOpen" x-transition class="ml-3 text-sm font-medium">Banner</span>
                <span x-show="!sidebarOpen" x-transition
                    class="absolute left-0 ml-2 px-2 py-1 text-xs text-white bg-gray-800 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap">Banner</span>
            </a>
        @endcan





        <!-- Categories -->
        <a href="{{ route('admin.categories.index') }}"
            class="{{ request()->segment(2) == 'categories' ? 'bg-[#8380d4] text-white' : 'text-gray-300 hover:bg-[#6a68AF] hover:text-white' }}
                  flex items-center px-3 py-2 rounded-lg transition-all duration-200 group">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
            </svg>
            <span x-show="sidebarOpen" x-transition class="ml-3 text-sm font-medium">Categories</span>
            <span x-show="!sidebarOpen" x-transition
                class="absolute left-0 ml-2 px-2 py-1 text-xs text-white bg-gray-800 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap">Categories</span>
        </a>

        {{-- @can('View Portfolio')
            <!-- Portfolio -->
            <a href="{{ route('admin.portfolio.index') }}"
                class="{{ request()->segment(2) == 'portfolio' ? 'bg-[#8380d4] text-white' : 'text-gray-300 hover:bg-[#6a68AF] hover:text-white' }}
                  flex items-center px-3 py-2 rounded-lg transition-all duration-200 group">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                    </path>
                </svg>
                <span x-show="sidebarOpen" x-transition class="ml-3 text-sm font-medium">Portfolio</span>
                <span x-show="!sidebarOpen" x-transition
                    class="absolute left-0 ml-2 px-2 py-1 text-xs text-white bg-gray-800 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap">Portfolio</span>
            </a>
        @endcan --}}

        @can('View Contact')
            <!-- Contacts -->
            <a href="{{ route('admin.contact') }}"
                class="{{ request()->segment(2) == 'contacts' ? 'bg-[#8380d4] text-white' : 'text-gray-300 hover:bg-[#6a68AF] hover:text-white' }}
                  flex items-center px-3 py-2 rounded-lg transition-all duration-200 group">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                    </path>
                </svg>
                <span x-show="sidebarOpen" x-transition class="ml-3 text-sm font-medium">Contacts</span>
                <span x-show="!sidebarOpen" x-transition
                    class="absolute left-0 ml-2 px-2 py-1 text-xs text-white bg-gray-800 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap">Contacts</span>
            </a>
        @endcan

        {{-- @can('View Client')
            <!-- Partners/Clients -->
            <a href="{{ route('admin.partners.index') }}"
                class="{{ request()->segment(2) == 'partners' ? 'bg-[#8380d4] text-white' : 'text-gray-300 hover:bg-[#6a68AF] hover:text-white' }}
                  flex items-center px-3 py-2 rounded-lg transition-all duration-200 group">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
                </svg>
                <span x-show="sidebarOpen" x-transition class="ml-3 text-sm font-medium">Clients</span>
                <span x-show="!sidebarOpen" x-transition
                    class="absolute left-0 ml-2 px-2 py-1 text-xs text-white bg-gray-800 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap">Clients</span>
            </a>
        @endcan --}}

        {{-- @can('View Team')
            <!-- Team -->
            <a href="{{ route('admin.teams.index') }}"
                class="{{ request()->segment(2) == 'teams' ? 'bg-[#8380d4] text-white' : 'text-gray-300 hover:bg-[#6a68AF] hover:text-white' }}
                  flex items-center px-3 py-2 rounded-lg transition-all duration-200 group">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z">
                    </path>
                </svg>
                <span x-show="sidebarOpen" x-transition class="ml-3 text-sm font-medium">Team</span>
                <span x-show="!sidebarOpen" x-transition
                    class="absolute left-0 ml-2 px-2 py-1 text-xs text-white bg-gray-800 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap">Team</span>
            </a>
        @endcan --}}

        {{-- @can('View Testimonials')
            <!-- Testimonials -->
            <a href="{{ route('admin.testimonials.index') }}"
                class="{{ request()->segment(2) == 'testimonials' ? 'bg-[#8380d4] text-white' : 'text-gray-300 hover:bg-[#6a68AF] hover:text-white' }}
                  flex items-center px-3 py-2 rounded-lg transition-all duration-200 group">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949l3.255-9.051a1 1 0 011.189-.633l.113.023a1 1 0 01.633 1.189l-3.255 9.051a9.863 9.863 0 004.255.949c4.97 0 9-3.582 9-8z">
                    </path>
                </svg>
                <span x-show="sidebarOpen" x-transition class="ml-3 text-sm font-medium">Testimonials</span>
                <span x-show="!sidebarOpen" x-transition
                    class="absolute left-0 ml-2 px-2 py-1 text-xs text-white bg-gray-800 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap">Testimonials</span>
            </a>
        @endcan --}}

        @can('View FAQ')
            <!-- FAQs -->
            <a href="{{ route('admin.faqs.index') }}"
                class="{{ request()->segment(2) == 'faqs' ? 'bg-[#8380d4] text-white' : 'text-gray-300 hover:bg-[#6a68AF] hover:text-white' }}
                  flex items-center px-3 py-2 rounded-lg transition-all duration-200 group">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                    </path>
                </svg>
                <span x-show="sidebarOpen" x-transition class="ml-3 text-sm font-medium">FAQs</span>
                <span x-show="!sidebarOpen" x-transition
                    class="absolute left-0 ml-2 px-2 py-1 text-xs text-white bg-gray-800 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap">FAQs</span>
            </a>
        @endcan

        @can('View Services')
            <!-- Services -->
            <a href="{{ route('admin.services.index') }}"
                class="{{ request()->segment(2) == 'services' ? 'bg-[#8380d4] text-white' : 'text-gray-300 hover:bg-[#6a68AF] hover:text-white' }}
                  flex items-center px-3 py-2 rounded-lg transition-all duration-200 group">

<svg
  xmlns="http://www.w3.org/2000/svg"
  width="23"
  height="23"
  viewBox="0 0 24 24"
  stroke="currentColor"
  strokeWidth="1.25"
  strokeLinecap="round"
  strokeLinejoin="round"
  fill="none"
>
  <path d="M3 7m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
  <path d="M16 3l-4 4l-4 -4" />
</svg>


                <span x-show="sidebarOpen" x-transition class="ml-3 text-sm font-medium">Advertising Formats</span>
                <span x-show="!sidebarOpen" x-transition
                    class="absolute left-0 ml-2 px-2 py-1 text-xs text-white bg-gray-800 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap">Services</span>
            </a>
        @endcan





        @can('View Email Marketing')
            <!-- Email Marketing -->
            <a href="{{ route('admin.csvs.index') }}"
                class="{{ request()->segment(2) == 'csvs' ? 'bg-[#8380d4] text-white' : 'text-gray-300 hover:bg-[#6a68AF] hover:text-white' }}
                  flex items-center px-3 py-2 rounded-lg transition-all duration-200 group">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 6v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6a2 2 0 012-2h12a2 2 0 012 2z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 16h6"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 11m-2 0a2 2 0 100 4 2 2 0 000-4z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h3"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 12h3"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16h3"></path>
                </svg>
                <span x-show="sidebarOpen" x-transition class="ml-3 text-sm font-medium">Email Marketing</span>
                <span x-show="!sidebarOpen" x-transition
                    class="absolute left-0 ml-2 px-2 py-1 text-xs text-white bg-gray-800 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap">Email
                    Marketing</span>
            </a>
        @endcan

        <!-- User Management Dropdown -->
        {{-- <div x-data="{ isOpen: false }" class="relative">
            <button @click="isOpen = !isOpen"
                class="{{ request()->segment(2) == 'usermanagement' || request()->segment(2) == 'userrole' || request()->segment(2) == 'permissions' ? 'bg-[#8380d4] text-white' : 'text-gray-300 hover:bg-[#6a68AF] hover:text-white' }}
                           flex items-center px-3 py-2 rounded-lg transition-all duration-200 group w-full">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 019 9v.375M10.125 2.25A3.375 3.375 0 0113.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 013.375 3.375M9 15l2.25 2.25L15 12">
                    </path>
                </svg>
                <span x-show="sidebarOpen" x-transition class="ml-3 text-sm font-medium flex-1 text-left">User
                    Management</span>
                <svg x-show="sidebarOpen" x-transition class="w-4 h-4 ml-2 transition-transform duration-200"
                    :class="isOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
                <span x-show="!sidebarOpen" x-transition
                    class="absolute left-0 ml-2 px-2 py-1 text-xs text-white bg-gray-800 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap">User
                    Management</span>
            </button>

            <!-- Dropdown Menu -->
            <div x-show="isOpen" @click.away="isOpen = false" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 transform scale-95"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-95"
                class="absolute left-0 right-0 top-full mt-1 bg-[#2d2b5a] rounded-lg shadow-lg border border-gray-600 z-50">
                <div class="py-1">
                    @can('View AdminUser')
                        <a href="{{ route('admin.usermanagement.index') }}"
                            class="flex items-center px-4 py-2 text-sm text-gray-300 hover:bg-[#6a68AF] hover:text-white transition-colors duration-200">
                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Manage Admin
                        </a>
                    @endcan
                    @can('View Role')
                        <a href="{{ route('admin.userrole.index') }}"
                            class="flex items-center px-4 py-2 text-sm text-gray-300 hover:bg-[#6a68AF] hover:text-white transition-colors duration-200">
                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                </path>
                            </svg>
                            Manage Role
                        </a>
                    @endcan
                    @can('View Permission')
                        <a href="{{ route('admin.permissions.index') }}"
                            class="flex items-center px-4 py-2 text-sm text-gray-300 hover:bg-[#6a68AF] hover:text-white transition-colors duration-200">
                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                            Manage Permissions
                        </a>
                    @endcan
                </div>
            </div>
        </div> --}}

        <!-- CMS/Pages Dropdown -->
        <div x-data="{ dropdownOpen: false }" class="relative">
            <button @click="dropdownOpen = !dropdownOpen"
                class="{{ request()->segment(2) == 'page' ? 'bg-[#8380d4] text-white' : 'text-gray-300 hover:bg-[#6a68AF] hover:text-white' }}
                           flex items-center px-3 py-2 rounded-lg transition-all duration-200 group w-full">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 3v4a1 1 0 001 1h4">
                    </path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 21h-10a2 2 0 01-2-2V5a2 2 0 012-2h7l5 5v11a2 2 0 01-2 2z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 15h6"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12.5 17.5l2.5-2.5-2.5-2.5"></path>
                </svg>
                <span x-show="sidebarOpen" x-transition class="ml-3 text-sm font-medium flex-1 text-left">CMS</span>
                <svg x-show="sidebarOpen" x-transition class="w-4 h-4 ml-2 transition-transform duration-200"
                    :class="dropdownOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
                <span x-show="!sidebarOpen" x-transition
                    class="absolute left-0 ml-2 px-2 py-1 text-xs text-white bg-gray-800 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap">CMS</span>
            </button>

            <!-- Dropdown Menu -->
            <div x-show="dropdownOpen" @click.away="dropdownOpen = false"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 transform scale-95"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-95"
                class="absolute left-0 right-0 top-full mt-1 bg-[#2d2b5a] rounded-lg shadow-lg border border-gray-600 z-50">
                <div class="py-1">
                    @can('View Pages')
                        <a href="{{ route('admin.page.index') }}"
                            class="flex items-center px-4 py-2 text-sm text-gray-300 hover:bg-[#6a68AF] hover:text-white transition-colors duration-200">
                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5h-2a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 3m0 2a2 2 0 012-2h2a2 2 0 012 2v0a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 16h6"></path>
                            </svg>
                            Pages
                        </a>
                    @endcan
                </div>
            </div>
        </div>


          @can('View Meta Page')
            <!-- Meta Pages -->
            <a href="{{ route('admin.metapages.index') }}"
                class="{{ request()->segment(2) == 'metapages' ? 'bg-[#8380d4] text-white' : 'text-gray-300 hover:bg-[#6a68AF] hover:text-white' }}
                  flex items-center px-3 py-2 rounded-lg transition-all duration-200 group">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
                <span x-show="sidebarOpen" x-transition class="ml-3 text-sm font-medium">Meta Pages</span>
                <span x-show="!sidebarOpen" x-transition
                    class="absolute left-0 ml-2 px-2 py-1 text-xs text-white bg-gray-800 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap">Meta
                    Pages</span>
            </a>
        @endcan

        <!-- Settings -->
        <a href="{{ route('admin.setting') }}"
            class="{{ request()->segment(2) == 'settings' ? 'bg-[#8380d4] text-white' : 'text-gray-300 hover:bg-[#6a68AF] hover:text-white' }}
                  flex items-center px-3 py-2 rounded-lg transition-all duration-200 group">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37c1 .608 2.296.07 2.572-1.065z">
                </path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
            <span x-show="sidebarOpen" x-transition class="ml-3 text-sm font-medium">Settings</span>
            <span x-show="!sidebarOpen" x-transition
                class="absolute left-0 ml-2 px-2 py-1 text-xs text-white bg-gray-800 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap">Settings</span>
        </a>
    </nav>

    <!-- Footer Section -->
    <div class="px-4 py-1 border-t border-gray-700">
        <div class="flex items-center justify-center">
            <button @click="sidebarOpen = !sidebarOpen"
                class="text-gray-300 hover:text-white transition-colors duration-200">
                <svg x-show="sidebarOpen" x-transition class="w-5 h-5" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 19l-7-7 7-7m8 14l-7-7 7-7"></path>
                </svg>
                <svg x-show="!sidebarOpen" x-transition class="w-5 h-5" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>
    </div>
</div>
