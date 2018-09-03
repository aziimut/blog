<div class="form-group">
  <label for="">Статус</label>
  <select class="form-control" name="published">
    @if(isset($article->id))
      <option value="0" @if($article->published == 0) selected="" @endif>Не опубликовано</option>
      <option value="1" @if($article->published == 1) selected="" @endif>Опубликовано</option>
    @else
      <option value="0">Не опубликовано</option>
      <option value="1">Опубликовано</option>
    @endif
  </select>
</div>
<div class="form-group">
  <label for="">Заголовок</label>
  <input type="text" class="form-control" name="title" placeholder="Заголовок новости" value="{{$article->title or ''}}" required>
</div>
<div class="form-group">
  <label for="">Slug (Уникальное значение)</label>
  <input type="text" class="form-control" name="slug" placeholder="Автоматическая генирация" value="{{$article->slug or ''}}" readonly="">
</div>
<div class="form-group">
  <label for="">Родительская категория</label>
  <select name="categories[]" class="form-control" multiple="">
    @include('admin.articles.partials.categories', ['categories' => $categories])
  </select>

  <label for="">Краткое описание</label>
  <textarea name="description_short" class="form-control" id="description_short">{{$article->description_short or ""}}</textarea>

  <label for="">Полное описание</label>
  <textarea name="description" class="form-control" id="description">{{$article->description or ""}}</textarea>
  <hr />
  <label for="">Мета заголовок</label>
  <input type="text" name="meta_title" class="form-control" placeholder="Мета заголовок" value="{{$article->meta_title or ""}}">

  <label for="">Мета описание</label>
  <input type="text" name="meta_description" class="form-control" placeholder="Мета описание" value="{{$article->meta_description or ""}}">

  <label for="">Ключевые слова</label>
  <input type="text" name="meta_keyword" class="form-control" placeholder="Ключевые слова" value="{{$article->meta_keyword or ""}}">
</div>
<hr>

<input type="submit" class="btn btn-primary" value="Сохранить">