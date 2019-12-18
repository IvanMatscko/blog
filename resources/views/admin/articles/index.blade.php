@extends('admin.layouts.app_admin')

@section('content')
<div class="container">
  @component('admin.components.breadcrumb')
    @slot('title') Список новостей @endslot
    @slot('parent') Главная @endslot
    @slot('active') Новости @endslot
  @endcomponent
  <hr>
  <a href="{{route('admin.article.create')}}" class="btn btn-primery pull-right"><i class="fa fa-plus-squere-o"></i>
    Создать новость
  </a>
  <table>
    <head>
      <th>Наименование</th>
      <th>Публикация</th>
      <th class="text-right">Действие</th>
    </head>
    <tbody>
      @forelse ($articles as $article)
      <tr>
        <td>{{$article->title}}</td>
        <td>{{$article->published}}</td>
        <td class="text-right">
          <form onsubmit="if(confirm(Удалить?)){ return true }else{ return false }" action="{{route('admin.article.destroy', $article)}}" method="post">
            <input type="hidden" name="_method" value="DELETE">
            {{ csrf_field() }}
            <a class="button_link" href="{{route('admin.article.edit', $article)}}"><i class="fa fa-edit"></i></a>
            <button type="submit" class="btn btn_delete"> <i class="fa fa-trash-o"></i> </button>
          </form>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="3" class="text-center"><h2>Данные отсутствуют</h2></td>
      </tr>
      @endforelse
    </tbody>
  </table>
  <div class="">
    <ul class="pagination pull-right">
      {{$articles->links()}}
    </ul>
  </div>
</div>
@endsection
