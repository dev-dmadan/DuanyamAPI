<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SyncUserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function syncUser(Request $request)
    {
        $result = (Object)array(
            'Success' => false,
            'Message' => ''
        );
        $userList = $request->has('Data') ? $request->input('Data') : null;
        try {
            if(empty($userList)) {
                throw new Exception("User list tidak boleh kosong");
            }

            foreach($userList as $user) {
                DB::table('users')->updateOrInsert(
                    ['id' => $user['ContactId']],
                    [
                        'name' => $user['ContactName'], 
                        'username' => $user['UserName'], 
                        'password' => Hash::make($user['UserPassword']),
                        'is-active' => $user['IsActive']
                    ]
                );
            }

            $result->Success = true;
        } catch (Exception $e) {
            $result->Message = $e->getMessage();
        }

        return response()->json($result);
    }
}
