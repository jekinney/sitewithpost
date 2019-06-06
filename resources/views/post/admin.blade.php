@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="card">
            <header class="card-header">
                <h1 class="card-title">Posts</h1>
                <a href="{{ route('post.create') }}" class="btn btn-primary">Add Post</a>
            </header>

            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th class="text-center">Author</th>
                        <th class="text-center">Publish</th>
                        <th class="text-center">Archived</th>
                        <th class="text-center">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $posts as $post )
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td class="text-center">{{ $post->author->name }}</td>
                            <td class="text-center">{{ $post->published_at }}</td>
                            <td class="text-center">{{ $post->archived_at }}</td>
                            <td class="text-center">
                                <a href="{{ route('post.edit', ['uuid' => $post->id]) }}" class="btn btn-link">Edit</a>
                                <a href="{{ route('post.show', ['uuid' => $post->id]) }}" target="_blank" class="btn btn-link">Show</a>
                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <footer class="card-footer">
                {{ $posts->links() }}
            </footer>
        </section>
    </div>
@endsection
