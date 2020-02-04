@extends('admin.layouts.app_admin')

@section('content')

<div class="container">

  @component('admin.components.breadcrumb')
    @slot('title') Создание категории @endslot
    @slot('parent') Главная @endslot
    @slot('active') Категории @endslot
  @endcomponent

  <hr />

  <form class="form-horizontal" action="{{route('admin.table.store')}}" method="post">
    {{ csrf_field() }}

    {{-- Form include --}}
    @include('admin.tables.partials.form')

  </form>
</div>

@endsection
