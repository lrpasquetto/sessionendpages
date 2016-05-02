# Sessions and Pages
Gestão de sessões (menu) e páginas. Pode-se adicionar até 2 nivies de sessão (sessao - subsessao) e adicionar "N" páginas dentro de qualquer sessão. Facilita a criação de páginas institucionais em um website

Dica: na view sessionPages > fields.blade.php pode-se implementar um editor ckeditor, assim você tem uma pagina institucional dinamica no site do seu cliente.

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

# controller
$sessions   = Session::where('parent_id',0)->get();

# view menu
<!-- SESSÕES E PAGINAS-->
@foreach($sessions as $session)
    <li @if($session->hasChild() || $session->hasPages()) class="dropdown-submenu" @endif>
        <a href="#" @if($session->hasChild()) href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" @endif>
            {{$session->name}}
        </a>
        @if($session->hasChild())
            {!! $session->printChildsFront($session->id) !!}
        @else
            {!! $session->printPagesFront($session->id) !!}
        @endif
    </li>
@endforeach

