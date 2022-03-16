<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    /**

     * MOBILE ATTRIBUTES

     * $this->attributes['id'] - int - contains the mobile primary key (id)
     * $this->attributes['comment'] - string - contains the review comment
     * $this->attributes['rating'] - integer - contains the number of stars(1-5)
     * $this->mobile - Mobile - contains the associated mobile
     */

    protected $fillable = ['comment', 'mobile_id','rating','comment'];

    public function getId()

    {

        return $this->attributes['id'];
    }

    public function setId($id)

    {

        $this->attributes['id'] = $id;
    }

    public function getComment()

    {

        return $this->attributes['comment'];
    }

    public function setComment($comment)

    {

        $this->attributes['comment'] = $comment;
    }
    public function getRating()

    {

        return $this->attributes['rating'];
    }

    public function setRating($rating)

    {

        $this->attributes['rating'] = $rating;
    }

    public function getMobileId()

    {

        return $this->attributes['mobile_id'];
    }

    public function setMobileId($mId)

    {

        $this->attributes['mobile_id'] = $mId;
    }

    public function mobile()
    {

        return $this->belongsTo(Mobile::class);
    }

    public function getMobile()

    {

        return $this->mobile;
    }

    public function setMobile($mobile)

    {

        $this->mobile = $mobile;
    }
}
