@extends('domesticworker.layouts.worker')
@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Welcome, "). $profileData->first_name . " " . $profileData->last_name . __("!")}}
                </div>
            </div>
        </div>
    </div>

    <!-- Start of two-column grid layout -->
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-4">
                <!-- Jobs Section -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Jobs') }}
                        </h2>
                        <div class="mt-4">
                            <a href="{{ route('domesticworker.jobs.index') }}" class="text-indigo-600 hover:text-indigo-900">
                                {{ __('View Jobs') }}
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Applications Section -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Applications') }}
                        </h2>
                        <div class="mt-4">
                            <a href="" class="text-indigo-600 hover:text-indigo-900">
                                {{ __('View Applications') }}
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Reviews Section -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Reviews') }}
                        </h2>
                        <div class="mt-4">
                            <a href="" class="text-indigo-600 hover:text-indigo-900">
                                {{ __('View Reviews') }}
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Profile Section -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Profile') }}
                        </h2>
                        <div class="mt-4">
                            <a href="{{ route('profile.edit') }}" class="text-indigo-600 hover:text-indigo-900">
                                {{ __('Edit Profile') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of two-column grid layout -->
@endsection
