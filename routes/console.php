<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


Artisan::command('generate:roles-and-permissions', function () {
    
    Artisan::call('permission:create-role admin');

    Artisan::call('permission:create-permission "create exams"');
    Artisan::call('permission:create-permission "edit exams"');
    Artisan::call('permission:create-permission "delete exams"');
    Artisan::call('permission:create-permission "view exams"');
    Artisan::call('permission:create-permission "create subjects"');
    Artisan::call('permission:create-permission "edit subjects"');
    Artisan::call('permission:create-permission "delete subjects"');
    Artisan::call('permission:create-permission "view subjects"');
    Artisan::call('permission:create-permission "create levels"');
    Artisan::call('permission:create-permission "edit levels"');
    Artisan::call('permission:create-permission "delete levels"');
    Artisan::call('permission:create-permission "view levels"');
    Artisan::call('permission:create-permission "create quizs"');
    Artisan::call('permission:create-permission "edit quizs"');
    Artisan::call('permission:create-permission "delete quizs"');
    Artisan::call('permission:create-permission "view quizs"');

    Artisan::call('permission:create-role instructor');

    Artisan::call('permission:create-permission "create exams"');
    Artisan::call('permission:create-permission "edit exams"');
    Artisan::call('permission:create-permission "delete exams"');
    Artisan::call('permission:create-permission "view exams"');
    Artisan::call('permission:create-permission "view subjects"');
    Artisan::call('permission:create-permission "view levels"');
    Artisan::call('permission:create-permission "create quizs"');
    Artisan::call('permission:create-permission "edit quizs"');
    Artisan::call('permission:create-permission "delete quizs"');
    Artisan::call('permission:create-permission "view quizs"');

    Artisan::call('permission:create-role student');
    Artisan::call('permission:create-permission "view exams"');
    Artisan::call('permission:create-permission "view subjects"');
    Artisan::call('permission:create-permission "view levels"');
    Artisan::call('permission:create-permission "view quizs"');


})->describe('Generating roles and permissions');