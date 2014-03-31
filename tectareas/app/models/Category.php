<?php

class Category extends Eloquent {

    protected $table = 'category';
    public $timestamps = false;
    protected $fillable = array('name', 'slug', 'description');

    public function posts() {
        return $this->hasMany('Post', 'category_id');
    }

}
