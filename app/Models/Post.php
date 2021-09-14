<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = ['content'];

    /**
     * Comments relation
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
	public function comments()
	{
		return $this->hasMany(Comment::class);
	}

    /**
     * Returns a tree structure of comments
     * @return mixed
     */
	public function getThreadedComments(){
		return $this->comments()->get()->threaded();
	}

    /**
     * Adds a comment to a post
     * @param $attributes
     * @return false|Model
     */
	public function addComment($attributes)
	{
		$comment = (new Comment())->forceFill($attributes);
		return $this->comments()->save($comment);
	}

    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
