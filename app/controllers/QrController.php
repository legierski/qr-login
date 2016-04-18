<?php

class QrController extends BaseController {

    private $data = array();

	public function getIndex()
	{
        $token         = new Token;
        $token->key    = md5('some random stuff'.time().rand(1,9999));
        $token->status = 'waiting';
        $token->save();
        
        $this->data['key'] = $token->key;
        
        $cookie = Cookie::forever('qr_login_the_key', $token->key);
        
        return Response::view('index', $this->data)->withCookie($cookie);
	}

    public function getKey($key)
    {
        $token = Token::where('key', $key)->first();

        if (!is_null($token)) {
            
            $userId   = Cookie::get('qr_login_user_id');
            $userHash = Cookie::get('qr_login_user_hash');

            if (!is_null($userId)) {
                
                $user = User::where('id', $userId)->where('password', $userHash)->first();

                if (!is_null($user)) {
                    
                    $token->user_id = $userId;
                    $token->status  = 'logged_in';
                    $token->save();

                    $this->data['user'] = $user;

                    return View::make('mobile_logged_in', $this->data);
                } 
            }
            else {
                $user           = new User;
                $user->email    = md5(mt_rand(1,9999).time());
                $user->password = md5(mt_rand(1,9999).time());
                $user->name     = md5(mt_rand(1,9999).time());
                $user->save();

                $token->user_id = $user->id;
                $token->status  = 'create_user';
                $token->save();

                $cookie1 = Cookie::forever('qr_login_user_id', $user->id);
                $cookie2 = Cookie::forever('qr_login_user_hash', $user->password);

                return Response::view('mobile_create_user', $this->data)->withCookie($cookie1)->withCookie($cookie2);
            }
        }
        else {
            die('Token doesn\'t exist...');
        }
    }

    public function postCheckKey()
    {
        $key = Input::get('key');
        
        $token = Token::where('key', $key)->first();
        
        if (!is_null($token)) {
            
            $json = array();
            $json['success'] = true;
            $json['action'] = $token->status;

            echo json_encode($json);
        }
    }

    public function getCreateUser($key)
    {
        $this->data['key'] = $key;

        return View::make('create_user', $this->data);
    }

    public function postSaveUser()
    {
        $key   = Input::get('key');
        $email = Input::get('email');
        $name  = Input::get('name');

        $token         = Token::where('key', $key)->first();
        $token->status = 'logged_in';
        $token->save();

        $user        = User::find($token->user_id);
        $user->email = $email;
        $user->name  = $name;
        $user->save();

        return Redirect::to('logged_in/'.$key);
    }

    public function getLoggedIn($key)
    {
        $token = Token::where('key', $key)->first();

        if (!is_null($token)) {
            
            if ($token->status == 'logged_in') {
                
                $this->data['user'] = User::find($token->user_id);

                $token->delete();
                
                return View::make('logged_in', $this->data);
            }
        }
        else {
            return Redirect::to('/');
        }
    }
}
