<?php

namespace App\Http\Controllers;

use App\GameItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $GameItems = GameItem::orderBy('id')->get();
        return view('overzicht')->with(['gameItems' => $GameItems]);
    }

    public function admin()
    {
        $GameItems = GameItem::orderBy('id')->get();
        return view('admin')->with(['gameItems' => $GameItems]);
    }

    public function nopermission()
    {
        return view('nopermission');
    }
}
