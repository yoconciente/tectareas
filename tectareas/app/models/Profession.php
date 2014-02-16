<?php

class Profession extends Eloquent {

    protected $table = 'profession';
    public $timestamps = false;

    public function users(){
        return $this->hasMany('User', 'profession_id');
    }

    public static function getAllProfessions() {
        $professions = array();
        $list_professions = Profession::all();
        foreach($list_professions as $profession) {
            $professions[$profession->id] = $profession->name;
        }
        return $professions;
    }

}
