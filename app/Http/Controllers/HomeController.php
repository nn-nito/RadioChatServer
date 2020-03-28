<?php

namespace App\Http\Controllers;

use App\Http\Services\PopularProgramFetcher;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class HomeController
 *
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
	/**
	 * @return Factory|View
	 */
    public function index()
	{
		$fetcher = PopularProgramFetcher::create();
		[$popular_programs, $performers] = $fetcher->fetchAllByProgramIdAndJoin();

		return view('home', compact('popular_programs', 'performers'));
	}
}
