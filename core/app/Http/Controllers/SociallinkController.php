<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Sociallink;

class SociallinkController extends Controller
{
      
    public function addItem(Request $request) {
        // dd($request->all());

        $link = new Sociallink();
        $link->name = $request->item;
        $link->status = 0;
        $link->save();

        return back();
    }
    public function updatesociallink(Request $request, $id) {
        // dd($request->all());

        $link = Sociallink::find($id);
        $link->name = $request->item;
        $link->save();

        return back();
    }
    public function statusChange(Request $request, $id) {
        // dd($request->all());

        $link = Sociallink::find($id);
        $link->status = $link->status == 1 ? 0 : 1;
        $link->save();

        return back();
    }

    public function homePage () {
        $items = Sociallink::all();
        return view('welcome', compact('items'));
    }

    public function deleteItem($id) {
        
        $item = Sociallink::find($id);
        $item->delete();

        return back();
    }
}