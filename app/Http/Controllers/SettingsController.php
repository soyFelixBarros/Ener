<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateUser;
use App\Http\Requests\UpdatePasswordUser;

class SettingsController extends Controller
{
	/**
	 * Formulario para editar los datos del usuario.
	 *
	 * @return Response
	 */
	public function profile()
	{
		$user = Auth::user();

		return view('settings.profile', array(
			'user' => $user,
		));
	}

	/**
	 * Actualizar los datos de un usuario.
	 *
	 * @return Response
	 */
	public function updateProfile(StoreUpdateUser $request)
	{
		$data = $request->except('_token');

		$user = User::where('id', Auth::user()->id)
					->update($data);

		return redirect()->route('profile')->with('status', 'Profile updated!');
	}

	/**
	 * Formulario para cambiar la contraseña.
	 *
	 * @return Response
	 */
	public function security()
	{
		return view('settings.security');
	}

	/**
	 * Actualizar la contraseña del usuario.
	 *  
	 * @return Response
	 **/
	public function updatePassword(UpdatePasswordUser $request)
	{
		if (Hash::check($request->current_password, Auth::user()->password)) {
            
            $request->user()->fill([
                'password' => Hash::make($request->password),
            ])->save();

            Auth::logout();
            
            return redirect()->route('login')->with('status', 'Password updated!');
        }
	}
}