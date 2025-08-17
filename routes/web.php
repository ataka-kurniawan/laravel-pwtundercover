<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DataContributorController;
use App\Http\Controllers\ContributorArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Admin\ContributorArticleController as AdminContributorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\SiteMapController;



use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/sitemap.xml', [SitemapController::class, 'index']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('showLogin');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('kategori', CategoryController::class);
    Route::resource('artikel', ArticleController::class);
    Route::patch('/artikel/{id}/publish', [ArticleController::class, 'publish'])->name('artikel.publish');
    Route::patch('/artikel/{id}/reject', [ArticleController::class, 'reject'])->name('artikel.reject');
    Route::patch('/artikel/{id}/draft', [ArticleController::class, 'draft'])->name('artikel.draft');
    Route::resource('kelola-admin', AdminController::class);
    Route::get('/kontributor-artikel', [AdminContributorController::class, 'index'])->name('admin.kontributor.index');
    Route::post('/kontributor-artikel/{id}/approve', [AdminContributorController::class, 'approve'])->name('admin.kontributor.approve');
    Route::post('/kontributor-artikel/{id}/reject', [AdminContributorController::class, 'reject'])->name('admin.kontributor.reject');
    Route::delete('/kontributor-artikel/{id}', [AdminContributorController::class, 'destroy'])->name('admin.kontributor.destroy');
    Route::get('/preview-kontributor-artikel/{id}',[AdminContributorController::class,'show'])->name('admin.kontributor.show');
    Route::get('/edit-kontributor-artikel/{id}',[AdminContributorController::class,'edit'])->name('admin.kontributor.edit');
    Route::post('/edit-kontributor-artikel/{id}',[AdminContributorController::class,'update'])->name('admin.kontributor.update');
    Route::put('/kontributor/{id}/position', [AdminContributorController::class, 'updatePosition'])
    ->name('admin.kontributor.updatePosition');
    Route::put('/admin/kontributor/{id}/status', [AdminContributorController::class, 'updateStatus'])
    ->name('admin.kontributor.updateStatus');
     Route::get('/data-kontributor', [DataContributorController::class, 'index'])->name('admin.contributors.index');
     Route::post('/artikel/upload-image', [ArticleController::class, 'uploadImage'])->name('artikel.uploadImage');
         Route::resource('ads', AdController::class);
    



});

Route::get('/kirim-artikel', [ContributorArticleController::class, 'index'])->name('contributor.create');
Route::post('/kirim-artikel', [ContributorArticleController::class, 'store'])->name('contributor.store');
Route::get('/tentang-kami',[HomeController::class,'aboutUs'])->name('about-us');
Route::get('/ketentuan-tulisan',[HomeController::class,'ketentuanTulisan'])->name('ketentuan-tulisan');
Route::get('/pasangiklan',[HomeController::class,'pasangIklan'])->name('pasang-iklan');
Route::get('/artikel/{id}', [HomeController::class, 'show'])->name('home.artikel.show');
Route::get('/penulis/{username}', [AuthorController::class, 'show'])->name('penulis.show');
Route::get('/search', [HomeController::class, 'search'])->name('home.search');


