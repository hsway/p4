<?php

class ShoeController extends \BaseController {


	/**
	*
	*/
	public function __construct() {

		# Make sure BaseController construct gets called
		parent::__construct();

		# Only logged in users are allowed here
		$this->beforeFilter('auth');

	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {

		$shoes = User::find(Auth::user()->id)->shoes;
		return View::make('shoe_index')->with('shoes',$shoes);

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		return View::make('shoe_create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {

		$rules = array(
			'name' => 'required',
			'purchase_date' => 'required|date_format:"Y-m-d"',
			'mileage' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {

			return Redirect::to('/shoe/create')
				->with('flash_message', 'Shoe creation failed; please fix the errors listed below.')
				->withInput()
				->withErrors($validator);
		}

		$shoe = new Shoe;
		$shoe->name = Input::get('name');
		$shoe->purchase_date = Input::get('purchase_date');
		$shoe->mileage = Input::get('mileage');
		$shoe->user_id = Auth::user()->id;

		try {
			$shoe->save();
		}
		catch (Exception $e) {
			return Redirect::to('/shoe/create')
				->with('flash_message', 'Shoe creation failed; please try again.')
				->withInput();
		}

		return Redirect::action('ShoeController@index')->with('flash_message', 'Shoe added');
		// from demo
	    // return Redirect::action('TagController@index')->with('flash_message','Your tag been added.');

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {

		try {
			$tag = Tag::findOrFail($id);
		}
		catch(Exception $e) {
			return Redirect::to('/tag')->with('flash_message', 'Tag not found');
		}

		return View::make('tag_show')->with('tag', $tag);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {

		try {
			$tag = Tag::findOrFail($id);
		}
		catch(Exception $e) {
			return Redirect::to('/tag')->with('flash_message', 'Tag not found');
		}

		# Pass with the $tag object so we can do model binding on the form
		return View::make('tag_edit')->with('tag', $tag);

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {

		try {
			$tag = Tag::findOrFail($id);
		}
		catch(Exception $e) {
			return Redirect::to('/tag')->with('flash_message', 'Tag not found');
		}

		$tag->name = Input::get('name');
		$tag->save();

		return Redirect::action('TagController@index')->with('flash_message','Your tag has been saved.');

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {

		try {
			$tag = Tag::findOrFail($id);
		}
		catch(Exception $e) {
			return Redirect::to('/tag')->with('flash_message', 'Tag not found');
		}

		# Note there's a `deleting` Model event which makes sure book_tag entries are also destroyed
		# See Tag.php for more details
		Tag::destroy($id);

		return Redirect::action('TagController@index')->with('flash_message','Your tag has been deleted.');

	}


}