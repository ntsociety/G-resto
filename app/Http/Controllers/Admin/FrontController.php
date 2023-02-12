<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index()
    {
        // hearder
        $client = User::where('role_as', '0')->get();
        $carts_livr = Cart::where('status', 'livré')->orderBy('created_at', 'desc')->get();
        $carts_atte = Cart::where('status', 'En attente')->orderBy('created_at', 'desc')->get();
        $carts_an = Cart::where('status', 'annuler')->orderBy('created_at', 'desc')->get();
        $menu = Menu::all();
        $category = Category::all();
        $category_count = $category->count();
        // end
        $carts_liv = Cart::where('status', 'Livré')->orderBy('created_at', 'desc')->take('5')->get();
        $carts_liv_count = $carts_liv->count();
        $carts_att = Cart::where('status', 'En attente')->orderBy('created_at', 'desc')->take('10')->get();
        $carts_att_count = $carts_att->count();


        $menus = Menu::orderBy('created_at', 'DESC')->take('8')->get();
        $carts = Cart::all();
        $cart = Cart::all()->take('15');
        $cart_count = $carts->count();
        return view('admin.index', compact('cart_count', 'carts', 'client', 'category_count', 'carts_an', 'menus', 'menu', 'category', 'carts_liv_count','carts_livr','carts_atte', 'carts_liv', 'carts_att_count', 'carts_att'));
    }
    public function carts()
    {
        $carts_liv = Cart::where('status', 'Livré')->orderBy('created_at', 'desc')->get();
        $carts_liv_count = $carts_liv->count();
        $carts_att = Cart::where('status', 'En attente')->orderBy('created_at', 'desc')->get();
        $carts_an = Cart::where('status', 'annuler')->orderBy('created_at', 'desc')->get();
        $carts_att_count = $carts_att->count();
        $carts = Cart::all();
        $cart_count = $carts->count();
        return view('admin.carts', compact('cart_count','carts_liv_count', 'carts_liv', 'carts_att_count','carts_an', 'carts_att'));
    }
    public function editcart($id)
    {
        $status_list = [
            'attending' => 'En attente',
            'deliver' => 'Livré',
            'cancel' => 'Annuler',
        ];
        $cart = Cart::findOrFail($id);
        return view('admin.editcart', compact('cart', 'status_list'));
    }
    public function updatecart(Request $request, $id)
    {

        $cart = Cart::findOrFail($id);
        // $cart->status = $request->input('status') == True ? '1':'0';
        $cart->status = $request->input('status');
        $cart->update();
        return redirect()->route('admin.carts')
                        ->with('message','Commande modifier avec succès!');
    }
    public function clients()
    {
        $clients = User::where('role_as', '0')->orderBy('created_at', 'desc')->get();
        $clients_count = $clients->count();
        return view('admin.clients', compact('clients', 'clients_count'));
    }
    public function search()
    {
        $category = Category::all();
        $search_text = $_GET['search'];
        $menus = Menu::where('name', 'LIKE', '%'.$search_text.'%')->with('category')->get();
        $menus_count = $menus->count();
        return view('admin.search', compact('menus', 'menus_count', 'search_text'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }
    public function edit()
    {
        $user = Auth::user();
        return view('admin.edit-profile', compact('user'));
    }
    public function update(Request $request)
    {

        $user = auth::user();
        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->email = $request->input('email');
        $user->update();
        return redirect()->back()->with('message', 'Votre profile a été bien modifié');
    }
    public function contact()
    {
        $contact = Contact::orderBy('id', 'desc')->get();
        return view('admin.contact', compact('contact'));
    }
    public function destroycarts($id)
    {
        $carts = Cart::findOrFail($id);
        $carts->delete();
        return redirect()->route('admin.carts')
                    ->with('message','Commande supprimée avec succès!');
    }
}
