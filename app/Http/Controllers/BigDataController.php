<?php

namespace App\Http\Controllers;

use App\Models\QueueSearch;
use App\Repositories\QueueSearchRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BigDataController extends Controller
{
    public function __construct(
        private QueueSearchRepository $queueSearchRepository
    )
    {}

    public function index(Request $request)
    {
        // $queueSearch = QueueSearch::skip(2000000)->take(10)->get();
        // $queueSearch = Cache::get('queue_search_cache', []);
        $page        = $request->page;
        $key         = 'queue_search_cache_' . $page;
        $queueSearch = Cache::remember($key, 100000, function () use ($page) {
            return QueueSearch::paginate(10, ['*'], 'page', $page);
        });
        return view('big_data', compact('queueSearch'));
    }
}
