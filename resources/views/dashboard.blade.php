<!-- resources/views/dashboard.blade.php -->
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
                        <a href="{{ route('role.select', ['role' => 'homeowner']) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Homeowner') }}
                        </a>
                        <a href="{{ route('role.select', ['role' => 'worker']) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ml-4">
                            {{ __('Domestic Worker') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
