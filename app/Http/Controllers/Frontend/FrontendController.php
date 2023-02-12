<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Category;
use App\Models\Menu;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\UserAddToCartNotify;
use App\Http\Requests\AddToCartFormReques;
use App\Notifications\AdminAddToCartNotify;
use App\Notifications\AdminContactNotify;
use Illuminate\Support\Facades\Notification;


class FrontendController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $carts = Cart::where('user_id', $user->id)->where('status', 'En attente')->get();
            $cart_count = $carts->count();

            $menu = Menu::all();
            $special_menu = Menu::where('special', '1')->take('10')->get();
            $special_cate = Category::where('special', '1')->take('10')->get();
            return view('frontend.index', compact('special_menu', 'special_cate', 'cart_count', 'menu'));
        }
        else
        {
            $menu = Menu::all();
            $special_menu = Menu::where('special', '1')->take('15')->get();
            $special_cate = Category::where('special', '1')->take('15')->get();
            return view('frontend.index', compact('special_menu', 'special_cate', 'menu'));
        }
    }
    public function query()
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $carts = Cart::where('user_id', $user->id)->where('status', 'En attente')->get();
            $cart_count = $carts->count();

            $category = Category::all();
            $search_text = $_GET['search'];
            $menus = Menu::where('name', 'LIKE', '%'.$search_text.'%')->with('category')->get();
            $menus_count = $menus->count();
            return view('frontend.menu.query', compact('menus', 'menus_count', 'search_text', 'category', 'cart_count'));
        }
        else
        {
            $category = Category::all();
            $search_text = $_GET['search'];
            $menus = Menu::where('name', 'LIKE', '%'.$search_text.'%')->with('category')->get();
            $menus_count = $menus->count();
            return view('frontend.menu.query', compact('menus', 'menus_count', 'search_text', 'category'));
        }

    }
    public function categories()
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $carts = Cart::where('user_id', $user->id)->where('status', 'En attente')->get();
            $cart_count = $carts->count();

            $category = Category::all();
            // $category = Category::where('popular', '0')->get();
            return view('frontend.category', compact('category', 'cart_count'));
        }
        else
        {
            $category = Category::all();
            // $category = Category::where('popular', '0')->get();
            return view('frontend.category', compact('category'));
        }

    }
    public function menus()
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $carts = Cart::where('user_id', $user->id)->where('status', 'En attente')->get();
            $cart_count = $carts->count();

            $category = Category::all();
            $menu = Menu::all();
            return view('frontend.menu.menu', compact('menu', 'cart_count'));
        }
        else
        {
            $category = Category::all();
            $menu = Menu::all();
            return view('frontend.menu.menu', compact('menu'));
        }

    }
    public function viewcategory($slug)
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $carts = Cart::where('user_id', $user->id)->where('status', 'En attente')->get();
            $cart_count = $carts->count();

            if(Category::where('slug', $slug)->exists())
            {
                $category = Category::where('slug', $slug)->first();
                $menus = Menu::where('cate_id', $category->id)->where('special', '1')->get();
                return view('frontend.menu.index', compact('category','menus', 'cart_count'));
            }
            else
            {
                return redirect('/')->with('status', "slug n'existe pas");
            }
        }
        else
        {
            if(Category::where('slug', $slug)->exists())
            {
                $category = Category::where('slug', $slug)->first();
                $menus = Menu::where('cate_id', $category->id)->where('special', '1')->get();
                return view('frontend.menu.index', compact('category','menus'));
            }
            else
            {
                return redirect('/')->with('error', "slug n'existe pas");
            }
        }

    }
    public function menuview($cate_slug, $menu_slug)
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $carts = Cart::where('user_id', $user->id)->where('status', 'En attente')->get();
            $cart_count = $carts->count();

            if(Category::where('slug', $cate_slug)->exists())
            {
                if(Menu::where('slug', $menu_slug)->exists())
                {
                    $menus = Menu::where('slug', $menu_slug)->first();
                    return view('frontend.menu.view', compact('menus', 'cart_count'));
                }
                else
                {
                    return redirect('/')->with('status', "lien n'existe pas");
                }

            }
            else
            {
                return redirect('/')->with('status', "slug catégorie n'existe pas");
            }
        }
        else
        {
            if(Category::where('slug', $cate_slug)->exists())
            {
                if(Menu::where('slug', $menu_slug)->exists())
                {
                    $menus = Menu::where('slug', $menu_slug)->first();
                    return view('frontend.menu.view', compact('menus'));
                }
                else
                {
                    return redirect('/')->with('error', "lien n'existe pas");
                }

            }
            else
            {
                return redirect('/')->with('error', "slug catégorie n'existe pas");
            }
        }

    }
    public function menusview($menu_slug)
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $carts = Cart::where('user_id', $user->id)->where('status', 'En attente')->get();
            $cart_count = $carts->count();

            if(Menu::where('slug', $menu_slug)->exists())
                {
                    $menus = Menu::where('slug', $menu_slug)->first();
                    return view('frontend.menu.view', compact('menus', 'cart_count'));
                }
                else
                {
                    return redirect('/')->with('error', "lien n'existe pas");
                }
        }
        else
        {
            if(Menu::where('slug', $menu_slug)->exists())
                {
                    $menus = Menu::where('slug', $menu_slug)->first();
                    return view('frontend.menu.view', compact('menus'));
                }
                else
                {
                    return redirect('/')->with('error', "lien n'existe pas");
                }
        }


    }
    public function addcart(AddToCartFormReques $request, $id)
    {
        if(Auth::id())
        {
           
            $user=auth()->user();
            $menu = Menu::find($id);
            $cart = new Cart;
            $data = $request->validated();
            $cart->user_id = $user->id;
            $cart->name = $user->name;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->menu_name = $menu->name;
            $cart->price = $menu->price;
            $cart->quantity = $data['quantity'];
            $cart->total_price = $menu->price * $cart->quantity;
            $cart->date_reserv = $data['date_reserv'];
            $cart->save();
            $recap = ([
                'menu_name' => $cart->menu_name,
                'price' => $cart->price,
                'quantity' => $cart->quantity,
                'total_price' => $cart->total_price,
            ]);
            $rec = ([
                'menu_name' => $cart->menu_name,
                'quantity' => $cart->quantity,
                'price' => $cart->price,
                'date_reserv'=> $cart->date_reserv,
            ]);
            $isAdmin = User::where('role_as', '1')->get();
            Notification::send($user, new UserAddToCartNotify($user, $recap));
            Notification::send($isAdmin, new AdminAddToCartNotify($rec));

            return redirect('menus')->with('message', "Votre commande a été bien enregistré");
        }
        else
        {
            return redirect('login')->with('message', "Veillez connectez pour passer la commande");
        }
    }
    public function contact()
    {
        $admin = User::where('role_as', '1')->get();
        if(Auth::id())
        {
            $user = Auth::user();
            $carts = Cart::where('user_id', $user->id)->where('status', 'En attente')->get();
            $cart_count = $carts->count();

            $user=auth()->user();
            return view('frontend.contact', compact('user', 'cart_count', 'admin'));
        }
        else
        return view('frontend.contact', compact('admin'));
    }

    public function contactstore(Request $request)
    {
        if(Auth::id())
        {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', 'max:12'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'sujet' => ['required', 'string', 'max:255'],
                'message' => ['required', 'string'],
              ]);
            $user=auth()->user();
            $contact = new Contact();
            $contact->name = $user->name;
            $contact->last_name = $user->last_name;
            $contact->phone = $user->phone;
            $contact->email = $user->email;
            $contact->sujet = $request->input('sujet');
            $contact->message = $request->input('message');
            $contact->save();
            
            $recap = ([
                'name' => $contact->name,
                'sujet' => $contact->sujet,
                'message' => $contact->message,
            ]);
            $isAdmin = User::where('role_as', '1')->get();
            Notification::send($isAdmin, new AdminContactNotify($recap));
            return redirect('/')->with('message', "Votre message a été bien envoyé");
        }
        else
        {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', 'max:12'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'sujet' => ['required', 'string', 'max:255'],
                'message' => ['required', 'string'],
              ]);
            $contact = new Contact();
            $contact->name = $request->input('name');
            $contact->last_name = $request->input('last_name');
            $contact->phone = $request->input('phone');
            $contact->email = $request->input('email');
            $contact->sujet = $request->input('sujet');
            $contact->message = $request->input('message');
            $contact->save();
            return redirect('/')->with('message', "Votre message a été bien enregistré");
        }
    }

}
