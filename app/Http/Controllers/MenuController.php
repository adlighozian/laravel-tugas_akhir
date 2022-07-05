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
        $data['title'] = 'Membuat Menu';
        $data['user'] = Auth::user();;
        $data['users'] = User::get();
        $categories = DB::table('categories')->get(); 

        return view('pages.posCreateMenu',$data, ['categories' =>$categories]);

    }
    public function index()
    {
        $data['title'] = 'Menu';
        $data['user'] = Auth::user();;
        $data['users'] = User::get();   
        $menu = DB::table('menu')->get();
        $categories = DB::table('categories')->get();   
        return view('pages.posMenu',$data, ['menu' => $menu, 'categories' =>$categories]);

    }

    public function edit(Menu $menu)
    {
        $data['title'] = 'Update Menu';
        $data['user'] = Auth::user();;
        $data['users'] = User::get();
        $categories = DB::table('categories')->get();   
        return view('pages.posUpdatemenu', $data, ['menu' => $menu, 'categories' =>$categories]);
    }

    public function updatemenu($id)
    {
        $data['title'] = 'Update Menu';
        $data['user'] = Auth::user();;
        $data['users'] = User::get(); 
        $menu = DB::table('menu')->where('id',$id)->get();
        $categories = DB::table('categories')->get();   
        return view('pages.posUpdatemenu', $data, ['menu' => $menu, 'categories' =>$categories]);
    }
    public function store(Request $request)
    {
        
        DB::table('menu')->insert([
            'name' => $request->name,
            'description' => $request->description,
            'ingredients' => $request->ingredients,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'image' => $request->image,
            'is_hidden'=> $request->is_hidden,
    
        ]);
        
        return redirect('/menueditor');
     
    }
    public function hapus($id)
    {
        
        DB::table('menu')->where('id',$id)->delete();
            
        return redirect('/menueditor');
    }
    public function update(Request $request, Menu $menu)
    {
        Menu::find($menu->id)->update($request->all());
        return redirect('/menueditor');

    }

    public function updateLama(Request $request, Menu $menu)
    {
        DB::table('menu')->where('id',$request->id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'ingredients' => $request->ingredients,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'image' => $request->image,
            'is_hidden'=> $request->is_hidden,
    
        ]);
        return redirect('/menueditor');

    }

}
