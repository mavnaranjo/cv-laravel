<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;
use Carbon\Carbon;

class CVController extends Controller
{
    public function __invoke(Request $request, string $format)
    {
        $CV_API = Config::get('services.cv-api.url');

        $data = [
            'me' => Http::get($CV_API . 'me')->object(),
            'jobs' => Http::get($CV_API . 'jobs')->object(),
            'skills' => Http::get($CV_API . 'skills')->object(),
            'languages' => Http::get($CV_API . 'languages')->object(),
            'studies' => Http::get($CV_API . 'studies')->object()
        ];

        $data['me']->birthdate = new Carbon($data['me']->birthdate);

        foreach (['jobs', 'studies'] as $key) {
            foreach ($data[$key] as $element) {
                $element->dates->from = new Carbon($element->dates->from, );

                if (!!$element->dates->to) {
                    $element->dates->to = new Carbon($element->dates->to);
                }
            }
        }

        switch ($format) {
            case 'web':
                $view = View::make('cv', $data);
                break;
            default:
                throw new \InvalidArgumentException('format not supported');
        }

        return $view;
    }
}
