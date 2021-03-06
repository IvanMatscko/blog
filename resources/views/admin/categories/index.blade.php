@extends('admin.layouts.app_admin')

@section('content')
<div class="container">
  @component('admin.components.breadcrumb')
    @slot('title') Список категорий @endslot
    @slot('parent') Главная @endslot
    @slot('active') Категории @endslot
  @endcomponent
  <hr>
  <a href="{{route('admin.category.create')}}" class="btn btn-primery pull-right"><i class="fa fa-plus-squere-o"></i>
    Создать категорию
  </a>
  <table>
    <head>
      <th>Наименование</th>
      <th>Публикация</th>
      <th class="text-right">Действие</th>
    </head>
    <tbody>
      @forelse ($categories as $category)
      <tr>
        <td>{{$category->title}}</td>
        <td>{{$category->published}}</td>
        <td class="text-right">
          <form onsubmit="if(confirm(Удалить?)){ return true }else{ return false }" action="{{route('admin.category.destroy', $category)}}" method="post">
            <input type="hidden" name="_method" value="DELETE">
            {{ csrf_field() }}
            <a href="{{route('admin.category.edit', $category)}}"><i class="fa fa-edit"></i></a>
            <button type="submit" class="btn"> <i class="fa fa-trash-o"></i> </button>
          </form>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="3" class="text-center"><h2>Данные отсутствуют</h2></td>
      </tr>
      @endforelse
    </tbody>
    <div class="">
      <ul class="pagination pull-right">
        {{$categories->links()}}
      </ul>
    </div>
</div>
@endsection
