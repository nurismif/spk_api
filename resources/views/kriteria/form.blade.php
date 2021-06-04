<div class="main">
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
</div>