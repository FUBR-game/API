<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Laravel\Passport\Client;
use Laravel\Passport\HasApiTokens;
use Laravel\Passport\Token;

/**
 * App\User
 *
 * @property int $id
 * @property string|null $username
 * @property string $google_token
 * @property string|null $last_online
 * @property int $game_currency
 * @property int $premium_currency
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereDeletedAt($value)
 * @method static Builder|User whereGameCurrency($value)
 * @method static Builder|User whereGoogleToken($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereLastOnline($value)
 * @method static Builder|User wherePremiumCurrency($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @method static Builder|User whereUsername($value)
 * @mixin Eloquent
 * @property-read Collection|OauthAccessToken[] $accessTokens
 * @property-read int|null $access_tokens_count
 * @property-read Collection|Client[] $clients
 * @property-read int|null $clients_count
 * @property-read Collection|Token[] $tokens
 * @property-read int|null $tokens_count
 * @property-read int|null $friends_count
 * @property-read Collection|User[] $friends
 * @property-read int|null $friends_with_count
 * @property-read Collection|Game[] $game_results
 * @property-read int|null $game_results_count
 * @property-read Collection|Game[] $games_played
 * @property-read int|null $games_played_count
 * @property string $email
 * @method static Builder|User whereEmail($value)
 * @property-read string $gravatar
 */
class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token', 'google_token',
    ];

    protected $appends = [
        "gravatar_icon",
    ];


    /**
     * Find the user instance for the given username.
     *
     * @param string $username
     * @return User
     */
    public function findForPassport($username): User
    {
        return self::where('google_token', $username)->first();
    }

    /**
     * Validate the password of the user for the Passport password grant.
     *
     * @param string $password
     * @return bool
     */
    public function validateForPassportPasswordGrant($password): bool
    {
        return true;
    }

    public function accessTokens(): HasMany
    {
        return $this->hasMany(OauthAccessToken::class);
    }

    public function friends(): BelongsToMany
    {
        return $this->belongsToMany(__CLASS__, 'friends')->withPivot('user_id', 'friend_id');
    }

    public function games_played(): BelongsToMany
    {
        return $this->belongsToMany(Game::class, 'games_played');
    }

    public function game_results(): BelongsToMany
    {
        return $this->belongsToMany(Game::class, 'game_results')
            ->using(GameResult::class)
            ->withPivot(['rank', 'kills', 'has_died', 'dbno', 'damage_dealt', 'damage_taken', 'health_regained', 'mana_spend']);
    }

    /**
     * @return string
     */
    public function getGravatarIconAttribute(): string
    {
        return "https://www.gravatar.com/avatar/" . md5($this->attributes["email"]) . "?s=50";
    }
}
