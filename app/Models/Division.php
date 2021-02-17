<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Division
 *
 * @property int $id
 * @property int|null $force_id
 * @property string $name
 * @property int $limit_squad
 * @property int $limit_squad_player
 * @property int $limit_total_player
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Force|null $force
 * @property-read Collection|Squad[] $squads
 * @property-read int|null $squads_count
 * @method static Builder|Division newModelQuery()
 * @method static Builder|Division newQuery()
 * @method static Builder|Division query()
 * @method static Builder|Division whereCreatedAt($value)
 * @method static Builder|Division whereForceId($value)
 * @method static Builder|Division whereId($value)
 * @method static Builder|Division whereLimit($value)
 * @method static Builder|Division whereName($value)
 * @method static Builder|Division whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Division extends Model
{
    use HasFactory;

    protected $fillable = [
        'force_id',
        'name',
        'limit_squad',
        'limit_squad_player',
        'limit_total_player',
    ];

    public function force()
    {
        return $this->belongsTo(Force::class);
    }

    public function squads()
    {
        return $this->hasMany(Squad::class);
    }
}
