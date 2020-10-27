<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Posts
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $descr
 * @property string $img
 * @property int $rating
 * @property string|null $tags
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Posts newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Posts newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Posts query()
 * @method static \Illuminate\Database\Eloquent\Builder|Posts whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Posts whereDescr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Posts whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Posts whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Posts whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Posts whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Posts whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Posts whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Posts whereUserId($value)
 * @mixin \Eloquent
 */
class Posts extends Model
{
    use HasFactory;
}
