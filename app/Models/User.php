<?php namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'bio', 'image', 'email', 'password','user_type',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    
    public function followings()
    {
        return $this->belongsToMany(User::class, 'follower_user', 'follower_id', 'user_id');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follower_user', 'user_id', 'follower_id');
    }

    public function isFollowing($userId): bool
{
    return $this->followings()->where('user_id', $userId)->exists();
}
public function getImageUrl()
{
    if ($this->image) {
        return url('storage/' .$this->image );   }
    return "https://api.dicebear.com/6.x/fun-emoji/svg?seed=($this->name)";
}
public function getFollowersCountAttribute()
{
    return $this->followers()->count();
}

   
}
