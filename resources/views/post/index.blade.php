@extends('layouts.app')

@section('title', 'Blog')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>{{ __('Blog') }}</h5>
                        <a class="btn" title="{{ __('new post') }}" href="blog/create"><i class="fas fa-plus"></i></a>
                    </div>

                    <div class="card-body">
                        <ul class="list-group">
                            @if ($posts->isEmpty())
                                {{ __('You have no posts yet.') }}
                            @else
                                @foreach ($posts as $post)
                                    <li class="list-group-item">{{ $post->title }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
