<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\introductions\Store;
use App\Http\Requests\Admin\introductions\Update;
use App\Models\Introduction ;
use App\Traits\Report;


class IntroductionController extends Controller
{
    public function index($id = null)
    {
        if (request()->ajax()) {
            $introductions = Introduction::search(request()->searchArray)->paginate(30);
            $html = view('admin.introductions.table' ,compact('introductions'))->render() ;
            return response()->json(['html' => $html]);
        }
        return view('admin.introductions.index');
    }

    public function create()
    {
        return view('admin.introductions.create');
    }


    public function store(Store $request)
    {
        Introduction::create($request->validated());
        Report::addToLog('  اضافه مقدمه') ;
        return response()->json(['url' => route('admin.introductions.index')]);
    }
    public function edit($id)
    {
        $introduction = Introduction::findOrFail($id);
        return view('admin.introductions.edit' , ['introduction' => $introduction]);
    }

    public function update(Update $request, $id)
    {
        $introduction = Introduction::findOrFail($id)->update($request->validated());
        Report::addToLog('  تعديل مقدمه') ;
        return response()->json(['url' => route('admin.introductions.index')]);
    }

    public function show($id)
    {
        $introduction = Introduction::findOrFail($id);
        return view('admin.introductions.show' , ['introduction' => $introduction]);
    }
    public function destroy($id)
    {
        $introduction = Introduction::findOrFail($id)->delete();
        Report::addToLog('  حذف مقدمه') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (Introduction::WhereIn('id',$ids)->get()->each->delete()) {
            Report::addToLog('  حذف العديد من مقدمات') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
