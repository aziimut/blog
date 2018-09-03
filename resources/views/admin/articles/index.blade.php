@extends('admin.layouts.app_admin')
@section('content')
  <div class="container">
    @component('admin.components.breadcrumb')
      @slot('title')Список новостей @endslot
      @slot('parent')Главная @endslot
      @slot('active')Новости @endslot
    @endcomponent

    <hr>
    <div class="row justify-content-end">
      <a href="{{route('admin.article.create')}}" class="btn btn-primary">
        <i class="far fa-plus-square"></i> Создать новость</a>
      <table class="table table-striped">
        <thead>
        <tr>
          <th>Наименование</th>
          <th>Публикация</th>
          <th class="text-right">Действие</th>
        </tr>
        </thead>
        <tbody>
        @forelse($articles as $article)
          <tr>
            <td>{{$article->title}}</td>
            <td>{{$article->published}}</td>
            <td class="text-right">
              <form onsubmit="if(confirm('Удалить?')){return true}else {return false}" action="{{route('admin.article.destroy', $article)}}" method="post">
                <input type="hidden" name="_method" value="DELETE">
                {{ csrf_field() }}
                <a class="btn btn-default" href="{{route('admin.article.edit',$article)}}"><i class="fas fa-edit"></i></a>
                <button type="submit" class="btn"><i class="far fa-trash-alt"></i></button>
              </form>
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
             {{$articles->links()}}
            </ul>
          </td>
        </tr>
        </tfoot>
      </table>
    </div>
  </div>
@endsection