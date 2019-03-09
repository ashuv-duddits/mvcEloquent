<?php
namespace App\models;

class PostDB extends \Illuminate\Database\Eloquent\Model
{
    public $table = 'files';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'message', 'url'];
    public $timestamps = false;
    /**
     * @param post $post
     * @return int $postId
     */
    public function savePost(post $post)
    {
        $data = [
            'message' => $post->getMessage(),
            'user_id' => $post->getUserId()
        ];
        $post = $this->create($data);
        $postId = $post->id;
        return $postId;
    }
}
