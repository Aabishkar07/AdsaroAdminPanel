<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmailController;
use App\Http\Controllers\Admin\MetaPageController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductEnquireController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\UserRoleController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('login', [AuthController::class, "index"])->name('login');
Route::post('login', [AuthController::class, 'store'])->name('store');

Route::middleware(["admin"])->group(
    function () {

        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::resource('partners', PartnerController::class);
        Route::resource('store', StoreController::class);
        Route::resource('product', ProductController::class);
        Route::resource('banner', BannerController::class);
        Route::resource('portfolio', PortfolioController::class);
        Route::resource('productenquire', ProductEnquireController::class);
        Route::resource('clients', App\Http\Controllers\Admin\ClientController::class);
        Route::get('/settings', [ContactController::class, 'setting'])->name('setting');
        Route::post('/settingdetails', [ContactController::class, 'settingdetails'])->name('settingdetails');
        Route::get('contacts', [ContactController::class, 'contact'])->name('contact');
        Route::delete('contactdelete/{contact}', [ContactController::class, 'contactdelete'])->name('contactdelete');
        Route::resource('csvs', EmailController::class);
        Route::get('csvs/getemail/{getemail}', [EmailController::class, "getemail"])->name('getemail');
        Route::post('/createnewsletter', [EmailController::class, "newslettercreate"])->name('newsletter.create');
        Route::post('/newsletteremail', [EmailController::class, 'email'])->name('newsletter.email');
        Route::get('/admin/contacts/export', [ContactController::class, 'export'])->name('admin.contacts.export');
        Route::resource('teams', TeamController::class);
        Route::resource('services', ServiceController::class);
        Route::resource('blogs', BlogController::class);
        Route::resource('page', PageController::class);

        Route::get('/setting', [TagController::class, 'index'])->name('tag.index');
        Route::get('/setting/create', [TagController::class, 'create'])->name('tag.create');
        Route::post('/setting/store', [TagController::class, 'store'])->name('tag.store');
        Route::get('/setting/edit/{tag}', [TagController::class, 'edit'])->name('tag.edit');
        Route::put('/setting/update/{tag}', [TagController::class, 'update'])->name('tag.update');
        Route::delete('/setting/delete/{tag}', [TagController::class, 'destroy'])->name('tag.destroy');

        // Invoice Routes
        Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices.index');
        Route::get('/invoices/create', [InvoiceController::class, 'create'])->name('invoices.create');
        Route::post('/invoices', [InvoiceController::class, 'store'])->name('invoices.store');
        Route::get('/invoices/{invoice}', [InvoiceController::class, 'show'])->name('invoices.show');
        Route::get('/invoices/{invoice}/edit', [InvoiceController::class, 'edit'])->name('invoices.edit');
        Route::put('/invoices/{invoice}', [InvoiceController::class, 'update'])->name('invoices.update');
        Route::delete('/invoices/{invoice}', [InvoiceController::class, 'destroy'])->name('invoices.destroy');
        Route::put('/invoices/{invoice}/status', [InvoiceController::class, 'updateStatus'])->name('invoices.updateStatus');
        Route::get('/invoices/{invoice}/pdf', [InvoiceController::class, 'generatePdf'])->name('invoices.pdf');
        Route::get('/invoices/{invoice}/preview', [InvoiceController::class, 'previewPdf'])->name('invoices.preview');



        Route::resource('metapages', MetaPageController::class);
        Route::resource('testimonials', TestimonialController::class);
        Route::post('/testimonials/update-order', [TestimonialController::class, 'updateOrder'])->name('testimonials.updateOrder');

        // FAQ Routes
        Route::resource('faqs', FaqController::class);
        Route::post('/faqs/update-order', [FaqController::class, 'updateOrder'])->name('faqs.updateOrder');
        Route::put('/faqs/{faq}/toggle-status', [FaqController::class, 'toggleStatus'])->name('faqs.toggleStatus');

        Route::resource('permissions', PermissionController::class);
        Route::resource('usermanagement', UserManagementController::class);
        Route::get('/usermanagement/{usermanagement}/change-password', [UserManagementController::class, 'changePassword'])->name('usermanagement.changePassword');
        Route::put('/usermanagement/{usermanagement}/update-password', [UserManagementController::class, 'updatePassword'])->name('usermanagement.updatePassword');
        Route::put('/usermanagement/{usermanagement}/update-status', [UserManagementController::class, 'updateStatus'])->name('usermanagement.updateStatus');
        Route::resource('userrole', UserRoleController::class);
    }
);
