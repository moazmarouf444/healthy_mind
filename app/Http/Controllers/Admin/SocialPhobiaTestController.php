<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\socialphobiatests\Store;
use App\Http\Requests\Admin\socialphobiatests\Update;
use App\Models\SocialPhobiaTest ;
use App\Traits\Report;


class SocialPhobiaTestController extends Controller
{
    public function index($id = null)
    {
        if (request()->ajax()) {
            $socialphobiatests = SocialPhobiaTest::search(request()->searchArray)->paginate(30);
            $html = view('admin.socialphobiatests.table' ,compact('socialphobiatests'))->render() ;
            return response()->json(['html' => $html]);
        }
        return view('admin.socialphobiatests.index');
    }

    public function create()
    {
        return view('admin.socialphobiatests.create');
    }


    public function store(Store $request)
    {
        SocialPhobiaTest::create($request->validated());
        Report::addToLog('  اضافه الرهاب الاجتماعي') ;
        return response()->json(['url' => route('admin.socialphobiatests.index')]);
    }
    public function edit($id)
    {
        $socialphobiatest = SocialPhobiaTest::findOrFail($id);
        return view('admin.socialphobiatests.edit' , ['socialphobiatest' => $socialphobiatest]);
    }

    public function update(Update $request, $id)
    {
        $socialphobiatest = SocialPhobiaTest::findOrFail($id)->update($request->validated());
        Report::addToLog('  تعديل الرهاب الاجتماعي') ;
        return response()->json(['url' => route('admin.socialphobiatests.index')]);
    }

    public function show($id)
    {
        $socialphobiatest = SocialPhobiaTest::findOrFail($id);
        return view('admin.socialphobiatests.show' , ['socialphobiatest' => $socialphobiatest]);
    }
    public function destroy($id)
    {
        $socialphobiatest = SocialPhobiaTest::findOrFail($id)->delete();
        Report::addToLog('  حذف الرهاب الاجتماعي') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (SocialPhobiaTest::WhereIn('id',$ids)->get()->each->delete()) {
            Report::addToLog('  حذف العديد من الرعاب الاجتماعي') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
