<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Admin\AdminController as AdminController;
use App\Http\Controllers\Admin\TagController as AdminTagController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\PostController;
use App\Http\Controllers\User\TagController;


Route::get('/', function () {
    return view('auth.login');
});

// routes that call Auth functions that exist in Auth Controllers
Auth::routes();




Route::middleware(['middleware'=>'auth'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::group([ 'prefix' => 'admin', 'middleware'=>'is_admin'], function(){


        // routes for fun in Admin\TagController
        Route::get('tag/index',[AdminTagController::class, 'index'])->name('admin.tag.index');
        Route::get('tag/create',[AdminTagController::class, 'create'])->name('admin.tag.create');
        Route::post('tag/store',[AdminTagController::class, 'store'])->name('admin.tag.store');
        Route::get('tag/edit/{id}',[AdminTagController::class, 'edit'])->name('admin.tag.edit');
        Route::put('tag/update/{id}',[AdminTagController::class, 'update'])->name('admin.tag.update');
        Route::get('tag/destroy/{id}',[AdminTagController::class, 'destroy'])->name('admin.tag.destroy');

        // routes for fun in Admin\AdminController
        Route::get('/index', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/account/create', [AdminController::class, 'create'])->name('admin.create.account');
        Route::post('/account/stroe', [AdminController::class, 'register'])->name('admin.store.account');
        Route::get('/account/edit', [AdminController::class, 'edit'])->name('admin.edit.account');
        Route::put('/account/update', [AdminController::class, 'update'])->name('admin.update.account');

        // routes for fun in Admin\PostController
        Route::get('post/index',[AdminPostController::class, 'index'])->name('admin.post.index');
        Route::get('post/show/{slug}',[AdminPostController::class, 'show'])->name('admin.post.show');
        Route::get('post/delete/{id}',[AdminPostController::class, 'delete'])->name('admin.post.delete');
        Route::get('post/trash',[AdminPostController::class, 'trash'])->name('admin.post.trash');
        Route::get('user/trash/{id}',[AdminPostController::class, 'userTrash'])->name('admin.user.trash');
        Route::get('post/tags/{id}',[AdminPostController::class, 'tag_posts'])->name('admin.post.tags');


        // routes for fun in Admin\UserController
        Route::get('/users/index', [AdminUserController::class, 'index'])->name('admin.users.index');
        Route::get('/show/user/{id}', [AdminUserController::class, 'show'])->name('admin.show.user');

    });


    Route::group(['prefix' => 'user', 'middleware'=>'is_user'], function(){


        // routes for fun in User\ProfileController
        Route::get('/myProfile/show', [ProfileController::class, 'showMyProfile'])->name('user.myProfile.show');
        Route::get('/myProfile/edit', [ProfileController::class, 'edit'])->name('user.myProfile.edit');
        Route::put('/myProfile/update', [ProfileController::class, 'update'])->name('user.myProfile.update');
        Route::get('/profile/show/{id}', [ProfileController::class, 'showProfile'])->name('user.profile.show');

        // routes for fun in User\PostController
        Route::get('post/index',[PostController::class, 'index'])->name('user.post.index');
        Route::get('post/create',[PostController::class, 'create'])->name('user.post.create');
        Route::post('post/store',[PostController::class, 'store'])->name('user.post.store');
        Route::get('post/show/{slug}',[PostController::class, 'show'])->name('user.post.show');
        Route::get('post/edit/{id}',[PostController::class, 'edit'])->name('user.post.edit');
        Route::put('post/update/{id}',[PostController::class, 'update'])->name('user.post.update');
        Route::get('post/soft/delete/{id}',[PostController::class, 'softdelete'])->name('user.post.soft.delete');
        Route::get('trashed/posts',[PostController::class, 'trash_index'])->name('user.trashed.posts');
        Route::get('post/restore/{id}', [PostController::class, 'restore'])->name('user.post.restore');
        Route::delete('post/delete/trash/{id}',[PostController::class, 'delete_trash'])->name('user.delete.trash');


        // routes for fun in User\TagController
        Route::get('tag/index',[TagController::class, 'index'])->name('user.tag.index');
        Route::get('tag/posts/{id}',[TagController::class, 'tag_posts'])->name('user.tag.posts');


    });

});







