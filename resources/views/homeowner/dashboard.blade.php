@extends('homeowner.layouts.app')
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

                <!-- Services Section -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Services') }}
                        </h2>
                        <div class="mt-4">
                            <a href="{{ route('homeowner.services.index') }}"
                               class="text-indigo-600 hover:text-indigo-900">
                                {{ __('View Services') }}
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Domestic Workers Section -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Domestic Workers') }}
                        </h2>
                        <div class="mt-4">
                            <a href="{{ route('homeowner.domestic-workers.index') }}" class="text-indigo-600 hover:text-indigo-900">
                                {{ __('View Domestic Workers') }}
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Bookings Section -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Bookings') }}
                        </h2>
                        <div class="mt-4">
                            <a href="{{ route('homeowner.bookings.index') }}" class="text-indigo-600 hover:text-indigo-900">
                                {{ __('View Bookings') }}
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Appointments Section -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Appointments') }}
                        </h2>
                        <div class="mt-4">
                            <a href="{{ route('homeowner.appointments.index') }}" class="text-indigo-600 hover:text-indigo-900">
                                {{ __('View Appointments') }}
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
