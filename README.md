# Sessions and Pages

# composer.json
composer require lrpasquetto/sessionsandpages

OU

"lrpasquetto/sessionsandpages": "^1.0"

php artisan vendor:publish

# config/app
providers: <br>
Collective\Html\HtmlServiceProvider::class,<br>
'lrpasquetto\SessionsAndPages\SessionsAndPagesServiceProvider',

aliases:
'Form'      => Collective\Html\FormFacade::class,
'Html'      => Collective\Html\HtmlFacade::class,

# migrate
php artisan migrate

#Routes
Route::resource('sessions', 'SessionController');
Route::get('sessions/{id}/delete', [
    'as' => 'sessions.delete',
    'uses' => 'SessionController@destroy',
]);

Route::resource('sessionPages', 'SessionPageController');
Route::get('session/{session_id}/pages', [
    'as' => 'sessions.pages.index',
    'uses' => 'SessionPageController@index',
]);
Route::get('session/{session_id}/pages/new', [
    'as' => 'sessions.pages.create',
    'uses' => 'SessionPageController@create',
]);
Route::get('session/{session_id}/pages/{id}/edit', [
    'as' => 'sessions.pages.edit',
    'uses' => 'SessionPageController@edit',
]);


Route::get('sessionPages/{id}/delete', [
    'as' => 'sessionPages.delete',
    'uses' => 'SessionPageController@destroy',
]);

