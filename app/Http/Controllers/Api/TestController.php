<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Admin\SelfAssertionTestController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Tests\TestRequest;
use App\Http\Resources\Api\BuildingsResource;
use App\Http\Resources\Api\Settings\SliderResource;
use App\Http\Resources\Api\Tests\DepressionResource;
use App\Http\Resources\Api\Tests\SelfAssertionResource;
use App\Http\Resources\Api\Tests\SocialPhobiaResource;
use App\Http\Resources\Api\Tests\TaylorResource;
use App\Models\DepressionTest;
use App\Models\SelfAssertionTest;
use App\Models\SocialPhobiaTest;
use App\Models\TaylorForAnxietyTest;
use App\Models\TaylorForAnxietyTestQuestion;
use App\Models\TestResults;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class TestController extends Controller
{
    use ResponseTrait;

    public function depression()
    {
        $depression = DepressionResource::collection(DepressionTest::latest()->get());
        return $this->successData(['depression' => $depression]);
    }

    public function depressionResult(TestRequest $request)
    {

        if ($request->count <= 9) {
            $testResults = new TestResults();
            $testResults->user_id = $request->user_id;
            $testResults->count = $request->count;
            $testResults->setTranslation('test_name', 'ar', 'مقياس بيك للاكتئاب')
                ->setTranslation('test_name', 'en', 'Beck Depression Scale');
            $testResults->setTranslation('result', 'ar', 'لا يوجد اكتئاب')
                ->setTranslation('result', 'en', 'there is_no depression')
                ->save();
            return $this->response('success', __('dashboard.there_is_no_depression'));
        } elseif ($request->count == 10 || $request->count <= 15) {
            $testResults = new TestResults();
            $testResults->user_id = $request->user_id;
            $testResults->count = $request->count;
            $testResults->setTranslation('test_name', 'ar', 'مقياس بيك للاكتئاب')
                ->setTranslation('test_name', 'en', 'Beck Depression Scale');
            $testResults->setTranslation('result', 'ar', 'اكتئاب بسيط')
                ->setTranslation('result', 'en', 'simple depression')
                ->save();
            return $this->response('success', __('dashboard.simple_depression'));
        } elseif ($request->count == 16 || $request->count <= 23) {
            $testResults = new TestResults();
            $testResults->user_id = $request->user_id;
            $testResults->count = $request->count;
            $testResults->setTranslation('test_name', 'ar', 'مقياس بيك للاكتئاب')
                ->setTranslation('test_name', 'en', 'Beck Depression Scale');
            $testResults->setTranslation('result', 'ar', 'اكتئاب متوسط')
                ->setTranslation('result', 'en', 'moderate depression')
                ->save();
            return $this->response('success', __('dashboard.moderate_depression'));
        } elseif ($request->count == 24 || $request->count <= 36) {
            $testResults = new TestResults();
            $testResults->user_id = $request->user_id;
            $testResults->count = $request->count;
            $testResults->setTranslation('test_name', 'ar', 'مقياس بيك للاكتئاب')
                ->setTranslation('test_name', 'en', 'Beck Depression Scale');
            $testResults->setTranslation('result', 'ar', 'اكتئاب شديد')
                ->setTranslation('result', 'en', 'severe depression')
                ->save();

            return $this->response('success', __('dashboard.severe_depression'));
        } elseif ($request->count >= 37) {
            $testResults = new TestResults();
            $testResults->user_id = $request->user_id;
            $testResults->count = $request->count;
            $testResults->setTranslation('test_name', 'ar', 'مقياس بيك للاكتئاب')
                ->setTranslation('test_name', 'en', 'Beck Depression Scale');
            $testResults->setTranslation('result', 'ar', 'اكتئاب شديد جدا')
                ->setTranslation('result', 'en', 'very severe depression')
                ->save();

            return $this->response('success', __('dashboard.very_severe_depression'));
        }
    }

    public function selfAssertion()
    {
        $selfAssertion = SelfAssertionResource::collection(SelfAssertionTest::latest()->get());
        return $this->successData(['selfAssertion' => $selfAssertion]);
    }

    public function selfAssertionResult(TestRequest $request)
    {
        if ($request->count <= 105) {
            $testResults = new TestResults();
            $testResults->user_id = $request->user_id;
            $testResults->count = $request->count;
            $testResults->setTranslation('test_name', 'ar', 'مقياس توكيد الذات')
                ->setTranslation('test_name', 'en', 'self-affirmation scale');
            $testResults->setTranslation('result', 'ar', 'انخفاض في التاكيد الذاتي')
                ->setTranslation('result', 'en', 'Decreased self-affirmation')
                ->save();
            return $this->response('success', __('dashboard.decreased_self_affirmation'));
        } else {
            $testResults = new TestResults();
            $testResults->user_id = $request->user_id;
            $testResults->count = $request->count;
            $testResults->setTranslation('test_name', 'ar', 'مقياس توكيد الذات')
                ->setTranslation('test_name', 'en', 'self-affirmation scale');
            $testResults->setTranslation('result', 'ar', 'ارتفاع  في التاكيد الذاتي')
                ->setTranslation('result', 'en', 'High in self-affirmation')
                ->save();
            return $this->response('success', __('dashboard.high_in_self_affirmation'));
        }
    }

    public function taylor()
    {
        $taylor = TaylorResource::collection(TaylorForAnxietyTest::latest()->get());
        return $this->successData(['taylor' => $taylor]);
    }

    public function taylorResult(TestRequest $request)
    {
        if ($request->count <= 16) {
            $testResults = new TestResults();
            $testResults->user_id = $request->user_id;
            $testResults->count = $request->count;
            $testResults->setTranslation('test_name', 'ar', 'مقياس تايلور للقلق')
                ->setTranslation('test_name', 'en', 'Taylor Anxiety Scale');
            $testResults->setTranslation('result', 'ar', 'قلق منخفض جدا')
                ->setTranslation('result', 'en', 'very low anxiety')
                ->save();

            return $this->response('success', __('dashboard.very_low_anxiety'));
        } elseif ($request->count == 17 || $request->count <= 19) {
            $testResults = new TestResults();
            $testResults->user_id = $request->user_id;
            $testResults->count = $request->count;
            $testResults->setTranslation('test_name', 'ar', 'مقياس تايلور للقلق')
                ->setTranslation('test_name', 'en', 'Taylor Anxiety Scale');
            $testResults->setTranslation('result', 'ar', 'قلق منحفض (طبيعي)')
                ->setTranslation('result', 'en', 'low_anxiety (normal)')
                ->save();

            return $this->response('success', __('dashboard.low_anxiety_(normal)'));
        } elseif ($request->count == 20 || $request->count <= 24) {
            $testResults = new TestResults();
            $testResults->user_id = $request->user_id;
            $testResults->count = $request->count;
            $testResults->setTranslation('test_name', 'ar', 'مقياس تايلور للقلق')
                ->setTranslation('test_name', 'en', 'Taylor Anxiety Scale');
            $testResults->setTranslation('result', 'ar', 'قلق متوسط')
                ->setTranslation('result', 'en', 'average anxiety')
                ->save();
            return $this->response('success', __('dashboard.average_anxiety'));
        } elseif ($request->count == 25 || $request->count <= 29) {
            $testResults = new TestResults();
            $testResults->user_id = $request->user_id;
            $testResults->count = $request->count;
            $testResults->setTranslation('test_name', 'ar', 'مقياس تايلور للقلق')
                ->setTranslation('test_name', 'en', 'Taylor Anxiety Scale');
            $testResults->setTranslation('result', 'ar', 'قلق فوق المتوسط')
                ->setTranslation('result', 'en', 'above average anxiety')
                ->save();

            return $this->response('success', __('dashboard.above_average_anxiety'));
        } elseif ($request->count == 25 || $request->count >= 30) {
            $testResults = new TestResults();
            $testResults->user_id = $request->user_id;
            $testResults->count = $request->count;
            $testResults->setTranslation('test_name', 'ar', 'مقياس تايلور للقلق')
                ->setTranslation('test_name', 'en', 'Taylor Anxiety Scale');
            $testResults->setTranslation('result', 'ar', 'قلق مرتفع')
                ->setTranslation('result', 'en', 'high anxiety')
                ->save();

            return $this->response('success', __('dashboard.high_anxiety'));
        }
    }

    public function socialPhobia()
    {
        $socialPhobia = SocialPhobiaResource::collection(SocialPhobiaTest::latest()->get());
        return $this->successData(['socialPhobia' => $socialPhobia]);
    }

    public function socialPhobiaQuestion(TestRequest $request)
    {
        if ($request->count <= 32) {
            $testResults = new TestResults();
            $testResults->user_id = $request->user_id;
            $testResults->count = $request->count;
            $testResults->setTranslation('test_name', 'ar', 'مقياس الرهاب الاجتماعي')
                ->setTranslation('test_name', 'en', 'social phobia scale');
            $testResults->setTranslation('result', 'ar', 'خواف اجتماعي منخفض')
                ->setTranslation('result', 'en', 'low social fear')
                ->save();
            return $this->response('success', __('dashboard.low_social_fear'));
        } else {
            $testResults = new TestResults();
            $testResults->user_id = $request->user_id;
            $testResults->count = $request->count;
            $testResults->setTranslation('test_name', 'ar', 'مقياس الرهاب الاجتماعي')
                ->setTranslation('test_name', 'en', 'social phobia scale');
            $testResults->setTranslation('result', 'ar', 'خواف اجتماعي مرتفع')
                ->setTranslation('result', 'en', 'high social fear')
                ->save();
            return $this->response('success', __('dashboard.high_social_fear'));

        }
    }

}
