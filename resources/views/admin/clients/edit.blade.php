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
                    <h4 class="card-title">{{awtTrans('تعديل عميل ')}}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form  method="POST" action="{{route('admin.clients.update' , ['id' => $row->id])}}" class="store form-horizontal" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="imgMontg col-12 text-center">
                                            <div class="dropBox">
                                                <div class="textCenter">
                                                    <div class="imagesUploadBlock">
                                                        <label class="uploadImg">
                                                            <span><i class="feather icon-image"></i></span>
                                                            <input type="file" accept="image/*" name="image" class="imageUploader">
                                                        </label>
                                                        <div class="uploadedBlock">
                                                            <img src="{{$row->image}}">
                                                            <button class="close"><i class="la la-times"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{awtTrans('الاسم')}}</label>
                                            <div class="controls">
                                                <input type="text" name="name" value="{{$row->name}}" class="form-control" placeholder="{{awtTrans('اكتب الاسم')}}" required data-validation-required-message="{{awtTrans('هذا الحقل مطلوب')}}" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{awtTrans('رقم الهاتف')}}</label>
                                            <div class="controls">
                                                <input type="number" name="phone" value="{{$row->phone}}" class="form-control" placeholder="{{awtTrans('اكتب رقم الهاتف')}}" required  data-validation-required-message="{{awtTrans('هذا الحقل مطلوب')}}" data-validation-number-message="{{awtTrans('يجب الا يحتوي رقم الهاتف علي اي حروف او رموز')}}" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{awtTrans('البريد الالكتروني')}}</label>
                                            <div class="controls">
                                                <input type="email" name="email" value="{{$row->email}}" class="form-control" placeholder="{{awtTrans('اكتب البريد الالكتروني')}}" required data-validation-required-message="{{awtTrans('هذا الحقل مطلوب')}}" data-validation-email-message="{{awtTrans('صيغة الايميل غير صحيحة')}}" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{awtTrans('كلمة السر')}}</label>
                                            <div class="controls">
                                                <input type="password" name="password" class="form-control"  >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-6">
                                        <div class="form-group">
                                            <label for="first-name-column">{{awtTrans('الجنس')}}</label>
                                            <div class="controls">
                                                <select name="gender" class="select2 form-control" required
                                                        data-validation-required-message="{{awtTrans('هذا الحقل مطلوب')}}">
                                                    <option value="">{{awtTrans('الجنس')}}</option>
                                                    <option {{$row->gender == 'male' ? 'selected' : ''}} value="male">{{awtTrans('ذكر')}}</option>
                                                    <option {{$row->gender == 'female' ? 'selected' : ''}} value="female">{{awtTrans('انثي')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-6">
                                        <div class="form-group">
                                            <label for="first-name-column">{{awtTrans('الصلاحية')}}</label>
                                            <div class="controls">
                                                <select name="is_blocked" class="select2 form-control" required data-validation-required-message="{{awtTrans('هذا الحقل مطلوب')}}" >
                                                    <option value>{{awtTrans('اختر حالة الحظر')}}</option>
                                                    <option {{$row->is_blocked == 1 ? 'selected' : ''}} value="1">{{awtTrans('محظور')}}</option>
                                                    <option {{$row->is_blocked == 0 ? 'selected' : ''}} value="0">{{awtTrans('غير محظور')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-center mt-3">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1 submit_button">{{awtTrans('تعديل')}}</button>
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

    {{-- submit edit form script --}}
        @include('admin.shared.submitEditForm')
    {{-- submit edit form script --}}
    
@endsection