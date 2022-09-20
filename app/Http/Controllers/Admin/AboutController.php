<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\abouts\Store;
use App\Http\Requests\Admin\abouts\Update;
use App\Models\About ;
use App\Traits\Report;


class AboutController extends Controller
{
    public function index($id = null)
    {
        if (request()->ajax()) {
            $abouts = About::search(request()->searchArray)->paginate(30);
            $html = view('admin.abouts.table' ,compact('abouts'))->render() ;
            return response()->json(['html' => $html]);
        }
        return view('admin.abouts.index');
    }

    public function create()
    {
        return view('admin.abouts.create');
    }


    public function store(Store $request)
    {
        About::create($request->validated());
        Report::addToLog('  اضافه عن التطبيق') ;
        return response()->json(['url' => route('admin.abouts.index')]);
    }
    public function edit($id)
    {
        $about = About::findOrFail($id);
        return view('admin.abouts.edit' , ['about' => $about]);
    }

    public function update(Update $request, $id)
    {
        $about = About::findOrFail($id)->update($request->validated());
        Report::addToLog('  تعديل عن التطبيق') ;
        return response()->json(['url' => route('admin.abouts.index')]);
    }

    public function show($id)
    {
        $about = About::findOrFail($id);
        return view('admin.abouts.show' , ['about' => $about]);
    }
    public function destroy($id)
    {
        $about = About::findOrFail($id)->delete();
        Report::addToLog('  حذف عن التطبيق') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (About::WhereIn('id',$ids)->get()->each->delete()) {
            Report::addToLog('  حذف العديد من عن التطبيق') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
