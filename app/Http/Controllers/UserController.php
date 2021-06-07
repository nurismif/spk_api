<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\KriteriaAHP;
use App\NilaiPerbandingan;
use App\Penilaian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use function DeepCopy\deep_copy;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function postApiLogin(Request $request)
    {
        $data = User::firstWhere([
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ]);
        if ($data) {
            return response([
                'status' => 200,
                'success' => true,
                'message' => 'Login berhasil',
                'data' => $data
            ]);
        } else {
            return response([
                'status' => 200,
                'success' => false,
                'message' => 'Username atau password salah',
                'data' => null
            ]);
        }
    }

    public function postlogin(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $data = User::firstWhere([
                'username' => $request->username,
            ]);

            Session::put('user_id', $data->id);
            Session::put('user_nama', $data->nama);

            return redirect()->route('dashboard');
        }

        return redirect('/admin/login');
    }

    public function get_all_user()
    {
        return response()->json(User::all(), 200);
    }

    public function get_nilai_user(Request $request, $user_id)
    {
        return Penilaian::where('user_id', $user_id)->get();
    }

    public function get_profile_user(Request $request, $id)
    {
        return User::where('id', $id)->get();
    }

    public function insert_guru(Request $request)
    {
        $data = $request->input();
        $data['jabatan'] = 'Guru';
        $insert_user = User::create($data);
        return response([
            'status' => 200,
            'message' => 'Berhasil menginput data guru',
            'data' => $insert_user
        ]);
    }

    public function insert_kepsek(Request $request)
    {
        $data = $request->input();
        $data['jabatan'] = 'KepSek';
        $data['jurusan'] = null;
        $insert_user = User::create($data);
        return response([
            'status' => 200,
            'message' => 'Berhasil menginput data kepsek',
            'data' => $insert_user
        ]);
    }

    public function insert_tim_pkg(Request $request)
    {
        $data = $request->input();
        $data['jabatan'] = 'Tim_PKG';
        $data['jurusan'] = null;
        $insert_user = User::create($data);
        return response([
            'status' => 200,
            'message' => 'Berhasil menginput data tim pkg',
            'data' => $insert_user
        ]);
    }

    public function update_user(Request $request, $id)
    {
        $body = $request->input();
        if ($request->exists('id')) {
            return response([
                'status' => 'Not Allowed',
                'message' => 'ID tidak boleh diganti'
            ]);
        }

        $data = User::find($id);
        if ($data) {
            if ($data->jabatan === 'kepsek' || $data->jabatan === 'tim_pkg') {
                $body['jurusan'] = null;
            }
            $data = User::where('id', $id)->update($body);
            return response([
                'status' => 'OK',
                'message' => 'Data berhasil diupdate',
                'data' => $body
            ], 200);
        } else {
            return response([
                'status' => 'NOT FOUND',
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
    }

    public function delete_user(Request $request, $id)
    {
        $data = User::firstWhere('id', $id);
        if ($data) {
            User::destroy($id);
            return response([
                'status' => 'OK',
                'message' => 'Data User Dihapus'
            ], 200);
        } else {
            return response([
                'status' => 'NOT FOUND',
                'message' => 'Id User tidak ditemukan'
            ], 404);
        }
    }

    public function index()
    {
        //mengambil data dari tabel user
        $user = DB::table('users')->get();
        //mengirim data ke view user
        return view('user/index', ['user' => $user, 'no' => 1]);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();


        $validator  = Validator::make($data, [
            'nip'   =>  'required|string|max:30|unique:users',
            'nama'   =>  'required|string|max:255',
            'username'   =>  'required|string|max:50|unique:users',
            'password'   =>  'required|string|max:20|confirmed',
            'jabatan'   =>  'required|string|max:100',
            'jenis_kelamin'   =>  'required|string|max:10',
            'jurusan'   =>  'required|string|max:20',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/user/create')
                ->withInput()
                ->withErrors($validator);
        }

        $user = User::create($data);
        $user->save();
        return redirect('admin/user/index');
    }

    public function show($id)
    {
        $users = User::findOrFail($id);
        return view('user.show', compact('users'));
    }

    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view('user.edit', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $user = User::findOrFail($id);

        $validator  = Validator::make($data, [
            'nip'   =>  'required|string|max:30',
            'nama'   =>  'required|string|max:255',
            'username'   =>  'required|string|max:50',
            'password'   =>  'sometimes|max:20|confirmed',
            'jurusan'   =>  'required|string|max:100',
            'jabatan'   =>  'required|string|max:100'
        ]);

        if ($validator->fails()) {
            # code...
            // return redirect('siswa/create');
            return redirect('/admin/user/' . $id . '/edit')
                ->withInput()
                ->withErrors($validator);
        }

        // Update User
        $user = User::find($id);
        $user->nip = $request->input('nip');
        $user->nama = $request->input('nama');
        $user->username = $request->input('username');
        $user->jurusan = $request->input('jurusan');
        $user->jabatan = $request->input('jabatan');

        if(!empty($request->input('password')))
        {
            $user->password = bcrypt($request->input('password'));
        }
        $user->save();

        // $user->save();

        // $user->update($request->all());

        return $request->type == 'user' ? redirect('admin/user/index') : redirect('admin/teacher/index');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('admin/user/index')->with('status', 'User Berhasil Dihapus');
    }

    public function get_ranking_guru_ahp()
    {
        $kriteria = KriteriaAHP::all();
        $jumlah_kriteria = count($kriteria);
        $T = 0;
        $CI = 0;

        //normalisasi
        foreach ($kriteria as $k) {
            // return "<pre>".print_r($k, true)."</pre>";
            $nilai_perbandingan_per_kolom = NilaiPerbandingan::where('target_kriteria_ahp_id', '=', $k->id)->orderBy('kriteria_ahp_id', 'asc')->get();
            // return "<pre>".print_r($nilai_perbandingan_per_kolom, true)."</pre>";
            $k->total_bobot_untuk_normalisasi = 0;

            foreach ($nilai_perbandingan_per_kolom as $n) {
                $k->total_bobot_untuk_normalisasi += $n->nilai_perbandingan;
            }

            $k->nilai_perbandingan_per_kolom = $nilai_perbandingan_per_kolom;

            foreach ($nilai_perbandingan_per_kolom as $n) {
                $n->nilai_perbandingan_normal = $n->nilai_perbandingan / $k->total_bobot_untuk_normalisasi;
            }
        }
        foreach ($kriteria as $k) {
            $total_nilai_perbandingan_normal_temp = 0;

            foreach ($kriteria as $k2) {
                foreach ($k2->nilai_perbandingan_per_kolom as $n) {
                    if ($n->kriteria_ahp_id == $k->id) {
                        $total_nilai_perbandingan_normal_temp += $n->nilai_perbandingan_normal;
                        $k->total_nilai_perbandingan_normal = $total_nilai_perbandingan_normal_temp;
                    }
                }
            }

            $total_nilai_perbandingan_normal_temp = 0;

            $k->total_bobot = $k->total_nilai_perbandingan_normal / $jumlah_kriteria;
        }

        foreach ($kriteria as $k) {
            $k->total_bobot_akhir = 0;
            foreach ($kriteria as $k2) {
                $nilai_perbandingan_per_baris = NilaiPerbandingan::where('target_kriteria_ahp_id', '=', $k2->id)->get();
                foreach ($nilai_perbandingan_per_baris as $n) {
                    if ($n->kriteria_ahp_id === $k->id) {
                        $k->total_bobot_akhir += $n->nilai_perbandingan * $k2->total_bobot;
                    }
                }
            }
        }

        $T = 0;
        foreach ($kriteria as $k) {
            $T += $k->total_bobot_akhir / $k->total_bobot;
        }

        $T = $T / $jumlah_kriteria;
        $CI = ($T - $jumlah_kriteria) / ($jumlah_kriteria - 1);
        $RI = [0, 0, 0.58, 0.9, 1.12, 1.24, 1.32, 1.41, 1.45, 1.49, 1.51, 1.48, 1.56, 1.57, 1.59];

        if ($jumlah_kriteria > count($RI)) {
            return response()->json([
                'status' => 400,
                'message' => "Jumlah kriteria melebihi jumlah RI"
            ], 400);
        }

        $status = $CI / $RI[$jumlah_kriteria - 1];
        $keterangan = "";
        if ($status <= 0.1) {
            $keterangan = "Konsisten";
        } else {
            $keterangan = "Tidak Konsisten";
        }

        $matriks_penilaian = [];
        foreach ($kriteria as $k) {
            $penilaian_guru = Penilaian::where('kriteria_ahp_id', '=', $k->id)->get();
            $perbandingan_per_kriteria = [];
            foreach ($penilaian_guru as $p) { //samping, kiri->kanan
                $temp = deep_copy($p);
                $perbandingan = [];
                foreach ($penilaian_guru as $p2) { //atas, atas->bawah
                    $temp2 = deep_copy($p2);
                    if ($k->tipe === 'Benefit') {
                        $temp2->nilai = $temp->nilai / $temp2->nilai;
                    } else {
                        $temp2->nilai = $temp2->nilai / $temp->nilai;
                    }
                    array_push($perbandingan, $temp2);
                }
                $temp->perbandingan = $perbandingan;

                array_push($perbandingan_per_kriteria, [
                    'user_id' => $temp->user_id,
                    'perbandingan_dengan_user_lain' => $temp->perbandingan
                ]);
            }

            $matriks_penilaian_per_kriteria = [
                'kriteria' => $k->nama,
                'nilai' => $perbandingan_per_kriteria
            ];
            array_push($matriks_penilaian, $matriks_penilaian_per_kriteria);
        }

        $matriks_penilaian2 = [];
        foreach ($matriks_penilaian as $m) {
            $temp = deep_copy($m);
            foreach ($temp['nilai'] as $n) {
                $total_nilai = 0;
                foreach ($n['perbandingan_dengan_user_lain'] as $p) {
                    $total_nilai += $p['nilai'];
                    $temp['total_nilai'] = $total_nilai;
                    // $m = array_merge($m, ['total_nilai' => $total_nilai]);
                    // return "<pre>".print_r($m, true)."</pre>";
                }
            }
            array_push($matriks_penilaian2, $temp);
        }

        $matriks_penilaian3 = [];
        foreach ($matriks_penilaian2 as $m) {
            $temp = deep_copy($m);
            foreach ($temp['nilai'] as $n) {
                $temp2 = deep_copy($n);
                foreach ($n['perbandingan_dengan_user_lain'] as $p) {
                    $temp3 = deep_copy($p);
                    $p['nilai_normal'] = $temp3['nilai'] / $temp['total_nilai'];
                }
            }
            array_push($matriks_penilaian3, $temp);
        }

        $nilai_maxmin = 0;
        foreach ($penilaian_guru as $p) { //samping, kiri->kanan
            $nilai_maxmin = $p / max($p);
            $bobot_alternatif = $p / $p->sum($nilai_maxmin);
        }

        $bobot_alternatif = [];
        foreach ($kriteria as $k) {
            foreach ($bobot_alternatif as $b) { //atas, atas->bawah
                $temp2 = deep_copy($b);
                $rangking = $k->total_bobot * $b;
            }
        }

        $data = [
            'T' => $T,
            'CI' => $CI,
            'RI' => $RI[$jumlah_kriteria - 1],
            'matriks_penilaian' => $matriks_penilaian3,
            'status' => [
                'nilai' => $status,
                'keterangan' => $keterangan
            ],
            'kriteria' => $kriteria,
            'jumlah_kriteria' => $jumlah_kriteria,
            'nilai_maxmin' => $nilai_maxmin,
            'bobot_alternatif' => $bobot_alternatif,
            'rangking' => $rangking,
        ];

        return response()->json([
            'status' => 200,
            'data' => $data
        ], 200);
    }

    public function get_ranking_guru()
    {
        $kriteria = KriteriaAHP::all();
        $totalBobot = 0;
        foreach ($kriteria as $k) {
            $totalBobot += $k->bobot;
        }

        foreach ($kriteria as $k) {
            $k->bobot = $k->bobot / $totalBobot;
            if ($k->tipe === 'cost') {
                $k->bobot = $k->bobot * -1;
            } else if ($k->tipe === 'benefit') {
                $k->bobot = $k->bobot * 1;
            }
        }
        // return "<pre>".print_r($kriteria,true)."</pre>";
        $users = User::with('penilaian')->where('jabatan', '=', 'Guru')->get();
        // return "<pre>".print_r($users, true)."</pre>";
        // return response()->json($users, 200);
        $data = [];
        $result = [];
        foreach ($users as $u) {
            $nilai_total = 1;
            foreach ($u->penilaian as $p) {
                $bobot = 0;
                foreach ($kriteria as $k) {
                    if ($k->id === $p->kriteria_ahp_id) {
                        $bobot = $k->bobot;
                        break;
                    }
                }

                if ($bobot === 0) {
                    break;
                }

                $nilai_per_kriteria = $p->nilai ** $bobot;

                $p->bobot = $bobot;
                $p->nilai_per_kriteria = $nilai_per_kriteria;

                $nilai_total = $nilai_total * $nilai_per_kriteria;
            }
            $u->nilai_total = $nilai_total;
            array_push($result, [
                'nama' => $u->nama,
                'nilai' => $nilai_total
            ]);
            array_push($data, $u);
        }

        usort($result, function ($a, $b) {
            return $b['nilai'] <=> $a['nilai'];
        });

        return response()->json([
            'status' => 200,
            'result' => $result,
            'data' => $data
        ], 200);
    }
}
