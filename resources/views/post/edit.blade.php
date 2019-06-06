@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="card">
            <header class="card-header">
                <h1 class="card-title">Edit a post</h1>
            </header>

            <form action="{{ route('post.update', ['uuid' => $post->id]) }}" method="post" class="card-body">
                @method('patch')
                @csrf

                @include('layouts.partials.errors')
                
                <div class="row">
                    <div class="col-md-9 col-lg-10">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title')?? $post->title }}" class="form-control" required="true">
                        </div>

                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" id="content" class="form-control" rows="10" required="true">{{ old('content')?? $post->content }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-2">
                        <div class="form-group">
                            <label for="published_at">Publish</label>
                            <input type="text" 
                                name="published_at" 
                                id="published_at" 
                                value="{{ old('published_at')?? $post->publish }}" 
                                placeholder="mm/dd/yyyy h:m" 
                                class="form-control"
                            />
                        </div>
                        <div class="form-group">
                            <label for="archived_at">Archive</label>
                            <input type="text" 
                                name="archived_at" 
                                id="archived_at" 
                                value="{{ old('archived_at')?? $post->archive }}" 
                                placeholder="mm/dd/yyyy h:m" 
                                class="form-control"
                            />
                        </div>
                    </div>
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </section>
    </div>
@endsection
