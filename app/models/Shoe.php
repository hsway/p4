<?php

class Shoe extends Eloquent {

	public function user() {
        return $this->belongsTo('User');
    }

    public function runs() {
    	return $this->hasMany('Run');
    }

    # Model events...
	# http://laravel.com/docs/eloquent#model-events
	public static function boot() {

        parent::boot();

        static::deleting(function($shoe) {
            DB::statement('DELETE FROM runs WHERE shoe_id = ?', array($shoe->id));
        });

	}

}