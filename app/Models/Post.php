<?php

namespace App\Models;

use App\Models\Scopes\AncientScope;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory, SoftDeletes, Prunable;

    public function prunable()
    {
        return static::where('created_at', '<=', now()->subMonths());
    }

    protected $fillable = [
        'title',
        'body',
        'is_published',
    ];


    #[Scope]
    protected function published(Builder $query): void
    {
        $query->where('is_published', true);
    }

    #[Scope]
    protected function unpublished(Builder $query): void
    {
        $query->where('is_published', 0);
    }

    #[Scope]
    protected function publishedStatus(Builder $query, bool $status): void
    {
        $query->where('is_published', $status);
    }

    protected static function booted(): void
    {
        static::addGlobalScope(new AncientScope);

        static::created(function (Post $post) {
            Log::info('Created post' . $post->title);
        });
    }
}
