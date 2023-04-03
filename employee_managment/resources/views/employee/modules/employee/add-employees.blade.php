@extends('employee.common.master')
@section('content')
            <section class="admin-content">
                <!-- BEGIN PlACE PAGE CONTENT HERE -->
                <!--  container or container-fluid as per your need           -->
                <div class="container-fluid p-t-20">
                    <div class="row d-flex align-items-center">
                        <div class="col-6 m-b-20">
                            <h3>Add Employee</h3>
                        </div>
                        <div class="col-6 m-b-20 text-right pl-3 small-button">
                            <a href="all-employees.html"><button type="button" class="btn text-white add-new-emp">View Employee</button></a>
                            <div class="btn-group" role="group" aria-label="Third group">
                                <button type="button" class="btn btn-secondary"><i class="mdi mdi-18px mdi-email-open-outline"></i></button>
                                <button type="button" class="btn btn-secondary ml-2"><i class="mdi mdi-18px mdi-phone"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-md-12 col-12 m-b-30">
                            <!--card begins-->
                            <div class="card m-b-30">
                                <div class="card-header">
                                    <div class="card-title">Add Employee Details</div>
                                </div>
                                <div class="card-body">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="personal-details-tab-z" data-toggle="tab" href="#personal-details" role="tab" aria-controls="personal-details" aria-selected="true">Personal Details</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="company-details-tab-z" data-toggle="tab" href="#company-details" role="tab" aria-controls="company-details" aria-selected="false">Company Details</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="bank-details-tab-z" data-toggle="tab" href="#bank-details" role="tab" aria-controls="bank-details" aria-selected="false">Bank Details</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="upload-document-tab-z" data-toggle="tab" href="#upload-document" role="tab" aria-controls="upload-document" aria-selected="false">Upload Documents</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="asset-details-tab-z" data-toggle="tab" href="#asset-details" role="tab" aria-controls="asset-details" aria-selected="false">Asset Details</a>
                                        </li>
                                    </ul>
                                    <form action="#">
                                        <div class="tab-content" id="myTabContent1">
                                            <div class="tab-pane fade show active" id="personal-details" role="tabpanel" aria-labelledby="personal-details-tab">
                                                <h5 class="font-weight-semibold p-t-20 m-b-20">Basic</h5>
                                                <div class="form-row">
                                                    <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                        <label>First Name</label>
                                                        <input type="text" class="form-control form-control-lg" placeholder="Enter First Name" />
                                                    </div>
                                                    <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                        <label>Last Name</label>
                                                        <input type="text" class="form-control form-control-lg" placeholder="Enter Last Name" />
                                                    </div>
                                                    <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                        <label>Email Address</label>
                                                        <input type="email" class="form-control form-control-lg" placeholder="Enter Email Address" />
                                                    </div>
                                                    <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                        <label>Mobile Number</label>
                                                        <input type="number" class="form-control form-control-lg" placeholder="Enter Mobile Number" />
                                                    </div>
                                                    <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                        <label>Father Name</label>
                                                        <input type="text" class="form-control form-control-lg" placeholder="Enter Father Name" />
                                                    </div>
                                                    <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                        <label>Emergency Contact Number</label>
                                                        <input type="number" class="form-control form-control-lg" placeholder="Enter Emergency Contact Number" />
                                                    </div>
                                                    <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                        <label>Date Of Birth</label>
                                                        <input type="text" class="theme-date-picker form-control form-control-lg" placeholder="Select Date Of Birth" />
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                                        <label class="m-l-10">Gender</label>
                                                        <div class="d-flex row m-l-10">
                                                            <div class="custom-control custom-radio col-lg-2 col-md-4 col-6">
                                                                <input type="radio" id="maleradio" name="customRadio" class="custom-control-input" />
                                                                <label class="custom-control-label" for="maleradio">Male</label>
                                                            </div>
                                                            <div class="custom-control custom-radio col-lg-2 col-md-4 col-6">
                                                                <input type="radio" id="femaleradio" name="customRadio" class="custom-control-input" />
                                                                <label class="custom-control-label" for="femaleradio">Female</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group floating-label show-label col-lg-6 col-md-6 col-sm-12">
                                                        <label>Marital Status </label>
                                                        <select class="form-control">
                                                            <option selected>Choose...</option>
                                                            <option>Single</option>
                                                            <option>Married</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                                        <div class="custom-file">
                                                            <label class="custom-file-label" for="inputGroupFile02">Choose Profile Image</label>
                                                            <input type="file" class="custom-file-input" id="inputGroupFile02" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                        <label for="inputAddress">Present Address</label>
                                                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" />
                                                    </div>
                                                    <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                        <label for="inputAddress2">Permanent Address</label>
                                                        <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" />
                                                    </div>
                                                    <div class="p-t-10 m-b-10 col-12">
                                                        <h5 class="font-weight-semibold">Account Login</h5>
                                                    </div>
                                                    <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                        <label for="employeeemail">Employee Email</label>
                                                        <input type="text" class="form-control" id="employeeemail" placeholder="Enter Employee Email" />
                                                    </div>
                                                    <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                        <label for="employeepassword">Password</label>
                                                        <input type="password" class="form-control" id="employeepassword" placeholder="Enter Employee Password" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="company-details" role="tabpanel" aria-labelledby="company-details-tab">
                                                <h5 class="font-weight-semibold p-t-20 m-b-20">Basic</h5>
                                                <div class="form-row">
                                                    <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                        <label>Employee ID</label>
                                                        <input type="text" class="form-control form-control-lg" placeholder="Enter Employee ID" />
                                                    </div>
                                                    <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                        <label>Department</label>
                                                        <input type="text" class="form-control form-control-lg" placeholder="Enter Department" />
                                                    </div>
                                                    <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                        <label>Designation</label>
                                                        <input type="text" class="form-control form-control-lg" placeholder="Enter Designation" />
                                                    </div>
                                                    <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                        <label>Date Of Joining</label>
                                                        <input type="text" class="theme-date-picker form-control form-control-lg" placeholder="Select Date Of Joining" />
                                                    </div>
                                                    <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                        <label>Resignation Date</label>
                                                        <input type="text" class="theme-date-picker form-control form-control-lg" placeholder="Select Resignation Date" />
                                                    </div>
                                                    <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                        <label>Termination Date</label>
                                                        <input type="text" class="theme-date-picker form-control form-control-lg" placeholder="Select Termination Date" />
                                                    </div>
                                                    <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                        <label>Credit Leaves </label>
                                                        <input type="text" class="form-control form-control-lg" placeholder="Select Credit Leaves" />
                                                    </div>
                                                    <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12 d-flex align-items-center">
                                                        <p class="m-0 p-0"><strong>Notes:</strong> Unused leaves for the Employee</p>
                                                    </div>
                                                    <div class="p-t-10 m-b-10 col-12">
                                                        <h5 class="font-weight-semibold">Salary</h5>
                                                    </div>
                                                    <div class="form-group floating-label show-label col-lg-6 col-md-6 col-sm-12 d-flex align-items-center">
                                                        <label>Employee Type</label>
                                                        <select class="form-control">
                                                            <option selected>Choose...</option>
                                                            <option>Part Time</option>
                                                            <option>Full Time</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group floating-label show-label col-lg-6 col-md-6 col-sm-12 d-flex align-items-center">
                                                        <label>Salary Amount</label>
                                                        <input type="text" class="form-control form-control-lg" placeholder="Enter Salary Amount" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="bank-details" role="tabpanel" aria-labelledby="bank-details-tab">
                                                <h5 class="font-weight-semibold p-t-20 m-b-20">Basic</h5>
                                                <div class="form-row">
                                                    <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                        <label>Account Holder</label>
                                                        <input type="text" class="form-control form-control-lg" placeholder="Enter Account Holder" />
                                                    </div>
                                                    <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                        <label>Account Number</label>
                                                        <input type="number" class="form-control form-control-lg" placeholder="Enter Account Number" />
                                                    </div>
                                                    <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                        <label>Bank Name</label>
                                                        <input type="text" class="form-control form-control-lg" placeholder="Enter Bank Name" />
                                                    </div>
                                                    <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                        <label>Branch Location</label>
                                                        <input type="text" class="form-control form-control-lg" placeholder="Enter Branch Location" />
                                                    </div>
                                                    <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                        <label>Bank Code (IFSC)</label>
                                                        <input type="text" class="form-control form-control-lg" placeholder="Enter Bank Code (IFSC) " />
                                                    </div>
                                                    <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                        <label>Tax Payer ID (PAN)</label>
                                                        <input type="text" class="form-control form-control-lg" placeholder="Enter Tax Payer ID (PAN)" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="upload-document" role="tabpanel" aria-labelledby="upload-document-tab">
                                                <h5 class="font-weight-semibold p-t-20 m-b-20">Details</h5>
                                                <div class="form-row">
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 mt-2">
                                                        <div class="custom-file">
                                                            <label class="custom-file-label" for="resumefile">Choose Resume</label>
                                                            <input type="file" class="custom-file-input" id="resumefile" />
                                                        </div>
                                                        <small class="form-text text-muted mt-3">Remume File Name (ex: Resume-ui-ux-designer.pdf) </small>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 mt-2">
                                                        <div class="custom-file">
                                                            <label class="custom-file-label" for="idprooffile">ID Proof</label>
                                                            <input type="file" class="custom-file-input" id="idprooffile" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 mt-2">
                                                        <div class="custom-file">
                                                            <label class="custom-file-label" for="offerletterfile">Offer Letter</label>
                                                            <input type="file" class="custom-file-input" id="offerletterfile" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 mt-2">
                                                        <div class="custom-file">
                                                            <label class="custom-file-label" for="joiningletterfile">Joining Letter</label>
                                                            <input type="file" class="custom-file-input" id="joiningletterfile" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 mt-2">
                                                        <div class="custom-file">
                                                            <label class="custom-file-label" for="agreementletterfile">Agreement Letter</label>
                                                            <input type="file" class="custom-file-input" id="agreementletterfile" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 mt-2">
                                                        <div class="custom-file">
                                                            <label class="custom-file-label" for="experienceletterfile">Experience Letter</label>
                                                            <input type="file" class="custom-file-input" id="experienceletterfile" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="asset-details" role="tabpanel" aria-labelledby="asset-details-tab">
                                                <h5 class="font-weight-semibold p-t-20 m-b-20">Asset declaration</h5>
                                                <div class="form-row">
                                                    <div class="form-group floating-label col-lg-12 col-md-12 col-sm-12">
                                                        <label>Type of System</label>
                                                        <input type="text" class="form-control form-control-lg" placeholder="Enter Type of System" />
                                                    </div>
                                                    <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12 m-0">
                                                        <h5 class="font-weight-semibold p-t-20 m-b-20">Asset Details:</h5>
                                                    </div>
                                                    <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12 text-right m-0 d-flex align-items-center justify-content-end">
                                                        <button class="theme-btn-two text-white">Add</button>
                                                    </div>
                                                    <div class="form-group floating-label col-12">
                                                        <div class="border-box-column p-3 mt-2">
                                                            <div class="card-header p-0 m-0">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <div class="card-title">
                                                                            <div class="avatar mr-2 avatar-xs">
                                                                                <div class="avatar-title rounded-circle">
                                                                                    <i class="mdi mdi-microphone mdi-18px"></i>
                                                                                </div>
                                                                            </div>
                                                                            Asset : <strong>1</strong>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6 text-right">
                                                                        <button type="button" class="btn btn-sm m-b-15 ml-2 mr-2 btn-rounded-circle"><i class="mdi mdi-close"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                                    <labl>Asset Type</labl>
                                                                    <input type="text" class="form-control form-control-lg" placeholder="Enter Asset Type" />
                                                                </div>
                                                                <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                                    <labl>Asset Brand</labl>
                                                                    <input type="text" class="form-control form-control-lg" placeholder="Enter Asset Brand" />
                                                                </div>
                                                                <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                                    <labl>Asset Serial Number</labl>
                                                                    <input type="text" class="form-control form-control-lg" placeholder="Enter Asset Serial Number" />
                                                                </div>
                                                                <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                                    <labl>Technotery Asset ID</labl>
                                                                    <input type="text" class="form-control form-control-lg" placeholder="Enter Technotery Asset ID" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="border-box-column p-3 mt-2">
                                                            <div class="card-header p-0 m-0">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <div class="card-title">
                                                                            <div class="avatar mr-2 avatar-xs">
                                                                                <div class="avatar-title rounded-circle">
                                                                                    <i class="mdi mdi-microphone mdi-18px"></i>
                                                                                </div>
                                                                            </div>
                                                                            Asset : <strong>1</strong>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6 text-right">
                                                                        <button type="button" class="btn btn-sm m-b-15 ml-2 mr-2 btn-rounded-circle"><i class="mdi mdi-close"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                                    <labl>Asset Type</labl>
                                                                    <input type="text" class="form-control form-control-lg" placeholder="Enter Asset Type" />
                                                                </div>
                                                                <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                                    <labl>Asset Brand</labl>
                                                                    <input type="text" class="form-control form-control-lg" placeholder="Enter Asset Brand" />
                                                                </div>
                                                                <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                                    <labl>Asset Serial Number</labl>
                                                                    <input type="text" class="form-control form-control-lg" placeholder="Enter Asset Serial Number" />
                                                                </div>
                                                                <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                                    <labl>Technotery Asset ID</labl>
                                                                    <input type="text" class="form-control form-control-lg" placeholder="Enter Technotery Asset ID" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer p-t-20 text-right">
                                    <div class="btn-group mr-2" role="group" aria-label="Second group">
                                        <button class="theme-btn-outline text-white">canel</button>
                                    </div>
                                    <div class="btn-group mr-2" role="group" aria-label="Second group">
                                        <button class="theme-btn text-white">Save</button>
                                    </div>
                                </div>
                            </div>
                            <!--card ends-->
                        </div>
                    </div>
                </div>
                <!-- END PLACE PAGE CONTENT HERE -->
            </section>
        
		@endsection
 @section('script')
 
 @endsection

     