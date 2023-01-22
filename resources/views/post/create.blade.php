@extends('layouts.app')

@section('title', 'Blog')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>{{ __('New post') }}</h5>
                        <a title="{{ __('back to blog') }}" class="btn" href="blog"><i class="fas fa-arrow-left"></i></a>
                    </div>

                    <div class="card-body">

                        <form action="/blog" method="POST">
                          @csrf
                            <div class="form-group">
                                <label for="title">{{ __('Title') }}</label>
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                            <div class="form-group">
                                <label for="content">{{ __('Content') }}</label>
                                <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
                            </div>
                            <input class="btn btn-light mt-4" type="submit" value="{{ __('Submit') }}">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
