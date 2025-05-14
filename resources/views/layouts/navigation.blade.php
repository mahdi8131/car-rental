<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <div class="shrink-0">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block h-9 w-auto text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    @auth
                        @php $role = Auth::user()->role; @endphp

                        @if($role === 'admin')
                            <!-- Admin Only Links -->
                            <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                                {{ __('Admin Dashboard') }}
                            </x-nav-link>
                            <x-nav-link :href="route('cars.index')" :active="request()->routeIs('cars.*')">
                                {{ __('Manage Cars') }}
                            </x-nav-link>
                            <x-nav-link :href="route('customers.index')" :active="request()->routeIs('customers.*')">
                                {{ __('Manage Customers') }}
                            </x-nav-link>
                            <x-nav-link :href="route('rentals.index')" :active="request()->routeIs('rentals.*')">
                                {{ __('Manage Rentals') }}
                            </x-nav-link>
                        @else
                            <!-- Customer Links -->
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                {{ __('Dashboard') }}
                            </x-nav-link>
                            <x-nav-link :href="route('frontend.rentals.index')" :active="request()->routeIs('frontend.rentals.index')">
                                {{ __('Rental History') }}
                            </x-nav-link>
                            <x-nav-link :href="route('frontend.cars.index')" :active="request()->routeIs('frontend.cars.*')">
                                {{ __('Browse Cars') }}
                            </x-nav-link>
                        @endif
                    @else
                        <!-- Public Links for Guests -->
                        <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                            {{ __('Home') }}
                        </x-nav-link>
                        <x-nav-link :href="route('about')" :active="request()->routeIs('about')">
                            {{ __('About') }}
                        </x-nav-link>
                        <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
                            {{ __('Contact') }}
                        </x-nav-link>
                        <x-nav-link :href="route('frontend.cars.index')" :active="request()->routeIs('frontend.cars.*')">
                            {{ __('Browse Cars') }}
                        </x-nav-link>
                    @endauth
                </div>
            </div>

            <!-- Right Side -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @guest
                    <x-nav-link :href="route('login')" class="mr-4">
                        {{ __('Login') }}
                    </x-nav-link>
                    <x-nav-link :href="route('register')" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                        {{ __('Register') }}
                    </x-nav-link>
                @else
                    <!-- Profile Dropdown -->
                    <div class="flex items-center">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-gray-500 hover:text-gray-700 hover:bg-gray-50">
                                    <div class="flex items-center">
                                        <img src="{{ Auth::user()->image ? asset('image/' . Auth::user()->image) : asset('default.png') }}"
                                             alt="{{ Auth::user()->name }}"
                                             class="h-8 w-8 rounded-full object-cover mr-2">
                                        <span>{{ Auth::user()->name }}</span>
                                    </div>
                                    <div class="ms-1">
                                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endguest
            </div>

            <!-- Hamburger Button -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': ! open, 'inline-flex': open }" class="hidden"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': ! open }" class="sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @auth
                @php $role = Auth::user()->role; @endphp

                @if($role === 'admin')
                    <!-- Admin Only Links -->
                    <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                        {{ __('Admin Dashboard') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('cars.index')" :active="request()->routeIs('cars.*')">
                        {{ __('Manage Cars') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('customers.index')" :active="request()->routeIs('customers.*')">
                        {{ __('Manage Customers') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('rentals.index')" :active="request()->routeIs('rentals.*')">
                        {{ __('Manage Rentals') }}
                    </x-responsive-nav-link>
                @else
                    <!-- Customer Links -->
                    <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('frontend.rentals.index')" :active="request()->routeIs('frontend.rentals.index')">
                        {{ __('Rental History') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('frontend.cars.index')" :active="request()->routeIs('frontend.cars.*')">
                        {{ __('Browse Cars') }}
                    </x-responsive-nav-link>
                @endif
            @else
                <!-- Public Links for Guests -->
                <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                    {{ __('Home') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('about')" :active="request()->routeIs('about')">
                    {{ __('About') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
                    {{ __('Contact') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('frontend.cars.index')" :active="request()->routeIs('frontend.cars.*')">
                    {{ __('Browse Cars') }}
                </x-responsive-nav-link>
            @endauth
        </div>

        @auth
            <!-- Responsive User Info -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="flex items-center">
                        <img src="{{ Auth::user()->image ? asset('image/' . Auth::user()->image) : asset('default.png') }}"
                             alt="{{ Auth::user()->name }}"
                             class="h-10 w-10 rounded-full object-cover mr-3">
                        <div>
                            <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                        </div>
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @else
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('login')">
                    {{ __('Login') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('register')" class="bg-blue-600 text-white">
                    {{ __('Register') }}
                </x-responsive-nav-link>
            </div>
        @endauth
    </div>
</nav>