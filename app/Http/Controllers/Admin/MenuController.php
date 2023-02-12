<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Category;
use App\Models\Menu;
use Faker\Core\File;
use Illuminate\Support\Facades\Storage;
class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        $menus = Menu::orderBy('created_at', 'DESC')->get();
        return view('admin.menu.index', compact('menus', 'category'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.menu.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuFormRequest $request)
    {
        $menus = new Menu();
        $date = $request->validated();
        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            // $ext = $file->getClientOriginalExtension();
            $imageName=time().'_'.$file->getClientOriginalName();
            // $filename = time().'.'.$ext;
            $file->move('assets/menu/',$imageName);
            $menus->image = $imageName;
        }
        $menus->cate_id = $date['cate_id'];
        $menus->name = $date['name'];
        $menus->slug = Str::slug($menus->name);
        $menus->description = $date['description'];
        $menus->price = $date['price'];
        $menus->special = $request->input('special') == True ? '1':'0';
        $menus->save();
        return redirect()->route('menu.index')->with('message', 'Produit ajouté avec succès!');
        // $request->validate([
        //     'cate_id' => 'required',
        //     'name' => 'required|unique:menus',
        //     'description' => 'required',
        //     'price' => 'required',
        //     'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        //   ]);
        // $menus = new Menu();
        // if ($request->hasFile('image'))
        // {
        //     $file = $request->file('image');
        //     // $ext = $file->getClientOriginalExtension();
        //     $imageName=time().'_'.$file->getClientOriginalName();
        //     // $filename = time().'.'.$ext;
        //     $file->move('assets/menu/',$imageName);
        //     $menus->image = $imageName;
        // }
        // $menus->cate_id = $request->input('cate_id');
        // $menus->name = $request->input('name');
        // $menus->slug = $request->input('name');
        // $menus->description = $request->input('description');
        // $menus->price = $request->input('price');
        // $menus->special = $request->input('special') == True ? '1':'0';
        // $menus->save();
        // return redirect()->route('menu.index')->with('message', 'Produit ajouté avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::all();
        $menus = Menu::findOrFail($id);
        return view('admin.menu.edit', compact('category', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MenuFormRequest $request, $id)
    {
        $menus = Menu::findOrFail($id);
        $date = $request->validated();
        if($request->hasFile('image'))
        {
            $path = 'assets/menu/'.$menus->image;
            if(File_exists($path))
            {
                Storage::delete($path);
            }
            $file = $request->file('image');
            // $ext = $file->getClientOriginalExtension();
            $imageName=time().'_'.$file->getClientOriginalName();
            // $filename = time().'.'.$ext;
            $file->move('assets/menu/',$imageName);
            $menus->image = $imageName;
        }
        $menus->cate_id = $date['cate_id'];
        $menus->name = $date['name'];
        $menus->slug = Str::slug($menus->name);
        $menus->description = $date['description'];
        $menus->price = $date['price'];
        $menus->special = $request->input('special') == True ? '1':'0';
        $menus->update();
        return redirect()->route('menu.index')
                        ->with('message','Produit modifier avec succès!');
        // $request->validate([
        //     'cate_id' => 'required',
        //     'name' => 'required|unique:menus',
        //     'description' => 'required',
        //     'price' => 'required',
        //     'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        //   ]);
        // $menus = Menu::findOrFail($id);
        // if($request->hasFile('image'))
        // {
        //     $path = 'assets/menu/'.$menus->image;
        //     if(File_exists($path))
        //     {
        //         Storage::delete($path);
        //     }
        //     $file = $request->file('image');
        //     // $ext = $file->getClientOriginalExtension();
        //     $imageName=time().'_'.$file->getClientOriginalName();
        //     // $filename = time().'.'.$ext;
        //     $file->move('assets/menu/',$imageName);
        //     $menus->image = $imageName;
        // }
        // $menus->name = $request->input('name');
        // $menus->slug = $request->input('name');
        // $menus->description = $request->input('description');
        // $menus->price = $request->input('price');
        // $menus->special = $request->input('special') == True ? '1':'0';
        // $menus->update();
        // return redirect()->route('menu.index')
        //                 ->with('message','Produit modifier avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menus = Menu::findOrFail($id);
        if($menus->image)
        {
            $path = 'assets/menu/'.$menus->image;
            Storage::delete($path);
            $menus->delete();
            return redirect()->route('menu.index')
                        ->with('message','Produit supprimée avec succès!');
        }
    }

}
