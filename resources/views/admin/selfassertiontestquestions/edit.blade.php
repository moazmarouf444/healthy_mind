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
                        <h4 class="card-title">{{awtTrans('تعديل اسئله واجابات مقياس توكيد الذات ')}}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form method="POST"
                                  action="{{route('admin.selfassertiontestquestions.update' , ['id' => $selfassertiontestquestion->id])}}"
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
                                                               value="{{$selfassertiontestquestion->getTranslations('question')[$lang]}}"
                                                               name="question[{{$lang}}]" class="form-control"
                                                               placeholder="{{__('site.write') . __('site.question_'.$lang)}}"
                                                               required
                                                               data-validation-required-message="{{awtTrans('هذا الحقل مطلوب')}}">
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                        @foreach(languages() as $lang)
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="first-name-column">{{__('site.answer_one_'.$lang)}}</label>
                                                    <div class="controls">
                                                        <input type="text"
                                                               value="{{$selfassertiontestquestion->getTranslations('always')[$lang]}}"
                                                               name="always[{{$lang}}]" class="form-control"
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
                                                           value="{{$selfassertiontestquestion->value_always}}"
                                                           name="value_always" class="form-control"
                                                           placeholder="{{awtTrans('اكتب عدد النقط')}}"
                                                           required
                                                           data-validation-required-message="{{awtTrans('هذا الحقل مطلوب')}}">
                                                </div>
                                            </div>
                                        </div>

                                        @foreach(languages() as $lang)
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="first-name-column">{{__('site.answer_two_'.$lang)}}</label>
                                                    <div class="controls">
                                                        <input type="text"
                                                               value="{{$selfassertiontestquestion->getTranslations('mostly')[$lang]}}"
                                                               name="mostly[{{$lang}}]" class="form-control"
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
                                                           value="{{$selfassertiontestquestion->value_mostly}}"
                                                           name="value_mostly" class="form-control"
                                                           placeholder="{{awtTrans('اكتب عدد النقط')}}"
                                                           required
                                                           data-validation-required-message="{{awtTrans('هذا الحقل مطلوب')}}">
                                                </div>
                                            </div>
                                        </div>

                                        @foreach(languages() as $lang)
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="first-name-column">{{__('site.answer_three_'.$lang)}}</label>
                                                    <div class="controls">
                                                        <input type="text"
                                                               value="{{$selfassertiontestquestion->getTranslations('sometimes')[$lang]}}"
                                                               name="sometimes[{{$lang}}]" class="form-control"
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
                                                           value="{{$selfassertiontestquestion->value_sometimes}}"
                                                           name="value_sometimes" class="form-control"
                                                           placeholder="{{awtTrans('اكتب عدد النقط')}}"
                                                           required
                                                           data-validation-required-message="{{awtTrans('هذا الحقل مطلوب')}}">
                                                </div>
                                            </div>
                                        </div>

                                        @foreach(languages() as $lang)
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="first-name-column">{{__('site.answer_four_'.$lang)}}</label>
                                                    <div class="controls">
                                                        <input type="text"
                                                               value="{{$selfassertiontestquestion->getTranslations('scarcely')[$lang]}}"
                                                               name="scarcely[{{$lang}}]" class="form-control"
                                                               placeholder="{{__('site.write') . __('site.answer_four_'.$lang)}}"
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
                                                           value="{{$selfassertiontestquestion->value_scarcely}}"
                                                           name="value_scarcely" class="form-control"
                                                           placeholder="{{awtTrans('اكتب عدد النقط')}}"
                                                           required
                                                           data-validation-required-message="{{awtTrans('هذا الحقل مطلوب')}}">
                                                </div>
                                            </div>
                                        </div>

                                        @foreach(languages() as $lang)
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="first-name-column">{{__('site.answer_five_'.$lang)}}</label>
                                                    <div class="controls">
                                                        <input type="text"
                                                               value="{{$selfassertiontestquestion->getTranslations('never')[$lang]}}"
                                                               name="never[{{$lang}}]" class="form-control"
                                                               placeholder="{{__('site.write') . __('site.answer_five_'.$lang)}}"
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
                                                           value="{{$selfassertiontestquestion->value_never}}"
                                                           name="value_never" class="form-control"
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