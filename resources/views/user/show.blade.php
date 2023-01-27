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
                        <div class="row">
                            <div class="col-md-8">
                                <h5>{{ $user->name }}</h5>
                                <p><label>{{ __('Signature') }}:</label>{{ $user->signature }}</p>
                                <p><label>{{ __('About me') }}:</label>{{ $user->about_me }}</p>
                            </div>
                            <div class="col-md-4">
                                <a href="/img/9185410d-6c2b-44f7-b61b-de3529014699.jpeg"
                                    data-lightbox="9185410d-6c2b-44f7-b61b-de3529014699.jpeg"
                                    data-title="{{ $user->name }}">
                                    <img class="img-thumbnail w-100"
                                        src="/img/9185410d-6c2b-44f7-b61b-de3529014699.jpeg" alt="">
                                </a>
                                <div class="text-center">
                                    <i class="fa fa-search-plus"></i> {{ __('click to show full image') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
