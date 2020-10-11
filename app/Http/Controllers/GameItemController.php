<?php

namespace App\Http\Controllers;

use App\Category;
use App\GameItem;
use Illuminate\Http\Request;

class GameItemController extends Controller
{
    /**
     * Display a listing of the resource
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     */
    public function index()
    {
        $GameItems = GameItem::orderBy('votes', 'desc')->get();
        return view('overzicht')->with(['gameItems' => $GameItems]);
    }

    public function filter()
    {

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function create()
    {
        $categories = Category::all();
        return view('create', compact('categories'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'ytlink' => 'required',
            'category' => ['exists:categories,id'],
        ]);

        $gameItem = new GameItem();
        $gameItem->title = $request->get('title');
        $gameItem->votes = '0';
        $gameItem->description = $request->get('description');
        $gameItem->image = $request->get('image');
        $gameItem->ytlink = $request->get('ytlink');
        $gameItem->category_id = $request->get('category');

        $gameItem->save();
        return redirect('overzicht')->with('success', 'Bericht is opgeslagen!');
    }

    public function show($id)
    {
        $gameItem = GameItem::find($id);
        if($gameItem === null) {
            abort(404, "Dit gameitem is helaas niet gevonden");
        }

        return view('show', compact('gameItem'));
    }

    public function deletefromdatabase($id)
    {
        //$id->delete();
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
