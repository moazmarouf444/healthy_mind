@extends('admin.layout.master')

@section('content')
<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{awtTrans('عرض طبيب ')}}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form  class="show form-horizontal" >
                            <div class="row">
                                <div class="col-12">
                                    <div class="imgMontg col-12 text-center">
                                        <div class="dropBox">
                                            <div class="textCenter">
                                                <div class="imagesUploadBlock">
                                                    <label class="uploadImg">
                                                        <span><i class="feather icon-image"></i></span>
                                                        <input type="file" accept="image/*" name="image"
                                                               class="imageUploader">
                                                    </label>
                                                    <div class="uploadedBlock">
                                                        <img src="{{$doctor->image}}">
                                                        <button class="close"><i class="feather icon-x"></i>
                                                        </button>
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
                                            <input type="text" value="{{$doctor->name}}" name="name" class="form-control" placeholder="{{awtTrans('اكتب الاسم')}}" required data-validation-required-message="{{awtTrans('هذا الحقل مطلوب')}}" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">{{awtTrans('البريد الالكتروني')}}</label>
                                        <div class="controls">
                                            <input value="{{$doctor->email}}" type="email" name="email" class="form-control" placeholder="{{awtTrans('اكتب البريد الالكتروني')}}" required data-validation-required-message="{{awtTrans('هذا الحقل مطلوب')}}" >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">{{awtTrans('رقم الهاتف')}}</label>
                                        <div class="controls">
                                            <input type="number" value="{{$doctor->phone}}" name="phone" class="form-control" placeholder="{{awtTrans('اكتب رقم الهاتف')}}" required data-validation-required-message="{{awtTrans('هذا الحقل مطلوب')}}" >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">{{awtTrans('العنوان')}}</label>
                                        <div class="controls">
                                            <input type="text" value="{{$doctor->address}}" name="address" class="form-control" placeholder="{{awtTrans('اكتب رقم الهاتف')}}" required data-validation-required-message="{{awtTrans('هذا الحقل مطلوب')}}" >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="first-name-column">{{__('dashboard.is_accepted')}}</label>
                                        <div class="controls">
                                            <select name="is_approved" class="select2 form-control"  >
                                                <option value="1" {{$doctor->is_approved == 1 ? 'selected' : ''}}>{{__('dashboard.accepted')}}</option>
                                                <option value="0" {{$doctor->is_approved == 0 ? 'selected' : ''}}>{{__('dashboard.un_accepted')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="first-name-column">{{__('dashboard.is_blocked')}}</label>
                                        <div class="controls">
                                            <select name="is_blocked" class="select2 form-control"  >
                                                <option value="1" {{$doctor->is_blocked == 1 ? 'selected' : ''}}>{{__('dashboard.blocked')}}</option>
                                                <option value="0" {{$doctor->is_blocked == 0 ? 'selected' : ''}}>{{__('dashboard.un_blocked')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-6 col-6">
                                    <div class="form-group">
                                        <label for="first-name-column">{{awtTrans('التخصص')}}</label>
                                        <div class="controls">
                                            <select name="specialization" class="select2 form-control" required data-validation-required-message="{{awtTrans('هذا الحقل مطلوب')}}" >
                                                <option value>{{awtTrans('اختر التخصص')}}</option>
                                                <option {{$doctor->specialization == 'doctor' ? 'selected' : ''}} value="doctor">{{awtTrans('طبيب نفسي')}}</option>
                                                <option {{$doctor->specialization == 'specialist' ? 'selected' : ''}} value="specialist">{{awtTrans('اخصائي')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">{{awtTrans('نسبه الربح')}}</label>
                                        <div class="controls">
                                            <input type="text" value="{{$doctor->profit_ratio}}" name="profit_ratio" class="form-control" placeholder="{{awtTrans('اكتب نسبه الربح')}}" required data-validation-required-message="{{awtTrans('هذا الحقل مطلوب')}}" >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">{{awtTrans('سعر الجلسه')}}</label>
                                        <div class="controls">
                                            <input type="text" value="{{$doctor->session_price}}" name="session_price" class="form-control" placeholder="{{awtTrans('اكتب سعر الجلسه')}}"  required data-validation-required-message="{{awtTrans('هذا الحقل مطلوب')}}" >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label for="account-name">{{awtTrans('نبذه تعريفيه')}}</label>
                                            <textarea class="form-control" name="biography" id="" cols="30" rows="10" placeholder="{{awtTrans('نبذه تعريفيه')}}">{{$doctor->biography}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <h1 style="text-align: center">{{awtTrans('صوره الشعار')}}</h1>
                                    <div class="imgMontg col-12 text-center">
                                        <div class="dropBox">
                                            <div class="textCenter">
                                                <div class="imagesUploadBlock">
                                                    <label class="uploadImg">
                                                        <span><i class="feather icon-image"></i></span>
                                                        <input type="file" accept="image/*" name="logo"
                                                               class="imageUploader">
                                                    </label>
                                                    <div class="uploadedBlock">
                                                        <img src="{{$doctor->logo}}">
                                                        <button class="close"><i class="feather icon-x"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <h1 style="text-align: center">{{awtTrans('صوره الامضاء')}}</h1>
                                    <div class="imgMontg col-12 text-center">
                                        <div class="dropBox">
                                            <div class="textCenter">
                                                <div class="imagesUploadBlock">
                                                    <label class="uploadImg">
                                                        <span><i class="feather icon-image"></i></span>
                                                        <input type="file" accept="image/*" name="lighted"
                                                               class="imageUploader">
                                                    </label>
                                                    <div class="uploadedBlock">
                                                        <img src="{{$doctor->lighted}}">
                                                        <button class="close"><i class="feather icon-x"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-12 d-flex justify-content-center mt-3">
                                    <button type="submit" class="btn btn-primary mr-1 mb-1 submit_button">{{awtTrans('تعديل')}}</button>
                                    <a href="{{ url()->previous() }}" type="reset" class="btn btn-outline-warning mr-1 mb-1">{{awtTrans(' رجوع ')}}</a>
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
    <script>
        $('.show input').attr('disabled' , true)
        $('.show textarea').attr('disabled' , true)
        $('.show select').attr('disabled' , true)
    </script>
@endsection