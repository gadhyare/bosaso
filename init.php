<?php 
session_start();
/*********************************** Core */
require_once ( 'core/Route.php');
require_once ( 'core/phpspreadsheet.php');

$Route = new Route();



 
Route::Route('core/messages' );
Route::Route('core/ability' );

Route::Route('core/app' );
Route::Route('config' );
define("DIR" , __DIR__ . SB );
Route::Route('core/bootstrap');

Route::Route('core/msgs');
Route::Route('core/Controller' );
Route::Route('core/Models' );

Route::Route('core/khas');
Route::Route('core/pdf');


/*********************************** Models */

Route::Route('Models/student');
Route::Route('Models/home');
Route::Route('Models/department');
Route::Route('Models/group');
Route::Route('Models/level');
Route::Route('Models/user');
Route::Route('Models/section');
Route::Route('Models/todolist');
Route::Route('Models/finance');
Route::Route('Models/subject');
Route::Route('Models/exams');
Route::Route('Models/programs');
Route::Route('Models/academics');
Route::Route('Models/faculty');
Route::Route('Models/settings');
Route::Route('Models/edulevel');
Route::Route('Models/usrprofile');
Route::Route('Models/employees');
Route::Route('Models/filemanager');
Route::Route('Models/baninfo');
Route::Route('Models/courses');
Route::Route('Models/coulesson');

/*********************************** Controllers */
 

Route::Route('Controllers/student' );
Route::Route('Controllers/home' );
Route::Route('Controllers/department' );
Route::Route('Controllers/group' );
Route::Route('Controllers/level' );
Route::Route('Controllers/user' );
Route::Route('Controllers/section' );
Route::Route('Controllers/todolist' );
Route::Route('Controllers/finance' );
Route::Route('Controllers/subject' );
Route::Route('Controllers/exams' );
Route::Route('Controllers/programs' );
Route::Route('Controllers/academics' );
Route::Route('Controllers/faculty' );
Route::Route('Controllers/settings' );
Route::Route('Controllers/edulevel' );
Route::Route('Controllers/usrprofile' );
Route::Route('Controllers/employees' );
Route::Route('Controllers/filemanager' );
Route::Route('Controllers/baninfo' );
Route::Route('Controllers/courses');
Route::Route('Controllers/coulesson');