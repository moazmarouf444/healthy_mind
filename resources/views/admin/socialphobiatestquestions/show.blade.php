@extends('admin.layout.master')

@section('content')
<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{awtTrans('عرض اسئله واجابات مقياس الرهاب الاجتماعي ')}}</h4>
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
                                                       value="{{$socialphobiatestquestion->getTranslations('question')[$lang]}}"
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
                                                       value="{{$socialphobiatestquestion->getTranslations('yes')[$lang]}}"
                                                       name="yes[{{$lang}}]" class="form-control"
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
                                                   value="{{$socialphobiatestquestion->value_yes}}"
                                                   name="value_yes" class="form-control"
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
                                                       value="{{$socialphobiatestquestion->getTranslations('no')[$lang]}}"
                                                       name="no[{{$lang}}]" class="form-control"
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
                                                   value="{{$socialphobiatestquestion->value_no}}"
                                                   name="value_no" class="form-control"
                                                   placeholder="{{awtTrans('اكتب عدد النقط')}}"
                                                   required
                                                   data-validation-required-message="{{awtTrans('هذا الحقل مطلوب')}}">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12 d-flex justify-content-center mt-3">
                                    <button type="submit"
                                            class="btn btn-primary mr-1 mb-1 submit_button">{{awtTrans('عرض')}}</button>
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