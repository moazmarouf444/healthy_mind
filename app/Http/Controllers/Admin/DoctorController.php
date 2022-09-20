<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\doctors\DoctorStoreDates;
use App\Http\Requests\Admin\doctors\DoctorUpdateDates;
use App\Http\Requests\Admin\doctors\Store;
use App\Http\Requests\Admin\doctors\Update;
use App\Models\Date;
use App\Models\Doctor;
use App\Traits\Report;
use App\Traits\SmsTrait;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class DoctorController extends Controller
{
    use Notifiable, UploadTrait, HasApiTokens, SmsTrait;

    public function index($id = null)
    {
        if (request()->ajax()) {
            $doctors = Doctor::search(request()->searchArray)->paginate(30);
            $html = view('admin.doctors.table' ,compact('doctors'))->render() ;
            return response()->json(['html' => $html]);
        }
        return view('admin.doctors.index');
    }

    public function create()
    {
        return view('admin.doctors.create');
    }


    public function store(Store $request)
    {
        Doctor::create($request->validated() + ['is_approved' => 1]);
        Report::addToLog('  اضافه طبيب') ;
        return response()->json(['url' => route('admin.doctors.index')]);
    }
    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('admin.doctors.edit' , ['doctor' => $doctor]);
    }

    public function update(Update $request, $id)
    {
        $doctor = Doctor::findOrFail($id)->update($request->validated());
        Report::addToLog('  تعديل طبيب') ;
        return response()->json(['url' => route('admin.doctors.index')]);
    }

    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('admin.doctors.show' , ['doctor' => $doctor]);
    }
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id)->delete();
        Report::addToLog('  حذف طبيب') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (Doctor::WhereIn('id',$ids)->get()->each->delete()) {
            Report::addToLog('  حذف العديد من اطباء') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
    public function viewAppointments($id){
        $doctor = Doctor::FindOrFail($id);
        return view('admin.doctors.view_appointments',compact('doctor'));
    }

    public function viewAppointmentsPost(DoctorStoreDates $request){
        Date::create($request->validated());
        return response()->json(['url' => route('admin.doctors.index')]);
    }
    public function editAppointments($id){
        $doctor = Doctor::FindOrFail($id);
        return view('admin.doctors.edit_appointments',compact('doctor'));
    }
    public function updateAppointments(DoctorStoreDates $request){
        $doctor = Doctor::findOrFail($request->doctor_id);
        $doctor->dates()->update($request->validated());
        return response()->json(['url' => route('admin.doctors.index')]);
    }
}
