<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Reviews') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium mb-4">{{ __("Your Reviews") }}</h3>
                    @forelse ($reviews as $review)
                        <div class="mb-6 p-4 bg-white rounded-lg shadow">
                            <div class="flex justify-between items-center mb-2">
                                <h4 class="font-bold">{{ $review->service_name }}</h4>
                                <div class="text-yellow-400">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $review->rating)
                                            ★
                                        @else
                                            ☆
                                        @endif
                                    @endfor
                                </div>
                            </div>
                            <p class="text-gray-600">{{ $review->comment }}</p>
                            <p class="text-sm text-gray-500 mt-2">Posted on: {{ $review->created_at->format('M d, Y') }}</p>
                        </div>
                    @empty
                        <p>You haven't submitted any reviews yet.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>