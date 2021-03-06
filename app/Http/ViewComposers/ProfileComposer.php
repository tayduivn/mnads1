<?php

namespace App\Http\ViewComposers;

use App\Chat;
use App\GoogleLogin;
use App\Social;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;
//use Illuminate\Users\Repository as UserRepository;

class ProfileComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    //protected $users;

    // *
    //  * Create a new profile composer.
    //  *
    //  * @param  UserRepository  $users
    //  * @return void

    // public function __construct(UserRepository $users)
    // {
    //     // Dependencies automatically resolved by service container...
    //     $this->users = $users;
    // }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {

        $data = Auth::user();

        //var_dump($data);
        //die();

        $view->with('data', $data);
        $data1 = Chat::all();
        $view->with('data1', $data1);
    }
}
