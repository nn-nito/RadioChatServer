<?php

namespace App\Http\Controllers;

use App\Http\Handlers\ProgramHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class HomeController
 *
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    public function index()
	{
		return view('home');
	}
}
