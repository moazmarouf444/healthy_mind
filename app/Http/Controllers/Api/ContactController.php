<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use OpenTok\OpenTok;
use OpenTok\Role;

class ContactController extends Controller
{
    use ResponseTrait;

    public function createContact($room_id =null){
        $apiKey = 47571321; // change
        $time = 60;
        $password = '26407da20177ec51395d2c1022e4906d7e488a67'; // change
        $openTokAPI = new OpenTok($apiKey, $password);
        if($room_id){
            $room = Room::find($room_id);
            $openTokAPI = new OpenTok($apiKey, $password);
            $session_id = $room->sessionId;
            $opentok_token = $openTokAPI->generateToken($session_id, [
                'role'       => Role::MODERATOR,
                'exerciseireTime' => time()+$time,
                'data'       => "Some sample metadata to pass"
            ]);

            $data =[
                'apiKey' => $apiKey,
                'sessionId' => $session_id,
                'token' => $opentok_token
            ];
        }else{

            $session = $openTokAPI->createSession();
            $session_id =$session->getSessionId();
            $opentok_token = $openTokAPI->generateToken($session_id, [
                'role'       => Role::MODERATOR,
                'exerciseireTime' => time()+$time,
                'data'       => "Some sample metadata to pass"]);
            $room_data =[
                'apiKey'        => $apiKey,
                'sessionId'     => $session_id,
                'token'         => $opentok_token,
            ];
            if(auth('doctor')->user()){
                $room_data['doctor_id'] = auth('doctor')->id();
            }else{
                $room_data['user_id'] = auth()->id();
            }
            $room =Room::create($room_data);
            $data =[
                'room_id' => $room->id,
                'apiKey' => $apiKey,
                'sessionId' => $session_id,
                'token' => $opentok_token
            ];
        }
        return $this->response('success','',$data);
    }


}