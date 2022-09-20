@extends('admin.layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/index_page.css')}}">
@endsection

@section('content')

    <x-admin.table
            datefilter="true"
            order="true"
            extrabuttons="true"
            deletebutton="{{ route('admin.reservations.deleteAll') }}"

    >

        <x-slot name="extrabuttonsdiv">
            {{-- <a type="button" data-toggle="modal" data-target="#notify" class="btn bg-gradient-info mr-1 mb-1 waves-effect waves-light notify" data-id="all"><i class="feather icon-bell"></i> {{ awtTrans('ارسال اشعار') }}</a> --}}
        </x-slot>

        <x-slot name="tableContent">
            <div class="table_content_append">
                {{-- table content will appends here  --}}
            </div>
        </x-slot>
    </x-admin.table>



@endsection

@section('js')

    <script src="{{asset('admin/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/js/scripts/extensions/sweet-alerts.js')}}"></script>
    @include('admin.shared.deleteAll')
    @include('admin.shared.deleteOne')
    @include('admin.shared.filter_js' , [ 'index_route' => url('admin/reservations')])
@endsection

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
                <th>{{awtTrans('اسم المريض')}}</th>
                <th>{{awtTrans('اسم الدكتور')}}</th>
                <th>{{awtTrans('التاريخ')}}</th>
                <th>{{awtTrans('من')}}</th>
                <th>{{awtTrans('الي')}}</th>
                <th>{{awtTrans('التحكم')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
                <tr class="delete_row">
                    <td class="text-center">
                        <label class="container-checkbox">
                        <input type="checkbox" class="checkSingle" id="{{ $reservation->id }}">
                        <span class="checkmark"></span>
                        </label>
                    </td>
                    <td>{{ $reservation->user->name }}</td>
                    <td>{{ $reservation->doctor->name }}</td>
                    <td>{{ $reservation->date }}</td>
                    <td>{{ $reservation->start_time }}</td>
                    <td>{{ $reservation->end_time }}</td>
                    <td class="product-action">
                        <span class="text-primary"><a href="{{ route('admin.reservations.show', ['id' => $reservation->id]) }}"><i class="feather icon-eye"></i></a></span>
{{--                        <span class="action-edit text-primary"><a href="{{ route('admin.reservations.edit', ['id' => $reservation->id]) }}"><i class="feather icon-edit"></i></a></span>--}}
                        <span class="delete-row text-danger" data-url="{{ url('admin/reservations/' . $reservation->id) }}"><i class="feather icon-trash"></i></span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- table content --}}
    {{-- no data found div --}}
    @if ($reservations->count() == 0)
        <div class="d-flex flex-column w-100 align-center mt-4">
            <img src="{{asset('admin/app-assets/images/pages/404.png')}}" alt="">
            <span class="mt-2" style="font-family: cairo">{{awtTrans('لا يوجد نتائج مطابقة')}}</span>
        </div>
    @endif
    {{-- no data found div --}}

</div>
{{-- pagination  links div --}}
@if ($reservations->count() > 0 && $reservations instanceof \Illuminate\Pagination\AbstractPaginator )
    <div class="d-flex justify-content-center mt-3">
        {{$reservations->links()}}
    </div>
@endif
{{-- pagination  links div --}}

