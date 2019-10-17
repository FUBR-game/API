<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\GameLog
 *
 * @method static Builder|GameLog newModelQuery()
 * @method static Builder|GameLog newQuery()
 * @method static Builder|GameLog query()
 * @mixin Eloquent
 * @property int $id
 * @property string $game_id
 * @property int $event_type
 * @property string $event_data
 * @property string $event_triggered
 * @method static Builder|GameLog whereEventData($value)
 * @method static Builder|GameLog whereGameId($value)
 * @method static Builder|GameLog whereEventTriggered($value)
 * @method static Builder|GameLog whereEventType($value)
 * @method static Builder|GameLog whereId($value)
 */
class GameLog extends Model
{
    protected $casts = ['event_data' => 'object'];
}
