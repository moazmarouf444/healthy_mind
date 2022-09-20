<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\selfassertiontests\Store;
use App\Http\Requests\Admin\selfassertiontests\Update;
use App\Models\SelfAssertionTest ;
use App\Traits\Report;


class SelfAssertionTestController extends Controller
{
    public function index($id = null)
    {
        if (request()->ajax()) {
            $selfassertiontests = SelfAssertionTest::search(request()->searchArray)->paginate(30);
            $html = view('admin.selfassertiontests.table' ,compact('selfassertiontests'))->render() ;
            return response()->json(['html' => $html]);
        }
        return view('admin.selfassertiontests.index');
    }

    public function create()
    {
        return view('admin.selfassertiontests.create');
    }


    public function store(Store $request)
    {
        SelfAssertionTest::create($request->validated());
        Report::addToLog('  اضافه مقياس توكيد الذات ') ;
        return response()->json(['url' => route('admin.selfassertiontests.index')]);
    }
    public function edit($id)
    {
        $selfassertiontest = SelfAssertionTest::findOrFail($id);
        return view('admin.selfassertiontests.edit' , ['selfassertiontest' => $selfassertiontest]);
    }

    public function update(Update $request, $id)
    {
        $selfassertiontest = SelfAssertionTest::findOrFail($id)->update($request->validated());
        Report::addToLog('  تعديل مقياس توكيد الذات ') ;
        return response()->json(['url' => route('admin.selfassertiontests.index')]);
    }

    public function show($id)
    {
        $selfassertiontest = SelfAssertionTest::findOrFail($id);
        return view('admin.selfassertiontests.show' , ['selfassertiontest' => $selfassertiontest]);
    }
    public function destroy($id)
    {
        $selfassertiontest = SelfAssertionTest::findOrFail($id)->delete();
        Report::addToLog('  حذف مقياس توكيد الذات ') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (SelfAssertionTest::WhereIn('id',$ids)->get()->each->delete()) {
            Report::addToLog('  حذف العديد من مقاييس توكيد الذات') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
