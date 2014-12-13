<?php

class Shoe extends Elegant {

    protected $rules = array(
            'name' => 'required',
            'purchase_date' => 'required|date_format:"Y-m-d"|before:+1 day',
            'mileage' => 'required|numeric|min:0'
    );

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