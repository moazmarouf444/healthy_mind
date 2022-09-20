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
                        <h4 class="card-title">{{awtTrans('تعديل ميعاد للدكتور ')}}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form  method="POST" action="{{route('admin.doctors.update.appointments')}}" class="store form-horizontal" novalidate>
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <input hidden name="doctor_id" value="{{$doctor->id}}"></input>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="first-name-column">{{awtTrans('السبت')}}</label>
                                                <div class="controls">
                                                    <select name="saturday" class="select2 form-control"  >
                                                        <option value>{{awtTrans('حاله الاتاحه')}}</option>
                                                        <option  @if($doctor->dates[0]->saturday == 'enable') selected @endif
                                                                value="enable">{{awtTrans('متاح')}}</option>
                                                        <option  @if($doctor->dates[0]->saturday == 'disable') selected @endif
                                                        value="disable">{{awtTrans('غير متاح')}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="first-name-column">{{awtTrans('من')}}</label>
                                                <div class="controls">
                                                    <input type="time" value="{{$doctor->dates[0]->saturday_from}}" name="saturday_from" class="form-control" placeholder="{{awtTrans('من')}}"  >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="first-name-column">{{awtTrans('الي')}}</label>
                                                <div class="controls">
                                                    <input type="time" value="{{$doctor->dates[0]->saturday_to}}" name="saturday_to" class="form-control" placeholder="{{awtTrans('الي')}}"  >
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="first-name-column">{{awtTrans('الاحد')}}</label>
                                                <div class="controls">
                                                    <select name="sunday" class="select2 form-control"  >
                                                        <option value>{{awtTrans('حاله الاتاحه')}}</option>
                                                        <option @if($doctor->dates[0]->sunday == 'enable') selected @endif   value="enable">{{awtTrans('متاح')}}</option>
                                                        <option @if($doctor->dates[0]->sunday == 'disable') selected @endif  value="disable">{{awtTrans('غير متاح')}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="first-name-column">{{awtTrans('من')}}</label>
                                                <div class="controls">
                                                    <input type="time"   value="{{$doctor->dates[0]->sunday_from}}" name="sunday_from" class="form-control" placeholder="{{awtTrans('من')}}"  >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="first-name-column">{{awtTrans('الي')}}</label>
                                                <div class="controls">
                                                    <input type="time"  value="{{$doctor->dates[0]->sunday_to}}" name="sunday_to" class="form-control" placeholder="{{awtTrans('الي')}}"  >
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="first-name-column">{{awtTrans('الاثنين')}}</label>
                                                <div class="controls">
                                                    <select name="monday" class="select2 form-control"  >
                                                        <option value>{{awtTrans('حاله الاتاحه')}}</option>
                                                        <option @if($doctor->dates[0]->monday == 'enable') selected @endif value="enable">{{awtTrans('متاح')}}</option>
                                                        <option @if($doctor->dates[0]->monday == 'disable') selected @endif value="disable">{{awtTrans('غير متاح')}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="first-name-column">{{awtTrans('من')}}</label>
                                                <div class="controls">
                                                    <input type="time" value="{{$doctor->dates[0]->monday_from}}" name="monday_from" class="form-control" placeholder="{{awtTrans('من')}}"  >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="first-name-column">{{awtTrans('الي')}}</label>
                                                <div class="controls">
                                                    <input type="time" value="{{$doctor->dates[0]->monday_to}}" name="monday_to" class="form-control" placeholder="{{awtTrans('الي')}}"  >
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="first-name-column">{{awtTrans('الثلاثاء')}}</label>
                                                <div class="controls">
                                                    <select name="tuesday" class="select2 form-control"  >
                                                        <option value>{{awtTrans('حاله الاتاحه')}}</option>
                                                        <option  @if($doctor->dates[0]->tuesday == 'enable') selected @endif value="enable">{{awtTrans('متاح')}}</option>
                                                        <option @if($doctor->dates[0]->tuesday == 'disable') selected @endif value="disable">{{awtTrans('غير متاح')}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="first-name-column">{{awtTrans('من')}}</label>
                                                <div class="controls">
                                                    <input type="time" value="{{$doctor->dates[0]->tuesday_from}}" name="tuesday_from" class="form-control" placeholder="{{awtTrans('من')}}"  >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="first-name-column">{{awtTrans('الي')}}</label>
                                                <div class="controls">
                                                    <input type="time" value="{{$doctor->dates[0]->tuesday_to}}" name="tuesday_to" class="form-control" placeholder="{{awtTrans('الي')}}"  >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="first-name-column">{{awtTrans('الاربعاء')}}</label>
                                                <div class="controls">
                                                    <select name="wednesday" class="select2 form-control"  >
                                                        <option value>{{awtTrans('حاله الاتاحه')}}</option>
                                                        <option @if($doctor->dates[0]->wednesday == 'enable') selected @endif value="enable">{{awtTrans('متاح')}}</option>
                                                        <option @if($doctor->dates[0]->wednesday == 'disable') selected @endif value="disable">{{awtTrans('غير متاح')}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="first-name-column">{{awtTrans('من')}}</label>
                                                <div class="controls">
                                                    <input type="time" value="{{$doctor->dates[0]->wednesday_from}}" name="wednesday_from" class="form-control" placeholder="{{awtTrans('من')}}"  >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="first-name-column">{{awtTrans('الي')}}</label>
                                                <div class="controls">
                                                    <input type="time" value="{{$doctor->dates[0]->wednesday_to}}" name="wednesday_to" class="form-control" placeholder="{{awtTrans('الي')}}"  >
                                                </div>
                                            </div>
                                        </div>



                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="first-name-column">{{awtTrans('الخميس')}}</label>
                                                <div class="controls">
                                                    <select name="thursday" class="select2 form-control"  >
                                                        <option >{{awtTrans('حاله الاتاحه')}}</option>
                                                        <option @if($doctor->dates[0]->thursday == 'enable') selected selectedselected @endif value="enable">{{awtTrans('متاح')}}</option>
                                                        <option @if($doctor->dates[0]->thursday == 'disable') selected selectedselected @endif value="disable">{{awtTrans('غير متاح')}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="first-name-column">{{awtTrans('من')}}</label>
                                                <div class="controls">
                                                    <input type="time" value="{{$doctor->dates[0]->thursday_from}}" name="thursday_from" class="form-control" placeholder="{{awtTrans('من')}}"  >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="first-name-column">{{awtTrans('الي')}}</label>
                                                <div class="controls">
                                                    <input type="time"  value="{{$doctor->dates[0]->thursday_to}}" name="thursday_to" class="form-control" placeholder="{{awtTrans('الي')}}"  >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="first-name-column">{{awtTrans('الجمعه')}}</label>
                                                <div class="controls">
                                                    <select name="friday" class="select2 form-control"  >
                                                        <option value>{{awtTrans('حاله الاتاحه')}}</option>
                                                        <option @if($doctor->dates[0]->friday == 'enable') selected @endif value="enable">{{awtTrans('متاح')}}</option>
                                                        <option @if($doctor->dates[0]->friday == 'disable') selected @endif value="disable">{{awtTrans('غير متاح')}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="first-name-column">{{awtTrans('من')}}</label>
                                                <div class="controls">
                                                    <input type="time" value="{{$doctor->dates[0]->friday_from}}" name="friday_from" class="form-control" placeholder="{{awtTrans('من')}}"  >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="first-name-column">{{awtTrans('الي')}}</label>
                                                <div class="controls">
                                                    <input type="time" value="{{$doctor->dates[0]->friday_to}}" name="friday_to" class="form-control" placeholder="{{awtTrans('الي')}}"  >
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