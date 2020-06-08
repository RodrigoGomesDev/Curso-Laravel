<?php



// Route::get('/', function () {
    //     return view('welcome');
    // });
    
    //Código mais remasterizado possível, para chamar uma view (front-end)
    //View é praticamente para chamar um arquivo dentro da pastas views
    
    // Route::view('/view', 'welcome', ['id' => 'teste']);
    
    // Route::resource('register', 'RegisterController');
    
    //=======================================================//
    
    Route::any('products/search', 'ProductController@search')->name('products.search');//->middleware('auth');
    
    //Usando um simples código para chamar o controller, para toda uma url específica
    
    Route::resource('products', 'ProductController');//->middleware('auth', 'check.is.admin');
    
    //=======================================================//
    

    Route::get('/login', function () {
        return 'Login';
    })->name('login');


//--Fazendo o CRUD, por rotas e pelo controller--//

// Route::resource('products', 'ProductController');

// Route::delete('products/{id}', 'ProductController@delete')->name('products.delete');
// Route::put('products/{id}', 'ProductController@update')->name('products.update');
// Route::get('products/create', 'ProductController@create')->name('products.create');
// Route::get('products/{id}/edit', 'ProductController@edit')->name('products.edit');
// Route::get('products/{id}', 'ProductController@show')->name('products.show');
// Route::get('products', 'ProductController@index')->name('products.index');
// Route::post('products', 'ProductController@store')->name('products.store');

//=======================================================//


//--Mostrando como pode-se fazer o agrupamento de rotas--//

// Route::middleware([])->group(function() {
//     Route::prefix('admin')->group(function(){
//         Route::namespace('Admin')->group(function (){
//             Route::name('admin.')->group(function (){
//                 Route::get('/dashboard','TesteController@teste')->name('dashboard');
//                 Route::get('/home','TesteController@teste')->name('home');
//             });
//         });
//     });
// });

//=======================================================//


// Route::post('/register', function() {
//     return '';
// });

Route::get('/', function () {
    return view('welcome');
});

//--Mostrando uma coisa na url, dentro da página sem usar o controller--//

//Route::get('/categoria/{id}', function ($id) {
    // return "ID da categoria: {$id}";
// })

//=======================================================//



//--Usando a rota do tipo match, para colocar na página, métodos específicos--//

//Route::match(['post', 'get'], '/match', function() {
    // return 'match';
// });

//=======================================================//


//--Fazendo o redirecionamento de página, utilizando uma url

// Route::get('redirect', function() {
//     return redirect()->route('url.name');
// });

// Route::get('/nome-url', function() {
//     return 'Teste redirect';
// })->name('url.name')

//=======================================================//

Auth::routes(['register' => false]);

// Route::get('/home', 'HomeController@index')->name('home');
?>