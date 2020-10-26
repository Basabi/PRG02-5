<?php

namespace App\Http\Controllers;

use App\GameItem;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $GameItems = GameItem::orderBy('votes', 'desc')->get();
        return view('overzicht')->with(['gameItems' => $GameItems]);
    }

    public function admin()
    {
        $GameItems = GameItem::orderBy('votes', 'desc')->get();
        return view('admin')->with(['gameItems' => $GameItems]);
    }

    public function nopermission()
    {
        return view('nopermission');
    }
}
