<?php

namespace App\Http\Controllers;

use App\Http\Services\ProgramFetcher;
use Illuminate\Http\Request;

/**
 * Class HomeController
 *
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    public function index()
	{
		$fetcher = ProgramFetcher::create();
		$programs = $fetcher->fetchAll();

		return view('home', compact('programs'));
	}
}
