<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Models\Course;
use App\Models\Message;
use App\Models\Adventure;

use App\Http\Controllers\MessageController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/chat/{id}', function($id){
    
    $course = Course::where('adventure_id', $id)->get();
    $adventure = Adventure::find($id);

    return view('chat', ['aventura'=>$id, 'dados'=>$adventure, 'course'=>$course]);
})->middleware('auth');

Route::get('/new/{id}', function($id){

    $adventure = Adventure::find($id);
    
    $course = new Course;
    $course->user_id = Auth::user()->id;
    $course->adventure_id = $id;
    $course->path = '[["'.$adventure->start.'"]]';
    $course->save();

    return Redirect::to('/chat/'.$course->id);
})->middleware('auth');

Route::get('/adventures', function(){

    $adventures = Adventure::all();
    $courses = Course::where('user_id', Auth::user()->id)->get();

    $result = array();

    foreach ($adventures as $adventure) {
        $add = true;
        foreach ($courses as $course) {
            if($adventure->id == $course->adventure_id){
                $add = false;
            }
        }
        if($add){
            array_push($result, $adventure);
        }
    }

    return view('adventures', ['adventures'=>$result]);
})->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/create', function(){
    return view('create.name', []);
})->middleware('auth');

Route::resource('messages', MessageController::class);

// Rotas para o Javascript

Route::get('/message/{id}', function($id){
    $message = Message::find($id);

    return json_encode($message);
});

Route::get('/message/add/{course_id}/{id}', function($course_id, $id){

    $course = Course::find($course_id);
    $history = json_decode(json_decode($course, true)['path'], true);
    array_push($history, array($id));
    $course->path = $history;
    $course->save();

    return 200;
});

Route::get('/response/{course_id}/{id}', function($course_id, $id){

    $course = Course::find($course_id);
    $history = json_decode(json_decode($course, true)['path'], true);
    $return = array_pop($history);
    array_push($history, array($return[0], $id));
    $course->path = $history;
    $course->save();

    return 200;
});
