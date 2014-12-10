<?php

class Run extends Eloquent {

	public function user() {
        return $this->belongsTo('User');
    }

    public function shoe() {
        return $this->belongsTo('Shoe');
    }

    # Model events...
	# http://laravel.com/docs/eloquent#model-events
	public static function boot() {

        parent::boot();

        static::deleting(function($run) {

        	$shoe = Shoe::find($run->shoe_id);
        	$shoe->mileage -= $run->mileage;
        	$shoe->save();

        });

	}

}
