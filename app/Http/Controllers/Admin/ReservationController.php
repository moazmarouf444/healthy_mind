<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\reservations\Store;
use App\Http\Requests\Admin\reservations\Update;
use App\Models\Reservation ;
use App\Traits\Report;


class ReservationController extends Controller
{
    public function index($id = null)
    {
        if (request()->ajax()) {
            $reservations = Reservation::search(request()->searchArray)->paginate(30);
            $html = view('admin.reservations.table' ,compact('reservations'))->render() ;
            return response()->json(['html' => $html]);
        }
        return view('admin.reservations.index');
    }

    public function reservationInprogress(){
        if (request()->ajax()) {
            $reservations = Reservation::where('status','inprogress')->search(request()->searchArray)->paginate(30);
            $html = view('admin.reservations.table' ,compact('reservations'))->render() ;
            return response()->json(['html' => $html]);
        }
        return view('admin.reservations.inprogress_index');

    }
    public function reservationFinished(){
        if (request()->ajax()) {
            $reservations = Reservation::search(request()->searchArray)->where('status','finished')->paginate(30);
            $html = view('admin.reservations.table' ,compact('reservations'))->render() ;
            return response()->json(['html' => $html]);
        }
        return view('admin.reservations.index');

    }
    public function reservationRefused(){
        if (request()->ajax()) {
            $reservations = Reservation::search(request()->searchArray)->where('status','refused')->paginate(30);
            $html = view('admin.reservations.table' ,compact('reservations'))->render() ;
            return response()->json(['html' => $html]);
        }
        return view('admin.reservations.index');

    }


    public function create()
    {
        return view('admin.reservations.create');
    }


    public function store(Store $request)
    {
        Reservation::create($request->validated());
        Report::addToLog('  اضافه الخحز') ;
        return response()->json(['url' => route('admin.reservations.index')]);
    }
    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('admin.reservations.edit' , ['reservation' => $reservation]);
    }

    public function update(Update $request, $id)
    {
        $reservation = Reservation::findOrFail($id)->update($request->validated());
        Report::addToLog('  تعديل الخحز') ;
        return response()->json(['url' => route('admin.reservations.index')]);
    }

    public function show($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('admin.reservations.show' , ['reservation' => $reservation]);
    }
    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id)->delete();
        Report::addToLog('  حذف الخحز') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (Reservation::WhereIn('id',$ids)->get()->each->delete()) {
            Report::addToLog('  حذف العديد من الخحوزات') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }


}
