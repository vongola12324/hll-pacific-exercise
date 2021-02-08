<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Map
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Battle[] $battles
 * @property-read int|null $battles_count
 * @method static Builder|Map newModelQuery()
 * @method static Builder|Map newQuery()
 * @method static Builder|Map query()
 * @method static Builder|Map whereCreatedAt($value)
 * @method static Builder|Map whereId($value)
 * @method static Builder|Map whereName($value)
 * @method static Builder|Map whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Map extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function battles()
    {
        return $this->hasMany(Battle::class);
    }
}
