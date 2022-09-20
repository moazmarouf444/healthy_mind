@extends('admin.layout.master')
{{-- extra css files --}}
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css-rtl/plugins/forms/validation/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">
@endsection
{{-- extra css files --}}

@section('content')
<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{awtTrans('اضافه ميعاد الدكتور مواعيد ')}}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form  method="POST" action="{{route('admin.dates.store')}}" class="store form-horizontal" novalidate>
                            @csrf
                            <div class="form-body">
                                <div class="row">

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="first-name-column">{{awtTrans('السبت')}}</label>
                                            <div class="controls">
                                                <select name="saturday" class="select2 form-control"  >
                                                    <option value>{{awtTrans('حاله الاتاحه')}}</option>
                                                    <option value="enable">{{awtTrans('متاح')}}</option>
                                                    <option value="disable">{{awtTrans('غير متاح')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="first-name-column">{{awtTrans('من')}}</label>
                                            <div class="controls">
                                                <input type="time" name="saturday_from" class="form-control" placeholder="{{awtTrans('من')}}"  >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="first-name-column">{{awtTrans('الي')}}</label>
                                            <div class="controls">
                                                <input type="time" name="saturday_to" class="form-control" placeholder="{{awtTrans('الي')}}"  >
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="first-name-column">{{awtTrans('الاحد')}}</label>
                                            <div class="controls">
                                                <select name="sunday" class="select2 form-control"  >
                                                    <option value>{{awtTrans('حاله الاتاحه')}}</option>
                                                    <option value="enable">{{awtTrans('متاح')}}</option>
                                                    <option value="disable">{{awtTrans('غير متاح')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="first-name-column">{{awtTrans('من')}}</label>
                                            <div class="controls">
                                                <input type="time" name="sunday_from" class="form-control" placeholder="{{awtTrans('من')}}"  >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="first-name-column">{{awtTrans('الي')}}</label>
                                            <div class="controls">
                                                <input type="time" name="sunday_to" class="form-control" placeholder="{{awtTrans('الي')}}"  >
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="first-name-column">{{awtTrans('الاثنين')}}</label>
                                            <div class="controls">
                                                <select name="monday" class="select2 form-control" required data-validation-required-message="{{awtTrans('هذا الحقل مطلوب')}}" >
                                                    <option value>{{awtTrans('حاله الاتاحه')}}</option>
                                                    <option value="enable">{{awtTrans('متاح')}}</option>
                                                    <option value="disable">{{awtTrans('غير متاح')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="first-name-column">{{awtTrans('من')}}</label>
                                            <div class="controls">
                                                <input type="time" name="monday_from" class="form-control" placeholder="{{awtTrans('من')}}"  >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="first-name-column">{{awtTrans('الي')}}</label>
                                            <div class="controls">
                                                <input type="time" name="monday_to" class="form-control" placeholder="{{awtTrans('الي')}}"  >
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="first-name-column">{{awtTrans('الثلاثاء')}}</label>
                                            <div class="controls">
                                                <select name="tuesday" class="select2 form-control"  >
                                                    <option value>{{awtTrans('حاله الاتاحه')}}</option>
                                                    <option value="enable">{{awtTrans('متاح')}}</option>
                                                    <option value="disable">{{awtTrans('غير متاح')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="first-name-column">{{awtTrans('من')}}</label>
                                            <div class="controls">
                                                <input type="time" name="tuesday_from" class="form-control" placeholder="{{awtTrans('من')}}"  >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="first-name-column">{{awtTrans('الي')}}</label>
                                            <div class="controls">
                                                <input type="time" name="tuesday_to" class="form-control" placeholder="{{awtTrans('الي')}}"  >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="first-name-column">{{awtTrans('الاربعاء')}}</label>
                                            <div class="controls">
                                                <select name="wednesday" class="select2 form-control"  >
                                                    <option value>{{awtTrans('حاله الاتاحه')}}</option>
                                                    <option value="enable">{{awtTrans('متاح')}}</option>
                                                    <option value="disable">{{awtTrans('غير متاح')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="first-name-column">{{awtTrans('من')}}</label>
                                            <div class="controls">
                                                <input type="time" name="wednesday_from" class="form-control" placeholder="{{awtTrans('من')}}"  >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="first-name-column">{{awtTrans('الي')}}</label>
                                            <div class="controls">
                                                <input type="time" name="wednesday_to" class="form-control" placeholder="{{awtTrans('الي')}}"  >
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="first-name-column">{{awtTrans('الخميس')}}</label>
                                            <div class="controls">
                                                <select name="thursday" class="select2 form-control"  >
                                                    <option value>{{awtTrans('حاله الاتاحه')}}</option>
                                                    <option value="enable">{{awtTrans('متاح')}}</option>
                                                    <option value="disable">{{awtTrans('غير متاح')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="first-name-column">{{awtTrans('من')}}</label>
                                            <div class="controls">
                                                <input type="time" name="thursday_from" class="form-control" placeholder="{{awtTrans('من')}}"  >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="first-name-column">{{awtTrans('الي')}}</label>
                                            <div class="controls">
                                                <input type="time" name="thursday_to" class="form-control" placeholder="{{awtTrans('الي')}}"  >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="first-name-column">{{awtTrans('الجمعه')}}</label>
                                            <div class="controls">
                                                <select name="friday" class="select2 form-control"  >
                                                    <option value>{{awtTrans('حاله الاتاحه')}}</option>
                                                    <option value="enable">{{awtTrans('متاح')}}</option>
                                                    <option value="disable">{{awtTrans('غير متاح')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="first-name-column">{{awtTrans('من')}}</label>
                                            <div class="controls">
                                                <input type="time" name="friday_from" class="form-control" placeholder="{{awtTrans('من')}}"  >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="first-name-column">{{awtTrans('الي')}}</label>
                                            <div class="controls">
                                                <input type="time" name="friday_to" class="form-control" placeholder="{{awtTrans('الي')}}"  >
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-12 d-flex justify-content-center mt-3">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1 submit_button">{{awtTrans('اضافة')}}</button>
                                        <a href="{{ url()->previous() }}" type="reset" class="btn btn-outline-warning mr-1 mb-1">{{awtTrans(' رجوع ')}}</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('js')
    <script src="{{asset('admin/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"></script>
    <script src="{{asset('admin/app-assets/js/scripts/forms/validation/form-validation.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/js/scripts/extensions/sweet-alerts.js')}}"></script>
    
    {{-- show selected image script --}}
        @include('admin.shared.addImage')
    {{-- show selected image script --}}

    {{-- submit add form script --}}
        @include('admin.shared.submitAddForm')
    {{-- submit add form script --}}
    
@endsection