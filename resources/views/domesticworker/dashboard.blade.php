<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Domestic Worker Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold">Your Jobs</h3>
                        <form action="{{ route('domesticworker.create-job') }}" method="GET">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Create New Job
                            </button>
                        </form>
                    </div>

                    @if($jobs->count() > 0)
                        @foreach($jobs as $job)
                            <div class="mb-4 p-4 border rounded">
                                <h4 class="font-bold">{{ $job->title }}</h4>
                                <p>{{ $job->description }}</p>
                                @if($job->document_path)
                                    <a href="{{ Storage::url($job->document_path) }}" target="_blank" class="text-blue-600 hover:underline">View Document</a>
                                @endif
                            </div>
                        @endforeach

                        <div class="mt-4">
                            {{ $jobs->links() }}
                        </div>
                    @else
                        <p>You haven't created any jobs yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>