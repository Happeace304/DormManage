<?php

namespace App\Http\Controllers\Client;

use App\Model\Room;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function SaveProfile(Request $request)
    {

        $user = User::findorfail(Auth::user()->userId);
            if ($request->savebtn == 'information') {
            $request->validate([
                'imglink' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'name' => 'required|string|max:30',
                'birthday' => 'required',
                'phone' => 'required| digits_between:5,20',
                'address' => 'string|max:50|required',
                'gender' => 'required',
            ]);
            if ($request->imglink) {
                $imageName = time() . '.' . request()->imglink->getClientOriginalExtension();
                $request->file('imglink')->move(public_path('image/avatar'), $imageName);
            }else $imageName = $request->old_image;
            $user->imgLink = $imageName;
            $user->name = $request->name;
            $user->birthday = $request->birthday;
            $user->gender = $request->gender == 1? '1' : '0';
            $user->phone = $request->phone;
            $user->address = $request->address;
            if ($user->save()) {
                if ($request->imglink)
                    if (File::exists(public_path('image/avatar') . '/' . $request->old_image)) {
                        File::delete(public_path('image/avatar') . '/' . $request->old_image);
                    }
            }
        } else if ($request->savebtn == 'password') {

            $request->validate([
                'old_pass' => 'required',
                'new_pass' => 'required',
                'confirm_pass' => 'required|same:new_pass',
            ]);
            if (Hash::check($request->old_pass, Auth::user()->password)) {
                $user->password = Hash::make($request->new_pass);
                if ($user->save()) {

                }
            }
        };

        return redirect()->back();

    }

    function Profile()
    {
        $user = Auth::user();

        $room = Room::where('roomId', $user->roomId)->first();

        return view('Client.profile', compact(['user', 'room']));
    }

}
