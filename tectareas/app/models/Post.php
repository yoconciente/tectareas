<?php

class Post extends Eloquent {

    protected $table = 'post';
    public $timestamps = false;
    protected $fillable = array(
        'title', 'extract', 'score', 'body', 'seo_words', 'slug',
        'category_id', 'user_id'
    );

    public function category() {
        return $this->belongsTo('Category');
    }

}
