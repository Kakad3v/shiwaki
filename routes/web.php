<?php

use App\Article;
use App\Poem;
use App\Review;
use App\Story;
use Illuminate\Support\Facades\Route;
// use RealRashid\SweetAlert\Facades\Alert;

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

    return view('welcome', [
        'articles' => Article::where('status', 1)->latest()->get()->take(6),
        'slider_poems' => Poem::where('status', 1)->get(),
        'stories' => Story::where('status', 1)->get()->take(3),
        'reviews' => Review::latest()->get()->take(3)
    ]);
});


/**
 * Contact us 
 
 **/
Route::post('/contact', 'ContactController@store')->middleware('auth')->name('contact');
/**
 * Articles route group 
 * 
 * */
Route::group(['prefix' => 'translated-works/', 'namespace' => 'TranslatedWorks'], function () {

    Route::get('', 'TranslatedWorksController@index')->name('tx-works-index');
    Route::post('', 'TranslatedWorksController@store')->name('store-tx-work');
    Route::get('create', 'TranslatedWorksController@create')->name('new-tx-work')->middleware('auth');
    Route::get('{tx-work}', 'TranslatedWorksController@show')->name('show-tx-work');
});

Route::group(['prefix' => 'habari/', 'namespace' => 'Articles'], function () {

    Route::get('', 'ArticlesController@index')->name('articles');
    Route::get('create', 'ArticlesController@create')->name('new-article')->middleware('auth');
    Route::get('{article:slug}/edit', 'ArticlesController@edit')->name('edit-article')->middleware('auth');
    Route::patch('{article:slug}/edit', 'ArticlesController@update')->name('edit-article')->middleware('auth');
    Route::delete('{article:slug}', 'ArticlesController@destroy')->name('delete-article')->middleware('auth');
    Route::get('{article:slug}', 'ArticlesController@show')->name('show-article');
    Route::post('', 'ArticlesController@store')->name('store-article');
    Route::post('{article:slug}/comments', 'ArticleCommentsController@store')->name('post-article-comment')->middleware('auth');
});

Route::group(['prefix' => 'makala/', 'namespace' => 'Reviews'], function () {

    Route::get('', 'ReviewsController@index')->name('reviews');
    Route::get('create', 'ReviewsController@create')->name('new-review')->middleware('auth');
    Route::post('', 'ReviewsController@store')->name('store-review');
    Route::patch('{review:slug}', 'ReviewsController@update')->name('update-review');
    Route::delete('{review:slug}', 'ReviewsController@destroy')->name('delete-review');
    Route::get('{review:slug}', 'ReviewsController@show')->name('show-review');
    Route::get('{review:slug}/edit', 'ReviewsController@edit')->name('edit-review');
    Route::post('{review:slug}/comments', 'ReviewCommentsController@store')->name('post-review-comment')->middleware('auth');
});

/**
 * Stories route group 
 * 
 * */
Route::group(['prefix' => 'hadithi/', 'namespace' => 'Stories'], function () {

    Route::get('', 'StoriesController@index')->name('stories');
    Route::get('create', 'StoriesController@create')->name('new-story')->middleware('auth');
    Route::get('{story:slug}', 'StoriesController@show')->name('show-story');
    Route::get('{story:slug}/edit', 'StoriesController@edit')->name('edit-story');
    Route::patch('{story:slug}', 'StoriesController@update')->name('update-story');
    Route::delete('{story:slug}', 'StoriesController@destroy')->name('delete-story');
    Route::post('', 'StoriesController@store')->name('store-story');
    Route::post('{story:slug}/comments', 'StoryCommentsController@store')->name('post-story-comment')->middleware('auth');
});

//Profiles
Route::group(['prefix' => 'members/profiles/', 'namespace' => 'Api\Users'], function () {

    Route::get('{user:username}', 'ProfilesController@show')->name('member-profile')->middleware('auth');
    Route::get('{user:username}/edit', 'ProfilesController@edit')->name('member-profile-edit')->middleware('auth');
    Route::patch('{user:username}', 'ProfilesController@update')->name('save-profile')->middleware('auth');
    Route::get('', 'ProfilesController@index');
});

//quotes
Route::group(['prefix' => 'mashairi/', 'namespace' => 'Poems'], function () {

    Route::get('create', 'PoemsController@create')->name('new-poem')->middleware('auth');
    Route::get('', 'PoemsController@index')->name('poems');
    Route::get('{poem:slug}', 'PoemsController@show')->name('show-poem');
    Route::get('{poem:slug}/edit', 'PoemsController@edit')->name('edit-poem');
    Route::patch('{poem:slug}', 'PoemsController@update')->name('update-poem')->middleware('auth');
    Route::delete('{poem:slug}', 'PoemsController@destroy')->name('delete-poem')->middleware('auth');
    Route::post('', 'PoemsController@store')->name('store-poem')->middleware('auth');
    Route::post('{poem:slug}/comments', 'PoemCommentsController@store')->name('post-poem-comment')->middleware('auth');
});

//Quotes
Route::group(['prefix' => 'nasaha/', 'namespace' => 'Quotes'], function () {

    Route::get('', 'QuotesController@index')->name('quotes');
    Route::get('create', 'QuotesController@create')->name('new-quote')->middleware('auth');
    Route::get('{quote}', 'QuotesController@show')->name('show-quote');
    Route::get('{quote}/edit', 'QuotesController@edit')->name('edit-quote')->middleware('auth');
    Route::patch('{quote}', 'QuotesController@update')->name('update-quote')->middleware('auth');
    Route::delete('{quote}', 'QuotesController@destroy')->name('delete-quote')->middleware('auth');
    Route::post('', 'QuotesController@store')->name('store-quote')->middleware('auth');
});

/**
 * Translate work routes
 */

Route::group(['prefix' => 'ofisini/kazi/tafsiri-kazi', 'namespace' => 'Translations'], function () {

    Route::get('', 'TranslateRequestController@index')->name('translate-index');
    Route::get('/submit-new-material', 'TranslateRequestController@create')->name('submit-work');
    Route::get('{translateRequest:sub_url}', 'TranslateRequestController@show')->name('show-work');

    Route::post('/submit-new-material', 'TranslateRequestController@store')->name('save-work');
    Route::post('{translateRequest:sub_url}/comments', 'TranslateRequestCommentController@store')->name('save-comment');
    Route::post('{translateRequest:sub_url}/invitations', 'TranslateRequestInvitationsController@store')->name('invite-member');
    Route::post('{translateRequest:sub_url}/file', 'TranslateRequestFilesController@update')->name('add-file');
});

Route::get(
    'dashboards/{user:name}',
    'DashboardsController@index'
)->name('dashboard');


Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage_users')->group(function () {
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
    Route::resource('/misc/tags', 'Misc\TagsController');

    Route::resource('/publications/articles', 'PublicationsArticlesController', ['except' => ['create', 'store']]);

    Route::resource('/publications/stories', 'PublicationsStoriesController', ['except' => ['create', 'store']]);

    Route::resource('/publications/poems', 'PublicationsPoemsController', ['except' => ['create', 'store']]);

    Route::resource('/publications/reviews', 'PublicationsReviewsController', ['except' => ['create', 'store']]);
});


Auth::routes();
