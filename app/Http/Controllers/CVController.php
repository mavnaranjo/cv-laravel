<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;
use Carbon\Carbon;

use Spatie\LaravelPdf\Facades\Pdf;

class CVController extends Controller
{
    public function __invoke(Request $request, string $format)
    {
        $CV_INTERNAL_API = Config::get('services.cv-api.url.internal');
        $CV_EXTERNAL_API = Config::get('services.cv-api.url.external');

        $data = [
            'me' => Http::get($CV_INTERNAL_API . 'me')->object(),
            'jobs' => Http::get($CV_INTERNAL_API . 'jobs')->object(),
            'skills' => Http::get($CV_INTERNAL_API . 'skills')->object(),
            'languages' => Http::get($CV_INTERNAL_API . 'languages')->object(),
            'studies' => Http::get($CV_INTERNAL_API . 'studies')->object()
        ];

        $data['me']->birthdate = new Carbon($data['me']->birthdate);

        $data['me']->image = $CV_EXTERNAL_API . $data['me']->image;

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
                $view = View::make('web/cv', $data);
                break;
            case 'pdf':
                $view = Pdf::view('pdf/cv', $data)
                    ->format('a4')
                    ->name('cv.pdf');
                break;
            default:
                throw new \InvalidArgumentException('format not supported');
        }

        return $view;
    }
}
