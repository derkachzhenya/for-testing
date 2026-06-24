<?php
use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('guests can view published articles', function () {
    $article = Article::factory()->create([
        'title' => 'Laravel Testing Basics',
        'slug' => 'laravel-testing-basics',
        'is_published' => true,
    ]);

    $response = $this->get(route('articles.show', [
        'article' => $article->slug,
    ]));

    $response->assertOk();
    $response->assertSee($article->title);
});

test('guests cannot view draft articles', function () {
    $article = Article::factory()->create([
        'slug' => 'draft-article',
        'is_published' => false,
    ]);

    $response = $this->get(route('articles.show', [
        'article' => $article->slug,
    ]));

    $response->assertNotFound();
});