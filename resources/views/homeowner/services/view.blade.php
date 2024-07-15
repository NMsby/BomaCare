@extends('domesticworker.layouts.app')
@section('content')

    {{--    Make a Booking for that particular service --}}
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-semibold text-gray-700 text-center">Domestic Worker - Service Registration</h2>
        </div>
        <div class="mt-4">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Service Information</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">Service details and pricing</p>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">Service Type</dt>
                            <dd class="mt-1 text-sm leading-5 text-gray-900 sm:col-span-2">{{ $service->{'service-type_name'} }}</dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">Description</dt>
                            <dd class="mt-1 text-sm leading-5 text-gray-900 sm:col-span-2">{{ $service->{'service-type_description'} }}</dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">Price</dt>
                            <dd class="mt-1 text-sm leading-5 text-gray-900 sm:col-span-2">{{ $service->{'service-type_price'} }}</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-semibold text-gray-700">Register</h2>
        </div>
        <div class="mt-4">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Register for Service</h3>
                    <p class="mt-1 max-w 2xl text-sm text-gray-500">Please fill in the form below to register for the service</p>
                </div>
                <div class="border-t border-gray-200">
                    <form action="{{ route('domesticworker.services.register', $service->id) }}" method="POST">
                        @csrf
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <label for="start_date" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">Start Date</label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input id="start_date" name="start_date" type="date" required class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <label for="end_date" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">End Date</label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input id="end_date" name="end_date" type="date" required class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            </div>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <label for="start_time" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">Start Time</label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input id="start_time" name="start_time" type="time" required class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <label for="end_time" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2" required>End Time</label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input id="end_time" name="end_time" type="time" required class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            </div>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <label for="address" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">Address</label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input id="address" name="address" type="text" required class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <label for="city" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">City</label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input id="city" name="city" type="text" required class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            </div>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <label for="state" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">State</label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input id="state" name="state" type="text" required class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <label for="zip" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">Zip</label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input id="zip" name="zip" type="text" required class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            </div>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <label for="phone" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">Phone</label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input id="phone" name="phone" type="text" required class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <label for="email" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">Email</label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input id="email" name="email" type="email" required class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            </div>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <label for="comments" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">Comments</label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <textarea id="comments" name="comments" rows="3" class="form-textarea block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"></textarea>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:px-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <span class="flex w-full rounded-md shadow-sm sm:col-span-2">
                                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                                    Register
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
