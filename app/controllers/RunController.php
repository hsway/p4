<?php

class RunController extends BaseController {


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

		$runs = User::find(Auth::user()->id)->runs->sortByDesc('date');
		return View::make('run_index')->with('runs',$runs);

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {

		$shoes = User::find(Auth::user()->id)->shoes->sortByDesc('updated_at');
		return View::make('run_create')->with('shoes',$shoes);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {

		$rules = array(
			'date' => 'required|date_format:"Y-m-d"',
			'mileage' => 'required|numeric|min:0',
			'shoe_id' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {

			return Redirect::to('/run/create')
				->with('flash_message', 'Run creation failed; please fix the errors listed below.')
				->withInput()
				->withErrors($validator);
		}

		$run = new Run;
		$run->date = Input::get('date');
		$run->mileage = Input::get('mileage');
		$run->notes = Input::get('notes');
		$run->shoe_id = Input::get('shoe_id');
		$run->user_id = Auth::user()->id;

		try {
			$run->save();
		}
		catch (Exception $e) {
			return Redirect::to('/run/create')
				->with('flash_message', 'Run creation failed; please try again.')
				->withInput();
		}

		// update the mileage of the associated Shoe
        $shoe = Shoe::find($run->shoe_id);
		$shoe->mileage += $run->mileage;
		$shoe->save();

		return Redirect::action('RunController@index')->with('flash_message', 'Run added');

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {

		try {
			$run = Run::findOrFail($id);
		}
		catch(Exception $e) {
			return Redirect::to('/run')->with('flash_message', 'Run not found');
		}

		return View::make('run_show')->with('run', $run);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {

		try {
			$run = Run::findOrFail($id);
		}
		catch(Exception $e) {
			return Redirect::to('/run')->with('flash_message', 'Run not found');
		}

		$shoes = User::find(Auth::user()->id)->shoes->sortByDesc('updated_at');

		# Pass with the $run object so we can do model binding on the form
		# Pass $shoes to populate the shoe selection dropdown
		return View::make('run_edit')->with(array('run'   => $run,
												  'shoes' => $shoes
		));

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {

		$rules = array(
			'date' => 'required|date_format:"Y-m-d"',
			'mileage' => 'required|numeric|min:0',
			'shoe_id' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {

			return Redirect::to('/run/create')
				->with('flash_message', 'Run update failed; please fix the errors listed below.')
				->withInput()
				->withErrors($validator);
		}

		try {
			$run = Run::findOrFail($id);
		}
		catch(Exception $e) {
			return Redirect::to('/run')->with('flash_message', 'Run not found');
		}

		$oldShoe = Shoe::find($run->shoe_id);
		$newShoe = Shoe::find(Input::get('shoe_id'));

		$oldMileage = $run->mileage;
		$newMileage = Input::get('mileage');

		// Shoe associated with this run has not changed
		if ($oldShoe == $newShoe) {

			// get the difference between the original and updated run mileages
			$difference = $newMileage - $oldMileage;

			// update the mileage of the associated Shoe
			// could update $oldShoe instead (they're the same)
			$newShoe->mileage += $difference;
			$newShoe->save();

		// Shoe associated with this Run has changed
		} else {

			$oldShoe->mileage -= $oldMileage;
			$oldShoe->save();

			$newShoe->mileage += $newMileage;
			$newShoe->save();

		}

		// save the updated Run
		$run->date = Input::get('date');
		$run->mileage = $newMileage;
		$run->notes = Input::get('notes');
		$run->shoe_id = Input::get('shoe_id');
		$run->save();

		return Redirect::action('RunController@index')->with('flash_message','Your run has been saved and shoe mileage updated.');

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {

		try {
			$run = Run::findOrFail($id);
		}
		catch(Exception $e) {
			return Redirect::to('/run')->with('flash_message', 'Run not found');
		}

		# Note there's a `deleting` Model event which makes sure the linked Shoe's mileage is updated
		# See Run.php for more details
		Run::destroy($id);

		return Redirect::action('RunController@index')->with('flash_message','Your run has been deleted.');

	}


}