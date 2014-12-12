<?php

class ShoeController extends BaseController {


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

		$shoes = User::find(Auth::user()->id)->shoes->sortByDesc('updated_at');
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
			'mileage' => 'required|numeric|min:0'
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

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {

		try {
			$shoe = Shoe::findOrFail($id);
		}
		catch(Exception $e) {
			return Redirect::to('/shoe')->with('flash_message', 'Shoe not found');
		}

		$runs = $shoe->runs()->take(5)->orderBy('date', 'dsc')->get();

		return View::make('shoe_show')->with(array('shoe' => $shoe,
												   'runs' => $runs
		));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {

		try {
			$shoe = Shoe::findOrFail($id);
		}
		catch(Exception $e) {
			return Redirect::to('/shoe')->with('flash_message', 'Shoe not found');
		}

		# Pass with the $shoe object so we can do model binding on the form
		return View::make('shoe_edit')->with('shoe', $shoe);

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {

		$rules = array(
			'name' => 'required',
			'purchase_date' => 'required|date_format:"Y-m-d"',
			'mileage' => 'required|numeric|min:0'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {

			return Redirect::to('/shoe/create')
				->with('flash_message', 'Shoe update failed; please fix the errors listed below.')
				->withInput()
				->withErrors($validator);
		}

		try {
			$shoe = Shoe::findOrFail($id);
		}
		catch(Exception $e) {
			return Redirect::to('/shoe')->with('flash_message', 'Shoe not found');
		}

		$shoe->name = Input::get('name');
		$shoe->purchase_date = Input::get('purchase_date');
		$shoe->mileage = Input::get('mileage');
		$shoe->save();

		return Redirect::action('ShoeController@index')->with('flash_message','Your shoe has been saved.');

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {

		try {
			$shoe = Shoe::findOrFail($id);
		}
		catch(Exception $e) {
			return Redirect::to('/shoe')->with('flash_message', 'Shoe not found');
		}

		# Note there's a `deleting` Model event which makes sure linked run entries are also destroyed
		# See Shoe.php for more details
		Shoe::destroy($id);

		return Redirect::action('ShoeController@index')->with('flash_message','Your shoe has been deleted.');

	}


}