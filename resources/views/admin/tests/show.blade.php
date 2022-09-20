@extends('admin.layout.master')

@section('content')
<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{awtTrans('عرض اختبار ')}}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                        <form  class="show form-horizontal" >
                            @foreach (languages() as $lang)
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">{{__('site.name_'.$lang)}}</label>
                                        <div class="controls">
                                            <input type="text"
                                                   value="{{$test->getTranslations('name')[$lang]}}"
                                                   name="question[{{$lang}}]" class="form-control"
                                                   placeholder="{{__('site.write') . __('site.name_'.$lang)}}"
                                                   required
                                                   data-validation-required-message="{{awtTrans('هذا الحقل مطلوب')}}">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </form>
                        </div>
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