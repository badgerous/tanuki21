@extends('layouts.app')

@section('title', 'Tags')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>{{ __('New tag') }}</h5>
                        <a title="{{ __('back to tags') }}" class="btn" href="/tag"><i class="fas fa-arrow-left"></i></a>
                    </div>

                    <div class="card-body">

                        <form action="/tag" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">{{ __('Name') }}</label>
                                <input type="text" class="form-control {{ $errors->has('name') ? 'border-danger' : '' }}"
                                    id="name" name="name" value="{{ old('name') }}">
                                <small class="form-text text-danger">{!! $errors->first('name') !!}</small>
                            </div>
                            <div class="form-group">
                                <label for="style">{{ __('Style') }}</label>
                                <input class="form-control {{ $errors->has('style') ? 'border-danger' : '' }}"
                                    name="style" id="style" value="{{ old('style') }}">
                                <small class="form-text text-danger">{!! $errors->first('style') !!}</small>
                            </div>
                            <input class="btn btn-light mt-4" type="submit" value="{{ __('Submit') }}">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
