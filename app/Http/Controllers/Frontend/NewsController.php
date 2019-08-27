<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\News;


class NewsController extends Controller
{
    public function introduction() {
        $NewsModel = new News();
        $news = $NewsModel->introduction();

        return view('frontend.news.introduction', [
            'news' => $news
        ]);
    }
    public function service() {
        $NewsModel = new News();
        $news = $NewsModel->service();

        return view('frontend.news.service', [
            'news' => $news
        ]);
    }
}
