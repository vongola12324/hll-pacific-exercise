<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Force
 *
 * @property int $id
 * @property int|null $battle_id
 * @property string $name
 * @property int $max_people
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Battle|null $battle
 * @property-read Collection|Division[] $divisions
 * @property-read int|null $divisions_count
 * @method static Builder|Force newModelQuery()
 * @method static Builder|Force newQuery()
 * @method static Builder|Force query()
 * @method static Builder|Force whereBattleId($value)
 * @method static Builder|Force whereCreatedAt($value)
 * @method static Builder|Force whereId($value)
 * @method static Builder|Force whereMaxPeople($value)
 * @method static Builder|Force whereName($value)
 * @method static Builder|Force whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Force extends Model
{
    use HasFactory;

    protected $fillable = [
        'battle_id',
        'name',
        'max_people',
    ];

    protected $casts = [
        'battle_id'  => 'integer',
        'max_people' => 'integer',
    ];

    public function battle(): BelongsTo
    {
        return $this->belongsTo(Battle::class);
    }

    public function divisions(): HasMany
    {
        return $this->hasMany(Division::class);
    }
}
