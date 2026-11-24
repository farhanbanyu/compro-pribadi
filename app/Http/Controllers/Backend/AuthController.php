<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserPemasok;
use App\Models\UserPerusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use InvalidArgumentException;

class AuthController extends Controller
{
    function index()
    {
        return view('backend.auth.login');
    }
    function indexCompany()
    {
        return view('backend.auth.login-company');
    }
    function indexSupplier()
    {
        return view('backend.auth.login-supplier');
    }
    function indexRegisterSupplier()
    {
        return view('backend.auth.register-supplier');
    }
    function login(Request $req)
    {
        try {
            $get = User::where('email', $req->email)->first();
            if (!$get || !Hash::check($req->password, $get->password)) {
                throw new InvalidArgumentException('Ups, email atau password yang anda masukan salah', 404);
            }
            if ($get->active != 'yes') {
                throw new InvalidArgumentException('Ups, akun anda di nonaktifkan', 422);
            }
            auth()->guard('web')->login($get, $remember = true);
            return [
                'code' => 200,
                'success' => true,
                'url' => url('dashboard')
            ];
        } catch (\Throwable $th) {
            return errors($th);
        }
    }
    function loginCompany(Request $req)
    {
        try {
            $get = UserPerusahaan::where('username', $req->username)->first();
            if (!$get || !Hash::check($req->password, $get->password)) {
                throw new InvalidArgumentException('Ups, username atau password yang anda masukan salah', 404);
            }
            if ($get->active != 'yes') {
                throw new InvalidArgumentException('Ups, akun anda di nonaktifkan', 422);
            }

            auth()->guard('company')->login($get, $remember = true);
            return [
                'code' => 200,
                'success' => true,
                'url' => url('dashboard')
            ];
        } catch (\Throwable $th) {
            return errors($th);
        }
    }
    function loginSupplier(Request $req)
    {
        try {
            $get = UserPemasok::where('username', $req->username)->first();
            if (!$get || !Hash::check($req->password, $get->password)) {
                throw new InvalidArgumentException('Ups, username atau password yang anda masukan salah', 404);
            }
            if ($get->active != 'yes') {
                throw new InvalidArgumentException('Ups, akun anda di nonaktifkan', 422);
            }

            auth()->guard('supplier')->login($get, $remember = true);
            return [
                'code' => 200,
                'success' => true,
                'url' => url('dashboard')
            ];
        } catch (\Throwable $th) {
            return errors($th);
        }
    }

    function registerSupplier(Request $req)
    {
        try {
            if ($req->password != $req->verify_password) {
                throw new \Exception('Password tidak cocok.');
            }
            UserPemasok::create([
                'authorities_id' => 3,
                'nama' => $req->name,
                'email_marketing' => $req->email,
                'telp_marketing' => $req->telp_marketing ?? '-',
                'website' => $req->website ?? '-',
                'username' => $req->username,
                'user_sipuhh' => $req->username,
                'password_sipuhh' => $req->password_sipuhh,
                'password_sirpbbhh' => $req->password,
                'photo' => ($req->photo) ? $this->upload($req->photo, 'User') : '',
                'password' => Hash::make($req->password_sipuhh),
                'active' => 1
            ]);
            return [
                'code' => 201,
                'success' => true,
                'url' => url('register-success'),
                'message' => 'Anda Berhasil Mendaftar, Silakan Tunggu Hingga Akun Anda Diverifikasi'
            ];
        } catch (\Throwable $th) {
            return errors($th);
        }
    }

    function logout(Request $request)
    {
        auth()->guard('web')->logout();
        auth()->guard('company')->logout();
        auth()->guard('supplier')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
