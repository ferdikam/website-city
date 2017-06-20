<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryPost extends Model
{
	use SoftDeletes;

	protected $guarded = [];

	protected $dates = ['deleted_at'];

	/**
	 * nom de la table
	 * @var string
	 */
    protected $table = 'category_posts';

    /**
     * Mutator pour generer un slug à partir de la valeur "name"
     * @param string $value [description]
     */
    public function setNameAttribute($value)
    {
    	$this->attributes['name'] = $value;
    	$this->attributes['slug'] = str_slug($value);
    }

    /**
     * Une catégorie peut appartenir à au moins un Post.
     * @return [type] [description]
     */
    public function posts()
    {
    	return $this->hasMany(Post::class, 'category_post');
    }

}
