<?php

class UserController extends \BaseController {

	public function index()
	{
		if(Auth::user()) {
			return $this->show(Auth::user()->id);
		} else {
			$professions = Profession::getAllProfessions();
			return View::make('user.sign-up', array('professions' => $professions));
		}
	}

	public function activateAccount($id, $code)
	{
		$user_code = User::where('id', '=', strval($id))->lists('confirmation_code');
		if($code == md5($user_code[0])) {
			$activate = User::where('id', '=', strval($id))->update(array('confirmed' => 'yes'));
			return Redirect::to('login')->with('confirmated', True);
		}
		return Redirect::to('login')->with('confirmated', True);
		App::abort(404);
	}

	public function changePassword($id) {
		$response = User::setPassword($id, Input::all());
		if($response['error'] == 'validation') {
			return Redirect::to('profile')->withErrors($response['message'])->withInput();
		} else if($response['error'] == 'not_exists') {
			return Redirect::action('UserController@index')->with('message_warning', $response['message']);
		}
		return Redirect::to('profile')->with('message', $response['message']);
	}

	public function create()
	{
		//
	}

	public function doLogin()
	{
		$email = mb_strtolower(trim(Input::get('email')));
		$password = Input::get('password');
		if(Auth::attempt(array('email' => $email, 'password' => $password, 'confirmed' => 'yes'))) {
			Redirect::to('/');
		}
		return Redirect::to('login')->with('msg', '¡Datos incorrectos!')->withInput();
	}

	public function doLogout()
	{
		Auth::logout();
		return Redirect::to('/');
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
			return View::make('user.confirmation', $data);
		}
	}

	public function show($id)
	{
		$gravatar_link = 'http://www.gravatar.com/avatar/' . md5(Auth::user()->email) . '?s=256';
		$professions = Profession::getAllProfessions();
		$user = User::find($id);
		$data = array(
			'gravatar' => $gravatar_link,
			'professions' => $professions,
			'user' => $user,
		);
		return View::make('user.show', $data);
	}

	public function showLogin() {
		return View::make('user.login');
	}

	public function edit($id)
	{
		//
	}

	public function update($id)
	{
		$response = User::editUser($id, Input::all());
		if($response['error'] == true) {
			return Redirect::to('/profile')->withErrors($response['message'])->withInput();
		}
		return Redirect::to('/profile')->with('message_profile', $response['message']);
	}

	public function destroy($id)
	{
		$response = User::desactivateAccount($id);
		if($response['error'] == true) {
			App::abort(404);
		}
		$request = Request::create('/logout', 'GET', array());
		return Route::dispatch($request);
	}

}
