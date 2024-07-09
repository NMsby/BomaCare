<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Success') }}
        </h2>
    </x-slot>

    <div class="py-12 flex items-center justify-center">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg max-w-lg w-full p-8">
            <div class="p-6">
                <h2 class="text-center mb-4 font-semibold text-xl text-gray-800 leading-tight">Payment Successful</h2>
                <form action="{{ route('callback') }}" class="text-center">
                    <input type="submit" value="OK" class="bg-blue-600 text-white font-bold py-2 px-4 rounded mt-4">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    .max-w-lg {
        max-width: 36rem; /* Increase the max width */
    }
</style>
