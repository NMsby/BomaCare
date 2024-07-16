@extends('homeowner.layouts.app')
@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-2xl font-bold text-center mb-6">Create a Booking</h1>
                <form action="{{ route('homeowner.bookings.store') }}" method="POST" class="w-full max-w-lg mx-auto">
                    @csrf
                    <input type="hidden" name="homeowner_id" value="{{ Auth::user()->id }}">
                    <div class="mb-4">
                        <label for="domestic_worker_id" class="block text-gray-700 text-sm font-bold mb-2">Domestic Worker</label>
                        <div class="relative">
                            <select name="domestic_worker_id" id="domestic_worker_id" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                @foreach($domestic_workers as $domestic_worker)
                                    <option value="{{ $domestic_worker->id }}">{{ $domestic_worker->first_name }} {{ $domestic_worker->last_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="service_id" class="block text-gray-700 text-sm font-bold mb-2">Service</label>
                        <div class="relative">
                            <select name="service_id" id="service_id" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="booking_date" class="block text-gray-700 text-sm font-bold mb-2">Booking Date</label>
                        <input type="date" name="booking_date" id="booking_date" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label for="booking_time" class="block text-gray-700 text-sm font-bold mb-2">Booking Time</label>
                        <input type="time" name="booking_time" id="booking_time" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create Booking</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
