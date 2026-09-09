<?php

namespace App\Http\Controllers;

use App\Data\Portfolio;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    /** Home page — all data flows from App\Data\Portfolio. */
    public function index(): View
    {
        return view('pages.home', [
            'portfolio' => Portfolio::class,
        ]);
    }

    /** Case study page (Avni Pure Masale). */
    public function caseStudy(): View
    {
        return view('pages.case-study', [
            'portfolio' => Portfolio::class,
            'case' => Portfolio::caseStudy(),
        ]);
    }
}