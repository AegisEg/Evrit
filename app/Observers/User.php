<?php

namespace App\Observers;

use App\User as UserModel;

class User
{
    public function updating(UserModel $user)
    {
        if ($user->avatar != $user->getOriginal('avatar'))
            if (file_exists($user->getOriginal('avatar')))
                unlink($user->getOriginal('avatar'));
    }
    public function deleting(UserModel $user)
    {
        $user->comments()->delete();
        $user->hobbyRel()->sync([]);
        $user->languageRel()->sync([]);
        $user->friendUser()->sync([]);
        $user->userFriend()->sync([]);
        $user->reviewUser()->sync([]);
        $user->userReview()->sync([]);
        $user->blacklistUser()->sync([]);
        $user->messagesall()->delete();
        foreach($user->gallery()->get() as $img)
        {
            $img->comments()->delete();
            $img->user_likes()->sync([]);
            $img->delete();
        }
        foreach ($user->channels()->get() as $channel) {
            $channel->users()->sync([]);
            $channel->delete();
         }
    }
}
