@extends('admin.layout.master')
{{-- extra css files --}}
@section('css')
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin/app-assets/css-rtl/plugins/forms/validation/form-validation.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">
@endsection
{{-- extra css files --}}

@section('content')
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{awtTrans('تعديل اسئله واجوبه مقياس بيك للاكتئاب ')}}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form method="POST"
                                  action="{{route('admin.depressiontestquestions.update' , ['id' => $depressiontestquestion->id])}}"
                                  class="store form-horizontal" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        @foreach (languages() as $lang)
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="first-name-column">{{__('site.question_'. $lang)}}</label>
                                                    <div class="controls">
                                                        <input type="text"
                                                               value="{{$depressiontestquestion->getTranslations('question')[$lang]}}"
                                                               name="question[{{$lang}}]" class="form-control"
                                                               placeholder="{{__('site.write') . __('site.question_'.$lang)}}"
                                                               required
                                                               data-validation-required-message="{{awtTrans('هذا الحقل مطلوب')}}">
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                            @foreach (languages() as $lang)
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="first-name-column">{{__('site.answer_one_'.$lang)}}</label>
                                                        <div class="controls">
                                                            <input type="text"
                                                                   value="{{$depressiontestquestion->getTranslations('answer_zero')[$lang]}}"
                                                                   name="answer_zero[{{$lang}}]" class="form-control"
                                                                   placeholder="{{__('site.write') . __('site.answer_one_'.$lang)}}"
                                                                   required
                                                                   data-validation-required-message="{{awtTrans('هذا الحقل مطلوب')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="first-name-column">{{awtTrans('عدد النقط')}}</label>
                                                    <div class="controls">
                                                        <input type="text"
                                                               value="{{$depressiontestquestion->value_answer_zero}}"
                                                               name="value_answer_zero" class="form-control"
                                                               placeholder="{{awtTrans('اكتب عدد النقط')}}"
                                                               required
                                                               data-validation-required-message="{{awtTrans('هذا الحقل مطلوب')}}">
                                                    </div>
                                                </div>
                                            </div>


                                            @foreach (languages() as $lang)
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="first-name-column">{{__('site.answer_two_'.$lang)}}</label>
                                                        <div class="controls">
                                                            <input type="text"
                                                                   value="{{$depressiontestquestion->getTranslations('answer_one')[$lang]}}"
                                                                   name="answer_one[{{$lang}}]" class="form-control"
                                                                   placeholder="{{__('site.write') . __('site.answer_two_'.$lang)}}"
                                                                   required
                                                                   data-validation-required-message="{{awtTrans('هذا الحقل مطلوب')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="first-name-column">{{awtTrans('عدد النقط')}}</label>
                                                    <div class="controls">
                                                        <input type="text"
                                                               value="{{$depressiontestquestion->value_answer_one}}"
                                                               name="value_answer_one" class="form-control"
                                                               placeholder="{{awtTrans('اكتب عدد النقط')}}"
                                                               required
                                                               data-validation-required-message="{{awtTrans('هذا الحقل مطلوب')}}">
                                                    </div>
                                                </div>
                                            </div>


                                            @foreach (languages() as $lang)
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="first-name-column">{{__('site.answer_two_'.$lang)}}</label>
                                                        <div class="controls">
                                                            <input type="text"
                                                                   value="{{$depressiontestquestion->getTranslations('answer_two')[$lang]}}"
                                                                   name="answer_two[{{$lang}}]" class="form-control"
                                                                   placeholder="{{__('site.write') . __('site.answer_three_'.$lang)}}"
                                                                   required
                                                                   data-validation-required-message="{{awtTrans('هذا الحقل مطلوب')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="first-name-column">{{awtTrans('عدد النقط')}}</label>
                                                    <div class="controls">
                                                        <input type="text"
                                                               value="{{$depressiontestquestion->value_answer_two}}"
                                                               name="value_answer_two" class="form-control"
                                                               placeholder="{{awtTrans('اكتب عدد النقط')}}"
                                                               required
                                                               data-validation-required-message="{{awtTrans('هذا الحقل مطلوب')}}">
                                                    </div>
                                                </div>
                                            </div>



                                        @foreach (languages() as $lang)
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="first-name-column">{{__('site.answer_four_'.$lang)}}</label>
                                                        <div class="controls">
                                                            <input type="text"
                                                                   value="{{$depressiontestquestion->getTranslations('answer_three')[$lang]}}"
                                                                   name="answer_three[{{$lang}}]" class="form-control"
                                                                   placeholder="{{__('site.write') . __('site.answer_one_'.$lang)}}"
                                                                   required
                                                                   data-validation-required-message="{{awtTrans('هذا الحقل مطلوب')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="first-name-column">{{awtTrans('عدد النقط')}}</label>
                                                    <div class="controls">
                                                        <input type="text"
                                                               value="{{$depressiontestquestion->value_answer_three}}"
                                                               name="value_answer_three" class="form-control"
                                                               placeholder="{{awtTrans('اكتب عدد النقط')}}"
                                                               required
                                                               data-validation-required-message="{{awtTrans('هذا الحقل مطلوب')}}">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-12 d-flex justify-content-center mt-3">
                                            <button type="submit"
                                                    class="btn btn-primary mr-1 mb-1 submit_button">{{awtTrans('تعديل')}}</button>
                                            <a href="{{ url()->previous() }}" type="reset"
                                               class="btn btn-outline-warning mr-1 mb-1">{{awtTrans(' رجوع ')}}</a>
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