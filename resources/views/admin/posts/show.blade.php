@extends('admin.layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card" style="width: 18rem;">

                    <div class="card-body">

                        @if ($post->cover)
                            <img src="{{asset('storage/' . $post->cover)}}" alt="{{$post->title}}">
                        @else
                            <img src="{{asset('img/fallback.jpg')}}" alt="{{$post->title}}">
                        @endif

                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">{!! $post->content !!}</p>
                        <h5 class="card-title">{{$post->slug}}</h5>
                        <h5 class="card-title">{{isset($post->category)?$post->category->name:'N.D.'}}</h5>
                        <div>
                            @foreach ($post->tags as $tag)
                                <span class="badge badge-primary">{{$tag->name}}</span>
                            @endforeach
                        </div>
                        <a href="{{ url()->previous() }}" class="btn btn-primary">Torna indietro</a>

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
