<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth; //tambahkan ini untuk auth
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/datauser';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware("auth");
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $Validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'level' => ['required', Rule::in(['admin', 'manajer', 'kasir'])], //tambahkan validasi level
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'alamat' => ['string', 'max:255'],
            'no_hp' => ['numeric', 'min:11'],

        ], [
            'name.required' => 'Nama harus diisi',
            'name.string' => 'Nama harus berupa string',
            'name.max' => 'Nama maksimal 255 karakter',
            'email.required' => 'Email harus diisi',
            'email.string' => 'Email harus berupa string',
            'email.email' => 'Email harus berupa email',
            'email.max' => 'Email maksimal 255 karakter',
            'email.unique' => 'Email sudah terdaftar',
            'level.required' => 'Level harus diisi',
            'level.in' => 'Level harus admin, manajer, atau kasir',
            'password.required' => 'Password harus diisi',
            'password.string' => 'Password harus berupa string',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Password tidak cocok',
            'alamat.string' => 'Alamat harus berupa string',
            'alamat.max' => 'Alamat maksimal 255 karakter',
            'no_hp.numeric' => 'No HP harus berupa angka',
            'no_hp.min' => 'No HP minimal 11 angka',
        ]);
        if ($Validator->fails()) {
            throw new ValidationException($Validator);
        }
        return $Validator;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if (Auth::user()->level == 'admin') {
            $account =  User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'level' => $data['level'],
                'password' => Hash::make($data['password']),
                'alamat' => $data['alamat'],
                'no_hp' => $data['no_hp'],
            ]);

            if ($account) {
                // Display success message to the admin
                return $account;
            } else {
                return back();
            }
        } else {
            return back();
        }
    }
}
