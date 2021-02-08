<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Squad
 *
 * @property int $id
 * @property int|null $division_id
 * @property string $name
 * @property int $amount
 * @property string $steam_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Division|null $division
 * @method static Builder|Squad newModelQuery()
 * @method static Builder|Squad newQuery()
 * @method static Builder|Squad query()
 * @method static Builder|Squad whereAmount($value)
 * @method static Builder|Squad whereCreatedAt($value)
 * @method static Builder|Squad whereDivisionId($value)
 * @method static Builder|Squad whereId($value)
 * @method static Builder|Squad whereName($value)
 * @method static Builder|Squad whereSteamId($value)
 * @method static Builder|Squad whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Squad extends Model
{
    use HasFactory;

    protected $fillable = [
        'division_id',
        'name',
        'amount',
        'steam_id',
    ];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }
}
