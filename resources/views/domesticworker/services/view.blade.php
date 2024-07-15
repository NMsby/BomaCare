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
                            <dd class="mt-1 text-sm leading-5 text-gray-900 sm:col-span-2">{{ $service->{'service-type_price'} . "/hr" }}</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>

@endsection
