<?php

class SignUpController extends \BaseController {

	public function activateAccount($id, $code) {
		$user_code = User::where('id', '=', strval($id))->lists('confirmation_code');
		if($code == md5($user_code[0])) {
			$activate = User::where('id', '=', strval($id))->update(array('confirmed' => 'yes'));
			return "Cuenta Activada";
		}
		App::abort(404);
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
            return Redirect::to('sign-up')->with('message', $response['message']);
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
