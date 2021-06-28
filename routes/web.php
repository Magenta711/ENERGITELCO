<?php

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
// \DB::listen(function ($query)
// {
//     echo "<pre>{$query->time} - {$query->sql}</pre>";
// });

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/',function () {
    return view('welcome');
});

// Route::get('example',function ()
// {
//     return view('example');
// });

//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() { 
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});


Route::post('guest/message','guestController@send')->name('guest_message_send');

Auth::routes(['verify' => true]);

Route::get('home','HomeController@index')->name('home');
Route::get('about','HomeController@about')->name('about');
Route::post('suggestions_mailbox','HomeController@suggestions_mailbox')->name('suggestions_mailbox_save');
Route::get('letters/working','HomeController@working_letter')->name('working_letter');

Route::post('suggestions_mailbox','HomeController@bonus_24_7')->name('bonus_24-7');

//profile
Route::get('profile','profileController@index')->name('profile');
Route::get('profile/setting/edit','profileController@edit')->name('profile_edit');
Route::put('profile/settings','profileController@update')->name('profile_update');
Route::post('profile/all_week','profileController@all_week')->name('all_week');

//password
Route::get('password/edit','profileController@password_edit')->name('password_edit');
Route::put('password','profileController@password_update')->name('password_update');

// Carnet
Route::get('carnet','profileController@carnet')->name('carnet');

// terms condition and provacy policy
Route::get('terms_conditions','infoController@termsConditions')->name('terms_conditions');
Route::get('privacy_policy','infoController@privacyPolicy')->name('privacy_policy');
Route::get('policy_condition_24_7','infoController@b24_7')->name('policy_condition_24_7');

//Approvals
Route::get('approval','approvalController@index')->name('approval');

//work permit
Route::get('human_management/work_permit/{all?}','human_management\workPermitController@index')->name('work_permit');
Route::get('human_management/work_permits/create','human_management\workPermitController@create')->name('work_permit_create');
Route::post('human_management/work_permit','human_management\workPermitController@store')->name('work_permit_store');
Route::get('human_management/work_permit/show/{id}','human_management\workPermitController@show')->name('work_permit_show');
// Route::get('human_management/work_permit/edit/{id}','human_management\workPermitController@edit')->name('work_permit_edit');
// Route::put('human_management/work_permit/{id}','human_management\workPermitController@update')->name('work_permit_update');
Route::get('human_management/work_permit/download/{id}','human_management\workPermitController@download')->name('work_permit_download');
Route::put('human_management/work_permit/{id}','human_management\workPermitController@approve')->name('work_permit_approve');
Route::delete('human_management/work_permit/delete/{id}','human_management\workPermitController@destroy')->name('work_permit_delete');

//bonus
Route::get('human_management/bonus/technicals','human_management\workPermitBonusesController@index')->name('work_permit_bonuses');
Route::get('human_management/bonus/technicals/create','human_management\workPermitBonusesController@create')->name('work_permit_bonuses_create');
Route::post('human_management/bonus/technicals','human_management\workPermitBonusesController@store')->name('work_permit_bonuses_store');
Route::get('human_management/bonus/technicals/{id}','human_management\workPermitBonusesController@show')->name('work_permit_bonuses_show');
Route::get('human_management/bonus/technicals/{id}/edit','human_management\workPermitBonusesController@edit')->name('work_permit_bonuses_edit');
Route::put('human_management/bonus/technicals/{id}','human_management\workPermitBonusesController@update')->name('work_permit_bonuses_update');
Route::get('human_management/bonus/technicals/download/{id}','human_management\workPermitBonusesController@export')->name('work_permit_bonuses_export');
Route::post('human_management/bonus/technicals/{id}','human_management\workPermitBonusesController@approve')->name('work_permit_bonuses_approve');
// Route::delete('human_management/fall_protection_equipment_inspection/delete/{id}','human_management\fallProtectionEquipmentInspectionController@destroy')->name('fall_protection_equipment_inspection_delete');

//fall protection equipment inspection
Route::get('human_management/fall_protection_equipment_inspection','human_management\fallProtectionEquipmentInspectionController@index')->name('fall_protection_equipment_inspection');
Route::get('human_management/fall_protection_equipment_inspection/create','human_management\fallProtectionEquipmentInspectionController@create')->name('fall_protection_equipment_inspection_create');
Route::post('human_management/fall_protection_equipment_inspection','human_management\fallProtectionEquipmentInspectionController@store')->name('fall_protection_equipment_inspection_store');
Route::get('human_management/fall_protection_equipment_inspection/show/{id}','human_management\fallProtectionEquipmentInspectionController@show')->name('fall_protection_equipment_inspection_show');
// Route::get('human_management/fall_protection_equipment_inspection/edit/{id}','human_management\fallProtectionEquipmentInspectionController@edit')->name('fall_protection_equipment_inspection_edit');
// Route::put('human_management/fall_protection_equipment_inspection/{id}','human_management\fallProtectionEquipmentInspectionController@update')->name('fall_protection_equipment_inspection_update');
Route::get('human_management/fall_protection_equipment_inspection/download/{id}','human_management\fallProtectionEquipmentInspectionController@download')->name('fall_protection_equipment_inspection_download');
Route::put('human_management/fall_protection_equipment_inspection/{id}','human_management\fallProtectionEquipmentInspectionController@approve')->name('fall_protection_equipment_inspection_approve');
Route::delete('human_management/fall_protection_equipment_inspection/delete/{id}','human_management\fallProtectionEquipmentInspectionController@destroy')->name('fall_protection_equipment_inspection_delete');

//delivery of staffing 
Route::get('human_management/delivery_staffing','human_management\deliveryStaffingController@index')->name('delivery_staffing');
Route::get('human_management/delivery_staffing/create','human_management\deliveryStaffingController@create')->name('delivery_staffing_create');
Route::post('human_management/delivery_staffing','human_management\deliveryStaffingController@store')->name('delivery_staffing_store');
Route::get('human_management/delivery_staffing/show/{id}','human_management\deliveryStaffingController@show')->name('delivery_staffing_show');
// Route::get('human_management/delivery_staffing/edit/{id}','human_management\deliveryStaffingController@edit')->name('delivery_staffing_edit');
// Route::put('human_management/delivery_staffing/{id}','human_management\deliveryStaffingController@update')->name('delivery_staffing_update');
Route::get('human_management/delivery_staffing/download/{id}','human_management\deliveryStaffingController@download')->name('delivery_staffing_download');
Route::put('human_management/delivery_staffing/{id}','human_management\deliveryStaffingController@approve')->name('delivery_staffing_approve');
Route::delete('human_management/delivery_staffing/delete/{id}','human_management\deliveryStaffingController@delete')->name('delivery_staffing_delete');

//work permits notifications medical incapacity
Route::get('human_management/work_permits_notifications_medical_incapacity','human_management\workPermitNotificationsMedicalIncapacityController@index')->name('work_permits_notifications_medical_incapacity');
Route::get('human_management/work_permits_notifications_medical_incapacity/create','human_management\workPermitNotificationsMedicalIncapacityController@create')->name('work_permits_notifications_medical_incapacity_create');
Route::post('human_management/work_permits_notifications_medical_incapacity','human_management\workPermitNotificationsMedicalIncapacityController@store')->name('work_permits_notifications_medical_incapacity_store');
Route::get('human_management/work_permits_notifications_medical_incapacity/show/{id}','human_management\workPermitNotificationsMedicalIncapacityController@show')->name('work_permits_notifications_medical_incapacity_show');
// Route::get('human_management/work_permits_notifications_medical_incapacity/edit/{id}','human_management\workPermitNotificationsMedicalIncapacityController@edit')->name('work_permits_notifications_medical_incapacity_edit');
// Route::put('human_management/work_permits_notifications_medical_incapacity/{id}','human_management\workPermitNotificationsMedicalIncapacityController@update')->name('work_permits_notifications_medical_incapacity_update');
Route::get('human_management/work_permits_notifications_medical_incapacity/download/{id}','human_management\workPermitNotificationsMedicalIncapacityController@download')->name('work_permits_notifications_medical_incapacity_download');
Route::put('human_management/work_permits_notifications_medical_incapacity/{id}','human_management\workPermitNotificationsMedicalIncapacityController@approve')->name('work_permits_notifications_medical_incapacity_approve');
Route::delete('human_management/work_permits_notifications_medical_incapacity/delete/{id}','human_management\workPermitNotificationsMedicalIncapacityController@delete')->name('work_permits_notifications_medical_incapacity_delete');

//Payroll and overtime news report 
Route::get('human_management/payroll_overtime_news_report','human_management\payrollOvertimeNewsReportController@index')->name('payroll_overtime_news_report');
Route::get('human_management/payroll_overtime_news_report/create','human_management\payrollOvertimeNewsReportController@create')->name('payroll_overtime_news_report_create');
Route::post('human_management/payroll_overtime_news_report','human_management\payrollOvertimeNewsReportController@store')->name('payroll_overtime_news_report_store');
Route::get('human_management/payroll_overtime_news_report/show/{id}','human_management\payrollOvertimeNewsReportController@show')->name('payroll_overtime_news_report_show');
Route::get('human_management/payroll_overtime_news_report/edit/{id}','human_management\payrollOvertimeNewsReportController@edit')->name('payroll_overtime_news_report_edit');
Route::put('human_management/payroll_overtime_news_report/{id}','human_management\payrollOvertimeNewsReportController@update')->name('payroll_overtime_news_report_update');
Route::get('human_management/payroll_overtime_news_report/download/{id}','human_management\payrollOvertimeNewsReportController@download')->name('payroll_overtime_news_report_download');
Route::get('human_management/payroll_overtime_news_report/export/{id}','human_management\payrollOvertimeNewsReportController@export')->name('payroll_overtime_news_report_export');
Route::get('human_management/payroll_overtime_news_report/export2/{id}','human_management\payrollOvertimeNewsReportController@export2')->name('payroll_overtime_news_report_export2');
Route::post('human_management/payroll_overtime_news_report/{id}','human_management\payrollOvertimeNewsReportController@approve')->name('payroll_overtime_news_report_approve');
Route::delete('human_management/payroll_overtime_news_report/delete/{id}','human_management\payrollOvertimeNewsReportController@delete')->name('payroll_overtime_news_report_delete');

//Request to withdraw severance
Route::get('human_management/request_withdraw_severance','human_management\requestWithdrawSeveranceController@index')->name('request_withdraw_severance');
Route::get('human_management/request_withdraw_severance/create','human_management\requestWithdrawSeveranceController@create')->name('request_withdraw_severance_create');
Route::post('human_management/request_withdraw_severance','human_management\requestWithdrawSeveranceController@store')->name('request_withdraw_severance_store');
Route::get('human_management/request_withdraw_severance/show/{id}','human_management\requestWithdrawSeveranceController@show')->name('request_withdraw_severance_show');
// Route::get('human_management/request_withdraw_severance/edit/{id}','human_management\requestWithdrawSeveranceController@edit')->name('request_withdraw_severance_edit');
// Route::put('human_management/request_withdraw_severance/{id}','human_management\requestWithdrawSeveranceController@update')->name('request_withdraw_severance_update');
// Route::get('human_management/request_withdraw_severance/download/{id}','human_management\requestWithdrawSeveranceController@download')->name('request_withdraw_severance_download');
Route::put('human_management/request_withdraw_severance/{id}','human_management\requestWithdrawSeveranceController@approve')->name('request_withdraw_severance_approve');
Route::delete('human_management/request_withdraw_severance/delete/{id}','human_management\requestWithdrawSeveranceController@destroy')->name('request_withdraw_severance_delete');

//detailed inspection of vehicles
Route::get('logistics_infrastructure/detailed_inspection_vehicles','logistics_infrastructure\detailedInspectionVehicles@index')->name('detailed_inspection_vehicles');
Route::get('logistics_infrastructure/detailed_inspection_vehicles/create','logistics_infrastructure\detailedInspectionVehicles@create')->name('detailed_inspection_vehicles_create');
Route::post('logistics_infrastructure/detailed_inspection_vehicles','logistics_infrastructure\detailedInspectionVehicles@store')->name('detailed_inspection_vehicles_store');
Route::get('logistics_infrastructure/detailed_inspection_vehicles/show/{id}','logistics_infrastructure\detailedInspectionVehicles@show')->name('detailed_inspection_vehicles_show');
// Route::get('logistics_infrastructure/detailed_inspection_vehicles/edit/{id}','logistics_infrastructure\detailedInspectionVehicles@edit')->name('detailed_inspection_vehicles_edit');
// Route::put('logistics_infrastructure/detailed_inspection_vehicles/{id}','logistics_infrastructure\detailedInspectionVehicles@update')->name('detailed_inspection_vehicles_update');
Route::get('logistics_infrastructure/detailed_inspection_vehicles/download/{id}','logistics_infrastructure\detailedInspectionVehicles@download')->name('detailed_inspection_vehicles_download');
Route::put('logistics_infrastructure/detailed_inspection_vehicles/{id}','logistics_infrastructure\detailedInspectionVehicles@approve')->name('detailed_inspection_vehicles_approve');
Route::delete('logistics_infrastructure/detailed_inspection_vehicles/delete/{id}','logistics_infrastructure\detailedInspectionVehicles@destroy')->name('detailed_inspection_vehicles_delete');

//checklist computer maintenance
Route::get('logistics_infrastructure/checklist_computer_maintenance','logistics_infrastructure\checklistComputerMaintenance@index')->name('checklist_computer_maintenance');
Route::get('logistics_infrastructure/checklist_computer_maintenance/create','logistics_infrastructure\checklistComputerMaintenance@create')->name('checklist_computer_maintenance_create');
Route::post('logistics_infrastructure/checklist_computer_maintenance','logistics_infrastructure\checklistComputerMaintenance@store')->name('checklist_computer_maintenance_store');
Route::get('logistics_infrastructure/checklist_computer_maintenance/show/{id}','logistics_infrastructure\checklistComputerMaintenance@show')->name('checklist_computer_maintenance_show');
// Route::get('logistics_infrastructure/checklist_computer_maintenance/edit/{id}','logistics_infrastructure\checklistComputerMaintenance@edit')->name('checklist_computer_maintenance_edit');
// Route::put('logistics_infrastructure/checklist_computer_maintenance/{id}','logistics_infrastructure\checklistComputerMaintenance@update')->name('checklist_computer_maintenance_update');
Route::get('logistics_infrastructure/checklist_computer_maintenance/download/{id}','logistics_infrastructure\checklistComputerMaintenance@download')->name('checklist_computer_maintenance_download');
Route::put('logistics_infrastructure/checklist_computer_maintenance/{id}','logistics_infrastructure\checklistComputerMaintenance@approve')->name('checklist_computer_maintenance_approve');
Route::delete('logistics_infrastructure/checklist_computer_maintenance/delete/{id}','logistics_infrastructure\checklistComputerMaintenance@delete')->name('checklist_computer_maintenance_delete');

//review and assignment of tools
Route::get('execution_works/review_assignment_tools','execution_works\reviewAssignmentTools@index')->name('review_assignment_tools');
Route::get('execution_works/review_assignment_tools/create','execution_works\reviewAssignmentTools@create')->name('review_assignment_tools_create');
Route::post('execution_works/review_assignment_tools','execution_works\reviewAssignmentTools@store')->name('review_assignment_tools_store');
Route::get('execution_works/review_assignment_tools/show/{id}','execution_works\reviewAssignmentTools@show')->name('review_assignment_tools_show');
Route::get('execution_works/review_assignment_tools/edit/{id}','execution_works\reviewAssignmentTools@edit')->name('review_assignment_tools_edit');
Route::put('execution_works/review_assignment_tools/{id}','execution_works\reviewAssignmentTools@update')->name('review_assignment_tools_update');
Route::get('execution_works/review_assignment_tools/download/{id}','execution_works\reviewAssignmentTools@download')->name('review_assignment_tools_download');
Route::patch('execution_works/review_assignment_tools/{id}','execution_works\reviewAssignmentTools@approve')->name('review_assignment_tools_approve');
Route::delete('execution_works/review_assignment_tools/delete/{id}','execution_works\reviewAssignmentTools@delete')->name('review_assignment_tools_delete');

// end contract
Route::get('user/end_work/presend/{id}','endWorkController@create')->name('user_end_work')->middleware('auth')->middleware('verified');
Route::post('user/end_work/presend/{id}','endWorkController@store')->name('user_end_work_store')->middleware('auth')->middleware('verified');
Route::get('user/end_work/signature','endWorkController@edit')->name('user_end_work_signature')->middleware('auth')->middleware('verified');
Route::put('user/end_work/signature','endWorkController@update')->name('user_end_work_update')->middleware('auth')->middleware('verified');

// letters
Route::get('guest/letters/recommendation','endWorkController@letter_recommendation')->name('letter_recommendation');
Route::post('guest/letters/recommendation','endWorkController@letter_recommendation_download')->name('letter_recommendation_download');

// Users
Route::get('users','userController@index')->name("users");
Route::get('users/show/{id}','userController@show')->name("user_show");
Route::get('users/{id}/edit','userController@edit')->name("user_edit");
Route::put('users/{id}','userController@update')->name('user_update');
Route::get('users/create','userController@create')->name("user_create");
Route::post('users','userController@store')->name("user_store");
Route::delete('users/{id}','userController@destroy')->name("user_destroy");
Route::get('users/restore/{id}','userController@restore')->name("restore");
Route::get('users/export','userController@export')->name('user_export');

//retired users
Route::get('retireds','retiredUserController@index')->name('retired_users');

// Attention Calls
Route::get('attention_call','AttentionCallController@index')->name("attention_call");
Route::get('attention_call/create','AttentionCallController@create')->name("attention_call_create");
Route::post('attention_call','AttentionCallController@store')->name("call_store");
Route::get('called_responder/{id}','AttentionCallController@edit')->name("called_responder");
Route::put('called_responder/{id}','AttentionCallController@update')->name("called_responder_store");
Route::get('attention_call/{id}/edit','AttentionCallController@edit1')->name("attention_call_edit");
Route::put('attention_call/{id}','AttentionCallController@update1')->name("attention_call_update");
Route::get('show_called/{id}','AttentionCallController@show')->name("attention_call_show");
Route::put('approve_call/{id}','AttentionCallController@approve_call')->name("approve_call");
Route::put('not_approve_call/{id}','AttentionCallController@not_approve_call')->name("not_approve_call");
Route::delete('attention_call/{id}','AttentionCallController@destroy')->name("delete_call");

Route::resource('roles','RoleController');

//billboard
Route::get('billboards','billboard@index')->name('billboard');
Route::post('billboards','billboard@store')->name('billboard_store');
Route::put('billboards/update/{id}','billboard@update')->name('billboard_update');
Route::delete('billboards/{id}','billboard@destroy')->name('billboard_destroy');
Route::delete('billboards/{id}','billboard@destroy')->name('billboard_destroy');

//billboard type
Route::get('billboard_type','billboard\billboardTypeController@index')->name('billboard_type');
Route::get('billboard_type/create','billboard\billboardTypeController@create')->name('billboard_type_create');
Route::post('billboard_type/create','billboard\billboardTypeController@store')->name('billboard_type_store');
Route::get('billboard_type/show/{id}','billboard\billboardTypeController@show')->name('billboard_type_show');
Route::get('billboard_type/{id}/edit','billboard\billboardTypeController@edit')->name('billboard_type_edit');
Route::put('billboard_type/{id}','billboard\billboardTypeController@update')->name('billboard_type_update');
Route::delete('billboard_type/{id}','billboard\billboardTypeController@destroy')->name('billboard_type_delete');

//project
Route::get('projects','ProjectsController@index')->name('project');
Route::get('projects/create','ProjectsController@create')->name('project_create');
Route::post('projects','ProjectsController@store')->name('project_store');
Route::get('projects/{id}','ProjectsController@show')->name("project_show");
Route::get('projects/{id}/edit','ProjectsController@edit')->name("project_edit");
Route::put('projects/{id}','ProjectsController@update')->name('project_update');
Route::delete('projects/{id}','ProjectsController@destroy')->name('project_destroy');

Route::get('projects/{id}/mw','ProjectsController@download_mw')->name('project_download_mw');
Route::get('projects/{id}/rf','ProjectsController@download_rf')->name('project_download_rf');
Route::get('projects/{id}/order','ProjectsController@download_order')->name('project_download_order');

Route::put('projects/{id}/approve','ProjectsController@approve')->name('approve_project');
Route::put('projects/{id}/not_approve','ProjectsController@not_approve')->name('not_approve_project');

Route::put('projects/{id}/reactive','ProjectsController@reactive')->name('reactive_project');
Route::put('projects/{id}/finish','ProjectsController@finish')->name('finish_project');
Route::put('projects/{id}/stop','ProjectsController@stop')->name('stop_project');
Route::put('projects/{id}/start','ProjectsController@start')->name('start_project');

//Setting projects
Route::get('project/setting/project','ProjectsController@setting')->name('project_setting');
Route::get('project/setting/project/show/{id}','ProjectsController@setting_show')->name('project_setting_show');
Route::get('project/setting/project/{id}/edit','ProjectsController@setting_edit')->name('project_setting_edit');
Route::put('project/setting/project/{id}','ProjectsController@setting_update')->name('project_setting_update');
Route::get('project/setting/project/create','ProjectsController@setting_create')->name('project_setting_create');
Route::post('project/setting/project','ProjectsController@setting_store')->name('project_setting_store');

// Consumables
Route::get('project/setting/consumables','projects\consumablesController@index')->name('consumables_setting');
Route::get('project/setting/consumables/create','projects\consumablesController@create')->name('consumables_setting_create');
Route::get('project/setting/consumables/{id}','projects\consumablesController@show')->name('consumables_setting_show');
Route::get('project/setting/consumables/{id}/edit','projects\consumablesController@edit')->name('consumables_setting_edit');
Route::put('project/setting/consumables/{id}','projects\consumablesController@update')->name('consumables_setting_update');
Route::post('project/setting/consumables','projects\consumablesController@store')->name('consumables_setting_store');

// Materials
Route::get('project/setting/materials','ProjectsController@setting_materials')->name('materials_setting');
Route::get('project/setting/materials/create','ProjectsController@setting_materials_create')->name('materials_setting_create');
Route::post('project/setting/materials','ProjectsController@setting_materials_store')->name('materials_setting_store');
Route::get('project/setting/materials/{id}','ProjectsController@setting_materials_show')->name('materials_setting_show');
Route::get('project/setting/materials/{id}/edit','ProjectsController@setting_materials_edit')->name('materials_setting_edit');
Route::put('project/setting/materials/{id}','ProjectsController@setting_materials_update')->name('materials_setting_update');

//Bonificaciones
Route::get('project/setting/bonuses','ProjectsController@setting_bonuses')->name('bonuses_setting');
//Control
Route::get('project/setting/bonuses/control','ProjectsController@setting_bonuses_control')->name('setting_bonuses_control');
Route::get('project/setting/bonuses/control/create','ProjectsController@setting_bonuses_create_control')->name('bonuses_setting_create_control');
Route::post('project/setting/bonuses/control','ProjectsController@setting_bonuses_store_control')->name('bonuses_setting_store_control');
Route::get('project/setting/bonuses/control/show/{id}','projectsController@setting_bonuses_show_control')->name('bonuses_setting_show_control');
Route::get('project/setting/bonuses/control/{id}/edit','projectsController@setting_bonuses_edit_control')->name('bonuses_setting_edit_control');
Route::put('project/setting/bonuses/control/{id}','projectsController@setting_bonuses_update_control')->name('bonuses_setting_update_control');

//Technical
Route::get('project/setting/bonuses/technical','ProjectsController@setting_bonuses_technical')->name('setting_bonuses_technical');
Route::get('project/setting/bonuses/technical/create','ProjectsController@setting_bonuses_create_technical')->name('bonuses_setting_create_technical');
Route::get('project/setting/bonuses/technical/show/{id}','projectsController@setting_bonuses_show_technical')->name('bonuses_setting_show_technical');
Route::post('project/setting/bonuses/technical','ProjectsController@setting_bonuses_store_technical')->name('bonuses_setting_store_technical');
Route::get('project/setting/bonuses/technical/{id}/edit','ProjectsController@setting_bonuses_edit_technical')->name('bonuses_setting_edit_technical');
Route::put('project/setting/bonuses/technical/{id}','ProjectsController@setting_bonuses_update_technical')->name('bonuses_setting_update_technical');

//Settings
Route::get('setting','SettingsController@index')->name('settings');
Route::post('setting','SettingsController@store')->name('setting_store');
Route::get('setting/system','SettingsController@system')->name('system');
Route::post('setting/system','SettingsController@system_store')->name('system_store');
Route::get('setting/messages','SettingsController@messages')->name('messages');
Route::post('setting/messages','SettingsController@messages_store')->name('messages_store');

//Job application
Route::get('job_application','JobApplicationController@index')->name('job_application')->middleware('auth')->middleware('verified');
Route::get('work_with_us','JobApplicationController@create')->name('work_with_us');
Route::post('work_with_us','JobApplicationController@store')->name('work_with_us_store');
Route::get('job_application/{id}','JobApplicationController@show')->name('job_application_show')->middleware('auth')->middleware('verified');
Route::get('job_application/{id}/edit','JobApplicationController@edit')->name('job_application_edit')->middleware('auth')->middleware('verified');
Route::put('job_application/{id}','JobApplicationController@update')->name('job_application_update')->middleware('auth')->middleware('verified');
Route::delete('job_application/{id}','JobApplicationController@destroy')->name('job_application_delete')->middleware('auth')->middleware('verified');

//performance evaluation
Route::get('performance_evaluation','PerformanceEvaluationController@index')->name('performance_evaluation');
Route::post('performance_evaluation','PerformanceEvaluationController@create')->name('performance_evaluation_create');
Route::PUT('performance_evaluation/store/{id}','PerformanceEvaluationController@store')->name('performance_evaluation_store');
Route::put('performance_evaluation/{id}','PerformanceEvaluationController@update')->name('self_assessment_store');
Route::get('performance_evaluation/{id}','PerformanceEvaluationController@autoevaluation')->name('autoevaluation');
Route::get('performance_evaluation/show/{id}','PerformanceEvaluationController@show')->name('performance_evaluation_show');
Route::get('performance_evaluation/respoder/{id}','PerformanceEvaluationController@responder')->name('performance_evaluation_responder');
Route::put('performance_evaluation/{id}/approve_performance','PerformanceEvaluationController@approve_performance')->name('approve_performance');
Route::put('performance_evaluation/{id}/not_approve_performance','PerformanceEvaluationController@not_approve_performance')->name('not_approve_performance');

//customer satisfaction
Route::get('customer_satisfaction','CustomerSatisfactionController@index')->name('customer_satisfaction')->middleware('auth')->middleware('verified');
Route::get('customer_satisfaction/{token}/{id}','CustomerSatisfactionController@create')->name('customer_satisfaction_create');
Route::put('customer_satisfaction/{id}','CustomerSatisfactionController@store')->name('satisfaction_store');
Route::get('customer_satisfaction/{id}','CustomerSatisfactionController@show')->name('satisfaction_show')->middleware('auth')->middleware('verified');
Route::get('end_customer_satisfaction','CustomerSatisfactionController@success')->name('customer_satisfaction_success');
Route::post('customer_satisfaction/new_evaluation/{id}/create','CustomerSatisfactionController@new_evaluation')->name('new_customer_evaluation')->middleware('auth')->middleware('verified');
Route::delete('customer_satisfaction/{id}','CustomerSatisfactionController@destroy')->name('delete_evaluation_customer')->middleware('auth')->middleware('verified');

//Supplier Evaluation
Route::get('supplier_evaluation','SupplierEvaluationController@index')->name('supplier_evaluation')->middleware('auth')->middleware('verified');
Route::post('supplier_evaluation/create','SupplierEvaluationController@create')->name('supplier_evaluation_create')->middleware('auth')->middleware('verified');
Route::get('supplier_evaluation/{token}/{id}','SupplierEvaluationController@edit_provider')->name('supplier_evaluation_edit_provider');
Route::put('supplier_evaluation/{id}','SupplierEvaluationController@store')->name('supplier_evaluation_store_provider');
Route::get('end_supplier_evaluation','SupplierEvaluationController@success')->name('supplier_success');
Route::get('supplier_evaluations/responde/{id}','SupplierEvaluationController@responde')->name('supplier_evaluation_responde')->middleware('auth')->middleware('verified');
Route::get('supplier_evaluation/result/show/{id}','SupplierEvaluationController@show')->name('supplier_evaluation_show')->middleware('auth')->middleware('verified');
Route::put('supplier_evaluation/{id}/responde','SupplierEvaluationController@update')->name('supplier_evaluation_store')->middleware('auth')->middleware('verified');
Route::get('supplier_evaluation/{id}/documents','SupplierEvaluationController@documents_download')->name('supplier_evaluation_documents_download')->middleware('auth')->middleware('verified');
Route::get('supplier_evaluations/{id}/remember','SupplierEvaluationController@remember')->name('supplier_evaluation_remember')->middleware('auth')->middleware('verified');

//Customer
Route::get('customers','CustomerController@index')->name("customers");
Route::get('customers/show/{id}','CustomerController@show')->name("customer_show");
Route::get('customers/{id}/edit','CustomerController@edit')->name("customer_edit");
Route::put('customers/{id}','CustomerController@update')->name('customer_update');
Route::get('customers/create','CustomerController@create')->name("customer_create");
Route::post('customers','CustomerController@store')->name("customer_store");
Route::delete('customers/{id}','CustomerController@destroy')->name("customer_destroy");

//Provider
Route::get('providers','ProviderController@index')->name("providers");
Route::get('providers/show/{id}','ProviderController@show')->name("provider_show");
Route::get('providers/{id}/edit','ProviderController@edit')->name("provider_edit");
Route::put('providers/{id}','ProviderController@update')->name('provider_update');
Route::get('providers/create','ProviderController@create')->name("provider_create");
Route::post('providers','ProviderController@store')->name("provider_store");
Route::delete('providers/{id}','ProviderController@destroy')->name("provider_destroy");

//Notification
Route::get('notifications','HomeController@notification')->name('notifications');
Route::get('notifications/{id}/markerAsRead','HomeController@notification_read')->name('notification_read');
Route::get('notifications/markerAllAsRead','HomeController@notification_all_read')->name('notification_all_read');
Route::get('notifications/DeleteRead','HomeController@notification_delete')->name('notification_delete');

//Memorandum
Route::get('memorandum','MemorandumController@index')->name('memorandum');
Route::get('memorandum/show/{id}','MemorandumController@show')->name('memorandum_show');
Route::get('memorandum/create','MemorandumController@create')->name('memorandum_create');
Route::post('memorandum','MemorandumController@store')->name('memorandum_store');
Route::get('memorandum/{id}/edit','MemorandumController@edit')->name('memorandum_edit');
Route::put('memorandum/{id}','MemorandumController@update')->name('memorandum_update');
Route::put('memorandum/update/{id}','MemorandumController@update1')->name('memorandum_update1');
Route::delete('memorandum/{id}','MemorandumController@destroy')->name('memorandum_destroy');

//curriculum
Route::get('curriculums','curriculumController@index')->name('curriculums')->middleware('auth')->middleware('verified');
Route::get('curriculum/show/{id}','curriculumController@show')->name('curriculum_show')->middleware('auth')->middleware('verified');
Route::get('curriculum/create','curriculumController@create')->name('curriculum_create')->middleware('auth')->middleware('verified');
Route::post('curriculum','curriculumController@store')->name('curriculum_store')->middleware('auth')->middleware('verified');
Route::get('curriculum/create2/{id}','curriculumController@create2')->name('curriculum_create2')->middleware('auth')->middleware('verified');
Route::post('curriculum2/{id}','curriculumController@store2')->name('curriculum_store2')->middleware('auth')->middleware('verified');
Route::get('curriculum/register/{id}','curriculumController@register')->name('curriculum_register')->middleware('auth')->middleware('verified');
Route::get('curriculum/create3/{id}','curriculumController@create3')->name('curriculum_create3')->middleware('auth')->middleware('verified');
Route::put('curriculum3/{id}','curriculumController@store3')->name('curriculum_store3')->middleware('auth')->middleware('verified');
Route::get('curriculum/{id}/edit','curriculumController@edit')->name('curriculum_edit')->middleware('auth')->middleware('verified');
Route::put('curriculum/{id}','curriculumController@update')->name('curriculum_update')->middleware('auth')->middleware('verified');
Route::put('curriculum/approval/{id}','curriculumController@approve')->name('curriculum_approve')->middleware('auth')->middleware('verified');
Route::put('curriculum/not_approval/{id}','curriculumController@not_approve')->name('curriculum_not_approve')->middleware('auth')->middleware('verified');
Route::delete('curriculum/{id}','curriculumController@destroy')->name("curriculum_delete")->middleware('auth')->middleware('verified');
Route::get('guest/attach/document/{token}','curriculumController@attach')->name("curriculum_attach_documents");
Route::put('guest/attach/document','curriculumController@attach_store')->name("curriculum_attach");
Route::get('guest/attach/document','curriculumController@success')->name("curriculum_attach_success");
Route::patch('curriculum/{id}','curriculumController@renovation_contract')->name('renovation_contract')->middleware('auth')->middleware('verified');

Route::get('curriculum/signature','curriculumController@signature_1')->name('curriculum_signature')->middleware('auth')->middleware('verified');
Route::post('signature_file','curriculumController@signature')->name('signature_file');
Route::post('signature_contract','curriculumController@signature_contract')->name('signature_contract');

//upload_file
Route::post('upload_file','curriculumController@upload_file')->name('upload_file');

//interview
Route::get('interviews','interviewController@index')->name('interview');
Route::get('interview/show/{id}','interviewController@show')->name('interview_show');
Route::get('interview/create','interviewController@create')->name('interview_create');
Route::get('interview/{id}/create','interviewController@create_application')->name('interview_create_application');
Route::post('interview','interviewController@store')->name('interview_store');
Route::get('interview/{id}/edit','interviewController@edit')->name('interview_edit');
Route::put('interview/{id}','interviewController@update')->name('interview_update');
Route::put('interview/approval/{id}','interviewController@approve')->name('interview_approve');
Route::put('interview/not_approval/{id}','interviewController@not_approve')->name('interview_not_approve');
Route::delete('interview/{id}','interviewController@destroy')->name("interview_delete");
Route::get('interview/{id}','interviewController@presend_documentation')->name("interview_presend_documentation");
Route::post('interview/{id}','interviewController@send_documentation')->name("interview_send_documentation");

// Route::get('interview/{id}/export','interviewController@export')->name("export_contract");

// position setting
Route::get('position_settings','SettingsController@position_setting')->name('position_setting');
Route::get('position_setting/show/{id}','SettingsController@position_setting_show')->name('position_setting_show');
Route::get('position_setting/create','SettingsController@position_setting_create')->name('position_setting_create');
Route::post('position_setting','SettingsController@position_setting_store')->name('position_setting_store');
Route::get('position_setting/{id}/edit','SettingsController@position_setting_edit')->name('position_setting_edit');
Route::put('position_setting/{id}','SettingsController@position_setting_update')->name('position_setting_update');

//documents
Route::get('documents','DocumentsController@index')->name('documents');
Route::get('documents/{id}','DocumentsController@show')->name('documents_show');
Route::get('document/create','DocumentsController@create')->name('documents_create');
Route::post('documents','DocumentsController@store')->name('documents_store');
Route::get('documents/{id}/edit','DocumentsController@edit')->name('documents_edit');
Route::put('documents/{id}','DocumentsController@update')->name('documents_update');
Route::delete('documents/{id}','DocumentsController@destroy')->name('documents_delete');
Route::get('documents/{id}/download','DocumentsController@download')->name('documents_download');

// cvs

//Ventas
Route::get('cvs/sale','cvs\CvsSalesController@index')->name('cvs_sales');
Route::get('cvs/sale/show/{id}','cvs\CvsSalesController@show')->name('cvs_sales_show');
Route::get('cvs/sale/create','cvs\CvsSalesController@create')->name('cvs_sales_create');
Route::post('cvs/sale','cvs\CvsSalesController@store')->name('cvs_sales_store');
Route::get('cvs/sale/{id}/edit','cvs\CvsSalesController@edit')->name('cvs_sales_edit');
Route::put('cvs/sale/{id}','cvs\CvsSalesController@update')->name('cvs_sales_update');
Route::put('cvs/sale/end/{id}','cvs\CvsSalesController@end')->name('cvs_sales_end');
// Route::delete('cvs/sale','cvs\CvsSalesController@destroy')->name('cvs_sales_delete');
Route::post('cvs/sale/export','cvs\CvsSalesController@export')->name('cvs_sales_export');

// Facturas
Route::get('cvs/invoices','cvs\CvsInvoiceController@index')->name('cvs_invoices');
// Route::get('cvs/invoices/{id}','cvs\CvsInvoiceController@show')->name('cvs_invoices_show');
// Route::get('cvs/invoices/create','cvs\CvsInvoiceController@create')->name('cvs_invoices_create');
// Route::post('cvs/invoices','cvs\CvsInvoiceController@store')->name('cvs_invoices_store');
Route::get('cvs/invoices/{id}/edit','cvs\CvsInvoiceController@edit')->name('cvs_invoices_edit');
Route::put('cvs/invoices/{id}','cvs\CvsInvoiceController@update')->name('cvs_invoices_update');
Route::delete('cvs/invoices/{id}','cvs\CvsInvoiceController@destroy')->name('cvs_invoices_delete');
Route::post('cvs/invoices/cut','cvs\CvsInvoiceController@cut')->name('cvs_payment_cuy');

// Clientes
Route::get('cvs/clients','cvs\CvsClientsController@index')->name('cvs_clients')->middleware('auth')->middleware('verified');
Route::get('cvs/clients/{id}','cvs\CvsClientsController@show')->name('cvs_clients_show')->middleware('auth')->middleware('verified');
// Route::get('cvs/clients/create','cvs\CvsClientsController@create')->name('cvs_clients_create');
// Route::post('cvs/clients','cvs\CvsClientsController@store')->name('cvs_clients_store');
// Route::get('cvs/clients/{id}/edit','cvs\CvsClientsController@edit')->name('cvs_clients_edit');
// Route::put('cvs/clients/{id}','cvs\CvsClientsController@update')->name('cvs_clients_update');
// Route::delete('cvs/clients','cvs\CvsClientsController@destroy')->name('cvs_clients_delete');
Route::get('unsubscribe/{token}','cvs\CvsClientsController@unsubscribe')->name('cvs_clients_unsubscribe');
Route::put('unsubscribe/{token}','cvs\CvsClientsController@unsubscribe_save')->name('cvs_clients_unsubscribe_save');
Route::get('subscribe/{token}','cvs\CvsClientsController@subscribe')->name('cvs_clients_subscribe');
Route::put('subscribe/{token}','cvs\CvsClientsController@subscribe_save')->name('cvs_clients_subscribe_save');

// admin

// Sedes
Route::get('cvs/admin/sedes','cvs\admin\CvsSedesController@index')->name('cvs_sedes');
Route::get('cvs/admin/sedes/show/{id}','cvs\admin\CvsSedesController@show')->name('cvs_sedes_show');
Route::get('cvs/admin/sedes/create','cvs\admin\CvsSedesController@create')->name('cvs_sedes_create');
Route::post('cvs/admin/sedes','cvs\admin\CvsSedesController@store')->name('cvs_sedes_store');
Route::get('cvs/admin/sedes/{id}/edit','cvs\admin\CvsSedesController@edit')->name('cvs_sedes_edit');
Route::put('cvs/admin/sedes/{id}','cvs\admin\CvsSedesController@update')->name('cvs_sedes_update');
// Route::delete('cvs/admin/sedes','cvs\admin\CvsSedesController@destroy')->name('cvs_sedes_delete');

// activation
Route::get('cvs/admin/activations','cvs\admin\CvsActivationsController@index')->name('cvs_admin_activations');
Route::get('cvs/admin/activations/show/{id}','cvs\admin\CvsActivationsController@show')->name('cvs_admin_activations_show');
Route::get('cvs/admin/activations/create','cvs\admin\CvsActivationsController@create')->name('cvs_admin_activations_create');
Route::post('cvs/admin/activations','cvs\admin\CvsActivationsController@store')->name('cvs_admin_activations_store');
Route::get('cvs/admin/activations/{id}/edit','cvs\admin\CvsActivationsController@edit')->name('cvs_admin_activations_edit');
Route::put('cvs/admin/activations/{id}','cvs\admin\CvsActivationsController@update')->name('cvs_admin_activations_update');
// Route::delete('cvs/admin/activations','cvs\admin\CvsActivationsController@destroy')->name('cvs_admin_activations_delete');

// tipos sims
Route::get('cvs/admin/sims_type','cvs\admin\CvsSims_typeController@index')->name('cvs_admin_sims_type');
Route::get('cvs/admin/sims_type/show/{id}','cvs\admin\CvsSims_typeController@show')->name('cvs_admin_sims_type_show');
Route::get('cvs/admin/sims_type/create','cvs\admin\CvsSims_typeController@create')->name('cvs_admin_sims_type_create');
Route::post('cvs/admin/sims_type','cvs\admin\CvsSims_typeController@store')->name('cvs_admin_sims_type_store');
Route::get('cvs/admin/sims_type/{id}/edit','cvs\admin\CvsSims_typeController@edit')->name('cvs_admin_sims_type_edit');
Route::put('cvs/admin/sims_type/{id}','cvs\admin\CvsSims_typeController@update')->name('cvs_admin_sims_type_update');
// Route::delete('cvs/admin/sims_type','cvs\admin\CvsSims_typeController@destroy')->name('cvs_admin_sims_type_delete');

// categorias accesorios
Route::get('cvs/admin/accesories_category','cvs\admin\CvsAccesoriesCategoryController@index')->name('cvs_admin_accesories_category');
Route::get('cvs/admin/accesories_category/show/{id}','cvs\admin\CvsAccesoriesCategoryController@show')->name('cvs_admin_accesories_category_show');
Route::get('cvs/admin/accesories_category/create','cvs\admin\CvsAccesoriesCategoryController@create')->name('cvs_admin_accesories_category_create');
Route::post('cvs/admin/accesories_category','cvs\admin\CvsAccesoriesCategoryController@store')->name('cvs_admin_accesories_category_store');
Route::get('cvs/admin/accesories_category/{id}/edit','cvs\admin\CvsAccesoriesCategoryController@edit')->name('cvs_admin_accesories_category_edit');
Route::put('cvs/admin/accesories_category/{id}','cvs\admin\CvsAccesoriesCategoryController@update')->name('cvs_admin_accesories_category_update');
// Route::delete('cvs/admin/accesories_category','cvs\admin\CvsAccesoriesCategoryController@destroy')->name('cvs_admin_accesories_category_delete');

// advertising
Route::get('cvs/admin/advertising','cvs\admin\CvsAdvertisingController@index')->name('cvs_admin_advertising');
Route::get('cvs/admin/advertising/show/{id}','cvs\admin\CvsAdvertisingController@show')->name('cvs_admin_advertising_show');
Route::get('cvs/admin/advertising/create','cvs\admin\CvsAdvertisingController@create')->name('cvs_admin_advertising_create');
Route::post('cvs/admin/advertising','cvs\admin\CvsAdvertisingController@store')->name('cvs_admin_advertising_store');
Route::get('cvs/admin/advertising/{id}/edit','cvs\admin\CvsAdvertisingController@edit')->name('cvs_admin_advertising_edit');
Route::put('cvs/admin/advertising/{id}','cvs\admin\CvsAdvertisingController@update')->name('cvs_admin_advertising_update');
// Route::delete('cvs/admin/advertising','cvs\admin\CvsAdvertisingController@destroy')->name('cvs_admin_advertising_delete');

// INVENTAROS

//Moviles
Route::get('cvs/inventary/movile','cvs\inventary\CvsInventarymovileController@index')->name('cvs_inventary_moviles');
Route::get('cvs/inventary/movile/show/{id}','cvs\inventary\CvsInventarymovileController@show')->name('cvs_inventary_moviles_show');
Route::get('cvs/inventary/movile/create','cvs\inventary\CvsInventarymovileController@create')->name('cvs_inventary_moviles_create');
Route::post('cvs/inventary/movile','cvs\inventary\CvsInventarymovileController@store')->name('cvs_inventary_moviles_store');
Route::get('cvs/inventary/movile/{id}/edit','cvs\inventary\CvsInventarymovileController@edit')->name('cvs_inventary_moviles_edit');
Route::put('cvs/inventary/movile/{id}','cvs\inventary\CvsInventarymovileController@update')->name('cvs_inventary_moviles_update');
Route::delete('cvs/inventary/movile/{id}','cvs\inventary\CvsInventarymovileController@destroy')->name('cvs_inventary_moviles_delete');

//Sim Card
Route::get('cvs/inventary/sims','cvs\inventary\CvsInventarySimController@index')->name('cvs_inventary_sims');
Route::get('cvs/inventary/sims/show/{id}','cvs\inventary\CvsInventarySimController@show')->name('cvs_inventary_sims_show');
Route::get('cvs/inventary/sims/create','cvs\inventary\CvsInventarySimController@create')->name('cvs_inventary_sims_create');
Route::post('cvs/inventary/sims','cvs\inventary\CvsInventarySimController@store')->name('cvs_inventary_sims_store');
Route::get('cvs/inventary/sims/{id}/edit','cvs\inventary\CvsInventarySimController@edit')->name('cvs_inventary_sims_edit');
Route::put('cvs/inventary/sims/{id}','cvs\inventary\CvsInventarySimController@update')->name('cvs_inventary_sims_update');
Route::delete('cvs/inventary/sims/{id}','cvs\inventary\CvsInventarySimController@destroy')->name('cvs_inventary_sims_delete');

// Accesories
Route::get('cvs/inventary/Accesories','cvs\inventary\CvsInventaryAccesoriesController@index')->name('cvs_inventary_Accesories');
Route::get('cvs/inventary/Accesories/show/{id}','cvs\inventary\CvsInventaryAccesoriesController@show')->name('cvs_inventary_Accesories_show');
Route::get('cvs/inventary/Accesories/create','cvs\inventary\CvsInventaryAccesoriesController@create')->name('cvs_inventary_Accesories_create');
Route::post('cvs/inventary/Accesories','cvs\inventary\CvsInventaryAccesoriesController@store')->name('cvs_inventary_Accesories_store');
Route::get('cvs/inventary/Accesories/{id}/edit','cvs\inventary\CvsInventaryAccesoriesController@edit')->name('cvs_inventary_Accesories_edit');
Route::put('cvs/inventary/Accesories/{id}','cvs\inventary\CvsInventaryAccesoriesController@update')->name('cvs_inventary_Accesories_update');
Route::delete('cvs/inventary/Accesories/{id}','cvs\inventary\CvsInventaryAccesoriesController@destroy')->name('cvs_inventary_Accesories_delete');

// Claro service
Route::get('cvs/inventary/claro_services','cvs\inventary\CvsInventaryClaroServicesController@index')->name('cvs_inventary_claro_services');
Route::get('cvs/inventary/claro_services/show/{id}','cvs\inventary\CvsInventaryClaroServicesController@show')->name('cvs_inventary_claro_services_show');
Route::get('cvs/inventary/claro_services/create','cvs\inventary\CvsInventaryClaroServicesController@create')->name('cvs_inventary_claro_services_create');
Route::post('cvs/inventary/claro_services','cvs\inventary\CvsInventaryClaroServicesController@store')->name('cvs_inventary_claro_services_store');
Route::get('cvs/inventary/claro_services/{id}/edit','cvs\inventary\CvsInventaryClaroServicesController@edit')->name('cvs_inventary_claro_services_edit');
Route::put('cvs/inventary/claro_services/{id}','cvs\inventary\CvsInventaryClaroServicesController@update')->name('cvs_inventary_claro_services_update');
Route::delete('cvs/inventary/claro_services/{id}','cvs\inventary\CvsInventaryClaroServicesController@destroy')->name('cvs_inventary_claro_services_delete');


// indicators
Route::get('indicators','indicatorsController@index')->name('indicators');
Route::get('indicators/create','indicatorsController@create')->name('indicators_create');
Route::post('indicators','indicatorsController@store')->name('indicators_store');
Route::get('indicators/show/{id}','indicatorsController@show')->name('indicators_show');
Route::get('indicators/{id}/edit','indicatorsController@edit')->name('indicators_edit');
Route::put('indicators/{id}','indicatorsController@update')->name('indicators_update');
Route::get('indicators/{id}/tracing','indicatorsController@tracing')->name('indicators_tracing');
Route::put('indicators/tracing/{id}','indicatorsController@save')->name('indicators_tracing_save');

//CCJL
// PAGOS
Route::get('ccjl/rent','ccjl\ccjlRentController@index')->name('CCJL_rents');
Route::get('ccjl/rent/create','ccjl\ccjlRentController@create')->name('CCJL_rents_create');
Route::post('ccjl/rent','ccjl\ccjlRentController@store')->name('CCJL_rents_store');
Route::get('ccjl/rent/show/{id}','ccjl\ccjlRentController@show')->name('CCJL_rents_show');
Route::get('ccjl/rent/{id}/edit','ccjl\ccjlRentController@edit')->name('CCJL_rents_edit');
Route::put('ccjl/rent/{id}','ccjl\ccjlRentController@update')->name('CCJL_rents_update');
Route::get('ccjl/rent/{id}/pay','ccjl\ccjlRentController@pay')->name('CCJL_rents_pay');
Route::put('ccjl/rent/pay/{id}','ccjl\ccjlRentController@save')->name('CCJL_rents_save');
Route::post('ccjl/rent/remember/{id}','ccjl\ccjlRentController@remember')->name('CCJL_rents_remember');

// CLIENTS
Route::get('ccjl/client','ccjl\ccjlClientController@index')->name('CCJL_clients');
Route::get('ccjl/client/create','ccjl\ccjlClientController@create')->name('CCJL_clients_create');
Route::post('ccjl/client','ccjl\ccjlClientController@store')->name('CCJL_clients_store');
Route::get('ccjl/client/show/{id}','ccjl\ccjlClientController@show')->name('CCJL_clients_show');
Route::get('ccjl/client/{id}/edit','ccjl\ccjlClientController@edit')->name('CCJL_clients_edit');
Route::put('ccjl/client/{id}','ccjl\ccjlClientController@update')->name('CCJL_clients_update');

// PRODUCTS
// CANON
Route::get('ccjl/local','ccjl\products\ccjlLocalController@index')->name('CCJL_locals');
Route::get('ccjl/local/create','ccjl\products\ccjlLocalController@create')->name('CCJL_locals_create');
Route::post('ccjl/local','ccjl\products\ccjlLocalController@store')->name('CCJL_locals_store');
Route::get('ccjl/local/show/{id}','ccjl\products\ccjlLocalController@show')->name('CCJL_locals_show');
Route::get('ccjl/local/{id}/edit','ccjl\products\ccjlLocalController@edit')->name('CCJL_locals_edit');
Route::put('ccjl/local/{id}','ccjl\products\ccjlLocalController@update')->name('CCJL_locals_update');

// SERVICES
Route::get('ccjl/service','ccjl\products\ccjlServiceController@index')->name('CCJL_services');
Route::get('ccjl/service/create','ccjl\products\ccjlServiceController@create')->name('CCJL_services_create');
Route::post('ccjl/service','ccjl\products\ccjlServiceController@store')->name('CCJL_services_store');
Route::get('ccjl/service/show/{id}','ccjl\products\ccjlServiceController@show')->name('CCJL_services_show');
Route::get('ccjl/service/{id}/edit','ccjl\products\ccjlServiceController@edit')->name('CCJL_services_edit');
Route::put('ccjl/service/{id}','ccjl\products\ccjlServiceController@update')->name('CCJL_services_update');
Route::delete('ccjl/service/{id}','ccjl\products\ccjlServiceController@destroy')->name('CCJL_services_delete');

// ADMINISTRATION
Route::get('ccjl/administration','ccjl\products\ccjlAdministrationController@index')->name('CCJL_administrations');
Route::get('ccjl/administration/create','ccjl\products\ccjlAdministrationController@create')->name('CCJL_administrations_create');
Route::post('ccjl/administration','ccjl\products\ccjlAdministrationController@store')->name('CCJL_administrations_store');
Route::get('ccjl/administration/show/{id}','ccjl\products\ccjlAdministrationController@show')->name('CCJL_administrations_show');
Route::get('ccjl/administration/{id}/edit','ccjl\products\ccjlAdministrationController@edit')->name('CCJL_administrations_edit');
Route::put('ccjl/administration/{id}','ccjl\products\ccjlAdministrationController@update')->name('CCJL_administrations_update');

// Inventario
// computers
Route::get('invetory/computer','inventory\computerController@index')->name('inv_computer');
Route::get('invetory/computer/create','inventory\computerController@create')->name('inv_computer_create');
Route::post('invetory/computer','inventory\computerController@store')->name('inv_computer_store');
Route::get('invetory/computer/show/{id}','inventory\computerController@show')->name('inv_computer_show');
Route::get('invetory/computer/{id}/edit','inventory\computerController@edit')->name('inv_computer_edit');
Route::put('invetory/computer/{id}','inventory\computerController@update')->name('inv_computer_update');
Route::delete('invetory/computer/{id}','inventory\computerController@destroy')->name('inv_computer_delete');

//vehicles
Route::get('invetory/vehicle','inventory\vehicleController@index')->name('inv_vehicle');
Route::get('invetory/vehicle/create','inventory\vehicleController@create')->name('inv_vehicle_create');
Route::post('invetory/vehicle','inventory\vehicleController@store')->name('inv_vehicle_store');
Route::get('invetory/vehicle/show/{id}','inventory\vehicleController@show')->name('inv_vehicle_show');
Route::get('invetory/vehicle/{id}/edit','inventory\vehicleController@edit')->name('inv_vehicle_edit');
Route::put('invetory/vehicle/{id}','inventory\vehicleController@update')->name('inv_vehicle_update');
Route::delete('invetory/vehicle/{id}','inventory\vehicleController@destroy')->name('inv_vehicle_delete');

// clearings
Route::get('project/clearing','projects\clearingController@index')->name('clearings');
Route::get('project/clearing/create','projects\clearingController@create')->name('clearings_create');
Route::post('project/clearing','projects\clearingController@store')->name('clearings_store');
Route::get('project/clearing/create/{id}','projects\clearingController@create2')->name('clearings_create2');
Route::post('project/clearing/{id}','projects\clearingController@store2')->name('clearings_store2');
Route::get('project/clearing/create3/{id}','projects\clearingController@create3')->name('clearings_create3');
Route::post('project/clearing/create3/{id}','projects\clearingController@store3')->name('clearings_store3');
Route::get('project/clearing/show/{id}','projects\clearingController@show')->name('clearings_show');
Route::get('project/clearing/{id}/edit','projects\clearingController@edit')->name('clearings_edit');
Route::put('project/clearing/{id}','projects\clearingController@update')->name('clearings_update');
Route::put('project/clearing/{id}/approval','projects\clearingController@approval')->name('clearings_approval');
Route::put('project/clearing/{id}/not_approval','projects\clearingController@not_approval')->name('clearings_not_approval');
Route::delete('project/clearing/{id}','projects\clearingController@destroy')->name('clearings_delete');
Route::post('project/clearings/upload_file','projects\clearingController@upload_file')->name('clearings_upload');
Route::get('project/clearings/export/{id}','projects\clearingController@export')->name('clearings_export');

//Water Mark Image
Route::get('project/mintic/ec','projects\MinticController@index')->name('mintic');
Route::get('project/mintic/ec/show/{id}','projects\MinticController@show')->name('mintic_show');
Route::get('project/mintic/ec/create','projects\MinticController@create')->name('mintic_create');
// Route::get('project/mintic/ec/create2/{id}','projects\MinticController@create2')->name('mintic_create2');
Route::post('project/mintic/ec/store','projects\MinticController@store')->name('mintic_store');
// Route::post('project/mintic/ec/store2/{id}','projects\MinticController@store2')->name('mintic_store2');
Route::get('project/mintic/ec/{id}/edit','projects\MinticController@edit')->name('mintic_edit');
Route::put('project/mintic/ec/{id}','projects\MinticController@update')->name('mintic_update');
Route::put('project/mintic/ec/approval/{id}','projects\MinticController@approval')->name('mintic_approval');
Route::put('project/mintic/ec/not_approval/{id}','projects\MinticController@not_approval')->name('mintic_not_approval');
Route::post('project/mintic/ec/upload','projects\MinticController@upload')->name('mintic_marke');
Route::delete('project/mintic/ec/{id}','projects\MinticController@destroy')->name('mintic_delete');
Route::get('project/mintic/ec/{id}','projects\MinticController@pintures')->name('mintic_pintures');
Route::get('project/mintic/install/{id}','projects\MinticController@install')->name('mintic_install');
Route::post('project/mintic/install','projects\MinticController@upload_install')->name('mintic_marke_install');
Route::get('project/mintic/tss/{id}','projects\MinticController@tss')->name('mintic_tss');
Route::post('project/mintic/tss','projects\MinticController@upload_tss')->name('mintic_marke_tss');

Route::get('project/mintic/add/{id}','projects\MinticImplementController@index')->name('mintic_add_consumables');
Route::get('project/mintic/add/{id}/show/{item}','projects\MinticImplementController@show')->name('mintic_add_consumables_show');
Route::get('project/mintic/add/{id}/create','projects\MinticImplementController@create')->name('mintic_add_consumables_create');
Route::post('project/mintic/add/{id}','projects\MinticImplementController@store')->name('mintic_add_consumables_store');
Route::get('project/mintic/add/{id}/{item}/edit','projects\MinticImplementController@edit')->name('mintic_add_consumables_edit');
Route::put('project/mintic/add/{id}/{item}','projects\MinticImplementController@update')->name('mintic_add_consumables_update');
Route::get('project/mintic/add/{id}/{item}','projects\MinticImplementController@run')->name('mintic_add_consumables_run');
Route::patch('project/mintic/add/{id}/{item}','projects\MinticImplementController@save')->name('mintic_add_consumables_save');
Route::post('project/mintic/add/{id}/{item}/approve','projects\MinticImplementController@approve')->name('mintic_add_consumables_approve');
Route::delete('project/mintic/add/{id}/{item}','projects\MinticImplementController@delete')->name('mintic_add_consumables_delete');

//Rutas
Route::get('project/routes','projects\RoutesProjectController@index')->name('routes');
Route::get('project/routes/show/{id}','projects\RoutesProjectController@show')->name('routes_show');
Route::get('project/routes/create','projects\RoutesProjectController@create')->name('routes_create');
Route::post('project/routes/store','projects\RoutesProjectController@store')->name('routes_store');
Route::get('project/routes/{id}/edit','projects\RoutesProjectController@edit')->name('routes_edit');
Route::put('project/routes/{id}','projects\RoutesProjectController@update')->name('routes_update');
Route::put('project/routes/approval/{id}','projects\RoutesProjectController@approval')->name('routes_approval');
Route::put('project/routes/not_approval/{id}','projects\RoutesProjectController@not_approval')->name('routes_not_approval');
Route::delete('project/routes/{id}','projects\RoutesProjectController@destroy')->name('routes_delete');

//minor box
Route::get('human_management/bonus/minor_box','human_management\bonus\MinorBoxController@index')->name('bonus_minor_box');
Route::get('human_management/bonus/minor_box/create','human_management\bonus\MinorBoxController@create')->name('bonus_minor_box_create');
Route::post('human_management/bonus/minor_box','human_management\bonus\MinorBoxController@store')->name('bonus_minor_box_store');
Route::get('human_management/bonus/minor_box/{id}','human_management\bonus\MinorBoxController@show')->name('bonus_minor_box_show');
Route::get('human_management/bonus/minor_box/{id}/edit','human_management\bonus\MinorBoxController@edit')->name('bonus_minor_box_edit');
Route::put('human_management/bonus/minor_box/{id}','human_management\bonus\MinorBoxController@update')->name('bonus_minor_box_update');
Route::get('human_management/bonus/minor_box/{id}/export','human_management\bonus\MinorBoxController@export')->name('bonus_minor_box_export');
Route::post('human_management/bonus/minor_box/add_user','human_management\bonus\MinorBoxController@add_user')->name('bonus_minor_box_add_user');

// inventarios de equipos
Route::get('project/mintic/inventory/equipment','projects\inventory\EquipmentController@index')->name('mintic_inventory_equipment');
Route::get('project/mintic/inventory/equipment/create','projects\inventory\EquipmentController@create')->name('mintic_inventory_equipment_create');
Route::post('project/mintic/inventory/equipment','projects\inventory\EquipmentController@store')->name('mintic_inventory_equipment_store');
Route::get('project/mintic/inventory/equipment/{id}','projects\inventory\EquipmentController@show')->name('mintic_inventory_equipment_show');
Route::get('project/mintic/inventory/equipment/{id}/edit','projects\inventory\EquipmentController@edit')->name('mintic_inventory_equipment_edit');
Route::put('project/mintic/inventory/equipment/{id}','projects\inventory\EquipmentController@update')->name('mintic_inventory_equipment_update');
Route::delete('project/mintic/inventory/equipment/{id}','projects\inventory\EquipmentController@destroy')->name('mintic_inventory_equipment_delete');

//Inventarios de consumible
Route::get('project/mintic/inventory/consumable','projects\inventory\ConsumablesController@index')->name('mintic_inventory_consumables');
Route::get('project/mintic/inventory/consumable/create','projects\inventory\ConsumablesController@create')->name('mintic_inventory_consumables_create');
Route::post('project/mintic/inventory/consumable','projects\inventory\ConsumablesController@store')->name('mintic_inventory_consumables_store');
Route::get('project/mintic/inventory/consumable/{id}','projects\inventory\ConsumablesController@show')->name('mintic_inventory_consumables_show');
Route::get('project/mintic/inventory/consumable/{id}/edit','projects\inventory\ConsumablesController@edit')->name('mintic_inventory_consumables_edit');
Route::put('project/mintic/inventory/consumable/{id}','projects\inventory\ConsumablesController@update')->name('mintic_inventory_consumables_update');
Route::delete('project/mintic/inventory/consumable/{id}','projects\inventory\ConsumablesController@destroy')->name('mintic_inventory_consumables_delete');

//Inventario de herramientas
Route::get('execution_works/inventory/tool','execution_works\invToolController@index')->name('inventory_tools');
Route::get('execution_works/inventory/tool/create','execution_works\invToolController@create')->name('inventory_tools_create');
Route::post('execution_works/inventory/tool','execution_works\invToolController@store')->name('inventory_tools_store');
Route::get('execution_works/inventory/tool/{id}','execution_works\invToolController@show')->name('inventory_tools_show');
Route::get('execution_works/inventory/tool/{id}/edit','execution_works\invToolController@edit')->name('inventory_tools_edit');
Route::put('execution_works/inventory/tool/{id}','execution_works\invToolController@update')->name('inventory_tools_update');
Route::delete('execution_works/inventory/tool/{id}','execution_works\invToolController@destroy')->name('inventory_tools_delete');

// actas
Route::get('human_management/proceeding','human_management\proceedingController@index')->name('proceeding');
Route::get('human_management/proceeding/create','human_management\proceedingController@create')->name('proceeding_create');
Route::post('human_management/proceeding','human_management\proceedingController@store')->name('proceeding_store');
Route::get('human_management/proceeding/show/{id}','human_management\proceedingController@show')->name('proceeding_show');
Route::patch('human_management/proceeding/signature/{id}','human_management\proceedingController@signature')->name('proceeding_signature');
Route::get('human_management/proceeding/{id}/edit','human_management\proceedingController@edit')->name('proceeding_edit');
Route::put('human_management/proceeding/{id}','human_management\proceedingController@update')->name('proceeding_update');
Route::get('human_management/proceeding/download/{id}','human_management\proceedingController@download')->name('proceeding_download');
Route::delete('human_management/proceeding/{id}','human_management\proceedingController@destroy')->name('proceeding_delete');

//Liquidacion
Route::get('human_management/settlement','human_management\settlementController@index')->name('settlement');
Route::get('human_management/settlement/create','human_management\settlementController@create')->name('settlement_create');
Route::post('human_management/settlement','human_management\settlementController@store')->name('settlement_store');
Route::get('human_management/settlement/show/{id}','human_management\settlementController@show')->name('settlement_show');
Route::patch('human_management/settlement/{id}','human_management\settlementController@approve')->name('settlement_approve');
Route::get('human_management/settlement/{id}/edit','human_management\settlementController@edit')->name('settlement_edit');
Route::put('human_management/settlement/{id}','human_management\settlementController@update')->name('settlement_update');
Route::get('human_management/settlement/download/{id}','human_management\settlementController@download')->name('settlement_download');
Route::delete('human_management/settlement/{id}','human_management\settlementController@destroy')->name('settlement_delete');

//Bonificaciones a administrativos y conductores
Route::get('human_management/bonus/administratives','human_management\adminBonusesController@index')->name('admin_bonuses');
Route::get('human_management/bonus/administratives/create','human_management\adminBonusesController@create')->name('admin_bonuses_create');
Route::post('human_management/bonus/administratives','human_management\adminBonusesController@store')->name('admin_bonuses_store');
Route::get('human_management/bonus/administratives/show/{id}','human_management\adminBonusesController@show')->name('admin_bonuses_show');
Route::patch('human_management/bonus/administratives/{id}','human_management\adminBonusesController@approve')->name('admin_bonuses_approve');
Route::get('human_management/bonus/administratives/{id}/edit','human_management\adminBonusesController@edit')->name('admin_bonuses_edit');
Route::put('human_management/bonus/administratives/{id}','human_management\adminBonusesController@update')->name('admin_bonuses_update');
Route::get('human_management/bonus/administratives/download/{id}','human_management\adminBonusesController@download')->name('admin_bonuses_download');
Route::delete('human_management/bonus/administratives/{id}','human_management\adminBonusesController@destroy')->name('admin_bonuses_delete');

// Acciones de mejora
Route::get('human_management/improvement_action','human_management\improvementActionController@index')->name('improvement_action');
Route::get('human_management/improvement_action/create','human_management\improvementActionController@create')->name('improvement_action_create');
Route::post('human_management/improvement_action','human_management\improvementActionController@store')->name('improvement_action_store');
Route::get('human_management/improvement_action/show/{id}','human_management\improvementActionController@show')->name('improvement_action_show');
Route::patch('human_management/improvement_action/{id}','human_management\improvementActionController@approve')->name('improvement_action_approve');
Route::get('human_management/improvement_action/{id}/edit','human_management\improvementActionController@edit')->name('improvement_action_edit');
Route::put('human_management/improvement_action/{id}','human_management\improvementActionController@update')->name('improvement_action_update');
Route::get('human_management/improvement_action/download/{id}','human_management\improvementActionController@download')->name('improvement_action_download');
Route::delete('human_management/improvement_action/{id}','human_management\improvementActionController@destroy')->name('improvement_action_delete');

//AutoForms
Route::get('forms','forms\formController@index')->name("forms");
Route::get('forms/create','forms\formController@create')->name("form_create");
Route::get('forms/{id}','forms\formController@show')->name("forms_show");
Route::get('forms/{id}/edit','forms\formController@edit')->name("forms_edit");
Route::get('forms/{id}/answer','forms\formController@answer')->name("forms_answer");
Route::post('forms','forms\formController@store')->name("forms_store");
Route::put('forms/{id}','forms\formController@update')->name("forms_update");
Route::delete('forms/{id}','forms\formController@delete')->name("forms_delete");
Route::get('forms/export/{id}','forms\formController@export')->name("forms_export");
Route::post('forms/{user}','forms\formController@resend')->name("forms_resend");

Route::get('answers','forms\answerController@index')->name("answers");
Route::get('answers/{id}','forms\answerController@show')->name("answers_show")->middleware('auth')->middleware('verified');
Route::get('answer/{form}/{email?}','forms\answerController@create')->name("answers_create");
Route::get('answers/auth/{form}/{email?}','forms\answerController@forAuth')->name("answers_to_auth")->middleware('auth')->middleware('verified');
Route::post('answers','forms\answerController@store')->name("answers_store");
Route::get('answers/guest/ready','forms\answerController@ready')->name("answers_ready");
Route::delete('answers/{id}','forms\answerController@delete')->name("answers_delete");
Route::get('answers/login/{form}','forms\answerController@register_email')->name("answers_email");
Route::post('answers/login/{form}','forms\answerController@register_email_store')->name("answers_email_store");

Route::get('human_management/assistance','human_management\assistanceController@index')->name('assistance');
Route::get('human_management/assistance/create','human_management\assistanceController@create')->name('assistance_create');
Route::post('human_management/assistance','human_management\assistanceController@store')->name('assistance_store');
Route::get('human_management/assistance/show/{id}','human_management\assistanceController@show')->name('assistance_show');
Route::patch('human_management/assistance/{id}','human_management\assistanceController@approve')->name('assistance_approve');
Route::get('human_management/assistance/{id}/edit','human_management\assistanceController@edit')->name('assistance_edit');
Route::put('human_management/assistance/{id}','human_management\assistanceController@update')->name('assistance_update');
Route::get('human_management/assistance/download/{id}','human_management\assistanceController@download')->name('assistance_download');
Route::delete('human_management/assistance/{id}','human_management\assistanceController@destroy')->name('assistance_delete');