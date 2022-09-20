<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Section\ArticleRequest;
use App\Http\Resources\Api\Sections\AboutResource;
use App\Http\Resources\Api\Sections\ArticleResource;
use App\Http\Resources\Api\Sections\HelpResource;
use App\Http\Resources\Api\Sections\IntroductionsResource;
use App\Http\Resources\Api\Settings\CategoryResource;
use App\Http\Resources\Api\Settings\CityResource;
use App\Http\Resources\Api\Settings\CountryResource;
use App\Http\Resources\Api\Settings\CountryWithCitiesResource;
use App\Http\Resources\Api\Settings\FqsResource;
use App\Http\Resources\Api\Settings\ImageResource;
use App\Http\Resources\Api\Settings\IntroResource;
use App\Http\Resources\Api\Settings\SocialResource;
use App\Models\About;
use App\Models\Article;
use App\Models\Category;
use App\Models\City;
use App\Models\Fqs;
use App\Models\Help;
use App\Models\Image;
use App\Models\Intro;
use App\Models\Introduction;
use App\Models\Order;
use App\Models\SiteSetting;
use App\Models\Social;
use App\Services\SettingService;
use App\Traits\ResponseTrait;

class SettingController extends Controller {
  use ResponseTrait;

  public function settings() {
    $data = SettingService::appInformations(SiteSetting::pluck('value', 'key'));
    return $this->successData(['settings' => $data]);
  }

  public function introductions(){
      $introductions = IntroductionsResource::collection(Introduction::latest()->take(3)->get());
      return $this->successData(['introductions' => $introductions]);
  }

  public function socials() {
    $socials = SocialResource::collection(Social::latest()->get());
    return $this->successData(['socials' => $socials]);
  }

  public function about()
  {
      $abouts = AboutResource::collection(About::latest()->get());
      return $this->successData(['abouts' => $abouts]);
  }
  public function help()
  {
      $helps = HelpResource::collection(Help::latest()->get());
      return $this->successData(['helps' => $helps]);
  }
  public function articles(){
      $articles = ArticleResource::collection(Article::latest()->get());
      return $this->successData(['articles' => $articles]);
  }
  public function article(ArticleRequest $request){
      $articles = ArticleResource::collection(Article::where('id',$request->id)->get());
      return $this->successData(['articles' => $articles]);

  }
}
