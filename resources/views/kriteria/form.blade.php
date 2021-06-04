<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel">
                <div class="panel-body m-t-20">

                    <div style="margin: 1rem;" class="form-group row">
                        <label for="inputNamaKriteria" class="col-sm-2 col-form-label">Nama Kriteria</label>
                        <div class="col-sm-10">
                            <div class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}">
                                <input class="w-100" type="text"
                                    placeholder="{{ $errors->has('nama') ? $errors->first('nama') : 'Masukkan Nama Kriteria' }}"
                                    name="nama" value="{{ isset($kriteria) ? $kriteria->nama : old('nama') }}">
                            </div>
                        </div>
                    </div>

                    <div style="margin: 1rem;" class="form-group row">
                        <label for="inputBobot" class="col-sm-2 col-form-label">Bobot</label>
                        <div class="col-sm-10">
                            <div class="form-control {{ $errors->has('bobot') ? 'is-invalid' : '' }}">
                                <input class="w-100" type="number"
                                    placeholder="{{ $errors->has('bobot') ? $errors->first('bobot') : 'Masukkan Bobot' }}"
                                    name="bobot" value="{{ isset($kriteria) ? $kriteria->bobot : old('bobot') }}">
                            </div>
                        </div>
                    </div>

                    <div style="margin: 1rem;" class="form-group row">
                        <label for="inputTipe" class="col-sm-2 col-form-label">Tipe</label>
                        <div class="col-sm-10">
							{!! Form::select(
								'tipe',
								[
									'Benefit' => 'Benefit',
									'Cost' => 'Cost',
								],
								isset($kriteria) ? $kriteria->tipe : old('tipe'),
								[
									'class' => $errors->has('tipe') ? 'form-control is-invalid' : 'form-control',
									'placeholder' => $errors->has('tipe') ? $errors->first('tipe') : 'Pilih Tipe',
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
                    <div class="form-group" style="padding-top: 20px; width: 25%; margin: auto;">
                        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="main">
	<!-- <div class="main-content"> -->
		<div class="container-fluid">
			<div class="panel">
				<div class="panel-body">

				@if ($errors->any())
					<div class="form-group {{ $errors->has('nama') ?
						'has-error' : 'has-success' }}">
				@else
					<div class="form-group">
				@endif
						{!! Form::label('nama', 'Nama Kriteria : ', ['class' => 'control-label']) !!}
						<div class="form-control">
						{!! Form::text('nama', null, ['class' => 'w-100']) !!}
						</div>
						@if ($errors->has('nama'))
								<span class="help-block">{{ $errors->first('nama') }}</span>
							@endif
					</div>

				@if ($errors->any())
					<div class="form-group {{ $errors->has('bobot') ?
						'has-error' : 'has-success' }}">
				@else
					<div class="form-group">
				@endif
						{!! Form::label('bobot', 'Bobot : ', ['class' => 'control-label']) !!}
						<div class="form-control">
						{!! Form::number('bobot', null) !!}
						</div>
						@if ($errors->has('bobot'))
								<span class="help-block">{{ $errors->first('bobot') }}</span>
							@endif
					</div>
				
				@if ($errors->any())
					<div class="form-group {{ $errors->has('tipe') ?
						'has-error' : 'has-success' }}">
				@else
					<div class="form-group">
				@endif
					{!! Form::label('tipe', 'Tipe : ', ['class' => 'control-label']) !!}
						<div class="form-group">
						{!!
							Form::select('tipe', array(
							'Benefit' => 'Benefit',
							'Cost' => 'Cost'
							), null, ['class' => 'form-control']);
						!!}
						</div>    
						@if ($errors->has('tipe'))
								<span class="help-block">{{ $errors->first('tipe') }}</span>
							@endif
					</div>

					</div>
				</div>

				<div class="form-group" style="padding-top: 20px; width: 25%; margin: auto;">
					{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
				</div>
</div> --}}