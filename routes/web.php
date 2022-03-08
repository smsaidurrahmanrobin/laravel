<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Post;

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

Route::get('/', function () {
    return view('welcome');

});

//Route::resource('/post',PostController::class );
//
//Route::get('/contact',PostController::class . '@contact');
//
//Route::get('posts/{id}/{name}',PostController::class . '@show_post');


//Route::get('/about', function () {
//    return 'Hi about page';
//
//});
//
//Route::get('/contact', function () {
//    return view('contact page');
//
//});
//
//Route::get('/post/{id}/{name}', function ($id, $name){
//
//    return "This is post no:" .$id."  ". $name;
//
//
//});
//
//Route::get('admin/posts/',array('as'=>'admin.home' ,function (){
//
//$url = route('admin.home');
//return "this url is: " . $url;
//}));
//
//
//
//Route::group(['middleware' => ['web']], function () {
//
//
//
//});


//Creating Data Queries

Route::get('/insert', function (){

    DB::insert('insert into posts(title, body) values(?,?)', ['laravel', 'adakjd asdk dasdk as dag that has happened to PHP']);

    return "Data INSERTED";

});

//End Creating Data Queries

//Reading Data Queries

//Route::get('/read', function (){
//
//   $result = DB::select('select * from posts where id = ? ', [1]);
//
//   foreach($result as $post){
//
////       return $post->title;
//
////       return var_dump($result);
//
//   }
//
//});

//END Reading Data Queries


//Updating Data Queries

//Route::get('/update', function (){
//
//   $updated = DB::update ('update posts set title = "UPDATE TITLE" where id = ? ', [1]);
//
//   return $updated;
//
//});

//END Updating Data Queries


//Deleting Data Queries

//Route::get('/delete', function (){
//
//    $deleted = DB::delete('delete from posts where id = ?', [2]);
//
//    if($deleted = 0){ return "record updated";}else{ return"record was not updated";}
//
//});

//End of Deleting Data Queries


//--------------------------------------------
//Reading Data from Database using ELOQUENT MODEL without SQL QUERIES
//--------------------------------------------

//Route::get('/read', function (){
//
//    $posts = Post::all();
//
//    foreach ($posts as $post){
//
//        return $post->title;
//    }
//
//});

//Route::get('/find', function (){
//
//    $posts = Post::find(3);
//
//    return $posts->title;
//
//});

//Route::get('/findwhere', function (){
//
//    $posts = Post::where('id', 4)->orderBy('id','desc')->take(1)->get();
//
//    return $posts;
//
//});

//Route::get('/findmore', function (){
//
////    $posts = Post::findOrfail(3);
////
////    return $posts;
//
//    $posts  = Post::where('users_count', '<', 20)->firstOrfail();
//    return $posts;
//});

//-----
//bASIC iNSERT
//-----


Route::get('/basicinsert', function (){

    $post = new Post;

    $post->title = 'INSERTING Eloquent Title SAve';
    $post->body = '(INSERTING)Look at this content, this is really good. New Eloquent Body Insert.';

    $post->save();
    return "Eloqunet method insertion successfull";
});

//-----
//bASIC UPDATE
//---
Route::get('/basicUPDATE', function (){

    $post = Post::FIND(7);

    $post->title = 'UPDATING Eloquent Title SAve';
    $post->body = '(UPDATED)Look at this content, this is really good. New Eloquent Body Insert.';

    $post->save();
    return "Eloqunet method UPDATE successfull";
});
////--------------------------------------------
//END
////--------------------------------------------


////--------------------------------------------
//Creating/Hadnling Mass Data and configuring Mass Data
////--

Route::get('/create', function (){

  Post::create(['title'=>'The create method', 'body'=>'Wow i\'m learnig a lot']);

  return "SAVED";


});


//----------UPDATING---------
Route::get('/update', function (){

    Post::where('id', 8)->update(['title'=>'(UPDATED)The create method', 'body'=>'(UPDATED)Wow i\'m learnig a lot']);

    return "UPDATED";


});

//---------DELETING----------

//Route::get('/delete', function (){
//
//    $post = Post::find(2);
//
//    $post->delete();
//
//    return "UPDATED";
//
//
//});

//---------DELETING/DESTROYING MULTIPLE ID'S IN A SINGLE COMMAND----------

Route::get('/delete', function (){

   Post::destroy(12,13);



    return "DESTROYED";


});


//---------SOFT DELETING/PUTTING TO TRASH ----------

Route::get('/softdelete', function (){

    Post::find(11)->delete();


});

////---------READ SOFT DELETED ITEMS ----------
//
//Route::get('/readsoftdelete', function (){
//
////    $post = Post::find(11);
////    return $post;
//
////    $post = Post::withTrashed()->find(11);
////    return $post;
//
//    //------Reading all the ONLY TRASHED items at once
//
//    $post = Post::onlyTrashed()->get();
//    return $post;
//
//
//});


////---------RESTORING SOFT DELETED ITEMS ----------
//
//Route::get('/restore', function (){
//
//
//
//    $post = Post::onlyTrashed()->restore();
//    return 'Restored';
//
//
//});


//---------PERMANENTLY DELETING SOFT DELETED ITEMS ----------

Route::get('/forcedeletealltrashed', function (){



    $post = Post::onlyTrashed()->forceDelete();
    return 'Permanently Deleted';


});

Route::get('/forcedeleteindividual', function (){



    $post = Post::onlyTrashed()->find(12)->forceDelete();
    return 'Permanently Deleted';


});


////--------------------------------------------
//END
////--------------------------------------------

