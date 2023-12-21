<?php

namespace App\Http\Controllers;

use App\Jobs\CacheJob;
use App\Models\QueueSearch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CaptchaController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {

    }

    public function captchaBasic(Request $request)
    {
        if ($request->isMethod('POST')) {
            $request->validate(['captcha' => 'required|captcha'], ['captcha.captcha' => 'Captcha khong dung']);
            return redirect()->back()->with('success', 'Captcha was verified');
        }
        return view('captcha');
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img('math')]);
    }

    public function googleCaptcha(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validator = validator()->make($request->all(), [
                'g-recaptcha-response' => ['required', new \App\Rules\ValidRecaptcha]
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors(['errors' => $validator->getMessageBag()]);
            }
            return redirect()->back()->with('success', 'Google captcha v2 was verified!');
        }
        return view('google_captcha');
    }

    public function export(Request $request)
    {
        
    }
}
