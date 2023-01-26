@extends('layouts.app')

@section('title', 'Blog')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <strong>{{ $post->title }}</strong>
                        <a title="{{ __('back to blog') }}" class="btn" href="{{ URL::previous() }}"><i
                                class="fas fa-arrow-left"></i></a>
                    </div>
                    <div class="card-body">
                        {{ $post->content }}
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <div>
                            <small>{{ __('author') }}:</small> <a
                                href="/user/{{ $post->user->id }}">{{ $post->user->name }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
