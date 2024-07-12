<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-gray-600 py-2" id="ftco-navbar">
    <div class="container justify-content-between">
        <a class="navbar-brand hover:s" style="font-size: larger; font-weight: bolder" href="/">Boma<span style="">Care</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav mx-auto gap-x-6">
                <li class="nav-item active"><a href="/" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">About</a></li>
                <li class="nav-item"><a href="{{ route('services') }}" class="nav-link">Services</a></li>
                <li class="nav-item"><a href="{{ route('pricing') }}" class="nav-link">Pricing</a></li>
                <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
            </ul>
            <ul class="navbar-nav ml-auto gap-x-10">
                @if (Route::has('login'))
                    @auth
                        <div class="hidden sm:flex sm:items-center sm:ms-6">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                        <div>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</div>

                                        <div class="ms-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('profile.edit')">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    @else
                        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                        @if (Route::has('register'))
                            <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                        @endif
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>
