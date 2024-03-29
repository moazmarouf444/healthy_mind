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
                <th>{{awtTrans('الرابط')}}</th>
                <th>{{awtTrans('التحكم')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($socials as $social)
                <tr class="delete_social">
                    <td class="text-center">
                        <label class="container-checkbox">
                            <input type="checkbox" class="checkSingle" id="{{$social->id}}">
                            <span class="checkmark"></span>
                        </label>
                    </td>
                    <td><img src="{{$social->image}}" width="50px" height="50px" alt=""></td>
                    <td>{{$social->name}}</td>
                    <td>{{$social->link}}</td>
                    <td class="product-action">
                        <span class="text-primary"><a href="{{route('admin.socials.show' , ['id' => $social->id])}}"><i class="feather icon-eye"></i></a></span>
                        <span class="action-edit text-primary"><a href="{{route('admin.socials.edit' , ['id' => $social->id])}}"><i class="feather icon-edit"></i></a></span>
                        <span class="delete-row text-danger" data-url="{{url('admin/socials/'.$social->id)}}"><i class="feather icon-trash"></i></span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- table content --}}
    {{-- no data found div --}}
    @if ($socials->count() == 0)
        <div class="d-flex flex-column w-100 align-center mt-4">
            <img src="http://127.0.0.1:8000/admin/app-assets/images/pages/404.png" alt="">
            <span class="mt-2" style="font-family: cairo">{{awtTrans('لا يوجد نتائج مطابقة')}}</span>
        </div>
    @endif
    {{-- no data found div --}}

</div>
{{-- pagination  links div --}}
@if ($socials->count() > 0 && $socials instanceof \Illuminate\Pagination\AbstractPaginator )
    <div class="d-flex justify-content-center mt-3">
        {{$socials->links()}}
    </div>
@endif
{{-- pagination  links div --}}