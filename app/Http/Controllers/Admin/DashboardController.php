<?php

namespace App\Http\Controllers\Admin;
use App\Article;
use App\Category;
use App\Table;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //dashboard
    public function dashboard() {
      return view('admin.dashboard', [
        'categories' => Category::lastCategories(5),
        'articles' => Article::lastArticles(5),
        'tables' => Table::lastTables(5),
        'count_categories' => Category::count(),
        'count_articles' => Article::count(),
      ]);

    }
}
