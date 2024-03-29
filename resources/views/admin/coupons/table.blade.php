<div class="position-relative">
    {{-- table loader  --}}
    <div class="table_loader" >
        {{awtTrans('جاري التحميل')}}
    </div>
    {{-- table loader  --}}
    {{-- table content --}}
    <table class="table " id="tab">
        <thead>
            <tr>
                <th>
                    <label class="container-checkbox">
                        <input type="checkbox" value="value1" name="name1" id="checkedAll">
                        <span class="checkmark"></span>
                    </label>
                </th>
                <th>{{awtTrans('التاريخ')}}</th>
                <th>{{awtTrans('رقم الكوبون')}}</th>
                <th>{{awtTrans('نوع الخصم')}}</th>
                <th>{{awtTrans('قيمة الخصم')}}</th>
                <th>{{awtTrans('تاريخ الانتهاء')}}</th>
{{--                <th>{{awtTrans('تنشيط او الغاء تنشيط كوبون')}}</th>--}}
                <th>{{awtTrans('التحكم')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($coupons as $coupon)
                <tr class="delete_coupon">
                    <td class="text-center">
                        <label class="container-checkbox">
                            <input type="checkbox" class="checkSingle" id="{{$coupon->id}}">
                            <span class="checkmark"></span>
                        </label>
                    </td>
                    <td>{{\Carbon\Carbon::parse($coupon->created_at)->format('d/m/Y')}}</td>
                    <td>{{$coupon->coupon_num}}</td>
                    <td>{{$coupon->type == 'ratio' ? 'نسبة' :  'رقم ثابت'}}</td>
                    <td>{{$coupon->discount}}</td>
                    <td>{{date('d-m-Y', strtotime($coupon->expire_date))}}</td>
{{--                    <td>--}}
{{--                        @if($coupon->status == 'available')--}}
{{--                            <span class="btn btn-sm round btn-outline-danger change-coupon-status" data-date="{{$coupon->expire_date}}" data-status="closed" data-id="{{$coupon->id}}">--}}
{{--                                {{awtTrans('ايقاف الكوبون')}}  <i class="feather icon-slash"></i>--}}
{{--                            </span>--}}
{{--                        @else--}}
{{--                            <span class="btn btn-sm round btn-outline-success open-coupon" data-toggle="modal" id="div_{{$coupon->id}}" data-target="#notify" data-id="{{$coupon->id}}">--}}
{{--                                {{awtTrans('اعاده تنشيط الكوبون')}}  <i class="feather icon-rotate-cw"></i>--}}
{{--                            </span>--}}
{{--                        @endif--}}
{{--                    </td>--}}
                    <td class="product-action">
                        <span class="text-primary"><a href="{{route('admin.coupons.show' , ['id' => $coupon->id])}}"><i class="feather icon-eye"></i></a></span>
                        <span class="action-edit text-primary"><a href="{{route('admin.coupons.edit' , ['id' => $coupon->id])}}"><i class="feather icon-edit"></i></a></span>
                        <span class="delete-row text-danger" data-url="{{url('admin/coupons/'.$coupon->id)}}"><i class="feather icon-trash"></i></span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- table content --}}
    {{-- no data found div --}}
    @if ($coupons->count() == 0)
        <div class="d-flex flex-column w-100 align-center mt-4">
            <img src="http://127.0.0.1:8000/admin/app-assets/images/pages/404.png" alt="">
            <span class="mt-2" style="font-family: cairo">{{awtTrans('لا يوجد نتائج مطابقة')}}</span>
        </div>
    @endif
    {{-- no data found div --}}

</div>
{{-- pagination  links div --}}
@if ($coupons->count() > 0 && $coupons instanceof \Illuminate\Pagination\AbstractPaginator )
    <div class="d-flex justify-content-center mt-3">
        {{$coupons->links()}}
    </div>
@endif
{{-- pagination  links div --}}