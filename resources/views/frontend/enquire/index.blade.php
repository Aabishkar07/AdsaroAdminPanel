@extends('frontend.layouts.app')
@section('body')
@include('frontend.includes.messages')

<div class="container mt-5 pt-5 mb-5">

    <div class="row justify-content-center mt-4">

            <div class="col-lg-8">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-body p-5">
                        @if(session('popsuccess'))
                        <div class="alert alert-success">
                            {{ session('popsuccess') }}
                        </div>
                    @endif
                        <h3 class="text-center mb-4">Enquire Now</h3>
                        <form id="submitform" method="post" action="{{ route('enquire.store') }}">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstname" class="form-label">First Name</label>
                                    <input type="text" name="firstname" value="{{ old('firstname') }}"
                                        class="form-control" id="firstname" required>
                                    @error('firstname')
                                        <div class="text-danger">* {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastname" class="form-label">Last Name</label>
                                    <input type="text" name="lastname" value="{{ old('lastname') }}" class="form-control"
                                        id="lastname" required>
                                    @error('lastname')
                                        <div class="text-danger">* {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                                        id="email" required>
                                    @error('email')
                                        <div class="text-danger">* {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="number" class="form-label">Phone Number</label>
                                    <input type="text" name="number" value="{{ old('number') }}" class="form-control"
                                        id="number" required>
                                    @error('number')
                                        <div class="text-danger">* {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="subject" class="form-label">Social Media Solution Package</label>
                                <select name="subject" class="form-select">
                                    <option value="">Select Options</option>
                                    <option value="Basic">Basic NRP 10,000/Month</option>
                                    <option value="Standard">Standard NRP 11,000/Month</option>
                                    <option value="Premium">Premium NRP 12,500/Month</option>

                                </select>

                                @error('subject')
                                    <div class="text-danger">* {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea name="message" class="form-control" id="message" rows="4" required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="text-danger">* {{ $message }}</div>
                                @enderror
                            </div>

                            <button  type="submit" class="btn w-100 text-white" style="background-color: #6a68AF">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
