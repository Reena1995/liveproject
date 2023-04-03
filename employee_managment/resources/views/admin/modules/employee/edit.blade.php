@extends('admin.common.master')
@section('content')
@php


$tabActiveDetail = '1'; 

$isTabAcitive = '1';
$tabActive = ''; 

$isTabAcitiveOrg = '1'; 
$tabActiveOrg = '';

$isTabAcitiveProf= '1'; 
$tabActiveprof = '';

$isTabAcitiveCont= '1'; 
$tabActivecont = '';
$submitFinal = false;

if(empty($personal_detail)){
    
    $tabActive = 'personal_detail';
}else if(empty($emp_education_detail)){
    
    $isTabAcitive = '2';
    $tabActive = 'education_detail';
}else if(empty($emp_document_detail)){
    
    $isTabAcitive = '3';
    $tabActive = 'document_detail';
}else if(empty($emp_language_detail)){
    
    $isTabAcitive = '4';
    $tabActive = 'language_detail';
}else{
    $isTabAcitive = '5';
    $tabActiveDetail = '2';


    if(empty($emp_job_profile)){

        $tabActiveOrg = 'jobprofile_detail';
    }else if(empty($emp_bank_profile)){

        $isTabAcitiveOrg = '2';

        $tabActiveOrg = 'bankprofile_detail';
    }else if(empty($employment_detail)){

        $isTabAcitiveOrg = '3';

        $tabActiveOrg = 'employment_detail';
    }
    else if(empty($emp_location_details)){

        $isTabAcitiveOrg = '4';

        $tabActiveOrg = 'location_detail';
    }
    else if(empty($empasset_detail)){

        $isTabAcitiveOrg = '5';

        $tabActiveOrg = 'empasset_detail';
    }   else{

        $isTabAcitiveOrg = '6'; 
        $tabActiveDetail = '3';


        if(!count($emp_professional_details)){

            $tabActiveprof = 'professional_detail';

        }else if(!count($emp_work_exp_details)){

            $isTabAcitiveProf = '2';

            $tabActiveprof = 'workexp_detail';


        }else{

            $isTabAcitiveProf = '3'; 

            $tabActiveDetail = '4';



            if(!count($family_details)){

                $tabActivecont = 'family_detail';

            }else if(!count($emergency_details)){

                $isTabAcitiveCont = '2';
                
                $tabActivecont = 'emergency_detail';
                $submitFinal = 'true';
                
                
                
            }else{
                
                $tabActivecont = 'final_detail';
                $isTabAcitiveCont = '3'; 

                $tabActiveDetail = '4';
            }    
        }
    }

}
    @endphp
    
<section class="admin-content edit-section">
                <!-- BEGIN PlACE PAGE CONTENT HERE -->
                <!--  container or container-fluid as per your need           -->
                <div class="container-fluid p-t-20 edit-tab-section">
                    <div class="row d-flex align-items-baseline">
                        <div class="col-lg-3 col-md-4 col-sm-12 d-flex">
                            <div class="tab-form card">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link {{($tabActiveDetail == 1) ? 'active' : ''}}" id="v-pills-personal-tab" data-toggle="pill" href="#v-pills-personal" role="tab" aria-controls="v-pills-personal" aria-selected="true">Personal Details</a>
                                    <a class="nav-link {{($tabActiveDetail == 2) ? 'active' : ''}} {{ ($tabActiveDetail < 2)  ? 'disabled' : '' }}" id="v-pills-organization-tab" data-toggle="pill" href="#v-pills-organization" role="tab" aria-controls="v-pills-organization" aria-selected="false">Organization Details</a>
                                    <a class="nav-link {{($tabActiveDetail == 3) ? 'active' : ''}} {{ ($tabActiveDetail < 3)  ? 'disabled' : '' }}" id="v-pills-professional-tab" data-toggle="pill" href="#v-pills-professional" role="tab" aria-controls="v-pills-professional" aria-selected="false">Professional Details</a>
                                    <a class="nav-link {{($tabActiveDetail == 4) ? 'active' : ''}} {{ ($tabActiveDetail < 4)  ? 'disabled' : '' }}" id="v-pills-contact-tab" data-toggle="pill" href="#v-pills-contact" role="tab" aria-controls="v-pills-contact" aria-selected="false">Contact Details</a>
                                </div>
                            </div>
                        </div>
                            <div class="col-lg-9 col-md-6 col-sm-12 d-flex">
                                <div class="tab-content card" id="v-pills-tabContent">
                                    <div class="tab-pane fade {{($tabActiveDetail == 1) ? 'show active' : ''}}" id="v-pills-personal" role="tabpanel" aria-labelledby="v-pills-personal-tab">
                                        <div class="card-body">
                                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link {{ ($tabActive == 'personal_detail') ? 'active' : '' }} {{ ($isTabAcitive == 5)  ? 'active' : '' }} " id="personal-details-tab-z" data-toggle="tab" href="#personal-details" role="tab" aria-controls="personal-details" aria-selected="true">Personal Details</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link  {{ ($tabActive == 'education_detail')  ? 'active' : '' }} {{ ($isTabAcitive < 2)  ? 'disabled' : '' }} {{ ($isTabAcitive <=  5)  ? '' : 'disabled' }}"  id="education-details-tab-z" data-toggle="tab" href="#education-details" role="tab" aria-controls="education-details" aria-selected="false">Education Details</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link {{ ($tabActive == 'document_detail') ? 'active' : '' }} {{ ($isTabAcitive < 3) ? 'disabled' : '' }}  {{ ($isTabAcitive <= 5)  ? '' : 'disabled' }}  "  id="document-details-tab-z" data-toggle="tab" href="#document-details" role="tab" aria-controls="document-details" aria-selected="false">Document Details</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link {{ ($tabActive == 'language_detail') ? 'active' : '' }} {{ ($isTabAcitive < 4) ? 'disabled' : '' }} {{ ($isTabAcitive <= 5)  ? '' : 'disabled' }}" id="langauge-tab-z" data-toggle="tab" href="#langauge" role="tab" aria-controls="langauge" aria-selected="false">Langauge Details</a>
                                                    </li>
                                                    
                                                </ul>
                                                
                                                    <div class="tab-content" id="myTabContent1">
                                                        <div class="tab-pane fade {{ (($tabActive == 'personal_detail') || ($isTabAcitive == 5))  ? 'show active' : '' }}" id="personal-details" role="tabpanel" aria-labelledby="personal-details-tab">
                                                            <h5 class="font-weight-semibold p-t-20 m-b-20">Basic</h5>
                                                            @include('admin.modules.employee.personal.personaldetail')
                                                        </div>
                                                        <div class="tab-pane fade {{ ($tabActive == 'education_detail') ? 'show active' : '' }} 
                                                        " id="education-details" role="tabpanel" aria-labelledby="education-details-tab">
                                                            <h5 class="font-weight-semibold p-t-20 m-b-20">Basic2</h5>
                                                        
                                                            @include('admin.modules.employee.personal.education')
                                                            
                                                        </div>
                                                        <div class="tab-pane fade {{ ($tabActive == 'document_detail') ? 'show active' : '' }}" id="document-details" role="tabpanel" aria-labelledby="document-details-tab">
                                                            <h5 class="font-weight-semibold p-t-20 m-b-20">Basic</h5>
                                                            @include('admin.modules.employee.personal.document')
                                                            
                                                        </div>
                                                        <div class="tab-pane fade {{ ($tabActive == 'language_detail') ? 'show active' : '' }}" id="langauge" role="tabpanel" aria-labelledby="langauge-tab">
                                                            <h5 class="font-weight-semibold p-t-20 m-b-20">Details</h5>
                                                            @include('admin.modules.employee.personal.language')
                                                            
                                                        </div>
                                                    </div>
                                                
                                        </div>
                                    </div>
                                    <div class="tab-pane fade {{($tabActiveDetail == 2) ? 'show active' : ''}}" id="v-pills-organization" role="tabpanel" aria-labelledby="v-pills-organization-tab">
                                        <div class="card-body">
                                                <ul class="nav nav-tabs" id="myTab1" role="tablist">
                                                    
                                                    <li class="nav-item">
                                                        <a class="nav-link {{ ($tabActiveOrg == 'jobprofile_detail') ? 'active' : '' }}  {{ ($isTabAcitiveOrg == 6)  ? 'active' : '' }}" id="jobprofile-details-tab-z" data-toggle="tab" href="#jobprofile-details" role="tab" aria-controls="jobprofile-details" aria-selected="true">Job Profile Details</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link  {{ ($tabActiveOrg == 'bankprofile_detail')  ? 'active' : '' }} {{ ($isTabAcitiveOrg < 2)  ? 'disabled' : '' }} {{ ($isTabAcitiveOrg <= 6)  ? '' : 'disabled' }} " id="bank-details-tab-z" data-toggle="tab" href="#bank-details" role="tab" aria-controls="bank-details" aria-selected="false">Bank Details</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link  {{ ($tabActiveOrg == 'employment_detail')  ? 'active' : '' }} {{ ($isTabAcitiveOrg < 3)  ? 'disabled' : '' }} {{ ($isTabAcitiveOrg <= 6)  ? '' : 'disabled' }}" id="employment-details-tab-z" data-toggle="tab" href="#employment-details" role="tab" aria-controls="employment-details" aria-selected="false">Employement Details</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link  {{ ($tabActiveOrg == 'location_detail')  ? 'active' : '' }} {{ ($isTabAcitiveOrg < 4)  ? 'disabled' : '' }} {{ ($isTabAcitiveOrg <= 6)  ? '' : 'disabled' }}" id="location_detail-tab-z" data-toggle="tab" href="#location_detail" role="tab" aria-controls="location_detail" aria-selected="false">Location Details</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link  {{ ($tabActiveOrg == 'empasset_detail')  ? 'active' : '' }} {{ ($isTabAcitiveOrg < 5)  ? 'disabled' : '' }} {{ ($isTabAcitiveOrg <= 6)  ? '' : 'disabled' }} " id="asset-details-tab-z" data-toggle="tab" href="#asset-details" role="tab" aria-controls="asset-details" aria-selected="false">Asset  Details</a>
                                                    </li>
                                                
                                                </ul>
                                            
                                                    <div class="tab-content" id="myTabContent1">
                                                        <div class="tab-pane fade show {{ (($tabActiveOrg == 'jobprofile_detail')|| ($isTabAcitiveOrg == 6)) ? 'show active' : '' }}" id="jobprofile-details" role="tabpanel" aria-labelledby="jobprofile-details-tab">
                                                            <h5 class="font-weight-semibold p-t-20 m-b-20">Basic job</h5>
                                                            @include('admin.modules.employee.organization.job_profile')
                                                            
                                                        </div>
                                                        <div class="tab-pane fade  {{ ($tabActiveOrg == 'bankprofile_detail') ? 'show active' : '' }}" id="bank-details" role="tabpanel" aria-labelledby="employment-details-tab">
                                                            <h5 class="font-weight-semibold p-t-20 m-b-20">Basic</h5>
                                                            @include('admin.modules.employee.organization.bank')

                                                            
                                                        </div>
                                                        <div class="tab-pane fade  {{ ($tabActiveOrg == 'employment_detail') ? 'show active' : '' }}" id="employment-details" role="tabpanel" aria-labelledby="asset-details-tab">
                                                            <h5 class="font-weight-semibold p-t-20 m-b-20">Basic asset</h5>
                                                            @include('admin.modules.employee.organization.employment')

                                                        </div>
                                                        <div class="tab-pane fade  {{ ($tabActiveOrg == 'location_detail') ? 'show active' : '' }}" id="location_detail" role="tabpanel" aria-labelledby="location_detail-tab">
                                                            <h5 class="font-weight-semibold p-t-20 m-b-20">locationDetails</h5>
                                                            @include('admin.modules.employee.organization.location')
                                                        </div>
                                                        <div class="tab-pane fade  {{ ($tabActiveOrg == 'empasset_detail') ? 'show active' : '' }}" id="asset-details" role="tabpanel" aria-labelledby="bank-details-tab">
                                                            <h5 class="font-weight-semibold p-t-20 m-b-20">asset Details</h5>
                                                            @include('admin.modules.employee.organization.asset')


                                                        </div>
                                                    </div>
                                                
                                        </div>
                                    
                                    </div>
                                    <div class="tab-pane fade {{($tabActiveDetail == 3) ? 'show active' : ''}}" id="v-pills-professional" role="tabpanel" aria-labelledby="v-pills-professional-tab">
                                        <div class="card-body">
                                            <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link {{ ($tabActiveprof == 'professional_detail') ? 'active' : '' }}  {{ ($isTabAcitiveProf == 3)  ? 'active' : '' }}" id="professional-details-tab-z" data-toggle="tab" href="#professional-details" role="tab" aria-controls="professional-details" aria-selected="true">Professional  Details</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link {{ ($tabActiveprof == 'workexp_detail')  ? 'active' : '' }} {{ ($isTabAcitiveProf < 2)  ? 'disabled' : '' }} " id="workexperies-details-tab-z" data-toggle="tab" href="#workexperies-details" role="tab" aria-controls="workexperies-details" aria-selected="false">Work ExperienceDetails</a>
                                                </li>
                                            </ul>
                                        
                                                <div class="tab-content" id="myTabContent3">
                                                    <div class="tab-pane fade show {{ (($tabActiveprof == 'professional_detail') || ($isTabAcitiveProf == 3)) ? 'show active' : '' }}" id="professional-details" role="tabpanel" aria-labelledby="professional-details-tab">
                                                        <h5 class="font-weight-semibold p-t-20 m-b-20">Basic job</h5>
                                                        @include('admin.modules.employee.professional.professional')
                                                        
                                                    </div>
                                                    <div class="tab-pane fade {{ ($tabActiveprof == 'workexp_detail') ? 'show active' : '' }}" id="workexperies-details" role="tabpanel" aria-labelledby="workexperies-details-tab">
                                                        <h5 class="font-weight-semibold p-t-20 m-b-20">Basic</h5>
                                                        @include('admin.modules.employee.professional.workexperience')
                                                        
                                                    </div>
                                                </div>
                                        
                                        </div>
                                    </div>
                                    <div class="tab-pane fade {{($tabActiveDetail == 4) ? 'show active' : ''}}" id="v-pills-contact" role="tabpanel" aria-labelledby="v-pills-contact-tab">
                                        <div class="card-body">
                                            <ul class="nav nav-tabs" id="myTab3" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link {{ ($tabActivecont == 'family_detail') ? 'active' : '' }}  " id="family-details-tab-z" data-toggle="tab" href="#family-details" role="tab" aria-controls="family-details" aria-selected="true">Family Details</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link {{ ($tabActivecont == 'emergency_detail')  ? 'active' : '' }} {{ ($isTabAcitiveCont < 2)  ? 'disabled' : '' }} {{ ($isTabAcitiveCont <= 3)  ? '' : 'disabled' }}" id="emergency-details-tab-z" data-toggle="tab" href="#emergency-details" role="tab" aria-controls="emergency-details" aria-selected="false">Emergency Details</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link {{ ($tabActivecont == 'final_detail')  ? 'active' : '' }} {{ ($isTabAcitiveCont < 3)  ? 'disabled' : '' }} {{ ($isTabAcitiveCont <= 3)  ? '' : 'disabled' }}" id="final-details-tab-z" data-toggle="tab" href="#final-details" role="tab" aria-controls="final-details" aria-selected="false">Submited</a>
                                                </li>
                                            </ul>
                                            
                                                <div class="tab-content" id="myTabContent3">
                                                    <div class="tab-pane fade show {{ ($tabActivecont == 'family_detail')  ? 'show active' : '' }}" id="family-details" role="tabpanel" aria-labelledby="family-details-tab">
                                                        <h5 class="font-weight-semibold p-t-20 m-b-20">Basic family</h5>
                                                        @include('admin.modules.employee.contact.family')
                                                        
                                                    </div>
                                                    <div class="tab-pane fade  {{ ($tabActivecont == 'emergency_detail') ? 'show active' : '' }}" id="emergency-details" role="tabpanel" aria-labelledby="emergency-details-tab">
                                                        <h5 class="font-weight-semibold p-t-20 m-b-20">Basic</h5>
                                                        @include('admin.modules.employee.contact.emergency')
                                                        
                                                    </div>
                                                    <div class="tab-pane fade  {{ ($tabActivecont == 'final_detail') ? 'show active' : '' }}" id="final-details" role="tabpanel" aria-labelledby="final-details-tab">
                                                        @include('admin.modules.employee.contact.final')
                                                        
                                                    </div>
                                                </div>
                                        
                                        </div>
                                    </div>
                                </div>
                                
                            
                            </div>
                        
                </div>
                <!-- END PLACE PAGE CONTENT HERE -->
            </section>
        
       	@endsection
 @push('scripts')
 <script>
       $(document).ready(function(){
            $("form[name='employee__add_form']").validate({
                rules : {
                    first_name : "required",  
                    last_name : "required",
                    company_mail : "required",  
                    mobile_no : "required",                    
                },
                messages : {
                    first_name : "Please Enter a First Name ",
                    last_name : "Please Enter  a Last Name ",
                    company_mail : "Please Enter an Email Id  ",
                    mobile_no : "Please Enter  a Mobile No ",  
                    
                },
                errorClass: "custom-error",
                errorElement: "div",
                errorPlacement: function(error, element) {
                    var placement = $(element).data('error');
                    if (placement) {
                        $(element).append(error)
                    } else {
                        console.log(element.prev());
                        error.insertAfter(element);
                    }
                },
                submitHandler : function(form){
                    form.submit();
                }
            });
        });
</script>         
 @endpush
