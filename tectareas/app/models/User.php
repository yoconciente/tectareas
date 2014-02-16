<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user';
	protected $fillable = array(
        'name', 'email', 'password', 'university', 'profession_id',
        'github_user', 'bitbucket_user', 'agree'
    );
	protected $hidden = array('password');

    public function profession(){
        return $this->belongsTo('Profession', 'id');
    }
    
    public static function insertUser($input) {
        $response = array();
        $rules = array(
            'name' => 'required',
            'email' => array('required', 'email'),
            'password' => array('required', 'min:5'),
            'password2' => 'same:password',
            'university' => 'required',
            'profession_id' => array('required', 'integer'),
            'agree' => 'accepted'
        );
        $validator = Validator::make($input, $rules);
        if($validator->fails()) {
            $response['message'] = $validator;
            $response['error'] = true;
        } else {
			$user = static::create($input);
			$code = str_random(10);
			$user->confirmation_code = $code;
			$user->password = Hash::make($user->password);
			$user->save();
			$data = array(
				'code' => md5($code),
				'user_id' => $user->id
			);
			$to = $user->email;
			Mail::send('emails.confirmation', $data, function($message) use($to){
				$message->subject('Activa tu cuenta Tectareas');
				$message->to($to);
			});
			$response['message'] = "¡Usuario creado satisfactoriamente!";
			$response['error'] = false;
			$response['data'] = $user;
        }
        return $response;
	}

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

}
