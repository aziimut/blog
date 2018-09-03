<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\Category;

class DashboardController extends Controller
{
    public function dashboard (){
      return view('admin.dashboard',[
        'articles' => Article::lastArticles(5),
        'categories' => Category::lastCategories(5),
        'count_categories' => Category::count(),
        'count_articles' => Article::count()
      ]);
    }
}
