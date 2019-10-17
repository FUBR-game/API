<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\GameResult
 *
 * @mixin Eloquent
 * @property int $user_id
 * @property string $game_id
 * @property int $rank
 * @property int $kills
 * @property int $has_died
 * @property int $dbno
 * @property int $damage_dealt
 * @property int $damage_taken
 * @property int $health_regained
 * fatal: The current branch master has no upstream branch.
 * To push the current branch and set the remote as upstream, use
 *
 * git push --set-upstream origin master
 *
 *
 * D:\Development\lumen>git push --set-upstream origin master
 * Fatal: HttpRequestException encountered.
 * @property int $mana_spend
 * @method static Builder|GameResult whereDamageDealt($value)
 * @method static Builder|GameResult whereDamageTaken($value)
 * @method static Builder|GameResult whereDbno($value)
 * @method static Builder|GameResult whereGameId($value)
 * @method static Builder|GameResult whereHasDied($value)
 * @method static Builder|GameResult whereHealthRegained($value)
 * @method static Builder|GameResult whereKills($value)
 * @method static Builder|GameResult whereManaSpend($value)
 * @method static Builder|GameResult whereRank($value)
 * @method static Builder|GameResult whereUserId($value)
 * @method static Builder|GameResult newModelQuery()
 * @method static Builder|GameResult newQuery()
 * @method static Builder|GameResult query()
 */
class GameResult extends Pivot
{
    protected $table = 'game_results';
}
