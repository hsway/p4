<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/



/**
 * User
 * (Explicit Routing)
 */

Route::get('/', 'UserController@getIndex');

Route::get('/signup', 'UserController@getSignup');
Route::post('/signup', 'UserController@postSignup');
Route::get('/signup/verify/{confirmationCode}', [
    'as' => 'confirmation_path',
    'uses' => 'UserController@confirm'
]);

Route::get('/login', 'UserController@getLogin');
Route::post('/login', 'UserController@postLogin');
Route::get('/logout', 'UserController@getLogout');

/**
 * Password reminders
 * (Explicit routing)
 */

Route::get('/password/remind', 'RemindersController@getRemind');
Route::post('/password/remind', 'RemindersController@postRemind');

Route::get('/password/reset/{token}', 'RemindersController@getReset');
Route::post('/password/reset', 'RemindersController@postReset');

/**
 * Shoe
 * (Implicit RESTful Routing)
 */
Route::resource('shoe', 'ShoeController');

/**
 * Run
 * (Implicit RESTful Routing)
 */
Route::resource('run', 'RunController');


/* Debugging routes below

Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>environment.php</h1>';
    $path   = base_path().'/environment.php';

    try {
        $contents = 'Contents: '.File::getRequire($path);
        $exists = 'Yes';
    }
    catch (Exception $e) {
        $exists = 'No. Defaulting to `production`';
        $contents = '';
    }

    echo "Checking for: ".$path.'<br>';
    echo 'Exists: '.$exists.'<br>';
    echo $contents;
    echo '<br>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(Config::get('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    print_r(Config::get('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    } 
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});

Route::get('/unpacking-sessions-and-cookies', function() {

    # Log in check
    if(Auth::check())
        echo "You are logged in: ".Auth::user();
    else
        echo "You are not logged in.";
    echo "<br><br>";

    # Cookies
    echo "<h1>Your Raw, encrypted Cookies</h1>";
    echo Paste\Pre::render($_COOKIE,'');

    # Decrypted cookies
    echo "<h1>Your Decrypted Cookies</h1>";
    echo Paste\Pre::render(Cookie::get(),'');
    echo "<br><br>";

    # All Session files
    echo "<h1>All Session Files</h1>";
    $files = File::files(app_path().'/storage/sessions');

    foreach($files as $file) {
        if(strstr($file,Cookie::get('laravel_session'))) {
            echo "<div style='background-color:yellow'><strong>YOUR SESSION FILE:</strong><br>";
        }
        else {
            echo "<div>";
        }
        echo "<strong>".$file."</strong>:<br>".File::get($file)."<br>";
        echo "</div><br>";
    }

    echo "<br><br>";

    # Your Session Data
    $data = Session::all();
    echo "<h1>Your Session Data</h1>";
    echo Paste\Pre::render($data,'Session data');
    echo "<br><br>";

    # Token
    echo "<h1>Your CSRF Token</h1>";
    echo Form::token();
    echo "<script>document.querySelector('[name=_token]').type='text'</script>";
    echo "<br><br>";

});

*/

