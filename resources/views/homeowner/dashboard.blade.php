<!-- resources/views/homeowner/dashboard.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900">{{ __('Select Your Role') }}</h3>
                    <div class="mt-4">
                        <a href="{{ route('worker.list') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-4">Domestic Workers</a>
                        <!-- Removed Payments button since the route is not defined anymore -->
                        <a href="#" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Reviews</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
