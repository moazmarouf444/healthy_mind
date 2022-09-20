<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\articles\Store;
use App\Http\Requests\Admin\articles\Update;
use App\Models\Article ;
use App\Traits\Report;


class ArticleController extends Controller
{
    public function index($id = null)
    {
        if (request()->ajax()) {
            $articles = Article::search(request()->searchArray)->paginate(30);
            $html = view('admin.articles.table' ,compact('articles'))->render() ;
            return response()->json(['html' => $html]);
        }
        return view('admin.articles.index');
    }

    public function create()
    {
        return view('admin.articles.create');
    }


    public function store(Store $request)
    {
        Article::create($request->validated());
        Report::addToLog('  اضافه مقال') ;
        return response()->json(['url' => route('admin.articles.index')]);
    }
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.articles.edit' , ['article' => $article]);
    }

    public function update(Update $request, $id)
    {
        $article = Article::findOrFail($id)->update($request->validated());
        Report::addToLog('  تعديل مقال') ;
        return response()->json(['url' => route('admin.articles.index')]);
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.articles.show' , ['article' => $article]);
    }
    public function destroy($id)
    {
        $article = Article::findOrFail($id)->delete();
        Report::addToLog('  حذف مقال') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (Article::WhereIn('id',$ids)->get()->each->delete()) {
            Report::addToLog('  حذف العديد من مقالات') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
