<?php

namespace App\Http\Controllers\Site;

use App\Models\IntroSlider;
use App\Models\IntroSocial;
use App\Models\SiteSetting;
use App\Models\IntroHowWork;
use App\Models\IntroService;
use Illuminate\Http\Request;
use App\Models\IntroMessages;
use App\Models\IntroPartener;
use App\Models\IntroFqsCategory;
use App\Services\SettingService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Site\sendMessageRequest;

class IntroController extends Controller
{
    public function index()
    {

        return view('site.index');
    }


    public function sendMessage(sendMessageRequest $request)
    {
        IntroMessages::create($request->validated());
        return response()->json(['status' => 'done' , 'message' => __('intro_site.message_sent') ]) ;
    }

    /***************** change lang  *****************/
    public function SetLanguage($lang)
    {
        if ( in_array( $lang, [ 'ar', 'en' ] ) ) {

            if ( session() -> has( 'lang' ) )
                session() -> forget( 'lang' );

            session() -> put( 'lang', $lang );

        } else {
            if ( session() -> has( 'lang' ) )
                session() -> forget( 'lang' );

            session() -> put( 'lang', 'ar' );
        }

//        dd(session( 'lang' ));
        return back();
    }
}
