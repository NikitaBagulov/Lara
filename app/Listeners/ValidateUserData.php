<?php

namespace App\Listeners;

use App\Events\UserValidation;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;


class ValidateUserData
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function handle(UserValidation $event)
    {
        $request = $event->request;
        $request->validate([
            'name' => 'required|min:2',
            'lastname' => 'required',
            'age' => 'required|numeric|min:12|max:120',
            'city' => 'required',
            'email' => 'required|email',
        ], [
            'name.required' => 'Представтесь',
            'name.min' => 'Не бывает таких маленьких имен',
            'age.required' => 'Сколько вам лет?',
            'age.min' => 'Малый ты, вырости до :min лет',
            'age.max' => 'Слишком старый, :max это максимум',
            'lastname.required' => 'Фамилии нет',
            'email.required' => 'Забыли email',
            'email.email' => 'Не похоже на Email'
        ]);
    }
}
