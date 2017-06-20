<?php

namespace App;

use App\User;
use App\CategoryPost;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

	protected $fillable = [
		'title', 'slug', 'user_id', 'category_post', 'post_type', 'body', 'published_at'
	];

	protected $dates = ['deleted_at', 'published_at'];

	public static function getPostType($post_type = 'article')
	{
		return static::where('post_type', $post_type)->get();
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function category()
	{
		return $this->belongsTo(CategoryPost::class);
	}
}
