<?php

namespace App;

use App\Helpers\Formater;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Formater;

	/**
     * Always eager load relationships.
     *
     * @var array
     */
	protected $with = ['author'];

	/**
     * Add timestamp columns as Carbon instances.
     *
     * @var array
     */
    protected $dates = ['published_at', 'archived_at'];

    /**
     * The attributes that are mass not assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
    * Relationship to User model
    */
    public function author()
    {
    	return $this->belongsTo( User::class, 'user_id', 'id' )->select( 'id', 'name' );
    }

    /** 
    * Set a formating for input on dates
    *
    * @return string
    */
    public function getArchiveAttribute()
    {
        return $this->timestampInput( $this->archived_at );
    }

    /** 
    * Set a formating for input on dates
    *
    * @return string
    */
    public function getPublishAttribute()
    {
        return $this->timestampInput( $this->published_at );
    }
}
