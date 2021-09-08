<?php

namespace App\Http\Controllers\Traits;

trait RolesAndPermissionTrait {

    private $adminPermissions = [
        'create exams', 
        'edit exams', 
        'delete exams', 
        'view exams', 
        'create subjects', 
        'edit subjects', 
        'delete subjects', 
        'view subjects',
        'create levels', 
        'edit levels', 
        'delete levels', 
        'view levels',
        'create quizs', 
        'edit quizs', 
        'delete quizs', 
        'view quizs',
    ];
    private $instructorPermissions = [
        'create exams', 
        'edit exams', 
        'delete exams', 
        'view exams',  
        'view subjects', 
        'view levels',
        'create quizs', 
        'edit quizs', 
        'delete quizs', 
        'view quizs',
    ];
    private $studentPermissions = [
        'view exams',  
        'view subjects', 
        'view levels',
        'view quizs',
    ];

    public function assignRolesAndPermissions($user,$role) {
        switch ($role) {
            case "admin":
                $user->assignRole($role);
                $user->givePermissionTo($this->adminPermissions);
              break;
            case "instructor":
                $user->assignRole($role);
                $user->givePermissionTo($this->instructorPermissions);
              break;
            case "student":
                $user->assignRole($role);
                $user->givePermissionTo($this->studentPermissions);
              break;
            default:
              return ["message" => "invalid role"];
          }
    }
}