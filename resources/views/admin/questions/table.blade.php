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
                <th>{{awtTrans('الصوره')}}</th>
                <th>{{awtTrans('الاسم')}}</th>
                <th>{{awtTrans('البريد الالكتروني')}}</th>
                <th>{{awtTrans('رقم الهاتف')}}</th>
                <th>{{awtTrans('حالة الحظر')}}</th>
                <th>{{awtTrans('التحكم')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($questions as $question)
                <tr class="delete_row">
                    <td class="text-center">
                        <label class="container-checkbox">
                        <input type="checkbox" class="checkSingle" id="{{ $question->id }}">
                        <span class="checkmark"></span>
                        </label>
                    </td>
                    <td><img src="{{$question->image}}" width="50px" height="50px" alt=""></td>
                    <td>{{ $question->name }}</td>
                    <td>{{ $question->email }}</td>
                    <td>{{ $question->phone }}</td>
                    <td>
                        @if ($question->is_blocked)
                        <span class="btn btn-sm round btn-outline-danger">
                            {{ awtTrans('محظور') }} <i class="la la-close font-medium-2"></i>
                        </span>
                        @else
                        <span class="btn btn-sm round btn-outline-success">
                            {{ awtTrans('غير محظور') }} <i class="la la-check font-medium-2"></i>
                        </span>
                        @endif
                    </td>
                    
                    <td class="product-action"> 
                        <span class="text-primary"><a href="{{ route('admin.questions.show', ['id' => $question->id]) }}"><i class="feather icon-eye"></i></a></span>
                        <span class="action-edit text-primary"><a href="{{ route('admin.questions.edit', ['id' => $question->id]) }}"><i class="feather icon-edit"></i></a></span>
                        <span class="delete-row text-danger" data-url="{{ url('admin/questions/' . $question->id) }}"><i class="feather icon-trash"></i></span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- table content --}}
    {{-- no data found div --}}
    @if ($questions->count() == 0)
        <div class="d-flex flex-column w-100 align-center mt-4">
            <img src="{{asset('admin/app-assets/images/pages/404.png')}}" alt="">
            <span class="mt-2" style="font-family: cairo">{{awtTrans('لا يوجد نتائج مطابقة')}}</span>
        </div>
    @endif
    {{-- no data found div --}}

</div>
{{-- pagination  links div --}}
@if ($questions->count() > 0 && $questions instanceof \Illuminate\Pagination\AbstractPaginator )
    <div class="d-flex justify-content-center mt-3">
        {{$questions->links()}}
    </div>
@endif
{{-- pagination  links div --}}

