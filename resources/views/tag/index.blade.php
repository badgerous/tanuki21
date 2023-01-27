@extends('layouts.app')

@section('title', 'Tags')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">{{ __('Tags') }}</h5>
                        <a class="btn" title="{{ __('new tag') }}" href="/tag/create"><i class="fas fa-plus"></i></a>
                    </div>

                    <div class="card-body">
                        @if ($tags->isEmpty())
                            {{ __('You have no tags yet.') }}
                        @else
                            <ul class="list-group mb-0">
                                @foreach ($tags as $tag)
                                    <li
                                        class="list-group-item d-flex justify-content-between wrap-nowrap align-items-center">
                                        <div>
                                            <span style="font-size: 1em"
                                                class="badge badge-{{ $tag->style }}">{{ $tag->name }}</span>
                                            <a href="/blog/tag/{{ $tag->id }}">
                                                <small class="font-italic">
                                                    {{ __('used') }} {{ $tag->posts->count() }} {{ __('times') }}
                                                </small>
                                            </a>
                                        </div>
                                        <div>
                                            {{-- comment --}}
                                            <a class="btn" title="{{ __('edit tag') }}"
                                                href="/tag/{{ $tag->id }}/edit"><i class="fas fa-pencil"></i></a>
                                            <form class="d-inline" action="/tag/{{ $tag->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn" title="{{ __('delete tag') }}"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
