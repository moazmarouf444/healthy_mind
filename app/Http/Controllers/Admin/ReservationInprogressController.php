<?php

namespace App\Http\Controllers\Admin;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\reservationinprogresses\Store;
use App\Http\Requests\Admin\reservationinprogresses\Update;
use App\Models\ReservationInprogress ;
use App\Traits\Report;


class ReservationInprogressController extends Controller
{
    public function index($id = null)
    {
        if (request()->ajax()) {
            $reservationinprogresses = Reservation::search(request()->searchArray)->where('status','inprogress')->paginate(30);
            $html = view('admin.reservationinprogresses.table' ,compact('reservationinprogresses'))->render() ;
            return response()->json(['html' => $html]);
        }
        return view('admin.reservationinprogresses.index');
    }

    public function create()
    {
        return view('admin.reservationinprogresses.create');
    }


    public function store(Store $request)
    {
        ReservationInprogress::create($request->validated());
        Report::addToLog('  اضافه الخحوزات الجاريه') ;
        return response()->json(['url' => route('admin.reservationinprogresses.index')]);
    }
    public function edit($id)
    {
        $reservationinprogress = ReservationInprogress::findOrFail($id);
        return view('admin.reservationinprogresses.edit' , ['reservationinprogress' => $reservationinprogress]);
    }

    public function update(Update $request, $id)
    {
        $reservationinprogress = ReservationInprogress::findOrFail($id)->update($request->validated());
        Report::addToLog('  تعديل الخحوزات الجاريه') ;
        return response()->json(['url' => route('admin.reservationinprogresses.index')]);
    }

    public function show($id)
    {
        $reservationinprogress = ReservationInprogress::findOrFail($id);
        return view('admin.reservationinprogresses.show' , ['reservationinprogress' => $reservationinprogress]);
    }
    public function destroy($id)
    {
        $reservationinprogress = ReservationInprogress::findOrFail($id)->delete();
        Report::addToLog('  حذف الخحوزات الجاريه') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (ReservationInprogress::WhereIn('id',$ids)->get()->each->delete()) {
            Report::addToLog('  حذف العديد من الخحوزات الجاريه') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
