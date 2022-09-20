<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\socials\Store;
use App\Http\Requests\Admin\socials\Update;
use App\Models\Social ;
use App\Traits\Report;


class SocialController extends Controller
{
    public function index($id = null)
    {
        if (request()->ajax()) {
            $socials = Social::search(request()->searchArray)->paginate(30);
            $html = view('admin.socials.table' ,compact('socials'))->render() ;
            return response()->json(['html' => $html]);
        }
        return view('admin.socials.index');
    }

    public function create()
    {
        return view('admin.socials.create');
    }


    public function store(Store $request)
    {
        Social::create($request->validated());
        Report::addToLog('  اضافه وسيله تواصل ') ;
        return response()->json(['url' => route('admin.socials.index')]);
    }
    public function edit($id)
    {
        $social = Social::findOrFail($id);
        return view('admin.socials.edit' , ['social' => $social]);
    }

    public function update(Update $request, $id)
    {
        $social = Social::findOrFail($id)->update($request->validated());
        Report::addToLog('  تعديل وسيله تواصل ') ;
        return response()->json(['url' => route('admin.socials.index')]);
    }

    public function show($id)
    {
        $social = Social::findOrFail($id);
        return view('admin.socials.show' , ['social' => $social]);
    }
    public function destroy($id)
    {
        $social = Social::findOrFail($id)->delete();
        Report::addToLog('  حذف وسيله تواصل ') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (Social::WhereIn('id',$ids)->get()->each->delete()) {
            Report::addToLog('  حذف العديد من وسائل تواصل') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
