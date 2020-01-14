@extends('admin.layouts.app_admin')

@section('content')
<div class="container">
  @component('admin.components.breadcrumb')
    @slot('title') Список Пользователей @endslot
    @slot('parent') Главная @endslot
    @slot('active') Пользователей @endslot
  @endcomponent
  <hr>
  <a href="{{route('admin.user_managment.user.create')}}" class="btn btn-primery pull-right"><i class="fa fa-plus-squere-o"></i>
    Создать Пользователя
  </a>
  <table>
    <head>
      <th>Имя</th>
      <th>Email</th>
      <th class="text-right">Действие</th>
    </head>
    <tbody>
      @forelse ($users as $user)
      <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td class="text-right">
          <form onsubmit="if(confirm(Удалить?)){ return true }else{ return false }" action="{{route('admin.user_managment.user.destroy', $user)}}" method="post">
            {{method_field('DELETE')}}
            {{ csrf_field() }}
            <a class="button_link" href="{{route('admin.user_managment.user.edit', $user)}}"><i class="fa fa-edit"></i></a>
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
      {{$users->links()}}
    </ul>
  </div>
</div>
@endsection
