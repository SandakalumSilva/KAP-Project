<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Mail\OtpMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class LoginController extends Controller
{

    public function userRegistration(Request $request)
    {


        $validate = validator::make($request->all(), [
            'ownerName' => 'required|min:5|max:255',
            'shopName' => 'required|min:5|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:5|max:255',
            'mobile' => 'required|min:10',
            'shopAddress' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'coverImage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'payment' => 'required'
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 400,
                'validate' => $validate->messages(),
            ]);
        } else {
            // $file = $request->file('logo');
            // $name = Str::random(10);
            // $url = Storage::putFileAs('logo', $file, $name . '.' . $file->extension());

            if ($request->file('logo') ||  $request->file('coverImage')) {
                $name1 = $request->file('logo')->getClientOriginalName();
                $path1 = $request->file('logo')->move('logo', $name1);
                $url1 = env('APP_URL') . $path1;

                $name2 = $request->file('coverImage')->getClientOriginalName();
                $path2 = $request->file('coverImage')->move('coverimage', $name2);
                $url2 = env('APP_URL') . $path2;
            }

            // var_dump($url2);

            $payment = implode(',', $request->payment);

            $otp = mt_rand(1, 10000);

            $password = bcrypt($request->password);

            // $payment['payment_method2'] = $request->option2;
            // $payment['payment_method3'] = $request->option3;
            // $payment['payment_method1'] = $request->option1;

            $data['name'] = $request->ownerName;
            $data['shop_name'] = $request->shopName;
            $data['email'] = $request->email;
            $data['mobile'] = $request->mobile;
            $data['address'] = $request->shopAddress;
            $data['payment_method'] = $payment;
            $data['logo'] = $url1;
            $data['cover_image'] = $url2;
            $data['password'] = $password;
            $data['otp'] = $otp;
            $data['otp_check'] = 'No';
            $data['user_type'] = 'Seller';


            $user = User::create($data);

            $mailData = [
                'otp' => $otp
            ];

            Mail::to($request->email)->send(new OtpMail($mailData));

            return response()->json([
                'status' => 200,
                'user' => $user
            ]);
        }
    }

    public function userLogin(Request $request)
    {

        $validate = validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:5|max:255',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 400,
                'validate' => $validate->messages(),
            ]);
        } else {
            $user = User::where('email', $request->email)->first();

            // Check Password 
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json([
                    'message' => 'Bad Credential',
                    'status' => 400,
                ]);
            } else {
                return response()->json(['status' => 200]);
            }
        }
    }
}
