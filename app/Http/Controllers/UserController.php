<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function main()
    {
        $_SESSION['actived'] = 1;

        $users = User::all();

        return view('users.user', ['users' => $users]);
    }

    public function store(UserStoreRequest $request)
    {
        $data = $request->all();

        
        User::create($data);

        return redirect('/')->with('check', ['Успешно добавлено данные', 'success']);
    }
    public function delete(User $id){
        $id->delete();
        return redirect('/')->with('check', ['Успешно удалено данные', 'danger']);   
    }
}
