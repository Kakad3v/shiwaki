<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Article;
use App\Mail\PostAwaitingApproval;
use App\Tag;
use Illuminate\Support\Facades\Mail;

class ArticlesController extends Controller
{
    public function index()
    {
        if (request('tag')) {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles()->paginate(20);
        } else {
            $articles = Article::where('status', 1)->latest()->paginate(10);
        }

        return view('articles.index', [
            'articles' => $articles
        ]);
    }

    public function show(Article $article)
    {


        return view(
            'articles.show',
            [
                'article' => $article,
                'user_articles' => Article::where('user_id', $article->user_id)->latest()->get()
            ]

        );
    }

    public function create()
    {
        return view('articles.create', [

            'tags' => Tag::all()

        ]);
    }

    public function edit(Article $article)
    {
        return view('articles.edit', [

            'tags' => Tag::all(),
            'article' => $article

        ]);
    }

    public function update(Request $request, Article $article)
    {
        $this->authorize('update', $article);

        $attributes = request()->validate([
            'title' => 'required',
            'body' => 'required',
            'artcile_cover' => 'file'
        ]);

        $attributes['slug'] = Str::slug(request('title'), '-');

        if (request()->has('article_cover')) {
            $image_path = $request->file('article_cover')->store('posts/images', 'public');

            $attributes['image_path'] = $image_path;
        } else {
            $article->update($attributes);
        }


        if (request()->has('tags')) {
            $article->tags()->sync(request('tags'));
        }

        return redirect('/')
            ->with('success', 'Habari imechapishwa');
    }

    public function store(Request $request)
    {

        $this->validateArticle();

        $article = new Article(request(['title', 'body']));
        $article->image_path = $request->file('article_cover')->store('posts/images', 'public');
        $article->slug = Str::slug(request('title'), '-');
        $article->user_id = auth()->user()->id;

        $article->save();
        $article->tags()->sync(request('tags'));

        return redirect(route('articles'))
            ->with('success', 'Habari imechapishwa');
    }

    public function destroy(Article $article)
    {
        $this->authorize('update', $article);

        $article->tags()->detach();

        $article->delete();

        return redirect('/')
            ->with('success', 'Habari imefutwa');
    }

    public function validateArticle()
    {
        return request()->validate([
            'title' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id',
        ]);
    }
}
