<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Division
 *
 * @property int $id
 * @property int|null $force_id
 * @property string $name
 * @property int $limit_squad
 * @property int $limit_squad_player
 * @property int $limit_total_player
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Force|null $force
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Squad[] $squads
 * @property-read int|null $squads_count
 * @method static \Illuminate\Database\Eloquent\Builder|Division newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Division newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Division query()
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereForceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereUpdatedAt($value)
 * @mixin \Eloquent
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
