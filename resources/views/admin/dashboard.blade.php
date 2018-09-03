@extends('admin.layouts.app_admin')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <div class="jumbotron">
          <h4>
            <span class="badge badge-primary">
              Категорий {{$count_categories}}
            </span>
          </h4>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="jumbotron">
          <h4>
            <span class="badge badge-primary">
              Материалов {{$count_articles}}
          </span>
          </h4>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="jumbotron">
          <h4>
            <span class="badge badge-primary">
              Посетителей 0
            </span>
          </h4>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="jumbotron">
          <h4>
            <span class="badge badge-primary">
              Сегодня 0
            </span>
          </h4>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <a href="{{route('admin.category.create')}}" class="btn btn-block btn-secondary">Создать категорию</a>
        @foreach($categories as $category)
        <a href="{{route('admin.category.edit', $category)}}" class="list-group-item">
          <h4 class="list-group-item-header">{{$category->title}}</h4>
          <p class="list-group-text">
            {{$category->articles()->count()}}
          </p>
        </a>
          @endforeach
      </div>
      <div class="col-sm-6">
        <a href="#" class="btn btn-block btn-secondary">Создать материал</a>
        @foreach($articles as $article)
          <a href="{{route('admin.article.edit', $article)}}" class="list-group-item">
            <h4 class="list-group-item-header">{{$article->title}}</h4>
            <p class="list-group-text">
              {{$article->categories()->pluck('title')->implode(', ')}}
            </p>
          </a>
        @endforeach
      </div>
    </div>
  </div>
  @endsection