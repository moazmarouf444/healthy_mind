<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\depression_test\Store;
use App\Http\Requests\Admin\depression_test\Update;
use App\Models\Test ;
use App\Traits\Report;


class TestController extends Controller
{
    public function index($id = null)
    {
        if (request()->ajax()) {
            $tests = Test::search(request()->searchArray)->paginate(30);
            $html = view('admin.tests.table' ,compact('tests'))->render() ;
            return response()->json(['html' => $html]);
        }
        return view('admin.tests.index');
    }

    public function create()
    {
        return view('admin.tests.create');
    }


    public function store(Store $request)
    {
        Test::create($request->validated());
        Report::addToLog('  اضافه اختبار') ;
        return response()->json(['url' => route('admin.tests.index')]);
    }
    public function edit($id)
    {
        $test = Test::findOrFail($id);
        return view('admin.tests.edit' , ['test' => $test]);
    }

    public function update(Update $request, $id)
    {
        $test = Test::findOrFail($id)->update($request->validated());
        Report::addToLog('  تعديل اختبار') ;
        return response()->json(['url' => route('admin.tests.index')]);
    }

    public function show($id)
    {
        $test = Test::findOrFail($id);
        return view('admin.tests.show' , ['test' => $test]);
    }
    public function destroy($id)
    {
        $test = Test::findOrFail($id)->delete();
        Report::addToLog('  حذف اختبار') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (Test::WhereIn('id',$ids)->get()->each->delete()) {
            Report::addToLog('  حذف العديد من اختبارات') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
