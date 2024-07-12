<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BomaCare</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @keyframes marquee {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }
        .marquee {
            overflow: hidden;
            white-space: nowrap;
        }
        .marquee p {
            display: inline-block;
            padding-left: 100%;
            animation: marquee 10s linear infinite;
        }
    </style>

</head>
<body>

{{-- HEADER CONTENT HERE --}}
<header>
    @php $profileData = auth()->user(); @endphp

    {{-- Banner Section--}}
    <div class="relative isolate flex items-center gap-x-6 overflow-hidden bg-gray-50 px-6 py-2.5 sm:px-3.5 sm:before:flex-1">
        <div class="absolute left-[max(-7rem,calc(50%-52rem))] top-1/2 -z-10 -translate-y-1/2 transform-gpu blur-2xl" aria-hidden="true">
            <div class="aspect-[577/310] w-[36.0625rem] bg-gradient-to-r from-[#ff80b5] to-[#9089fc] opacity-30" style="clip-path: polygon(74.8% 41.9%, 97.2% 73.2%, 100% 34.9%, 92.5% 0.4%, 87.5% 0%, 75% 28.6%, 58.5% 54.6%, 50.1% 56.8%, 46.9% 44%, 48.3% 17.4%, 24.7% 53.9%, 0% 27.9%, 11.9% 74.2%, 24.9% 54.1%, 68.6% 100%, 74.8% 41.9%)"></div>
        </div>
        <div class="absolute left-[max(45rem,calc(50%+8rem))] top-1/2 -z-10 -translate-y-1/2 transform-gpu blur-2xl" aria-hidden="true">
            <div class="aspect-[577/310] w-[36.0625rem] bg-gradient-to-r from-[#ff80b5] to-[#9089fc] opacity-30" style="clip-path: polygon(74.8% 41.9%, 97.2% 73.2%, 100% 34.9%, 92.5% 0.4%, 87.5% 0%, 75% 28.6%, 58.5% 54.6%, 50.1% 56.8%, 46.9% 44%, 48.3% 17.4%, 24.7% 53.9%, 0% 27.9%, 11.9% 74.2%, 24.9% 54.1%, 68.6% 100%, 74.8% 41.9%)"></div>
        </div>
        <div class="flex flex-wrap items-center gap-x-4 gap-y-2">
            <p class="text-sm leading-6 text-black">
                SIGNUP NOW & ENJOY 30% DISCOUNT ON FIRST 5 REQUESTS
            </p>
            @if (Route::has('login'))
                @auth
                @else
                    <a href="{{ route('register') }}" class="flex-none rounded-full bg-gray-900 px-3.5 py-1 text-sm font-semibold text-white shadow-sm hover:bg-gray-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-900">Register now <span aria-hidden="true">&rarr;</span></a>
                @endauth
            @endif
        </div>
        <div class="flex flex-1 justify-end">
            <button type="button" class="-m-3 p-3 focus-visible:outline-offset-[-4px]">
                <span class="sr-only">Dismiss</span>
                <svg class="h-5 w-5 text-gray-900" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                </svg>
            </button>
        </div>
    </div>
    {{-- Ends here --}}


    {{-- Navugation  Menu --}}

    <nav class="bg-gray-500">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="items-center">
                    <img class="h-9 w-auto" src="{{ asset('images/Logo.png') }}" alt="BomaCare">
                    </div>
                    <div class="hidden ml-6 sm:block">
                        <div class="flex space-x-4">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            <a href="#" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page">Request</a>
                            <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Serve</a>
                            <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">About</a>
                        </div>
                    </div>
                </div>
                @if (Route::has('login'))
                    <nav class="-mx-3 flex flex-1 justify-end">
                        @auth
                            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                                <button type="button" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                                    <span class="absolute -inset-1.5"></span>
                                    <span class="sr-only">View notifications</span>
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                                    </svg>
                                </button>

                                <!-- Profile dropdown -->
                                <div class="relative ml-3">
                                    <div>
                                        <button type="button" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                            <span class="absolute -inset-1.5"></span>
                                            <span class="sr-only">Open user menu</span>
                                            <img class="h-8 w-8 rounded-full" src="{{ $profileData->photo_path }}" alt="">
                                        </button>
                                    </div>
                                    <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                        <!-- Active: "bg-gray-100", Not Active: "" -->
                                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                  this.closest('form').submit();"
                                                  class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Sign out</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @else
                            <a
                                href="{{ route('login') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a
                                    href="{{ route('register') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                >
                                    Sign up
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif

            </div>
        </div>
    </nav>
    <div>
    </div>
</header>

{{-- MAIN CONTENT HERE --}}
<main>

{{-- Call To Action Here--}}
<div class="bg-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="relative isolate overflow-hidden bg-gray-900 px-6 py-12 shadow-2xl sm:rounded-3xl sm:px-16 lg:px-24">
            <div class="flex flex-col items-center justify-between h-full">
                <div class="text-center max-w-4xl mb-8">
                    <h2 class="text-2xl font-bold tracking-tight text-white sm:text-2xl lg:text-4xl">Join BomaCare Today</h2>
                    <p class="mt-6 text-lg leading-8 text-gray-300">BomaCare connects you with skilled caregivers for personalized and compassionate home care services. Enhance your quality of life with our trusted support.</p>
                </div>
                
                <div class="flex items-center justify-center gap-x-6 mb-8"> <!-- Added mb-8 for gap -->
                    <a href="{{ route('register') }}" class="rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">Get started</a>
                    <a href="#why-choose-bomacare" class="text-sm font-semibold leading-6 text-white">Learn more <span aria-hidden="true">→</span></a>
                </div>
                
                <div class="w-full max-w-lg aspect-[16/9] mb-8">
                    <div id="imageCarousel" class="relative w-full h-full overflow-hidden rounded-lg">
                        <img class="absolute inset-0 w-full h-full object-cover object-center transition-opacity duration-1000 z-10" src="{{ asset('images/Homepage3.jpg') }}" alt="Homepage 3">
                        <img class="absolute inset-0 w-full h-full object-cover object-center transition-opacity duration-1000 opacity-0 z-10" src="{{ asset('images/Homepage4.jpg') }}" alt="Homepage 4">
                        <img class="absolute inset-0 w-full h-full object-cover object-center transition-opacity duration-1000 opacity-0 z-10" src="{{ asset('images/Homepage5.jpg') }}" alt="Homepage 5">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Feature Section Here --}}
<div class="bg-white py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:text-center">
            <h2 id="why-choose-bomacare" class="text-base font-semibold leading-7 text-indigo-600">Why Choose BomaCare</h2>
            <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Comprehensive Home Care Solutions</p>
            <p class="mt-6 text-lg leading-8 text-gray-600">We offer a range of services designed to meet your unique needs, ensuring comfort and independence in the familiar surroundings of your home.</p>
        </div>
        <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-4xl">
            <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-10 lg:max-w-none lg:grid-cols-2 lg:gap-y-16">
                <div class="relative pl-16">
                    <dt class="text-base font-semibold leading-7 text-gray-900">
                        <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </div>
                        Personalized Care Plans
                    </dt>
                    <dd class="mt-2 text-base leading-7 text-gray-600">Tailored care plans to meet your specific health needs and preferences, ensuring you receive the right level of support.</dd>
                </div>
                <div class="relative pl-16">
                    <dt class="text-base font-semibold leading-7 text-gray-900">
                        <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                            </svg>
                        </div>
                        Skilled and Compassionate Caregivers
                    </dt>
                    <dd class="mt-2 text-base leading-7 text-gray-600">Our team of experienced and caring professionals is dedicated to providing high-quality care with empathy and respect.</dd>
                </div>
                <div class="relative pl-16">
                    <dt class="text-base font-semibold leading-7 text-gray-900">
                        <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </div>
                        24/7 Availability
                    </dt>
                    <dd class="mt-2 text-base leading-7 text-gray-600">Round-the-clock support to ensure you or your loved ones receive care whenever it's needed, providing peace of mind.</dd>
                </div>
                <div class="relative pl-16">
                    <dt class="text-base font-semibold leading-7 text-gray-900">
                        <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                            </svg>
                        </div>
                        Comprehensive Services
                    </dt>
                    <dd class="mt-2 text-base leading-7 text-gray-600">From personal care and medication management to companionship and household assistance, we offer a wide range of services to support your daily living.</dd>
                </div>
            </dl>
        </div>
    </div>
</div>

{{-- User Testimonials --}}
<section class="relative isolate overflow-hidden bg-white px-6 py-24 sm:py-32 lg:px-8">
    <div class="absolute inset-0 -z-10 bg-[radial-gradient(45rem_50rem_at_top,theme(colors.indigo.100),white)] opacity-20"></div>
    <div class="absolute inset-y-0 right-1/2 -z-10 mr-16 w-[200%] origin-bottom-left skew-x-[-30deg] bg-white shadow-xl shadow-indigo-600/10 ring-1 ring-indigo-50 sm:mr-28 lg:mr-0 xl:mr-16 xl:origin-center"></div>
    <div class="mx-auto max-w-2xl lg:max-w-4xl">
        <img class="mx-auto h-12" src="{{ asset('images/Logo.png') }}" alt="BomaCare">
        <figure class="mt-10">
            <blockquote class="text-center text-xl font-semibold leading-8 text-gray-900 sm:text-2xl sm:leading-9">
                <p>"BomaCare has been a blessing for our family. Their caregivers are not just skilled professionals, but also compassionate individuals who truly care about my mother's well-being. The peace of mind they've given us is priceless."</p>
            </blockquote>
            <figcaption class="mt-10">
                <img class="mx-auto h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                <div class="mt-4 flex items-center justify-center space-x-3 text-base">
                    <div class="font-semibold text-gray-900">Sarah Johnson</div>
                    <svg viewBox="0 0 2 2" width="3" height="3" aria-hidden="true" class="fill-gray-900">
                        <circle cx="1" cy="1" r="1" />
                    </svg>
                    <div class="text-gray-600">Daughter of BomaCare Client</div>
                </div>
            </figcaption>
        </figure>
    </div>
</section>


{{-- FOOTER CONTENT HERE --}}
<footer class="bg-gray-800 text-white">
    <div class="container mx-auto px-6 py-10">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="mb-6 md:mb-0">
                <a href="{{ route('admin.dashboard') }}" class="text-2xl font-bold">BomaCare</a>
                <p class="mt-2">Connecting homes with trusted domestic workers.</p>
            </div>
            <div class="flex flex-wrap justify-center md:justify-end">
                <a href="{{ route('about') }}" class="mx-4 my-2 hover:text-gray-300">About Us</a>
                <a href="{{ route('services') }}" class="mx-4 my-2 hover:text-gray-300">Services</a>
                <a href="{{ route('contact') }}" class="mx-4 my-2 hover:text-gray-300">Contact</a>
                @guest
                    <a href="{{ route('register') }}" class="mx-4 my-2 hover:text-gray-300">Register</a>
                    <a href="{{ route('login') }}" class="mx-4 my-2 hover:text-gray-300">Login</a>
                @endguest
            </div>
        </div>
        <div class="mt-8 text-center">
            <p>&copy; {{ date(@2024) }} BomaCare. All rights reserved.</p>
        </div>
    </div>
</footer>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Existing smooth scrolling code
    const learnMoreLinks = document.querySelectorAll('.learn-more-link');
    learnMoreLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });

    // New image carousel code
    const images = document.querySelectorAll('#imageCarousel img');
    let currentIndex = 0;

    function rotateImages() {
        images[currentIndex].style.opacity = '0';
        currentIndex = (currentIndex + 1) % images.length;
        images[currentIndex].style.opacity = '1';
    }

    // Start the rotation
    setInterval(rotateImages, 5000); // Rotate every 5 seconds
});

</script>

