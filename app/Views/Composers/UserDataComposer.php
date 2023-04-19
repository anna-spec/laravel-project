<?php
namespace App\Views\Composers;
use App\Models\Basket;
use Illuminate\Support\Facades\Auth;
use illuminate\View\View;


class UserDataComposer
{
    public function __construct()
    {
    }

// The compose function here handles the logic of binding data to the view
    public function compose(View $view)
    {

        if (auth()->check()){
        $user_id = auth()->user()->id;
        $productsInBasket = Basket::all()->where('user_id', $user_id);
        $count = count($productsInBasket);
        $view->with('count', $count);
      }
    }
}
