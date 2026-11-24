<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Configuration;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ConfigurationController extends Controller
{
    public $user;
    public function __construct()
    {
        $user = null;
        if ($this->user) {
            $user = $this->user;
        } elseif (auth()->guard('company')->user()) {
            $user = auth()->guard('company')->user();
        } elseif (auth()->guard('supplier')->user()) {
            $user = auth()->guard('supplier')->user();
        }
        $this->user = $user;
    }
    public function index()
    {
        $data['item'] = Configuration::first();
        return view('backend.configuration.index', $data);
    }


    public function profile()
    {
        $data['item'] = User::findOrFail($this->user->id);
        return view('backend.configuration.profile', $data);
    }

    public function profileMore()
    {
        if ($this->user->authorities_id == 2) {
            $data['item'] = User::findOrFail($this->user->id);
        } elseif ($this->user->authorities_id == 3) {
            $data['item'] = User::findOrFail($this->user->id);
        }
        $data['user'] = $this->user;
        return view('backend.configuration.profile-more', $data);
    }

    function profileUpdate(Request $req)
    {
        try {
            $find = User::find($req->id);
            $find->update([
                'photo' => ($req->photo) ? $this->upload($req->photo, 'User') : $find->photo,
                'name' => $req->nama,
                'email' => $req->email
            ]);
            if ($req->id == $this->user->id) {
                $ext = [
                    'message' => 'Profile berhasil diubah.'
                ];
            } else {
                $ext = [
                    'url' => url('configuration/profile')
                ];
            }
            return array_merge([
                'code' => 201,
                'success' => true,
                'url' => url('configuration/profile')
            ], $ext);
        } catch (\Throwable $th) {
            return errors($th);
        }
    }

    function profileMoreUpdate(Request $req)
    {
        try {
            if ($this->user->authorities_id == 2) {
                $find = User::find($req->id);
            } elseif ($this->user->authorities_id == 3) {
                $find = User::find($req->id);
            }

            $find->update([
                'photo' => ($req->photo) ? $this->upload($req->photo, 'User') : $find->photo,
                'nama' => $req->nama,
                'email_marketing' => $req->email_marketing,
                'telp_marketing' => $req->telp_marketing,
                'website' => $req->website,
            ]);
            if ($req->id == $this->user->id) {
                $ext = [
                    'message' => 'Profile berhasil diubah.'
                ];
            } else {
                $ext = [
                    'url' => url('configuration/profile-more')
                ];
            }
            return array_merge([
                'code' => 201,
                'success' => true,
                'url' => url('configuration/profile-more')
            ], $ext);
        } catch (\Throwable $th) {
            return errors($th);
        }
    }

    function changePasswordProfile(Request $req)
    {
        try {
            $data = User::find($req->id);
            if ($req->password != $req->password_confirmation) {
                throw new \Exception('Password tidak cocok.');
            }
            $data->update([
                'password' => Hash::make($req->password)
            ]);
            return [
                'code' => 200,
                'success' => true,
                'message' => 'Password berhasil diubah.',
                'url' => url('configuration/profile')
            ];
        } catch (\Throwable $th) {
            return errors($th);
        }
    }
    function changePasswordProfileMore(Request $req)
    {
        try {
            if ($this->user->authorities_id == 2) {
                $data = User::find($req->id);
            } elseif ($this->user->authorities_id == 3) {
                $data = User::find($req->id);
            }
            if ($req->password != $req->password_confirmation) {
                throw new \Exception('Password tidak cocok.');
            }
            $data->update([
                'password' => Hash::make($req->password)
            ]);
            return [
                'code' => 200,
                'success' => true,
                'message' => 'Password berhasil diubah.',
                'url' => url('configuration/profile')
            ];
        } catch (\Throwable $th) {
            return errors($th);
        }
    }

    public function update(Request $request)
    {
        try {
            $data = Configuration::findOrFail($request->id);
            if ($request->logo) {
                $this->deleteFile($data->logo);
            }
            if ($request->katalog) {
                $this->deleteFile($data->katalog);
            }
            if ($request->favicon) {
                $this->deleteFile($data->favicon);
            }
            if ($request->logo_footer) {
                $this->deleteFile($data->logo_footer);
            }
            $data->update(array_merge($request->only('url'), [
                'logo' => ($request->logo) ? $this->upload($request->logo, 'Configuration') : $data->logo,
                'katalog' => ($request->katalog) ? $this->upload($request->katalog, 'Configuration') : $data->katalog,
                'favicon' => ($request->favicon) ? $this->upload($request->favicon, 'Configuration') : $data->favicon,
                'logo_footer' => ($request->logo_footer) ? $this->upload($request->logo_footer, 'Configuration') : $data->logo_footer,
                'file_testimoni' => ($request->file_testimoni) ? $this->upload($request->file_testimoni, 'Configuration') : $data->file_testimoni,
                'file_faq' => ($request->file_faq) ? $this->upload($request->file_faq, 'Configuration') : $data->file_faq,
                'name' => $request->name,
                'title' => $request->title,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
                'meta_abstract' => $request->meta_abstract,
                'meta_seo' => $request->meta_seo,
                'meta_author' => $request->meta_author,
                'meta_title' => $request->meta_title,
                'map' => $request->map,
                'address' => $request->address,
                'email' => $request->email,
                'notelp' => $request->notelp,
                'wa' => $request->wa,
                'disclaimer' => $request->disclaimer,
                'privacy_policy' => $request->privacy_policy,
                'google_analytics' => $request->google_analytics,
                'meta_pixel' => $request->meta_pixel,
                'short_description' => $request->short_description,
                'tawkto' => $request->tawkto,
                'running_text' => $request->running_text,
                'title_about' => $request->title_about,
                'subtitle_about' => $request->subtitle_about,
                'title_layanan' => $request->title_layanan,
                'subtitle_layanan' => $request->subtitle_layanan,
                'title_keunggulan' => $request->title_keunggulan,
                'subtitle_keunggulan' => $request->subtitle_keunggulan,
                'title_portfolio' => $request->title_portfolio,
                'subtitle_portfolio' => $request->subtitle_portfolio,
                'title_counter' => $request->title_counter,
                'subtitle_counter' => $request->subtitle_counter,
                'title_team' => $request->title_team,
                'subtitle_team' => $request->subtitle_team,
                'title_lainnya' => $request->title_lainnya,
                'subtitle_lainnya' => $request->subtitle_lainnya,
                'title_testimoni' => $request->title_testimoni,
                'subtitle_testimoni' => $request->subtitle_testimoni,
                'title_faq' => $request->title_faq,
                'subtitle_faq' => $request->subtitle_faq,
                'title_blog' => $request->title_blog,
                'subtitle_blog' => $request->subtitle_blog,
                'copyright' => $request->copyright,
                // Tambahan field baru sesuai gambar
                'title_button_header' => $request->title_button_header,
                'link_button_header' => $request->link_button_header,
                'title_banner_slider' => $request->title_banner_slider,
                'icon_banner_slider' => ($request->icon_banner_slider) ? $this->upload($request->icon_banner_slider, 'Configuration') : $data->icon_banner_slider,
                'counter_banner_slider' => $request->counter_banner_slider,
                'title_counter_banner_slider' => $request->title_counter_banner_slider,
                'title_button_about' => $request->title_button_about,
                'link_button_about' => $request->link_button_about,
                'banner_1_title' => $request->banner_1_title,
                'banner_1_title_button' => $request->banner_1_title_button,
                'banner_1_link_button' => $request->banner_1_link_button,
                'benefit_counter_title_1' => $request->benefit_counter_title_1,
                'benefit_counter_title_2' => $request->benefit_counter_title_2,
                'benefit_counter_title_3' => $request->benefit_counter_title_3,
                'benefit_counter_1' => $request->benefit_counter_1,
                'benefit_counter_2' => $request->benefit_counter_2,
                'benefit_counter_3' => $request->benefit_counter_3,
                'banner_video_title' => $request->banner_video_title,
                'banner_video_background' => ($request->banner_video_background) ? $this->upload($request->banner_video_background, 'Configuration') : $data->banner_video_background,
                'banner_video_linkyt' => $request->banner_video_linkyt,
                'petunjuk_paket' => $request->petunjuk_paket,
                'note_paket' => $request->note_paket,
                'note_add_on' => $request->note_add_on,
                'title_addon' => $request->title_addon,
                'desc_addon' => $request->desc_addon,
                'file_addon' => ($request->file_addon) ? $this->upload($request->file_addon, 'Configuration') : $data->file_addon,
                'title_identitas' => $request->title_identitas,
                'title_hubungan_keagean' => $request->title_hubungan_keagean,
                'title_ruang_lingkup' => $request->title_ruang_lingkup,
                'title_peryataan_independensi' => $request->title_peryataan_independensi,
                'title_penggunaan_merek' => $request->title_penggunaan_merek,
                'title_transparasi' => $request->title_transparasi,
                'title_kontak_resmi' => $request->title_kontak_resmi,
                'identitas_website' => $request->identitas_website,
                'hubungan_keagean' => $request->hubungan_keagean,
                'ruang_lingkup' => $request->ruang_lingkup,
                'peryataan_independensi' => $request->peryataan_independensi,
                'penggunaan_merek' => $request->penggunaan_merek,
                'transparasi' => $request->transparasi,
                'kontak_resmi' => $request->kontak_resmi,
       
           
            ]));
            return [
                'code' => 200,
                'success' => true,
                'url' => url('configuration')
            ];
        } catch (\Throwable $th) {
            return errors($th);
        }
    }
}
