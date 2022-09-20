<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\socialphobiatestquestions\Store;
use App\Http\Requests\Admin\socialphobiatestquestions\Update;
use App\Models\SocialPhobiaTestQuestion ;
use App\Traits\Report;


class SocialPhobiaTestQuestionController extends Controller
{
    public function index($id = null)
    {
        if (request()->ajax()) {
            $socialphobiatestquestions = SocialPhobiaTestQuestion::search(request()->searchArray)->paginate(30);
            $html = view('admin.socialphobiatestquestions.table' ,compact('socialphobiatestquestions'))->render() ;
            return response()->json(['html' => $html]);
        }
        return view('admin.socialphobiatestquestions.index');
    }

    public function create()
    {
        return view('admin.socialphobiatestquestions.create');
    }


    public function store(Store $request)
    {
        SocialPhobiaTestQuestion::create($request->validated());
        Report::addToLog('  اضافه اسئله واجابات مقياس الرهاب الاجتماعي') ;
        return response()->json(['url' => route('admin.socialphobiatestquestions.index')]);
    }
    public function edit($id)
    {
        $socialphobiatestquestion = SocialPhobiaTestQuestion::findOrFail($id);
        return view('admin.socialphobiatestquestions.edit' , ['socialphobiatestquestion' => $socialphobiatestquestion]);
    }

    public function update(Update $request, $id)
    {
        $socialphobiatestquestion = SocialPhobiaTestQuestion::findOrFail($id)->update($request->validated());
        Report::addToLog('  تعديل اسئله واجابات مقياس الرهاب الاجتماعي') ;
        return response()->json(['url' => route('admin.socialphobiatestquestions.index')]);
    }

    public function show($id)
    {
        $socialphobiatestquestion = SocialPhobiaTestQuestion::findOrFail($id);
        return view('admin.socialphobiatestquestions.show' , ['socialphobiatestquestion' => $socialphobiatestquestion]);
    }
    public function destroy($id)
    {
        $socialphobiatestquestion = SocialPhobiaTestQuestion::findOrFail($id)->delete();
        Report::addToLog('  حذف اسئله واجابات مقياس الرهاب الاجتماعي') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (SocialPhobiaTestQuestion::WhereIn('id',$ids)->get()->each->delete()) {
            Report::addToLog('  حذف العديد من اسئله واجوبه مقياس الرهاب الاجتماعي ') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
