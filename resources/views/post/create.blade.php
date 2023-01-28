@extends('layouts.app')

@section('title', 'Blog')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>{{ __('New post') }}</h5>
                        <a title="{{ __('back to blog') }}" class="btn" href="{{ URL::previous() }}"><i
                                class="fas fa-arrow-left"></i></a>
                    </div>

                    <div class="card-body">

                        <form autocomplete="off" action="/blog" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">{{ __('Title') }}</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('title') ? 'border-danger' : '' }}" id="title"
                                    name="title" value="{{ old('title') }}">
                                <small class="form-text text-danger">{!! $errors->first('title') !!}</small>
                            </div>
                            <div class="form-group">
                                <label for="content">{{ __('Content') }}</label>
                                <textarea class="form-control {{ $errors->has('content') ? 'border-danger' : '' }}" name="content" id="content"
                                    cols="30" rows="10" value="{{ old('content') }}">{{ old('content') }}</textarea>
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
                            <input class="btn btn-light mt-4" type="submit" value="{{ __('Submit') }}">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
