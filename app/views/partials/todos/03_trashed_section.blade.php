	{{-- 削除済みTODOリスト --}}
	<div id="todos-trashed" class="todos-list row">
		<div class="col-sm-12 col-md-12">
			<h2>アーカイブ <span class="badge">{{ count($trashedTodos) }}</span></h2>

			<table class="table table-striped">
				<thead>
					<tr>
						<th class="title col-sm-12 col-md-6">タイトル</th>
						<th class="completed_at col-sm-12 col-md-2">完了日</th>
						<th class="deleted_at col-sm-12 col-md-2">削除日</th>
						<th class="col-sm-12 col-md-2">&nbsp;</th>
					</tr>
				</thead>
				<tbody>
@if (count($trashedTodos) > 0)
	@foreach ($trashedTodos as $todo)
					<tr>
						<td id="todo-{{ $todo->id }}">
							{{{ $todo->title }}}
						</td>
						<td>
@if ($todo->completed_at)
							{{ date_string($todo->completed_at) }}
@else
@endif
						</td>
						<td>
							{{ date_string($todo->updated_at) }}
						</td>
						<td class="btn-group">
							{{ Form::open(['url' => route('todos.restore', $todo->id)]) }}
								<button class="btn btn-success">復元</button>
							{{ Form::close() }}
						</td>
					</tr>
	@endforeach
@else
					<tr>
						<td colspan="4">まだありません。</td>
					</tr>
@endif
				</tbody>
			</table>
		</div>
	</div>
