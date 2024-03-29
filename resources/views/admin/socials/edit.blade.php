@extends('admin.layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css-rtl/plugins/forms/validation/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">
@endsection

@section('content')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{awtTrans('تعديل وسيلة تواصل')}}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form  method="POST" action="{{route('admin.socials.update' , ['id' => $social->id])}}" class="store" novalidate>
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
                                                                <img src="{{$social->image}}">
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
                                                    <input type="text" name="name" class="form-control" value="{{$social->name}}" placeholder="{{awtTrans('اكتب الاسم')}}" required data-validation-required-message="{{awtTrans('هذا الحقل مطلوب')}}" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{awtTrans('الرابط')}}</label>
                                                <div class="controls">
                                                    <input type="url" name="link"   class="form-control" value="{{$social->link}}" placeholder="{{awtTrans('اكتب الرابط')}}" required data-validation-required-message="{{awtTrans('هذا الحقل مطلوب')}}" >
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