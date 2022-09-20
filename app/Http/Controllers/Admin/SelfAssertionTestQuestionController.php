<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\selfassertiontestquestions\Store;
use App\Http\Requests\Admin\selfassertiontestquestions\Update;
use App\Models\SelfAssertionTestQuestion ;
use App\Traits\Report;


class SelfAssertionTestQuestionController extends Controller
{
    public function index($id = null)
    {
        if (request()->ajax()) {
            $selfassertiontestquestions = SelfAssertionTestQuestion::search(request()->searchArray)->paginate(30);
            $html = view('admin.selfassertiontestquestions.table' ,compact('selfassertiontestquestions'))->render() ;
            return response()->json(['html' => $html]);
        }
        return view('admin.selfassertiontestquestions.index');
    }

    public function create()
    {
        return view('admin.selfassertiontestquestions.create');
    }


    public function store(Store $request)
    {
        SelfAssertionTestQuestion::create($request->validated());
        Report::addToLog('  اضافه اسئله واجابات مقياس توكيد الذات') ;
        return response()->json(['url' => route('admin.selfassertiontestquestions.index')]);
    }
    public function edit($id)
    {
        $selfassertiontestquestion = SelfAssertionTestQuestion::findOrFail($id);
        return view('admin.selfassertiontestquestions.edit' , ['selfassertiontestquestion' => $selfassertiontestquestion]);
    }

    public function update(Update $request, $id)
    {
        $selfassertiontestquestion = SelfAssertionTestQuestion::findOrFail($id)->update($request->validated());
        Report::addToLog('  تعديل اسئله واجابات مقياس توكيد الذات') ;
        return response()->json(['url' => route('admin.selfassertiontestquestions.index')]);
    }

    public function show($id)
    {
        $selfassertiontestquestion = SelfAssertionTestQuestion::findOrFail($id);
        return view('admin.selfassertiontestquestions.show' , ['selfassertiontestquestion' => $selfassertiontestquestion]);
    }
    public function destroy($id)
    {
        $selfassertiontestquestion = SelfAssertionTestQuestion::findOrFail($id)->delete();
        Report::addToLog('  حذف اسئله واجابات مقياس توكيد الذات') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (SelfAssertionTestQuestion::WhereIn('id',$ids)->get()->each->delete()) {
            Report::addToLog('  حذف العديد من اسئله واجابات مقياس توكيد الذات') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
