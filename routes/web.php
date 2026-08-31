<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/about',[HomeController::class,'about'])->name('about');
Route::get('/information',[HomeController::class,'information'])->name('information');
Route::get('/departments',[HomeController::class,'departments'])->name('departments');
Route::get('/doctors',[HomeController::class,'doctors'])->name('doctors');
Route::get('/packages',[HomeController::class,'packages'])->name('packages');
Route::get('/teams',[HomeController::class,'teams'])->name('teams');
Route::get('/get-available-dates', [AppointmentController::class, 'getAvailableDates'])->name('get.available.dates');
Route::get('/get-doctors', [AppointmentController::class, 'getDoctors']);




Route::get('/admin', function () {
    return view('welcome');
});

Route::get('/appointment/create', [AppointmentController::class, 'create'])->name('appointment.create');
Route::post('/appointment',[AppointmentController::class,'store'])->name('appointment.store');

Route::get('/contact/create', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact',[ContactController::class,'store'])->name('contact.store');

Route::get('/doctors/{department}', [DoctorController::class, 'getDoctorsByDepartment']);
Route::get('/departments/{department}/doctors', [DepartmentController::class, 'showDoctors'])->name('department.doctors');

Route::get('/dashboard',[DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/appointment', [AppointmentController::class, 'index'])->name('appointment.index');
    Route::post('/appointment/{id}/archive', 'App\Http\Controllers\AppointmentController@archive');

    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/contact/{id}/archive', 'App\Http\Controllers\ContactController@archive');

    Route::get('/department', [DepartmentController::class, 'index'])->name('department.index');
    Route::get('/department/create', [DepartmentController::class, 'create'])->name('department.create');
    Route::post('/department', [DepartmentController::class, 'store'])->name('department.store');
    Route::get('/department/{department}/edit', [DepartmentController::class, 'edit'])->name('department.edit');
    Route::put('/department/{department}/update', [DepartmentController::class, 'update'])->name('department.update');
    Route::delete('/department/{department}/delete', [DepartmentController::class, 'delete'])->name('department.delete');

    Route::get('/information', [InformationController::class, 'index'])->name('information.index');
    Route::get('/information/create', [InformationController::class, 'create'])->name('information.create');
    Route::post('/information', [InformationController::class, 'store'])->name('information.store');
    Route::get('/information/{information}/edit', [InformationController::class, 'edit'])->name('information.edit');
    Route::put('/information/{information}/update', [InformationController::class, 'update'])->name('information.update');
    Route::delete('/information/{information}/delete', [InformationController::class, 'delete'])->name('information.delete');

    Route::get('/doctor', [DoctorController::class, 'index'])->name('doctor.index');
    Route::get('/doctor/create', [DoctorController::class, 'create'])->name('doctor.create');
    Route::post('/doctor', [DoctorController::class, 'store'])->name('doctor.store');
    Route::get('/doctor/{doctor}/edit', [DoctorController::class, 'edit'])->name('doctor.edit');
    Route::put('/doctor/{doctor}/update', [DoctorController::class, 'update'])->name('doctor.update');
    Route::delete('/doctor/{doctor}/delete', [DoctorController::class, 'delete'])->name('doctor.delete');

    Route::get('/team', [TeamController::class, 'index'])->name('team.index');
    Route::get('/team/create', [TeamController::class, 'create'])->name('team.create');
    Route::post('/team', [TeamController::class, 'store'])->name('team.store');
    Route::get('/team/{team}/edit', [TeamController::class, 'edit'])->name('team.edit');
    Route::put('/team/{team}/update', [TeamController::class, 'update'])->name('team.update');
    Route::delete('/team/{team}/delete', [TeamController::class, 'delete'])->name('team.delete');

    Route::get('/package', [PackageController::class, 'index'])->name('package.index');
    Route::get('/package/create', [PackageController::class, 'create'])->name('package.create');
    Route::post('/package', [PackageController::class, 'store'])->name('package.store');
    Route::get('/package/{package}/edit', [PackageController::class, 'edit'])->name('package.edit');
    Route::put('/package/{package}/update', [PackageController::class, 'update'])->name('package.update');
    Route::delete('/package/{package}/delete', [PackageController::class, 'delete'])->name('package.delete');

    Route::get('/slider', [SliderController::class, 'index'])->name('slider.index');
    Route::get('/slider/create', [SliderController::class, 'create'])->name('slider.create');
    Route::post('/slider', [SliderController::class, 'store'])->name('slider.store');
    Route::get('/slider/{slider}/edit', [SliderController::class, 'edit'])->name('slider.edit');
    Route::put('/slider/{slider}/update', [SliderController::class, 'update'])->name('slider.update');
    Route::delete('/slider/{slider}/delete', [SliderController::class, 'delete'])->name('slider.delete');

    Route::get('/testimonial', [TestimonialController::class, 'index'])->name('testimonial.index');
    Route::get('/testimonial/create', [TestimonialController::class, 'create'])->name('testimonial.create');
    Route::post('/testimonial', [TestimonialController::class, 'store'])->name('testimonial.store');
    Route::get('/testimonial/{testimonial}/edit', [TestimonialController::class, 'edit'])->name('testimonial.edit');
    Route::put('/testimonial/{testimonial}/update', [TestimonialController::class, 'update'])->name('testimonial.update');
    Route::delete('/testimonial/{testimonial}/delete', [TestimonialController::class, 'delete'])->name('testimonial.delete');

    Route::get('/sitesetting', [SiteSettingController::class, 'index'])->name('sitesetting.index');
    Route::get('/sitesetting/create', [SiteSettingController::class, 'create'])->name('sitesetting.create');
    Route::post('/sitesetting', [SiteSettingController::class, 'store'])->name('sitesetting.store');
    Route::get('/sitesetting/{sitesetting}/edit', [SiteSettingController::class, 'edit'])->name('sitesetting.edit');
    Route::put('/sitesetting/{sitesetting}/update', [SiteSettingController::class, 'update'])->name('sitesetting.update');
    Route::delete('/sitesetting/{sitesetting}/delete', [SiteSettingController::class, 'delete'])->name('sitesetting.delete');

    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{user}/update', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{user}/delete', [UserController::class, 'delete'])->name('user.delete');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    

});

require __DIR__.'/auth.php';
