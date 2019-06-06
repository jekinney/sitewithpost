@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="card">
            <header class="card-header">
                <h1 class="card-title">Posts</h1>
            </header>

            <article class="card-body">
                @foreach ( $posts->chunk(2) as $chunk )
                    <div class="row mb-4">
                        @foreach ( $chunk as $post )
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $post->title }}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">By {{ $post->author->name }}</h6>
                                        <a href="{{ route('post.show', ['uuid' => $post->id]) }}" class="card-link">Read</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </article>
            <footer class="card-footer">
                {{ $posts->links() }}
            </footer>
        </section>
    </div>
@endsection
