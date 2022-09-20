@extends('admin.layout.master')

@section('content')
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{awtTrans('عرض اختبرا الاكتئاباختبارات ')}}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="show form-horizontal">
                                <div class="row">
                                    @foreach (languages() as $lang)
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{__('site.name_'.$lang)}}</label>
                                                <div class="controls">
                                                    <input type="text"
                                                           value="{{$depressiontest->getTranslations('name')[$lang]}}"
                                                           name="question[{{$lang}}]" class="form-control"
                                                           placeholder="{{__('site.write') . __('site.name_'.$lang)}}"
                                                           required
                                                           data-validation-required-message="{{awtTrans('هذا الحقل مطلوب')}}">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                        @foreach (languages() as $lang)
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-name">{{__('site.description_'.$lang)}} </label>
                                                        <textarea class="form-control" name="biography[{{$lang}}]"
                                                                  id="" cols="30" rows="10"
                                                                  placeholder="{{__('site.write') . __('site.description_'.$lang)}}">{{$depressiontest->getTranslations('biography')[$lang]}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
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
        $('.show input').attr('disabled', true)
        $('.show textarea').attr('disabled', true)
        $('.show select').attr('disabled', true)
    </script>
@endsection