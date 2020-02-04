
@foreach ($tables as $table)

  @if ($table->children->where('published', 1)->count())
    <li class="dropdown">
      <a href="{{url("/blog/table/$table->slug")}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
        {{$table->title}} <span class="caret"></span>
      </a>
      <ul class="dropdown-menu" role="menu">
        @include('layouts.top_menu_table', ['tables' => $table->children])
      </ul>
    </li>
  @else
    <li>
      <a href="{{url("/blog/table/$table->slug")}}">{{$table->title}}</a>
  @endif
    </li>
@endforeach
