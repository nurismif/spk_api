<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel">
                <div class="panel-body m-t-20">

                    <div style="margin: 1rem;" class="form-group row">
                        <label for="inputNIP" class="col-sm-2 col-form-label">NIP</label>
                        <div class="col-sm-10">
                            <div class="form-control {{ $errors->has('nip') ? 'is-invalid' : '' }}">
                                <input class="w-100" type="text"
                                    placeholder="{{ $errors->has('nip') ? $errors->first('nip') : 'Masukkan NIP' }}"
                                    name="nip" value="{{ isset($users) ? $users->nip : old('nip') }}">
                            </div>
                        </div>
                    </div>

                    <div style="margin: 1rem;" class="form-group row">
                        <label for="inputNama" class="col-sm-2 col-form-label">Nama User</label>
                        <div class="col-sm-10">
                            <div class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}">
                                <input class="w-100" type="text"
                                    placeholder="{{ $errors->has('nama') ? $errors->first('nama') : 'Masukkan Nama User' }}"
                                    name="nama" value="{{ isset($users) ? $users->nama : old('nama') }}">
                            </div>
                        </div>
                    </div>

                    <div style="margin: 1rem;" class="form-group row">
                        <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <div class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}">
                                <input class="w-100" type="text"
                                    placeholder="{{ $errors->has('username') ? $errors->first('username') : 'Masukkan Username' }}"
                                    name="username" value="{{ isset($users) ? $users->username : old('username') }}">
                            </div>
                        </div>
                    </div>

                    <div style="margin: 1rem;" class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="password" id="inputPassword"
                                    class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }} input-password"
                                    name="password" {{-- value="{{ isset($users) ? $users->password : old('password') }}" --}}
                                    placeholder="{{ $errors->has('password') ? $errors->first('password') : 'Masukkan Password' }}">
                                <div class="input-group-append">
                                    <button onclick="togglePassword()" type="button" class="input-group-text">
                                        <i class="fa fa-eye" id="changeicon"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div style="margin: 1rem;" class="form-group row">
                        <label for="inputPasswordConfirmation" class="col-sm-2 col-form-label">Password
                            Confirmation</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="password" id="inputPasswordconfirm"
                                    class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }} input-password"
                                    name="password_confirmation" {{-- value="{{ isset($users) ? $users->password : old('password') }}" --}} placeholder="Password">
                                <div class="input-group-append">
                                    <button onclick="togglePasswordConfirm()" type="button" class="input-group-text">
                                        <i class="fa fa-eye" id="changeiconconfirm"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="margin: 1rem;" class="form-group row">
                        <label for="inputJabatan" class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">
                            {!! Form::select(
                                'jabatan',
                                [
                                    User::TIM_KPG_ROLE => 'Tim PKG',
                                    User::KEPSEK_ROLE => 'Kepala Sekolah',
                                    User::GURU_ROLE => 'Guru',
                                ],
                                isset($users) ? $users->jabatan : old('jabatan'),
                                [
                                    'class' => $errors->has('jabatan') ? 'form-control is-invalid' : 'form-control',
                                    'placeholder' => $errors->has('jabatan') ? $errors->first('jabatan') : 'Pilih Jabatan',
                                ],
                            ) 
                            !!}
                        </div>
                    </div>

                    @if ($submitButtonText === 'Save')
                        <div style="margin: 1rem;" class="form-group row">
                            <label for="inputJenisKelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div style="padding-left: 2rem" class="col-sm-2">
                                <div class="form-check">
                                    <input class="form-check-input" value='{{ User::MALE_TYPE }}' type="radio"
                                        name="jenis_kelamin">
                                    <label class="form-check-label">Pria</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value='{{ User::FEMALE_TYPE }}' type="radio"
                                        name="jenis_kelamin">
                                    <label class="form-check-label">Wanita</label>
                                </div>
                            </div>
                            <div class="col-sm-6 my-auto">
                                @if ($errors->has('jenis_kelamin'))
                                    <span class="help-block text-danger">{{ $errors->first('jenis_kelamin') }}</span>
                                @endif
                            </div>
                        </div>
                    @endif

                    <div style="margin: 1rem;" class="form-group row">
                        <label for="inputJurusan" class="col-sm-2 col-form-label">Jurusan</label>
                        <div class="col-sm-10">
                            {!! Form::select(
    'jurusan',
    [
        null => '----',
        'Multimedia' => 'Multimedia',
        'Animasi' => 'Animasi',
        'Akuntansi' => 'Akuntansi',
        'Perkantoran' => 'Perkantoran',
        'BDP' => 'BDP',
    ],
    isset($users) ? $users->jurusan : old('jurusan'),
    [
        'class' => $errors->has('jurusan') ? 'form-control is-invalid' : 'form-control',
        'placeholder' => $errors->has('jurusan') ? $errors->first('jurusan') : 'Pilih Jurusan',
    ],
) !!}
                        </div>
                    </div>

                    {{-- @if ($errors->any())
						<div class="form-group {{ $errors->has('nip') ? 'has-error' : 'has-success' }}">
							@else
							<div class="form-group">
								@endif
								{!! Form::label('nip', 'NIP : ', ['class' => 'control-label']) !!}
								<div class="form-control">
									{!! Form::text('nip', null, ['class' => 'w-100', 'placeholder' => 'Masukkan NIP']) !!}
								</div>
						@if ($errors->has('nip'))
							<span class="help-block">{{ $errors->first('nip') }}</span>
						@endif  									
					</div> --}}
                    <input type="hidden" name="type" value="{{ $editType }}">
                    <div class="form-group" style="padding-top: 20px; width: 25%; margin: auto;">
                        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
