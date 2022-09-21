@extends('admin.layout.master')

@section('content')
<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{awtTrans('عرض الحجز ')}}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form  class="show form-horizontal" >
                            <div class="row">

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="first-name-column">{{awtTrans('اسم المريض')}}</label>
                                        <div class="controls">
                                            <input type="text"
                                                   value="{{$reservation->user->name}}"
                                                   name="" class="form-control"></input>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="first-name-column">{{awtTrans('اسم الدكتور')}}</label>
                                        <div class="controls">
                                            <input type="text"
                                                   value="{{$reservation->doctor->name}}"
                                                   name="" class="form-control"></input>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="first-name-column">{{awtTrans('تخصص المعالج')}}</label>
                                        <div class="controls">
                                            <input type="text"
                                                   value="{{$reservation->doctor->specialization == 'doctor' ? __('dashboard.doctor') : __('dashboard.specialized')}}"
                                                   name="" class="form-control"></input>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="first-name-column">{{awtTrans('المده')}}</label>
                                        <div class="controls">
                                            <input type="text"
                                                   value="{{$reservation->doctor->specialization == 'doctor' ? __('dashboard.30m') : __('dashboard.60m')}}"
                                                    class="form-control"></input>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="first-name-column">{{awtTrans('التاريخ')}}</label>
                                        <div class="controls">
                                            <input type="text"
                                                   value="{{$reservation->date}}"
                                                   name="" class="form-control"></input>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="first-name-column">{{awtTrans('نوع الحجز')}}</label>
                                        <div class="controls">
                                            <input type="text"
                                                   value="{{$reservation->reservation_type == 'remote' ? __('dashboard.remote') : __('dashboard.presence')}}"
                                                   name="" class="form-control"></input>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="first-name-column">{{awtTrans('من')}}</label>
                                        <div class="controls">
                                            <input type="text"
                                                   value="{{$reservation->start_time}}"
                                                   name="" class="form-control"></input>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="first-name-column">{{awtTrans('الي')}}</label>
                                        <div class="controls">
                                            <input type="text"
                                                   value="{{$reservation->end_time}}"
                                                   name="" class="form-control"></input>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="first-name-column">{{awtTrans('السعر المدفوع ')}}</label>
                                        <div class="controls">
                                            <input type="text"
                                                   value="{{$reservation->paid_price}}"
                                                   name="" class="form-control"></input>
                                        </div>
                                    </div>
                                </div>

                                @if($reservation->coupon)
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="first-name-column">{{awtTrans('كوبون الخصم ')}}</label>
                                            <div class="controls">
                                                <input type="text"
                                                       value="{{$reservation->coupon->coupon_num}}"
                                                       name="" class="form-control"></input>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="first-name-column">{{awtTrans('قيمه الخصم')}}</label>
                                            <div class="controls">
                                                <input type="text"
                                                       value="{{$reservation->coupon->discount}}"
                                                       name="" class="form-control"></input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="first-name-column">{{awtTrans('السعر قبل الخصم')}}</label>
                                            <div class="controls">
                                                <input type="text"
                                                       value="{{$reservation->price}}"
                                                       name="" class="form-control"></input>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{awtTrans('حاله الحجز ')}}</label>
                                            <div class="controls">
                                                <input type="text"
                                                       value="
                                                   @if($reservation->status == 'inprogress')
                                                       {{__('dashboard.inprogress')}}
                                                       @elseif($reservation->status == 'refused')
                                                       {{__('dashboard.refused')}}
                                                       @elseif($reservation->status == 'finished')
                                                       {{__('dashboard.finished')}}
                                                       @endif
                                                               "
                                                       name="" class="form-control"></input>
                                            </div>
                                        </div>
                                    </div>


                                @endif

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