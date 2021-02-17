<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Battle
 *
 * @property int $id
 * @property int|null $map_id
 * @property string $name
 * @property int $mode
 * @property Carbon $meeting_at
 * @property Carbon $match_at
 * @property int $max_people
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Map|null $map
 * @method static Builder|Battle newModelQuery()
 * @method static Builder|Battle newQuery()
 * @method static Builder|Battle query()
 * @method static Builder|Battle whereCreatedAt($value)
 * @method static Builder|Battle whereId($value)
 * @method static Builder|Battle whereMapId($value)
 * @method static Builder|Battle whereMatchAt($value)
 * @method static Builder|Battle whereMaxPeople($value)
 * @method static Builder|Battle whereMeetingAt($value)
 * @method static Builder|Battle whereMode($value)
 * @method static Builder|Battle whereName($value)
 * @method static Builder|Battle whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Battle extends Model
{
    use HasFactory;

    protected $fillable = [
        'map_id',
        'name',
        'mode',
        'meeting_at',
        'match_at',
        'max_people',
    ];

    protected $casts = [
        'max_people' => 'integer',
        'mode'       => 'integer',
        'map_id'     => 'integer',
        'meeting_at' => 'datetime',
        'match_at'   => 'datetime',
    ];

    public function map(): BelongsTo
    {
        return $this->belongsTo(Map::class);
    }

    public function forces(): HasMany
    {
        return $this->hasMany(Force::class);
    }
}
