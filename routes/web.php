<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicantsController;
use App\Http\Controllers\ContactInformationController;
use App\Http\Controllers\QualificationInformationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ApplicantapplyController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MailGunController;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('applicants', ApplicantsController::class);
Route::resource('contact_information', ContactInformationController::class);
Route::resource('qualification_information', QualificationInformationController::class);
Route::resource('experience_information', ExperienceController::class);
Route::resource('apply', ApplicantapplyController::class);
Route::resource('applicantapply', ApplicantapplyController::class);
Route::resource('admin', AdminController::class);

Route::get('/send-mail-using-mailgun', [MailGunController::class, 'index'])->name('send.mail.using.mailgun.index');

Route::get('/renewalregistrationcertificate',[ApplicantapplyController::class, 'renewalregistrationcertificate']);
Route::get('/newregistrationform1',[ApplicantapplyController::class, 'newregistrationform1']);
Route::get('/newregistrationform2',[ApplicantapplyController::class, 'newregistrationform2']);

