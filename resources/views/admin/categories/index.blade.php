@extends('admin.layouts.app_admin')
@section('content')
  <div class="container">
    @component('admin.components.breadcrumb')
      @slot('title')Список категорий @endslot
      @slot('parent')Главная @endslot
      @slot('active')Категории @endslot
    @endcomponent

      <hr>
    <div class="row justify-content-end">
      <a href="{{route('admin.category.create')}}" class="btn btn-primary">
        <i class="far fa-plus-square"></i> Создать категорию</a>
      <table class="table table-striped">
        <thead>
        <tr>
          <th>Наименование</th>
          <th>Публикация</th>
          <th class="text-right">Действие</th>
        </tr>
        </thead>
        <tbody>
        @forelse($categories as $category)
          <tr>
            <td>{{$category->title}}</td>
            <td>{{$category->published}}</td>
            <td>
              <a href="{{route('admin.category.edit',['id'=>$category->id])}}"><i class="fas fa-edit"></i></a>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="3" class="text-center"><h2>Данные отсутствуют</h2></td>
          </tr>
          @endforelse
        </tbody>
        <tfoot>
        <tr>
          <td colspan="3">
            <ul class="pagination">
              {{$categories->links()}}
            </ul>
          </td>
        </tr>
        </tfoot>
      </table>
    </div>
  </div>
  @endsection