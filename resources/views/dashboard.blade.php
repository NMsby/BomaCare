<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center">
                    <h3 class="text-lg font-medium">{{ __("Welcome to BomaCare!") }}</h3>
                    <p class="mt-2">{{ __("You're logged in!") }}</p>
                </div>
            </div>

            <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <a href="{{ route('payments') }}">
                        <div class="p-6 text-gray-900 text-center">
                            <svg class="w-12 h-12 mx-auto mb-4 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c.252 0 .504.002.757.006a4.002 4.002 0 012.11.765l2.52 1.764A2 2 0 0119 13v3a2 2 0 01-2 2h-1.5M12 12a2 2 0 110-4 2 2 0 010 4zm0 4v2m-4-2v2m8-2v2M9 14v2m6-2v2m-3-6v2"></path>
                            </svg>
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                {{ __('Payments') }}
                            </button>
                        </div>
                    </a>
                </div>
                <!-- Add more cards here as needed -->
            </div>
        </div>
    </div>
</x-app-layout>
