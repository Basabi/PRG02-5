<?php

namespace App\Http\Controllers;

use App\Category;
use App\GameItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameItemController extends Controller
{
    /**
     * Display a listing of the resource
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     */
    public function index()
    {
        $GameItems = GameItem::orderBy('likes', 'desc')->get();
        return view('overzicht')->with(['gameItems' => $GameItems]);
    }

    public function waardig(Request $request, $id)
    {
        $iswaardig = $request->get('waardig');

        if($iswaardig == 'welwaardig')
        {
            DB::table('game_items')
                ->where('id', $id)
                ->update(['likes' => '1']);
        }
        if($iswaardig == 'nietwaardig')
        {
            DB::table('game_items')
                ->where('id', $id)
                ->update(['likes' => '0']);
        }

        return redirect('admin')->with('success', 'De waardigheid van het bericht is aangepast!');
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
        $regex = '/www.youtube.com/';

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|string|min:1|max:255',
            'ytlink' => 'required|regex:'.$regex,
            'category' => ['exists:categories,id'],
        ]);

        $gameItem = new GameItem();
        $gameItem->title = $request->get('title');
        $gameItem->likes = '0';
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

    public function delete($id)
    {
        GameItem::find($id)->delete();

        return redirect('admin')->with('success', 'Het bericht is verwijderd!');
    }

    public function zoeken()
    {
        return view('zoeken');
    }

    public function zoekenResultaat(Request $request)
    {
        $request->validate([
            'zoekveld' => 'required',
        ]);


        $zoekveld = $request->get('zoekveld');

        $GameItems = GameItem::where('title', 'LIKE', '%'.$zoekveld.'%')->get();
        return view('overzicht')->with(['gameItems' => $GameItems]);
    }
}
