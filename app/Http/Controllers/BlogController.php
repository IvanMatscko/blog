<?php

namespace App\Http\Controllers;
use App\Category;
use App\Article;
use App\Table;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function category($slug) {
      $category = Category::where('slug', $slug)->first();
      return view('blog.category', [
        'category' => $category,
        'articles' => $category->articles()->where('published', 1)->paginate(12)
      ]);
    }
    public function table($slug) {
      $table = Table::where('slug', $slug)->first();
      return view('blog.table', [
        'table' => $table,
        'articles' => $table->articles()->where('published', 1)->paginate(12)
      ]);
    }
    public function article($slug) {

      $url_data = [
        array(
          'title' => 'title',
          'url' => 'http://dka-develop.ru'
        ),
        array(
          'title' => 'youtube',
          'url' => 'http://youtube'
        )
      ];

      return view('blog.article', [
        'article' => Article::where('slug', $slug)->first(),
        'url_data' =>  $url_data
      ]);

    }

    public function getJson()
    {
      return [
        array(
          'title' => 'title',
          'url' => 'http://dka-develop.ru'
        ),
        array(
          'title' => 'youtube',
          'url' => 'http://youtube'
        )
      ];
    }
    public function chartData()
    {
      return [
        'labels' => ['март','фпрель','май','июнь'],
        'datasets' => array([
          'label' => 'Продажи',
          'backgroundColor' => '#F26202',
          'data' => [15000,5000,10000,30000],
        ])
      ];
    }
}
