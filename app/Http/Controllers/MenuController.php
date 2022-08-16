<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function createmenu()
    {
        $data['sidebar'] = "menueditor";
        $data['title'] = 'Membuat Menu';
        $data['user'] = Auth::user();;
        $data['users'] = User::get();
        $categories = DB::table('categories')->get();

        return view('pages.pos.posCreateMenu', $data, ['categories' => $categories]);
    }
    public function index()
    {
        $data['sidebar'] = "menueditor";
        $data['title'] = 'TA | Menu';
        $data['user'] = Auth::user();;
        $data['users'] = User::get();
        if (request("category")) {
            $categoryFilter = DB::table('menu')->where('category_id', 'LIKE', '%' . request('category') . '%')->latest()->get();
        } else {
            $categoryFilter = DB::table('menu')->latest()->get();
        }
        $data['menu'] = $categoryFilter;
        $data['categories'] = DB::table('categories')->get();
        return view('pages.pos.posMenu', $data);
    }

    public function hidemenu(Menu $id)
    {
        // dd($id);
        $update = Menu::find($id->id)->update(["is_hidden" => true]);
        return redirect()->back()->with('success', 'Menu berhasil disembunyikan');
    }
    public function unhidemenu(Menu $id)
    {
        // dd($id);
        $update = Menu::find($id->id)->update(["is_hidden" => false]);
        return redirect()->back()->with('success', 'Menu berhasil ditampilkan');
    }

    public function edit(Menu $menu)
    {
        $data['title'] = 'Update Menu';
        $data['user'] = Auth::user();;
        $data['users'] = User::get();
        $categories = DB::table('categories')->get();
        return view('pages.pos.posUpdatemenu', $data, ['menu' => $menu, 'categories' => $categories]);
    }

    public function updatemenu($id)
    {
        $data['title'] = 'Update Menu';
        $data['user'] = Auth::user();;
        $data['users'] = User::get();
        $menu = DB::table('menu')->where('id', $id)->get();
        $categories = DB::table('categories')->get();
        return view('pages.pos.posUpdatemenu', $data, ['menu' => $menu, 'categories' => $categories]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'image' => "image|file",
            'is_hidden' => 'required',
        ]);
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('posImages');
        }
        DB::table('menu')->insert($validatedData);
        return redirect()->back()->with('success', 'Barang berhasil dibuat');

        // DB::table('menu')->insert([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'ingredients' => $request->ingredients,
        //     'category_id' => $request->category_id,
        //     'price' => $request->price,
        //     'image' => $request->image,
        //     'is_hidden' => $request->is_hidden,

        // ]);

        // return redirect('/menueditor');
    }
    public function hapus($id)
    {

        DB::table('menu')->where('id', $id)->delete();

        return redirect('/menueditor');
    }
    public function update(Request $request, Menu $menu)
    {
        Menu::find($menu->id)->update($request->all());
        return redirect('/menueditor');
    }

    public function updateLama(Request $request, Menu $menu)
    {
        DB::table('menu')->where('id', $request->id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'ingredients' => $request->ingredients,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'image' => $request->image,
            'is_hidden' => $request->is_hidden,

        ]);
        return redirect('/menueditor');
    }
}
