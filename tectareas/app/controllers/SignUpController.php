<?php

class SignUpController extends \BaseController {

	public function activateAccount($id, $code)
	{
		$user_code = User::where('id', '=', strval($id))->lists('confirmation_code');
		if($code == md5($user_code[0])) {
			$activate = User::where('id', '=', strval($id))->update(array('confirmed' => 'yes'));
			return Redirect::to('login');
		}
		App::abort(404);
	}

	public function doLogin()
	{
		$email = mb_strtolower(trim(Input::get('email')));
        $password = Input::get('password');
        if(Auth::attempt(array('email' => $email, 'password' => $password, 'confirmed' => 'yes')))
        {
            Redirect::to('/');
        }
        return Redirect::to('login')->with('msg', '¡Datos incorrectos!')->withInput();
	}

	public function doLogout()
	{
		Auth::logout();
		return Redirect::to('/');
	}

	public function showLogin() {
		return View::make('confirmated')->with('confirmated', True);
	}

	public function index()
	{
		$professions = Profession::getAllProfessions();
		return View::make('sign-up', array('professions' => $professions));
	}

	public function create()
	{
		//
	}

	public function store()
	{
		$response = User::insertUser(Input::all());
        if($response['error'] == true) {
            return Redirect::to('sign-up')->withErrors($response['message'])->withInput();
        } else {
			$data = array(
				'user' => $response['data']
			);
            return View::make('confirmation', $data);
        }
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		//
	}

	public function update($id)
	{
		//
	}

	public function destroy($id)
	{
		//
	}

}
