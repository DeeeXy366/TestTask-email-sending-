<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Mail\WelcomeMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index(){
        return User::all();
    }

    public function store(UserRequest $request, User $user){
        $user = User::create([
            'name'=>$request->name,
            'surname'=>$request->surname,
            'email'=>$request->email,
        ]);

        $_SESSION['name'] = $request->name;
        $_SESSION['surname'] = $request->surname;
        $date = Carbon::now()->setTimezone('Asia/Novosibirsk');
        $_SESSION['date'] = $date;

        Mail::to($request->email)->send(new WelcomeMail());

        return response()->json(['Пользователь зарегистрирован']);
    }

    public function update(UserRequest $request, User $user){
        $input = $request->all();
        $user->fill($input)->save();
        return response()->json(['Данные пользователя изменены']);
    }

    public function distroy(User $user){

        $user->destroy($user->id);
        return response()->json(['Пользователь удален']);
    }
}
