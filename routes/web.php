<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ForumsController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AnnoncesController;
use App\Http\Controllers\GagnantsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\GalleriesController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\FormationInscription;
use App\Http\Controllers\FormationsController;
use App\Http\Controllers\ForumLigneController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\PostulationController;
use App\Http\Controllers\TypeAnnonceController;
use App\Http\Controllers\SousCategoriesController;
use App\Http\Controllers\FormationPartieController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Auth\NewPasswordController;
use Rap2hpoutre\LaravelLogViewer\LogViewerController;
use App\Http\Controllers\EvenementInscriptionController;
use App\Http\Controllers\FormationInscriptionController;

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


Route::get('/', [FrontController::class, 'index'])->name('welcome');

Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
// Route::get('/dashboard',[DashboardController::class,'index'])->middleware(['auth'])->name('dashboard');
Route::middleware(['auth'])->name('admin.')->prefix('admin')->group(function() {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::resource('/roles', RoleController::class);
    Route::resource('/permissions', PermissionController::class);
    Route::resource('/categories', CategoriesController::class);
    Route::resource('/souscategories', SousCategoriesController::class);
    Route::resource('/gagnants', GagnantsController::class);
    Route::resource('/galleries', GalleriesController::class);
    Route::resource('/forums', ForumsController::class);
    // Route::resource('/forumsLignes', ForumLigneController::class);
    Route::resource('/typeAnnonce', TypeAnnonceController::class);
    Route::resource('/annonces', AnnoncesController::class);
    Route::resource('/formations', FormationsController::class);
    Route::resource('/evenements', EvenementController::class);
    Route::resource('/formationpartie', FormationPartieController::class);
    Route::resource('/postulations', PostulationController::class);
    // Route::resource('/inscriptions', EvenementInscriptionController::class);
    // Route::resource('/inscriptionformation', FormationInscriptionController::class);
    Route::get('evenements/inscription/{id}',[EvenementController::class,'inscription'])->name('evenements.inscription');
    Route::post('inscription/store',[EvenementController::class,'storeinscription'])->name('evenements.inscriptionstore');
    Route::post('inscriptionformation/store',[FormationsController::class,'storeinscriptionformation'])->name('formation.inscriptionstoreformation');
    // Route::get('inscriptions',[EvenementInscriptionController::class,'index'])->name('inscriptions.index');
    Route::resource('/inscriptions', EvenementInscriptionController::class);
    Route::resource('/inscriptionformations', FormationInscriptionController::class);
    // Route::resource('/inscriptionsformation', FormationInscriptionController::class);

    // Route::post('/forumsLignes/{forumligne}', [ForumLigneController::class],'store')->name('comments.store');
    // Route::post('/forumsLignes/{comment}', [ForumLigneController::class],'storeCommentReply')->name('comments.storeReply');
    // Route::post('/forumsLignes/{forums}', [ForumLigneController::class,'storecomment'])->name('forumsLignes.store');
    Route::post('/comments/{forums}', [CommentController::class,'store'])->name('comments.store');
    Route::post('/commentReply/{comment}',[CommentController::class,'storeCommentReply'])->name('comments.storeReply');
    Route::put('comment/{comment}', [CommentController::class, 'MarkAsSolution'])->name('comment.solution');

    Route::post('upload',[CommentController::class,'ckeditor'])->name('upload');


    Route::get('changeStatus', [FormationsController::class,'changepublicStatus'])->name('changestatus');
    Route::get('inscription', [FormationsController::class,'inscription'])->name('inscription');
    Route::get('etatinscription', [FormationsController::class,'etatinscription'])->name('etatinscription');
    Route::get('etat', [FormationsController::class,'etat'])->name('etat');

    Route::get('changepublic', [AnnoncesController::class,'changepublic'])->name('changepublic');
    Route::get('changetype', [AnnoncesController::class,'changetype'])->name('changetype');

    Route::get('changepublicforum', [ForumsController::class,'changepublic'])->name('changepublicforum');


    Route::get('eventavecinscription', [EvenementController::class,'avecinscription'])->name('eventavecinscription');
    Route::get('eventaveclimite', [EvenementController::class,'aveclimite'])->name('eventaveclimite');
    Route::get('eventetatinscription', [EvenementController::class,'etatinscription'])->name('eventetatinscription');
    Route::get('eventetat', [EvenementController::class,'etat'])->name('eventetat');
    Route::get('eventpublic', [EvenementController::class,'public'])->name('eventpublic');

    Route::get('/download/{file}', [AnnoncesController::class,'download'])->name('download');
    Route::get('/Download/{file}', [EvenementController::class,'download'])->name('Download');
    Route::get('/Doownload/{file}', [PostulationController::class,'download'])->name('Downloadfile');
    Route::get('/formationdownload/{file}', [FormationPartieController::class,'download'])->name('formationdownload');


    // Route::get('changetype', [AnnoncesController::class,'changetype'])->name('changetype');
    Route::get('changepublic', [AnnoncesController::class,'changepublic'])->name('changepublic');
    Route::get('changetype', [AnnoncesController::class,'changetype'])->name('changetype');

    Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');
    Route::post('/permissions/{permission}/roles', [PermissionController::class, 'assignRole'])->name('permissions.roles');
    Route::delete('/permissions/{permission}/roles/{role}',[PermissionController::class,'removeRole'])->name('permissions.roles.remove');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
    Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');
    Route::post('/users/{user}/permissions', [UserController::class, 'givePermission'])->name('users.permissions');
    Route::delete('/users/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke');
    Route::get('/user-edit/{id}',[UserController::class,'edit'])->name('users.edit');
    Route::put('/update-user/{id}',[UserController::class,'update'])->name('users.update');


});
Route::get('showevent/{id}',[FrontController::class,'showevent']);
Route::get('showformation/{id}',[FrontController::class,'showformation']);
Route::get('showannonce/{id}',[FrontController::class,'showannonce']);
Route::get('showallformation',[FrontController::class,'showallformation'])->name('showallformation');
Route::get('showallevent',[FrontController::class,'showallevent'])->name('showallevent');
Route::get('showallannonce',[FrontController::class,'showallannonce'])->name('showallannonce');
Route::get('showformationpartie/{id}',[FrontController::class,'showformationpartie'])->name('showformationpartie');
// Route::get('showformationpartie/{id}/rang/{rang}',[FrontController::class,'showformationpartie'])->name('showformationpartie');
// Route::get('formation/{formation_id}/formationpartie/{id}/rang/{rang}',[FrontController::class,'showformationpartie'])->name('showformationpartie');
Route::get('showallforum',[FrontController::class,'showallforum'])->name('showallforum');
Route::get('showforum/{id}',[FrontController::class,'showforum'])->name('showforum');
Route::get('contact',[FrontController::class,'contact'])->name('contact');


Route::get('login/google', [App\Http\Controllers\SocialController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [App\Http\Controllers\SocialController::class, 'handleGoogleCallback']);
Route::get('login/facebook', [App\Http\Controllers\SocialController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [App\Http\Controllers\SocialController::class, 'handleFacebookCallback']);
Route::get('login/github', [App\Http\Controllers\SocialController::class, 'redirectToGithub'])->name('login.github');
Route::get('login/github/callback', [App\Http\Controllers\SocialController::class, 'handleGithubCallback']);

Route::post('stripe-payment',[StripeController::class,"makeStripePayment"])->name('formation.payement');




require __DIR__.'/auth.php';
