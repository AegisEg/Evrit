<?php

namespace App\Observers;

use App\Model\UserImage;

class ImageUser
{
    public function deleted(UserImage $image)
    {
        if (file_exists($image->src))
            unlink($image->src);
    }
}
