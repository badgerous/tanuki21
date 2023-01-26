@extends('layouts.app')

@section('title', 'Blog')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">{{ __('Blog') }}</h5>
                        @auth
                            <a class="btn" title="{{ __('new post') }}" href="/blog/create"><i class="fas fa-plus"></i></a>
                        @endauth
                    </div>

                    <div class="card-body">
                        @if ($posts->isEmpty())
                            {{ __('You have no posts yet.') }}
                        @else
                            @foreach ($posts as $post)
                                <div class="card mb-4">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <div>
                                            <a href="/blog/{{ $post->id }}">{{ $post->title }}</a>
                                            <small class="font-italic">
                                                {{ __('created at') }}: {{ $post->created_at }}
                                            </small>
                                        </div>
                                        <div>
                                            <a class="btn" title="{{ __('edit post') }}"
                                                href="/blog/{{ $post->id }}/edit"><i class="fas fa-pencil"></i></a>
                                            <form class="d-inline" action="/blog/{{ $post->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn" title="{{ __('delete post') }}"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        {{ $post->content }}
                                    </div>
                                    <div class="card-footer d-flex justify-content-between">
                                        <div>
                                            <small>{{ __('author') }}:</small> {{ $post->user->name }}
                                            <small>({{ $post->user->posts->count() }} {{ __('posts') }})</small>
                                        </div>
                                        <small class="font-italic">
                                            {{ __('last updated') }}: {{ $post->updated_at }}
                                        </small>
                                    </div>
                                </div>
                            @endforeach
                            <div>
                                {{ $posts->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
