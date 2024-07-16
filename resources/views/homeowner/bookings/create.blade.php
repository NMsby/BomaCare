@extends('homeowner.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Create a Booking</h1>
                <form action="{{ route('homeowner.bookings.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <input type="hidden" name="homeowner_id" value="{{ Auth::user()->id }}">
                    </div>
                    <div class="form-group row">
                        <label for="domestic_worker_id" class="col-md-4 col-form-label text-md-right">Domestic Worker</label>
                        <div class="col-md-6">
                            <select name="domestic_worker_id" id="domestic_worker_id" class="form-control">
                                @foreach($domestic_workers as $domestic_worker)
                                    <option value="{{ $domestic_worker->id }}">{{ $domestic_worker->first_name }} {{ $domestic_worker->last_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="service_id" class="col-md-4 col-form-label text-md-right">Service</label>
                        <div class="col-md-6">
                            <select name="service_id" id="service_id" class="form-control">
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="booking_date" class="col-md-4 col-form-label text-md-right">Booking Date</label>
                        <div class="col-md-6">
                            <input type="date" name="booking_date" id="booking_date" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="booking_time" class="col-md-4 col-form-label text-md-right">Booking Time</label>
                        <div class="col-md-6">
                            <input type="time" name="booking_time" id="booking_time" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">Create Booking</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
