<?php

class ProfileController extends \BaseController {

	public function index()
	{
		return $this->show(Auth::user()->id);
	}

	public function changePassword($id) {
		$response = User::setPassword($id, Input::all());
		if($response['error'] == 'validation') {
			return Redirect::action('ProfileController@index')->withErrors($response['message'])->withInput();
		} else if($response['error'] == 'not_exists') {
			return Redirect::action('ProfileController@index')->with('message_warning', $response['message']);
		}
		return Redirect::action('ProfileController@index')->with('message', $response['message']);
	}

	public function create()
	{
		//
	}

	public function store()
	{
		//
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
		return View::make('profile.show', $data);
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
