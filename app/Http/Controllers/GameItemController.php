<?php

namespace App\Http\Controllers;

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
        $GameItems = GameItem::all();
        return view('overzicht')->with(['gameItems' => $GameItems]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function create()
    {
        return view('create');
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
        ]);

        $gameItem = new GameItem();
        $gameItem->title = $request->get('title');
        $gameItem->description = $request->get('description');
        $gameItem->image = $request->get('image');

        $gameItem->save();
        return redirect('overzicht')->with('success', 'Bericht is opgeslagen!');
    }

    public function show($id)
    {
        try{
            $gameItem = GameItem::find($id);
            $error = null;
        } catch (\Exception $e){
            $gameItem = null;
            $error = $e->getMessage();
        }

        return view('show', [
            'gameItem' => $gameItem,
            'error' => $error
        ]);
    }
}
