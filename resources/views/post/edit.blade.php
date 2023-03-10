@extends('layouts.app')

@section('title', 'Blog')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>{{ __('Edit post') }}</h5>
                        <a title="{{ __('back to blog') }}" class="btn" href="{{ URL::previous() }}"><i
                                class="fas fa-arrow-left"></i></a>
                    </div>

                    <div class="card-body">
                        <form autocomplete="off" action="/blog/{{ $post->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">{{ __('Title') }}</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('title') ? 'border-danger' : '' }}" id="title"
                                    name="title" value="{{ old('title') ?? $post->title }}">
                                <small class="form-text text-danger">{!! $errors->first('title') !!}</small>
                            </div>
                            <div class="form-group">
                                <label for="content">{{ __('Content') }}</label>
                                <textarea class="form-control {{ $errors->has('content') ? 'border-danger' : '' }}" name="content" id="content"
                                    cols="30" rows="10" value="{{ old('content') ?? $post->content }}">{{ old('content') ?? $post->content }}</textarea>
                                <small class="form-text text-danger">{!! $errors->first('content') !!}</small>
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file"
                                        class="custom-file-input form-control {{ $errors->has('image') ? 'border-danger' : '' }}"
                                        id="image" name="image" value="">
                                    <label class="custom-file-label" for="image">{{ __('Choose image') }}</label>
                                </div>
                            </div>
                            <small class="form-text text-danger">{!! $errors->first('image') !!}</small>

                            @if (!$post->tags->isEmpty())
                                <div class="form-group">
                                    <label for="tags">{{ __('Used tags') }}</label>
                                    <div>
                                        @foreach ($post->tags as $tag)
                                            <a class="badge badge-{{ $tag->style }}"
                                                href="/blog/{{ $post->id }}/{{ $tag->id }}/detach">{{ $tag->name }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="tags">{{ __('Available tags') }}</label>
                                <div>
                                    @foreach ($available_tags as $tag)
                                        <a class="badge badge-{{ $tag->style }}"
                                            href="/blog/{{ $post->id }}/{{ $tag->id }}/attach">{{ $tag->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                            <input class="btn btn-light mt-4" type="submit" value="{{ __('Submit') }}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
