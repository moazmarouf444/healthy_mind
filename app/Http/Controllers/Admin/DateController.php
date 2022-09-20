<?php

namespace App\Http\Controllers\Admin;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\dates\Store;
use App\Http\Requests\Admin\dates\Update;
use App\Models\Date ;
use App\Traits\Report;


class DateController extends Controller
{
    public function index($id = null)
    {
        if (request()->ajax()) {
            $dates = Date::search(request()->searchArray)->paginate(30);
            $html = view('admin.dates.table' ,compact('dates'))->render() ;
            return response()->json(['html' => $html]);
        }
        return view('admin.dates.index');
    }

    public function create($doctor_id)
    {
        $doctor = Doctor::findOrFail($doctor_id);
        return view('admin.dates.create',compact('doctor'));
    }


    public function store(Store $request)
    {
        Date::create($request->validated());
        Report::addToLog('  اضافه ميعاد الدكتور مواعيد') ;
        return response()->json(['url' => route('admin.dates.index')]);
    }
    public function edit($id)
    {
        $date = Date::findOrFail($id);
        return view('admin.dates.edit' , ['date' => $date]);
    }

    public function update(Update $request, $id)
    {
        $date = Date::findOrFail($id)->update($request->validated());
        Report::addToLog('  تعديل ميعاد الدكتور مواعيد') ;
        return response()->json(['url' => route('admin.dates.index')]);
    }

    public function show($id)
    {
        $date = Date::findOrFail($id);
        return view('admin.dates.show' , ['date' => $date]);
    }
    public function destroy($id)
    {
        $date = Date::findOrFail($id)->delete();
        Report::addToLog('  حذف ميعاد الدكتور مواعيد') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (Date::WhereIn('id',$ids)->get()->each->delete()) {
            Report::addToLog('  حذف العديد من الدكتور --seed --request') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
