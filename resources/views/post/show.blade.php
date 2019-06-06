@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <section class="card">
                    <header class="card-header">
                        <h1 class="card-title">{{ $post->title }}</h1>
                        <p class="card-subtitle">By {{ $post->author->name }}</p>
                    </header>

                    <article class="card-body">
                        {!! $post->content !!}
                    </article>
                </section>
            </div>
        </div>
    </div>
@endsection
