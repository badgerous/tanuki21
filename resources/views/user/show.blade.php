@extends('layouts.app')

@section('title', 'User')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <strong class="mr-2">{{ __('User profile') }}</strong>
                        <a title="{{ __('back') }}" class="btn" href="{{ URL::previous() }}"><i
                                class="fas fa-arrow-left"></i></a>
                    </div>
                    <div class="card-body">
                        <h5>{{ $user->name }}</h5>
                        <p><label>{{ __('Signature') }}:</label>{{ $user->signature }}</p>
                        <p><label>{{ __('About me') }}:</label>{{ $user->about_me }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
