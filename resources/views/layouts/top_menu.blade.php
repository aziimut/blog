@foreach($categories as $category)
  @if($category->children->where('published', 1)->count())
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="{{url("/blog/category/$category->slug")}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{$category->title}} <span class="caret"></span>
      </a>
      <ul class="dropdown-menu" role="menu">
        @include('layouts.top_menu',['categories' => $category->children])
      </ul>
    @else
      <li class="nav-item">
        <a class="nav-link" href="{{url("/blog/category/$category->slug")}}">{{$category->title}}</a>
    @endif
    </li>
  @endforeach