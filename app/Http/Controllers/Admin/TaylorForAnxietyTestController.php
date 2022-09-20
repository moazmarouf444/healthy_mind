<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\taylorforanxietytests\Store;
use App\Http\Requests\Admin\taylorforanxietytests\Update;
use App\Models\TaylorForAnxietyTest ;
use App\Traits\Report;


class TaylorForAnxietyTestController extends Controller
{
    public function index($id = null)
    {
        if (request()->ajax()) {
            $taylorforanxietytests = TaylorForAnxietyTest::search(request()->searchArray)->paginate(30);
            $html = view('admin.taylorforanxietytests.table' ,compact('taylorforanxietytests'))->render() ;
            return response()->json(['html' => $html]);
        }
        return view('admin.taylorforanxietytests.index');
    }

    public function create()
    {
        return view('admin.taylorforanxietytests.create');
    }


    public function store(Store $request)
    {
        TaylorForAnxietyTest::create($request->validated());
        Report::addToLog('  اضافه مقياس تايلور للقلق') ;
        return response()->json(['url' => route('admin.taylorforanxietytests.index')]);
    }
    public function edit($id)
    {
        $taylorforanxietytest = TaylorForAnxietyTest::findOrFail($id);
        return view('admin.taylorforanxietytests.edit' , ['taylorforanxietytest' => $taylorforanxietytest]);
    }

    public function update(Update $request, $id)
    {
        $taylorforanxietytest = TaylorForAnxietyTest::findOrFail($id)->update($request->validated());
        Report::addToLog('  تعديل مقياس تايلور للقلق') ;
        return response()->json(['url' => route('admin.taylorforanxietytests.index')]);
    }

    public function show($id)
    {
        $taylorforanxietytest = TaylorForAnxietyTest::findOrFail($id);
        return view('admin.taylorforanxietytests.show' , ['taylorforanxietytest' => $taylorforanxietytest]);
    }
    public function destroy($id)
    {
        $taylorforanxietytest = TaylorForAnxietyTest::findOrFail($id)->delete();
        Report::addToLog('  حذف مقياس تايلور للقلق') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (TaylorForAnxietyTest::WhereIn('id',$ids)->get()->each->delete()) {
            Report::addToLog('  حذف العديد من مقياس تايلور للقلق') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
