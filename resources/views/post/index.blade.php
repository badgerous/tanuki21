@extends('layouts.app')

@section('title', 'Blog')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>{{ __('Blog') }}</h5>
                        <a class="btn" title="{{ __('new post') }}" href="/blog/create"><i class="fas fa-plus"></i></a>
                    </div>

                    <div class="card-body">
                        @if ($posts->isEmpty())
                            {{ __('You have no posts yet.') }}
                        @else
                            @foreach ($posts as $post)
                                <div class="card mb-4">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <div>
                                            {{ $post->title }}
                                            <small class="font-italic">
                                                {{ __('created at') }}: {{ $post->created_at }}
                                            </small>
                                        </div>
                                        <div>
                                            <a class="btn" title="{{ __('edit post') }}" href="blog/edit"><i
                                                    class="fas fa-pencil"></i></a>
                                            <a class="btn" title="{{ __('delete post') }}" href="blog/destroy"><i
                                                    class="fas fa-trash"></i></a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        {{ $post->content }}
                                    </div>
                                    <div class="card-footer">
                                        <small class="font-italic">
                                            {{ __('last updated') }}: {{ $post->updated_at }}
                                        </small>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
