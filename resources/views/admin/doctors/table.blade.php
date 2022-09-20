<div class="position-relative">
    {{-- table loader  --}}
    <div class="table_loader">
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
            <th>{{awtTrans('الصوره')}}</th>
            <th>{{awtTrans('الاسم')}}</th>
            <th>{{awtTrans('البريد الالكتروني')}}</th>
            <th>{{awtTrans('رقم الهاتف')}}</th>
            <th>{{awtTrans('التخصص')}}</th>
            <th>{{awtTrans('حالة الحظر')}}</th>
            <th>{{awtTrans('حالة الموافقه')}}</th>
            <th>{{awtTrans('مواعيد')}}</th>
            <th>{{awtTrans('التحكم')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($doctors as $doctor)
            <tr class="delete_row">
                <td class="text-center">
                    <label class="container-checkbox">
                        <input type="checkbox" class="checkSingle" id="{{ $doctor->id }}">
                        <span class="checkmark"></span>
                    </label>
                </td>
                <td><img src="{{$doctor->image}}" width="50px" height="50px" alt=""></td>
                <td>{{ $doctor->name }}</td>
                <td>{{ $doctor->email }}</td>
                <td>{{ $doctor->phone }}</td>
                <td>{{ $doctor->getSpecialization() }}</td>
                <td>
                    @if ($doctor->is_blocked)
                        <span class="btn btn-sm round btn-outline-danger">
                            {{ awtTrans('محظور') }} <i class="la la-close font-medium-2"></i>
                        </span>
                    @else
                        <span class="btn btn-sm round btn-outline-success">
                            {{ awtTrans('غير محظور') }} <i class="la la-check font-medium-2"></i>
                        </span>
                    @endif
                </td>
                <td>
                    @if ($doctor->is_approved)
                        <span class="btn btn-sm round btn-outline-success">
                             {{__('dashboard.accepted')}} <i class="la la-close font-medium-2"></i>
                        </span>
                    @else
                        <span class="btn btn-sm round btn-outline-danger">
                             {{__('dashboard.un_accepted')}} <i class="la la-check font-medium-2"></i>
                        </span>
                    @endif
                </td>

                <td class="product-action">
                    @if($doctor->dates->count() != 1)
                        <span class="text-primary"><a href="{{route('admin.doctors.appointments',$doctor->id)}}"><i
                                        class="feather icon-file-plus"></i></a></span>
                    @endif
                    @if($doctor->dates->count() == 1)

                        <span class="action-edit text-primary"><a
                                    href="{{ route('admin.doctors.edit.appointments', ['id' => $doctor->id]) }}"><i
                                        class="feather icon-edit"></i></a></span>

                </td>
                @endif

                <td class="product-action">
                    <span class="text-primary"><a href="{{ route('admin.doctors.show', ['id' => $doctor->id]) }}"><i
                                    class="feather icon-eye"></i></a></span>
                    <span class="action-edit text-primary"><a
                                href="{{ route('admin.doctors.edit', ['id' => $doctor->id]) }}"><i
                                    class="feather icon-edit"></i></a></span>
                    <span class="delete-row text-danger" data-url="{{ url('admin/doctors/' . $doctor->id) }}"><i
                                class="feather icon-trash"></i></span>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{-- table content --}}
    {{-- no data found div --}}
    @if ($doctors->count() == 0)
        <div class="d-flex flex-column w-100 align-center mt-4">
            <img src="{{asset('admin/app-assets/images/pages/404.png')}}" alt="">
            <span class="mt-2" style="font-family: cairo">{{awtTrans('لا يوجد نتائج مطابقة')}}</span>
        </div>
    @endif
    {{-- no data found div --}}

</div>
{{-- pagination  links div --}}
@if ($doctors->count() > 0 && $doctors instanceof \Illuminate\Pagination\AbstractPaginator )
    <div class="d-flex justify-content-center mt-3">
        {{$doctors->links()}}
    </div>
@endif
{{-- pagination  links div --}}

