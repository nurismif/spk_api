<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel">
				<div class="panel-body m-t-20">

					<div style="margin: 1rem;" class="form-group row">
						<label for="inputNIP" class="col-sm-2 col-form-label">NIP</label>
						<div class="col-sm-10">	
						  	<div class="form-control {{ $errors->has('nip') ? 'is-invalid' : '' }}">
								<input class="w-100" type="text" placeholder="{{ $errors->has('nip') ? $errors->first('nip') : 'Masukkan NIP' }}" name="nip" value="{{ isset($users) ? $users->nip : old('nip') }}">
							</div>
						</div>
					</div>
					
					<div style="margin: 1rem;" class="form-group row">
						<label for="inputNama" class="col-sm-2 col-form-label">Nama User</label>
						<div class="col-sm-10">
						  	<div class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}">
								<input class="w-100" type="text" placeholder="{{ $errors->has('nama') ? $errors->first('nama') : 'Masukkan Nama User' }}" name="nama" value="{{ isset($users) ? $users->nama : old('nama') }}">
							</div>
						</div>
					</div>
					
					<div style="margin: 1rem;" class="form-group row">
						<label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
						<div class="col-sm-10">
							<div class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}">
								<input class="w-100" type="text" placeholder="{{ $errors->has('username') ? $errors->first('username') : 'Masukkan Username' }}" name="username" value="{{ isset($users) ? $users->username : old('username') }}">
							</div>
						</div>
					</div>
					
					<div style="margin: 1rem;" class="form-group row">
						<label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
						<div class="col-sm-10">
							<div class="input-group">
								<input type="password" id="inputPassword" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }} input-password" name="password" placeholder="{{ $errors->has('password') ? $errors->first('password') : 'Masukkan Password' }}">
								<div class="input-group-append">
									<button onclick="togglePassword()" type="button" class="input-group-text">
										<i class="fa fa-eye" id="changeicon"></i>
									</button>
								</div>
							</div>
						</div>
					</div>

					
					<div style="margin: 1rem;" class="form-group row">
						<label for="inputPassword" class="col-sm-2 col-form-label">Password Confirmation</label>
						<div class="col-sm-10">
							<div class="input-group">
								<input type="password" id="inputPasswordconfirm" class="form-control input-password" name="password_confirmation" placeholder="Password">
								<div class="input-group-append">
									<button onclick="togglePasswordConfirm()" type="button" class="input-group-text">
										<i class="fa fa-eye" id="changeiconconfirm"></i>
									</button>
								</div>
							</div> 
						</div>
					</div>
					
					<div style="margin: 1rem;" class="form-group row">
						<label for="inputPassword" class="col-sm-2 col-form-label">Jabatan</label>
						<div class="col-sm-10">
							@if ($errors->has('jabatan'))
							{!!
								Form::select('jabatan', array(
									'Tim PKG' => 'Tim_PKG',
									'Kepala Sekolah' => 'Kepala Sekolah',
									'Guru' => 'Guru'
								), null, ['class' => 'form-control is-invalid', 'placeholder' => $errors->first('jabatan')]);
								!!}
							@else
							{!!
								Form::select('jabatan', array(
									'Tim PKG' => 'Tim_PKG',
									'Kepala Sekolah' => 'Kepala Sekolah',
									'Guru' => 'Guru'
								), null, ['class' => 'form-control', 'placeholder' => 'Pilih Jabatan']);
								!!}
							@endif
						</div>
					</div>

					@if ($submitButtonText === 'Save')
						<div style="margin: 1rem;" class="form-group row">
							<label for="inputJenisKelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
							<div style="padding-left: 2rem" class="col-sm-10">
								<div class="form-check">
									<input class="form-check-input" value="Laki-laki" type="radio" name="jenis_kelamin">
										<label class="form-check-label">Laki-laki</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" value="Perempuan" type="radio" name="jenis_kelamin">
										<label class="form-check-label">Perempuan</label>
								</div>
							</div>
						</div>
					@endif
					
					
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
					</div>		 --}}

						
					@if ($submitButtonText === 'Save')
						@if ($errors->any())
							<div class="form-group {{ $errors->has('jenis_kelamin') ?
								'has-error' : 'has-success' }}">
						@else
							<div class="form-group">
						@endif
							{!! Form::label('jenis_kelamin', 'Jenis Kelamin : ', ['class' => 'control-label']) !!}
								<div class="form-check">
									<input class="form-check-input" value="Laki-laki" type="radio" name="jenis_kelamin">
										<label class="form-check-label">Laki-laki</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" value="Perempuan" type="radio" name="jenis_kelamin">
										<label class="form-check-label">Perempuan</label>
								</div>
									@if ($errors->has('jenis_kelamin'))
										<span class="help-block text-danger">{{ $errors->first('jenis_kelamin') }}</span>
									@endif
							</div>
						</div>
					@endif

					@if ($errors->any())
						<div class="form-group {{ $errors->has('jurusan') ?
							'has-error' : 'has-success' }}">
					@else
						<div class="form-group">
					@endif
						{!! Form::label('jurusan', 'Jurusan : ', ['class' => 'control-label']) !!}
							<div class="form-group">
							{!!
								Form::select('jurusan', array(
								null => '----',
								'Multimedia' => 'Multimedia',
								'Animasi' => 'Animasi',
								'Akutansi' => 'Akutansi',
								'Perkantoran' => 'Perkantoran',
								'BDP' => 'BDP'
								), null, ['class' => 'form-control']);
							!!}
							</div>
						@if ($errors->has('jurusan'))
							<span class="help-block text-danger">{{ $errors->first('jurusan') }}</span>
						@endif
						</div>
					</div>

					<div class="form-group" style="padding-top: 20px; width: 25%; margin: auto;">
						{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>