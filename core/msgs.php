<?php

$bop = new bootstrap;
define('DB_ERR', '<div class="p-2 mt-2 bg-info text-white text-center">'. $bop->Blang("sorry, there was a problem with the database").' </div>');
define('ERR_WARNING', '<div class="p-2 mt-2 bg-danger text-white text-center">'. $bop->Blang("sorry, the operation did not complete due to bug No").' </div>');
define('ERR_EMPTY', '<div class="p-2 mt-2 bg-warning text-dark text-center">'. $bop->Blang("make sure you fill out all required fields").' </div>');
define('NOT_UPDATED', '<div class="p-2 mt-2 bg-warning text-dark text-center">'. $bop->Blang("update failed").' </div>');
define('SUCCESS', '<div class="p-2 mt-2 success-color-dark text-white text-center">'. $bop->Blang("operation completed successfully").' </div>');
define('ERR_NUMBER', '<div class="p-2 mt-2 bg-warning text-center">'. $bop->Blang("no numbers allowed").' </div>');
define('ERR_TEXT', '<div class="p-2 mt-2 bg-warning text-center">'. $bop->Blang("no characters allowed").' </div>');
define('ERR_CONFIRM', '<div class="p-2 mt-2 bg-warning text-center">'. $bop->Blang("please confirm password").' </div>');
define('ERR_LOGIN', '<div class="p-2 mt-2 bg-danger text-white text-center">'. $bop->Blang("username or password wrong").' </div>');
define('SUCCESS_LOGIN', '<div class="p-2 mt-2 success-color-dark text-center text-white">'. $bop->Blang("welcome back, you are now on the home page").' </div>');
define('ERR_STRLEN', '<div class="p-2 mt-2 bg-danger text-center">'. $bop->Blang("the password must be more than 6 words").' </div>');

define('FILE_TYPE_ERR', '<div class="p-2 mt-2 bg-danger text-white text-center">'. $bop->Blang("sorry but the selected file is not allowed").' </div>');
define('FILE_SIZE_ERR', '<div class="p-2 mt-2 bg-danger text-white text-center">'. $bop->Blang("sorry but the image is too big").' </div>');
define('File_Not_Founded', '<div class="p-2 mt-2 alert alert-danger text-center">'. $bop->Blang("sorry, but the file does not exist").' </div>');
define('Data_Not_Founded', '<div class="p-2 mt-2 alert alert-danger text-center">'. $bop->Blang("sorry but no data to display").' </div>');
define('SELECT_ID', '<div class="p-2 mt-2 alert alert-danger text-center">'. $bop->Blang("choose the record number to work on").' </div>');
define('SMALL_FILE_SIZE', '<div class="p-2 mt-2 alert alert-danger text-center">'. $bop->Blang("sorry but the file size is too small").' </div>');
define('FILE_NOT_UPLOADED_CORRCET', '<div class="p-2 mt-2 alert alert-danger text-center">'. $bop->Blang("sorry, but we could not upload the specified file").' </div>');
define('SUCCESS_EXPORT_DATABASE', '<div class="p-2 mt-2 success-color-dark text-white text-center">'. $bop->Blang("done  added file to list load rule files").' </div>');
define('NOT_CHOSIN_FILE_TO_UPLOAD', '<div class="p-2 mt-2 alert alert-danger text-center">'. $bop->Blang("sorry, but you did not choose a file to upload").' </div>');
define('ERR_UPLOADS', '<div class="p-2 mt-2 alert alert-danger text-center">'. $bop->Blang("unable to upload file").' </div>');

define('NO_ALLOW_UNDER_ZERO', '<div class="p-2 mt-2 alert alert-danger text-center">'. $bop->Blang("sorry, but numbers less than zero are not allowed").' </div>');
define('MUST_INSERT_UP_OF_ZERO', '<div class="p-2 mt-2 alert alert-danger text-center w-75 m-auto">'. $bop->Blang("sorry, you have to enter numbers greater than zero").' </div>');

define('NOT_EMAIL', '<div class="p-2 mt-2 alert alert-danger text-center">'. $bop->Blang("please make sure the email is correct").' </div>');
define('EMAIL_NOT_SEND', '<div class="p-2 mt-2 alert alert-danger text-center">'. $bop->Blang("message was not sent successfully").' </div>');
define('EXPIRE_REST_LINK', '<div class="p-2 mt-2 alert alert-danger text-center">'. $bop->Blang("sorry, the password reset link has expired").' </div>');
define('PASS_WORD_RESET_SUCCESSFULLY', '<div class="p-2 mt-2 alert alert-success text-center">'. $bop->Blang("password returned successfully \r\n Please check your email").' </div>');
define('ERR_DELETE_LINKED_RECORDS', '<div class="p-2 mt-2 alert alert-danger text-center">'. $bop->Blang("sorry, but the specified record is linked to other records").' </div>');
define('BACKUP_IS_ACTIVE', '<div class="p-2 mt-2 alert alert-danger text-center"><a href="' .ROOT_URL .'/settings?bakupexit=yes" class="text-dark" >'. $bop->Blang("to exit the backup, click here").' </div>');
define('SUCCESS_UPGRADE', '<div class="p-2 mt-2 alert alert-success text-center">'. $bop->Blang("upgraded successfully, now enjoy the updated version").' </div>');
define('ERR_UPGRADE', '<div class="p-2 mt-2 alert alert-danger text-center">'. $bop->Blang("upgrade not done, try again").' </div>');
define('ERR_CSRF', '<div class="p-2 mt-2 warning-color-dark text-white text-center">'. $bop->Blang("problem with CSRF code").' </div>');
define('ERR_DATA_IS_IN', '<div class="p-2 mt-2 warning-color-dark text-white text-center">'. $bop->Blang("sorry, but the entered data already exists").' </div>');
define('SUCCESS_SEND_EMAIL', '<div class="p-2 mt-2 alert alert-success text-center">'. $bop->Blang("email not sent").'</div>');
define('You_have_the_latest_update', '<div class="p-2 mt-2 alert alert-success text-center">'. $bop->Blang("you have the latest update").' </div>');
define('There_is_a_new_update', 'There is a new update');
define('Cant_check_if_there_is_a_new_update', '<div class="p-2 mt-2 alert alert-success text-center">'. $bop->Blang("make sure there is a new update").' </div>');