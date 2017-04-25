<?php

namespace OceanProject\Models;

use Illuminate\Database\Eloquent\Model;

class Bot extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['bot_status_id', 'creator_user_id', 'server_id', 'premium', 'chatid', 'chatname', 'chatpw', 'nickname', 'avatar', 'homepage', 'status', 'pcback', 'autowelcome', 'ticklemessage', 'maxkick', 'maxkickban', 'maxflood', 'maxchar', 'maxsmilies', 'automessage', 'automessagetime', 'autorestart'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creatorUser()
    {
        return $this->belongsTo('OceanProject\Models\User', 'creator_user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('OceanProject\Models\User')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function commands()
    {
        return $this->belongsToMany('OceanProject\Models\Command', 'bot_command_minrank', 'bot_id', 'command_id')->withPivot('minrank_id')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function minranks()
    {
        return $this->belongsToMany('OceanProject\Models\Minrank', 'bot_command_minrank', 'bot_id', 'minrank_id')->withPivot('command_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function bot_status()
    {
        return $this->hasOne('OceanProject\Models\BotStatus', 'id', 'bot_status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function server()
    {
        return $this->hasOne('OceanProject\Models\Server', 'id', 'server_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function staffs()
    {
        return $this->hasMany('OceanProject\Models\Staff');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function autotemps()
    {
        return $this->hasMany('OceanProject\Models\AutoTemp');
    }
}
