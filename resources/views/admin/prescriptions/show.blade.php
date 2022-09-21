@extends('admin.layout.master')

@section('content')
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{awtTrans('عرض الوصفه الطبيه ')}}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="show form-horizontal">
                                <div class="row">

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{awtTrans('اسم المريض')}}</label>
                                            <div class="controls">
                                                <input type="text"
                                                       value="{{ $prescription->user->name }}"
                                                       name="" class="form-control"
                                                       required
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{awtTrans('اسم الطبيب')}}</label>
                                            <div class="controls">
                                                <input type="text"
                                                       value="{{ $prescription->doctor->name }}"
                                                       name="" class="form-control"
                                                       required
                                                >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{awtTrans('التاريخ')}}</label>
                                            <div class="controls">
                                                <input type="text"
                                                       value="{{ $prescription->date }}"
                                                       name="" class="form-control"
                                                       required
                                                >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{awtTrans('التشخيص')}}</label>
                                            <div class="controls">
                                                <input type="text"
                                                       value="{{ $prescription->diagnosis }}"
                                                       name="" class="form-control"
                                                       required
                                                >
                                            </div>
                                        </div>
                                    </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="account-name">{{awtTrans('الوصفه الطبيه')}} </label>
                                                    <textarea class="form-control"
                                                              id="" cols="30" rows="10"
                                                              >{{ $prescription->prescription }}</textarea>
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
        $('.show input').attr('disabled', true)
        $('.show textarea').attr('disabled', true)
        $('.show select').attr('disabled', true)
    </script>
@endsection