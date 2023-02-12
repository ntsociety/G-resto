<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddToCartFormReques;
use App\Http\Requests\Users\UpdateProfileRequest;
use App\Models\Cart;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function user()
    {
        $user = Auth::user();
        $admin = User::where('role_as', '1')->take('1')->get();
        $carts = Cart::where('user_id', $user->id)->get();
        $carts_atte = Cart::where('user_id', $user->id)->where('status', 'En attente')->orderBy('created_at', 'desc')->get();
        $carts_livr = Cart::where('user_id', $user->id)->where('status', 'Livré')->orderBy('created_at', 'desc')->get();
        return view('users.index', compact('carts_livr', 'carts_atte', 'admin', 'carts'));
    }
    public function profile()
    {
        $admin = User::where('role_as', '1')->take('1')->get();
        $user = Auth::user();
        $carts_atte = Cart::where('user_id', $user->id)->where('status', 'En attente')->get();
        $carts = Cart::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        $cart_count = $carts->count();

        return view('users.profile', compact('user', 'carts_atte', 'admin'));
    }
    public function edit()
    {
        $admin = User::where('role_as', '1')->take('1')->get();
        $user = Auth::user();
        $carts_atte = Cart::where('user_id', $user->id)->where('status', 'En attente')->get();

        return view('users.edit', compact('user', 'carts_atte', 'admin'));
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

    public function carts()
    {
        $admin = User::where('role_as', '1')->take('1')->get();
        $user = Auth::user();
        $carts = Cart::where('user_id', $user->id)->get();
        $carts_livr = Cart::where('user_id', $user->id)->where('status', 'livré')->orderBy('created_at', 'desc')->get();
        $carts_atte = Cart::where('user_id', $user->id)->where('status', 'En attente')->orderBy('created_at', 'desc')->get();
        $carts_an = Cart::where('user_id', $user->id)->where('status', 'annuler')->orderBy('created_at', 'desc')->get();
        return view('users.carts', compact('carts','carts_livr', 'admin', 'carts_atte', 'carts_an'));

    }
    
    public function editcart($id)
    {
        $user = Auth::user();
        $admin = User::where('role_as', '1')->take('1')->get();
        $cart = Cart::find($id);
        $carts_atte = Cart::where('user_id', $user->id)->where('status', 'En attente')->get();
        return view('users.editcart', compact('cart', 'user', 'admin', 'carts_atte'));
       
    }
    public function updatecart(AddToCartFormReques $request, $id)
    {
        $menu = Menu::find($id);
        $cart = Cart::find($id);
        $user = Auth::user();
        $cart->user_id = $user->id;
        $cart->name = $user->name;
        $cart->phone = $user->phone;
        $cart->address = $user->address;
        $cart->menu_name = $menu->name;
        $cart->price = $menu->price;
        $data = $request->validated();
        $cart->quantity = $data['quantity'];
        $cart->total_price = $menu->price * $cart->quantity;
        $cart->date_reserv = $data['date_reserv'];
        $cart->update();

        return redirect('users.carts')->with('message', "Votre commande a été bien modifiée");
       
    }
    public function deletecart($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();
        return redirect()->route('users.carts')
                    ->with('message','Commande annulée avec succès!');

    }
}
