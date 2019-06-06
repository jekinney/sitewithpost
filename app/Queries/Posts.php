<?php

namespace App\Queries;

use Uuid;
use App\Post;
use Carbon\Carbon;
use App\Helpers\Formater;
use Illuminate\Http\Request;

class Posts extends Post
{
	use Formater;

	/**
	* Remove a post
	*
	* @param  string $uuid
	* @return model
	*/
	public function show($uuid)
	{
		return $this->where( 'id', $uuid )->first();
	}

	/**
	* Remove a post
	*
	* @param  string $uuid
	* @return model
	*/
	public function edit($uuid)
	{
		return $this->where( 'id', $uuid )->first();
	}

	/**
	* Create a new post
	*
	* @param  \Illuminate\Http\Request $request
	* @return model
	*/
	public function store(Request $request)
	{
		return $this->create( $this->setData($request) );
	}

	/**
	* Update a post
	*
	* @param  \Illuminate\Http\Request $request
	* @return model
	*/
	public function renew(Request $request, $uuid)
	{
		$post = $this->where( 'id', $uuid )->first();

		$post->update( $this->setData($request, $uuid) );

		return $post;
	}

	/**
	* Remove a post
	*
	* @param  string $uuid
	* @return bool
	*/
	public function remove($uuid)
	{
		return $this->where( 'id', $uuid )->delete();
	}

	/**
	* Remove a post
	*
	* @param  string $uuid
	* @return bool
	*/
	public function fullList($amount = 20)
	{
		return $this->orderBy( 'published_at', 'desc' )
			->paginate( $amount );
	}	

	/**
	* Remove a post
	*
	* @param  string $uuid
	* @return bool
	*/
	public function publishedList($amount = 10)
	{
		$now = Carbon::now();

		return $this->where( 'published_at', '<', $now )
			->where( 'archived_at', '>', $now )
			->orderBy( 'published_at', 'desc' )
			->paginate( $amount );
	}

	/**
	* Set data as needed for inserting into database
	*
	* @param  /Illuminate\Http\Request $request
	* @param  string $uuid
	* @return array
	*/
	protected function setData(Request $request, $uuid = null)
	{
		$request = $this->validate( $request, $uuid );

		$data = [
			'title' => $request['title'],
        	'content' => $request['content'],
        	'archived_at' => $this->timestamp( $request['archived_at'] ),
        	'published_at' => $this->timestamp( $request['published_at'] ),
		];

		if ( is_null($uuid) ) {
			$data['id'] = Uuid::generate(4);
			$data['user_id'] = auth()->id();
		}

		return $data;
	}

	/**
	* Validate incoming data
	*
	* @param  \Illuminate\Http\Request $request
	* @return array
	*/
	protected function validate(Request $request, $uuid = null)
	{
		$rules = [
			'title' => 'required|max:220|string|unique:posts,title',
			'header' => 'nullable|image',
			'content' => 'required|string',
			'archived_at' => 'nullable|date',
			'published_at' => 'nullable|date',
		];

		if ( isset($uuid) ) {
			$rules['title'] .= ','. $uuid;
		}

		return $request->validate( $rules );
	}
}