@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            <div class="">
                <h1>
                {{ isset($record) ? 'Edit' : 'Create' }} Employee
                </h1>
                <!-- <form class="contact-form-wrapper" method="post" action="{{route('employee.store')}}"> -->
                
                <form class="contact-form-wrapper" method="post" enctype="multipart/form-data" action="{{ isset($record) ? route('employee.update', $record->id) : route('employee.store') }}">
                    @csrf

                    @isset($record)
                            @method('put')
                        @endisset

                    <div class="row g-4">
                        <div class="col-sm-6">
                            <input type="text" name="first_name" placeholder="First Name" value="{{ $record->first_name ?? old('first_name') }}" class="form-control form--control">
                            @error('first_name')
                            {{$message}}
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <input type="text" name="last_name" placeholder="Last Name" value="{{  $record->last_name ?? old('last_name') }}" class="form-control form--control">
                            @error('last_name')
                            {{$message}}
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <input type="text" name="mobile" placeholder="Mobile" value="{{  $record->mobile ?? old('mobile') }}" class="form-control form--control">
                            @error('mobile')
                            {{$message}}
                            @enderror
                        </div>

                        <div class="col-sm-6">
                            <input type="email" name="email" placeholder="Email" value="{{  $record->email ?? old('email') }}" class="form-control form--control">
                            @error('email')
                            {{$message}}
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <input type="date" name="doj" placeholder="Date of Joining" value="{{  $record->doj ?? old('doj') }}" class="form-control form--control">
                            @error('doj')
                            {{$message}}
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <select name="status" class="form-control form--control">
                            <option value="1" {{ isset($record) && $record->status == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ isset($record) && $record->status == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                              <input type="file" class="form-control" name="featured_image" @error('featured_image') is-invalid @enderror>
                            </div>
                            @error('featured_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        <div class="col-sm-12 text-center">
                            <button class="cmn--btn border-0 btn-success" type="submit">{{__("message.Send")}} </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
