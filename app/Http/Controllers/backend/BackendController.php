<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BackendController extends Controller
{
    public function index(){
        $categoryCount = Category::count();
        $productCount = Product::count();
        $serviceCount = Service::count();
        $userCount = User::count();
        return view('backend.include.body', compact('categoryCount', 'productCount', 'serviceCount', 'userCount'));
    }
        public function userLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('');
    }
}
