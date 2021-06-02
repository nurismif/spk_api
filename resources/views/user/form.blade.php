<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel">
				<div class="panel-body m-t-20">

				@if ($errors->any())
					<div style="width: 80%" class="form-group row m-auto {{ $errors->has('nip') ? 'has-error' : 'has-success' }}">
				@else
					<div style="width: 80%" class="form-group row m-auto">
				@endif
						<label for="inputPassword" class="col-sm-2 col-form-label">NIP : </label>
						<div class="col-sm-10">
						  {{-- <input type="password" class="form-control" id="inputPassword" placeholder="Password"> --}}
						  	<div class="form-control">
								{!! Form::text('nip', null, ['class' => 'w-100', 'placeholder' => 'Masukkan NIP']) !!}
							</div>
						@if ($errors->has('nip'))
							<span class="help-block text-danger">{{ $errors->first('nip') }}</span>
						@endif  
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
					</div>		 --}}

						
						@if ($errors->any())
						<div class="form-group {{ $errors->has('nama') ?
							'has-error' : 'has-success' }}">
					@else
						<div class="form-group">
					@endif
						{!! Form::label('nama', 'Nama User : ', ['class' => 'control-label']) !!}
							<div class="form-control">
							{!! Form::text('nama', null, ['class' => 'w-100', 'placeholder' => 'Masukkan Nama User']) !!}
							</div>
								@if ($errors->has('nama'))
									<span class="help-block text-danger">{{ $errors->first('nama') }}</span>
								@endif
						</div>

					@if ($errors->any())
						<div class="form-group {{ $errors->has('username') ?
							'has-error' : 'has-success' }}">
					@else
						<div class="form-group">
					@endif
						{!! Form::label('username', 'Username : ', ['class' => 'control-label']) !!}
							<div class="form-control">
							{!! Form::text('username', null, ['class' => 'w-100', 'placeholder' => 'Masukkan Username']) !!}
							</div>
								@if ($errors->has('username'))
									<span class="help-block text-danger">{{ $errors->first('username') }}</span>
								@endif
						</div>
					
					@if ($errors->any())
						<div class="form-group {{ $errors->has('password') ?
							'has-error' : 'has-success' }}">
					@else
						<div class="form-group">
					@endif
						{!! Form::label('password', 'Password : ', ['class' => 'control-label']) !!}
							<div class="form-control">
							{!! Form::text('password', null, ['class' => 'w-100', 'placeholder' => 'Masukkan Password']) !!}
							</div>
								@if ($errors->has('password'))
									<span class="help-block text-danger">{{ $errors->first('password') }}</span>
								@endif
						</div>
					
					@if ($errors->any())
						<div class="form-group {{ $errors->has('jabatan') ?
							'has-error' : 'has-success' }}">
					@else
						<div class="form-group">
					@endif
						{!! Form::label('jabatan', 'Jabatan : ', ['class' => 'control-label']) !!}
							<div class="form-group">
							{!!
								Form::select('jabatan', array(
								'Tim PKG' => 'Tim_PKG',
								'Kepala Sekolah' => 'Kepala Sekolah',
								'Guru' => 'Guru'
								), null, ['class' => 'form-control']);
							!!}
							</div>    
								@if ($errors->has('jabatan'))
									<span class="help-block text-danger">{{ $errors->first('jabatan') }}</span>
								@endif
						</div>
					
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