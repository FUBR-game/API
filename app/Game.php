<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Game
 *
 * @property int $id
 * @property string $started_at
 * @property string|null $finished_at
 * @method static Builder|Game newModelQuery()
 * @method static Builder|Game newQuery()
 * @method static Builder|Game query()
 * @method static Builder|Game whereFinishedAt($value)
 * @method static Builder|Game whereId($value)
 * @method static Builder|Game whereStartedAt($value)
 * @mixin Eloquent
 * @property-read Collection|User[] $players
 * @property-read int|null $players_count
 * @property-read Collection|GameLog[] $game_logs
 * @property-read int|null $game_logs_count
 */
class Game extends Model
{
    protected $casts = ['id' => 'string'];

    protected $table = 'games';

    public function players(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'game_results')
            ->using(GameResult::class)
            ->withPivot(['rank', 'kills', 'has_died', 'dbno', 'damage_dealt', 'damage_taken', 'health_regained', 'mana_spend']);
    }

    public function game_logs(): HasMany
    {
        return $this->hasMany(GameLog::class);
    }
}
