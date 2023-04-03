<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrganizationRoleController;
use App\Http\Controllers\CompanyLocationController;
use App\Http\Controllers\CompanyLocationTypeController;
use App\Http\Controllers\MediumOfInstructionController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\EducationLevelController;
use App\Http\Controllers\DocumentTypeController;
use App\Http\Controllers\AssetBrandController;
use App\Http\Controllers\AssetTypeController;
use App\Http\Controllers\AssetSubTypeController;
use App\Http\Controllers\CurrentResidenceTypeController;
use App\Http\Controllers\ModeOfTransportationController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\ProfessionalController;
use App\Http\Controllers\ContactController;





//====================================Admin Panel Start-----=====================================================
Route::get('login',[LoginController::class,'create'])->name('login');
Route::post('authnication',[LoginController::class,'login'])->name('authnication');

Route::group(['middleware'=>['afterlogin']], function()
{
    
    Route::get('/logout',[LoginController::class,'logout'])->name('Logout');
    Route::get('/employee-dashboard', function () {return view('employee.modules.dashboard');})->name('employee.dashboard');

    Route::get('/add-employee', function () {return view('employee.modules.employee.add-employees');})->name('employee.create');

    Route::get('/admin-dashboard', function () {return view('admin.modules.dashboard');})->name('admin.dashboard');
    

    /* ----------------- ----------   department start  -------------------------*/
    Route::group(['prefix'=>'department/','middleware'=>[],'as'=>'department.'], function(){
      Route::get('add',[DepartmentController::class,'create'])->name('create');
      Route::post('save',[DepartmentController::class,'store'])->name('add');
      Route::get('list',[DepartmentController::class,'index'])->name('index');
      Route::get('show/{id}',[DepartmentController::class,'show'])->name('show');
      Route::get('edit/{id}',[DepartmentController::class,'edit'])->name('edit');
      Route::post('update/{id}',[DepartmentController::class,'update'])->name('update');
      Route::get('status/{id}',[DepartmentController::class,'status'])->name('status');
     
      
    });
    /* ----------------- ----------   department end  -------------------------*/

    /* ----------------- ----------   designation start  -------------------------*/
    Route::group(['prefix'=>'designation/','middleware'=>[],'as'=>'designation.'], function(){
      Route::get('/add',[DesignationController::class,'create'])->name('create');
      Route::post('/save',[DesignationController::class,'store'])->name('add');
      Route::get('/list',[DesignationController::class,'index'])->name('index');
      Route::get('/show/{id}',[DesignationController::class,'show'])->name('show');
      Route::get('/edit/{id}',[DesignationController::class,'edit'])->name('edit');
      Route::post('/update/{id}',[DesignationController::class,'update'])->name('update');
      Route::get('/status/{id}',[DesignationController::class,'status'])->name('status');
    }); 
    /* ----------------- ----------   designation end  -------------------------*/

     /* ----------------- ----------   Organization_Role start  -------------------------*/
      Route::group(['prefix'=>'organization-role/','middleware'=>[],'as'=>'organization_role.'],function(){
         Route::get('/add',[OrganizationRoleController::class,'create'])->name('create');
         Route::post('/save',[OrganizationRoleController::class,'store'])->name('add');
         Route::get('/list',[OrganizationRoleController::class,'index'])->name('index');
         Route::get('/show/{id}',[OrganizationRoleController::class,'show'])->name('show');
         Route::get('/edit/{id}',[OrganizationRoleController::class,'edit'])->name('edit');
         Route::post('/update/{id}',[OrganizationRoleController::class,'update'])->name('update');
         Route::get('/status/{id}',[OrganizationRoleController::class,'status'])->name('status');
      });  
     /* ----------------- ----------   Organization_Role end  -------------------------*/

     /* ----------------- ----------  company location start  -------------------------*/
        Route::group(['prefix'=>'company-location/','middleware'=>[],'as'=>'company_location.'], function(){
            Route::get('/add',[CompanyLocationController::class,'create'])->name('create');
            Route::post('/save',[CompanyLocationController::class,'store'])->name('add');
            Route::get('/list',[CompanyLocationController::class,'index'])->name('index');
            Route::get('/show/{id}',[CompanyLocationController::class,'show'])->name('show');
            Route::get('/edit/{id}',[CompanyLocationController::class,'edit'])->name('edit');
            Route::post('/update/{id}',[CompanyLocationController::class,'update'])->name('update');
            Route::get('/status/{id}',[CompanyLocationController::class,'status'])->name('status');
     });
     /* ----------------- ----------   company location end  -------------------------*/

      /* ----------------- ---------- company location type start  -------------------------*/
        Route::group(['prefix'=>'company-location-type/','middleware'=>[],'as'=>'company_location_type.'], function(){
            Route::get('/add',[CompanyLocationTypeController::class,'create'])->name('create');
            Route::post('/save',[CompanyLocationTypeController::class,'store'])->name('add');
            Route::get('/list',[CompanyLocationTypeController::class,'index'])->name('index');
            Route::get('/show/{id}',[CompanyLocationTypeController::class,'show'])->name('show');
            Route::get('/edit/{id}',[CompanyLocationTypeController::class,'edit'])->name('edit');
            Route::post('/update/{id}',[CompanyLocationTypeController::class,'update'])->name('update');
            Route::get('/status/{id}',[CompanyLocationTypeController::class,'status'])->name('status');
        });
     /* ----------------- ---------- company  location type end  -------------------------*/

     /* ----------------- ---------- medium of instruction type start  -------------------------*/
     Route::group(['prefix'=>'medium-instruction-type/','middleware'=>[],'as'=>'medium_instruction.'], function(){
        Route::get('/add',[MediumOfInstructionController::class,'create'])->name('create');
        Route::post('/save',[MediumOfInstructionController::class,'store'])->name('add');
        Route::get('/list',[MediumOfInstructionController::class,'index'])->name('index');
        Route::get('/show/{id}',[MediumOfInstructionController::class,'show'])->name('show');
        Route::get('/edit/{id}',[MediumOfInstructionController::class,'edit'])->name('edit');
        Route::post('/update/{id}',[MediumOfInstructionController::class,'update'])->name('update');
        Route::get('/status/{id}',[MediumOfInstructionController::class,'status'])->name('status');
     });
    /* ----------------- ----------medium of instruction type end  -------------------------*/

    /* ----------------- ---------- Langauge start  -------------------------*/
     Route::group(['prefix'=>'language/','middleware'=>[],'as'=>'language.'], function(){
        Route::get('/add',[LanguageController::class,'create'])->name('create');
        Route::post('/save',[LanguageController::class,'store'])->name('add');
        Route::get('/list',[LanguageController::class,'index'])->name('index');
        Route::get('/show/{id}',[LanguageController::class,'show'])->name('show');
        Route::get('/edit/{id}',[LanguageController::class,'edit'])->name('edit');
        Route::post('/update/{id}',[LanguageController::class,'update'])->name('update');
        Route::get('/status/{id}',[LanguageController::class,'status'])->name('status');
     });
    /* ----------------- ----------Langauge end  -------------------------*/

    /* ----------------- ---------- Education Level start  -------------------------*/
    Route::group(['prefix'=>'education-level/','middleware'=>[],'as'=>'education_level.'], function(){
        Route::get('/add',[EducationLevelController::class,'create'])->name('create');
        Route::post('/save',[EducationLevelController::class,'store'])->name('add');
        Route::get('/list',[EducationLevelController::class,'index'])->name('index');
        Route::get('/show/{id}',[EducationLevelController::class,'show'])->name('show');
        Route::get('/edit/{id}',[EducationLevelController::class,'edit'])->name('edit');
        Route::post('/update/{id}',[EducationLevelController::class,'update'])->name('update');
        Route::get('/status/{id}',[EducationLevelController::class,'status'])->name('status');
     });
    /* ----------------- ---------- Education Level end  -------------------------*/

     /* ----------------- ---------- Document Type start  -------------------------*/
     Route::group(['prefix'=>'document-type/','middleware'=>[],'as'=>'document_type.'], function(){
      Route::get('/add',[DocumentTypeController::class,'create'])->name('create');
      Route::post('/save',[DocumentTypeController::class,'store'])->name('add');
      Route::get('/list',[DocumentTypeController::class,'index'])->name('index');
      Route::get('/show/{id}',[DocumentTypeController::class,'show'])->name('show');
      Route::get('/edit/{id}',[DocumentTypeController::class,'edit'])->name('edit');
      Route::post('/update/{id}',[DocumentTypeController::class,'update'])->name('update');
      Route::get('/status/{id}',[DocumentTypeController::class,'status'])->name('status');
   });
  /* ----------------- ---------- Document Type end  -------------------------*/

  
     /* ----------------- ---------- Asset Brand start  -------------------------*/
     Route::group(['prefix'=>'asset-brand/','middleware'=>[],'as'=>'asset_brand.'], function(){
      Route::get('/add',[AssetBrandController::class,'create'])->name('create');
      Route::post('/save',[AssetBrandController::class,'store'])->name('add');
      Route::get('/list',[AssetBrandController::class,'index'])->name('index');
      Route::get('/show/{id}',[AssetBrandController::class,'show'])->name('show');
      Route::get('/edit/{id}',[AssetBrandController::class,'edit'])->name('edit');
      Route::post('/update/{id}',[AssetBrandController::class,'update'])->name('update');
      Route::get('/status/{id}',[AssetBrandController::class,'status'])->name('status');
   });
  /* ----------------- ----------  Asset Brand end  -------------------------*/

  /* ----------------- ---------- Asset Type  start  -------------------------*/
  Route::group(['prefix'=>'asset-type/','middleware'=>[],'as'=>'asset_type.'], function(){
   Route::get('/add',[AssetTypeController::class,'create'])->name('create');
   Route::post('/save',[AssetTypeController::class,'store'])->name('add');
   Route::get('/list',[AssetTypeController::class,'index'])->name('index');
   Route::get('/show/{id}',[AssetTypeController::class,'show'])->name('show');
   Route::get('/edit/{id}',[AssetTypeController::class,'edit'])->name('edit');
   Route::post('/update/{id}',[AssetTypeController::class,'update'])->name('update');
   Route::get('/status/{id}',[AssetTypeController::class,'status'])->name('status');
});
/* ----------------- ----------  Asset  Type end  -------------------------*/


 /* ----------------- ---------- Asset sub Type  start  -------------------------*/
 Route::group(['prefix'=>'asset-sub-type/','middleware'=>[],'as'=>'asset_sub_type.'], function(){
   Route::get('/add',[AssetSubTypeController::class,'create'])->name('create');
   Route::post('/save',[AssetSubTypeController::class,'store'])->name('add');
   Route::get('/list',[AssetSubTypeController::class,'index'])->name('index');
   Route::get('/show/{id}',[AssetSubTypeController::class,'show'])->name('show');
   Route::get('/edit/{id}',[AssetSubTypeController::class,'edit'])->name('edit');
   Route::post('/update/{id}',[AssetSubTypeController::class,'update'])->name('update');
   Route::get('/status/{id}',[AssetSubTypeController::class,'status'])->name('status');
});
/* ----------------- ----------  Asset sub  Type end  -------------------------*/

 /* ----------------- ---------- current-residence-type   start  -------------------------*/
 Route::group(['prefix'=>'current-residence-type/','middleware'=>[],'as'=>'current_residence_type.'], function(){
   Route::get('/add',[CurrentResidenceTypeController::class,'create'])->name('create');
   Route::post('/save',[CurrentResidenceTypeController::class,'store'])->name('add');
   Route::get('/list',[CurrentResidenceTypeController::class,'index'])->name('index');
   Route::get('/show/{id}',[CurrentResidenceTypeController::class,'show'])->name('show');
   Route::get('/edit/{id}',[CurrentResidenceTypeController::class,'edit'])->name('edit');
   Route::post('/update/{id}',[CurrentResidenceTypeController::class,'update'])->name('update');
   Route::get('/status/{id}',[CurrentResidenceTypeController::class,'status'])->name('status');
});
/* ----------------- ----------  current-residence-type end  -------------------------*/

/* ----------------- ---------- mode of transportation   start  -------------------------*/
Route::group(['prefix'=>'mode-of-transportation/','middleware'=>[],'as'=>'mode_of_transportation.'], function(){
   Route::get('/add',[ModeOfTransportationController::class,'create'])->name('create');
   Route::post('/save',[ModeOfTransportationController::class,'store'])->name('add');
   Route::get('/list',[ModeOfTransportationController::class,'index'])->name('index');
   Route::get('/show/{id}',[ModeOfTransportationController::class,'show'])->name('show');
   Route::get('/edit/{id}',[ModeOfTransportationController::class,'edit'])->name('edit');
   Route::post('/update/{id}',[ModeOfTransportationController::class,'update'])->name('update');
   Route::get('/status/{id}',[ModeOfTransportationController::class,'status'])->name('status');
});
/* ----------------- ----------  mode of transportation end  -------------------------*/

/* -----------------==---------- Leave Type  start--------------------------*/
Route::group(['prefix'=>'leave-type/','middleware'=>[],'as'=>'leave_type.'], function(){
   Route::get('/add',[LeaveTypeController::class,'create'])->name('create');
   Route::post('/save',[LeaveTypeController::class,'store'])->name('add');
   Route::get('/list',[LeaveTypeController::class,'index'])->name('index');
   Route::get('/show/{id}',[LeaveTypeController::class,'show'])->name('show');
   Route::get('/edit/{id}',[LeaveTypeController::class,'edit'])->name('edit');
   Route::post('/update/{id}',[LeaveTypeController::class,'update'])->name('update');
   Route::get('/status/{id}',[LeaveTypeController::class,'status'])->name('status');
});
/* ------------------------------- Leave Type  end  ---------------------------*/

/* -----------------==---------- employee  start--------------------------*/
Route::group(['prefix'=>'employee/','middleware'=>[],'as'=>'employee.'], function(){
   Route::get('/add',[UserController::class,'create'])->name('create');
   Route::post('/save',[UserController::class,'store'])->name('add');
   Route::get('/list',[UserController::class,'index'])->name('index');
   Route::get('/edit/{id}',[UserController::class,'edit'])->name('edit');
   Route::get('/status/{id}',[UserController::class,'status'])->name('status');
 
   
});
/* ------------------------------- employee  end  ---------------------------*/


/* ------------------------------- get state city start ---------------------------*/
Route::get('/getStatee',[UserController::class,'getState'])->name('getstate');
Route::get('/getCitty',[UserController::class,'getCity'])->name('getcity');
/* ------------------------------- get state city end ---------------------------*/

/* -----------------==---------- personal details start--------------------------*/
Route::group(['prefix'=>'personal/','middleware'=>[],'as'=>'personal.'], function(){
 
   Route::post('save',[PersonalController::class,'personaldetailAdd'])->name('personaldetail.add');
   Route::post('edusave',[PersonalController::class,'educationAdd'])->name('education.add');
   Route::post('documentsave',[PersonalController::class,'documentAdd'])->name('document.add');
   Route::post('langauge/save',[PersonalController::class,'langaugeAdd'])->name('langauge.add');
   
   
});
/* ------------------------------- personal details end  ---------------------------*/

/* -----------------==---------- Organization details start--------------------------*/
Route::group(['prefix'=>'organization/','middleware'=>[],'as'=>'organization.'], function(){
 
   Route::post('jobprofile/save',[OrganizationController::class,'jobprofileAdd'])->name('jobprofile.add');
   Route::post('bandetail/save',[OrganizationController::class,'bankAdd'])->name('bank.add');
   Route::post('employment/save',[OrganizationController::class,'employmentAdd'])->name('employment.add');
   Route::post('location/save',[OrganizationController::class,'locationAdd'])->name('location.add');
   Route::post('asset/save',[OrganizationController::class,'assetAdd'])->name('asset.add');
   
   
});
/* ------------------------------- Organization details end  ---------------------------*/

/* -----------------==---------- professional details start--------------------------*/
Route::group(['prefix'=>'professional/','middleware'=>[],'as'=>'professional.'], function(){
 
   Route::post('professional/save',[ProfessionalController::class,'professionalAdd'])->name('professional.add');
   Route::post('workexperience/save',[ProfessionalController::class,'workexperienceAdd'])->name('workexperience.add');
   
   
});
/* ------------------------------- professional details end  ---------------------------*/

/* -----------------==---------- contact details start--------------------------*/
Route::group(['prefix'=>'contact/','middleware'=>[],'as'=>'contact.'], function(){
 
   Route::post('family/save',[ContactController::class,'familyAdd'])->name('family.add');
   Route::post('emergency/save',[ContactController::class,'emergencyAdd'])->name('emergency.add');
   
   
});
/* ------------------------------- contact details end  ---------------------------*/



});

//====================================Admin Panel end-----=====================================================

//====================================Employee Panel Start-----=====================================================

//====================================Employee Panel Start-----=====================================================
