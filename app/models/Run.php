<?php

class Run extends Eloquent {

	public function user() {
        return $this->belongsTo('User');
    }

    public function shoe() {
        return $this->belongsTo('Shoe');
    }

}
