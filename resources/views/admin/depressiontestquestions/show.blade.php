@extends('admin.layout.master')

@section('content')
<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{awtTrans('عرض اسئله واجوبه مقياس بيك للاكتئاب ')}}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form  class="show form-horizontal" >
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
                                    <a href="{{ url()->previous() }}" type="reset"
                                       class="btn btn-outline-warning mr-1 mb-1">{{awtTrans(' رجوع ')}}</a>
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