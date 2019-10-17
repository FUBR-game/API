<?php


namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function currentuser()
    {
        return response()->json(auth()->guard('api')->user()->makeVisible(['google_token']));
    }

    public function users()
    {
        return response()->json(User::paginate(500));
    }

    public function user(user $user)
    {
        return response()->json($user);
    }

    public function friends(User $user)
    {
        return response()->json($user->friends);
    }

    public function addFriend(Request $request, User $user)
    {
        $friend_id = $request->get('user_id');
        $friend = User::findOrFail($friend_id);

        $user->friends()->save($friend, ['user_id' => $user->id, 'friend_id' => $friend->id]);
        $friend->friends()->save($user, ['user_id' => $friend->id, 'friend_id' => $user->id]);

        return response()->json($friend->friends);
    }

    public function removeFriend(Request $request, User $user)
    {
        $friend_id = $request->get('user_id');
        $friend = User::findOrFail($friend_id);


    }

    public function games(User $user)
    {
        return response()->json($user->game_results()->paginate(50));
    }
}
