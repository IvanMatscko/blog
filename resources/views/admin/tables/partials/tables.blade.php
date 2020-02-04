@foreach ($tables as $table_list)

  <option value="{{$table_list->id or ""}}"

    @isset($table->id)

      @if ($table->parent_id == $table_list->id)
        selected=""
      @endif

      @if ($table->id == $table_list->id)
        hidden=""
      @endif

    @endisset

    >
    {!! $delimiter or "" !!}{{$table_list->title or ""}}
  </option>

  @if (count($table_list->children) > 0)

    @include('admin.tables.partials.tables', [
      'tables' => $table_list->children,
      'delimiter'  => ' - ' . $delimiter
    ])

  @endif
@endforeach
