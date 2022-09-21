<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\prescriptions\Store;
use App\Http\Requests\Admin\prescriptions\Update;
use App\Models\Prescription ;
use App\Traits\Report;


class PrescriptionController extends Controller
{
    public function index($id = null)
    {
        if (request()->ajax()) {
            $prescriptions = Prescription::search(request()->searchArray)->paginate(30);
            $html = view('admin.prescriptions.table' ,compact('prescriptions'))->render() ;
            return response()->json(['html' => $html]);
        }
        return view('admin.prescriptions.index');
    }

    public function create()
    {
        return view('admin.prescriptions.create');
    }


    public function store(Store $request)
    {
        Prescription::create($request->validated());
        Report::addToLog('  اضافه الوصفه الطبيه') ;
        return response()->json(['url' => route('admin.prescriptions.index')]);
    }
    public function edit($id)
    {
        $prescription = Prescription::findOrFail($id);
        return view('admin.prescriptions.edit' , ['prescription' => $prescription]);
    }

    public function update(Update $request, $id)
    {
        $prescription = Prescription::findOrFail($id)->update($request->validated());
        Report::addToLog('  تعديل الوصفه الطبيه') ;
        return response()->json(['url' => route('admin.prescriptions.index')]);
    }

    public function show($id)
    {
        $prescription = Prescription::findOrFail($id);
        return view('admin.prescriptions.show' , ['prescription' => $prescription]);
    }
    public function destroy($id)
    {
        $prescription = Prescription::findOrFail($id)->delete();
        Report::addToLog('  حذف الوصفه الطبيه') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (Prescription::WhereIn('id',$ids)->get()->each->delete()) {
            Report::addToLog('  حذف العديد من الوصفات الطبيه') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
