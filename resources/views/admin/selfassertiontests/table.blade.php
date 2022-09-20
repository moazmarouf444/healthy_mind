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
                <th>{{awtTrans('الاسم')}}</th>
                <th>{{awtTrans(' اسئله واجوبه الاختبار')}}</th>
                <th>{{awtTrans('التحكم')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($selfassertiontests as $selfassertiontest)
                <tr class="delete_row">
                    <td class="text-center">
                        <label class="container-checkbox">
                        <input type="checkbox" class="checkSingle" id="{{ $selfassertiontest->id }}">
                        <span class="checkmark"></span>
                        </label>
                    </td>
                    <td>{{ $selfassertiontest->name }}</td>
                    <td>
                        <a href="{{route('admin.selfassertiontestquestions.index')}}"> <button type="button" class="btn btn-primary mr-1 mb-1">عرض</button></a>
                    </td>
                    <td class="product-action">
                        <span class="text-primary"><a href="{{ route('admin.selfassertiontests.show', ['id' => $selfassertiontest->id]) }}"><i class="feather icon-eye"></i></a></span>
                        <span class="action-edit text-primary"><a href="{{ route('admin.selfassertiontests.edit', ['id' => $selfassertiontest->id]) }}"><i class="feather icon-edit"></i></a></span>
{{--                        <span class="delete-row text-danger" data-url="{{ url('admin/selfassertiontests/' . $selfassertiontest->id) }}"><i class="feather icon-trash"></i></span>--}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- table content --}}
    {{-- no data found div --}}
    @if ($selfassertiontests->count() == 0)
        <div class="d-flex flex-column w-100 align-center mt-4">
            <img src="{{asset('admin/app-assets/images/pages/404.png')}}" alt="">
            <span class="mt-2" style="font-family: cairo">{{awtTrans('لا يوجد نتائج مطابقة')}}</span>
        </div>
    @endif
    {{-- no data found div --}}

</div>
{{-- pagination  links div --}}
@if ($selfassertiontests->count() > 0 && $selfassertiontests instanceof \Illuminate\Pagination\AbstractPaginator )
    <div class="d-flex justify-content-center mt-3">
        {{$selfassertiontests->links()}}
    </div>
@endif
{{-- pagination  links div --}}

