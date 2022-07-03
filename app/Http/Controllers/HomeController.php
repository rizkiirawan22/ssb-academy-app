<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Article;
use App\Models\Coach;
use App\Models\Competition;
use App\Models\Member;
use App\Models\Organization;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->organization = Organization::first();
    }

    public function index()
    {
        $articles = Article::latest()->limit(4)->get();
        $coach = Coach::first();
        $achievements = Achievement::latest()->limit(4)->get();
        $title = "Beranda";
        return view('frontend.home', ['organization' => $this->organization],compact( 'articles', 'coach','achievements', 'title'));
    }

    public function artikel()
    {
        $articles = Article::all();
        $title = "Artikel";
        return view('frontend.artikel', ['organization' => $this->organization],compact('articles', 'title'));
    }

    public function anggota()
    {
        $title = "Anggota";
        $members = Member::where('status', 2)->get();
        return view('frontend.anggota', ['organization' => $this->organization], compact('title', 'members'));
    }

    public function kompetisi()
    {
        $title = "Kompetisi";
        $competitions = Competition::all();
        return view('frontend.kompetisi', ['organization' => $this->organization],compact('competitions', 'title'));
    }

    public function show(Article $article)
    {
        $title = "Detail Artikel";
        return view('frontend.detail_artikel', ['organization' => $this->organization], compact('title', 'article'));
    }
}
