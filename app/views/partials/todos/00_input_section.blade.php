	{{-- 新規TODO入力欄 --}}
	<div class="row">
		<div class="col-sm-12 col-md-6">
			{{ Form::open(['url' => route('todos.store'), 'method' => 'POST']) }}
				<div class="form-group {{ count($errors) > 0 ? 'has-error' : '' }}">
					<div class="input-group">
						<input type="text" name="title" value="{{{ Input::old('title') }}}" placeholder="何をする？" class="form-control">
						<span class="input-group-btn">
							<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> 追加</button>
						</span>
					</div>
@if (count($errors) > 0)
					<p class="help-block">{{ $errors->first() }}</p>
@endif
				</div>
			{{ Form::close() }}
		</div>
	</div>
