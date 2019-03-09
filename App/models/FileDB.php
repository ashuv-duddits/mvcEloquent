<?php
namespace App\models;

class FileDB extends \Illuminate\Database\Eloquent\Model
{
    public $table = 'files';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'message', 'url'];
    public $timestamps = false;

    /**
     * @param int $id
     * @return null|File
     */
    public function getModelById(int $id)
    {
        $fileData = $this
            ->where('id', $id)
            ->first();
        if ($fileData == null) {
            return null;
        } else {
            return new File($fileData->toArray());
        }
    }

    /**
     * @param File $file
     */
    public function updateFile(File $file)
    {
        $url = $file->getUrl();
        $id = $file->getId();
        $file = $this->find($id);
        $file->url = $url;
        $file->save();
    }

    public function getModels()
    {
        $filesData = $this->all();
        if (!$filesData) {
            return null;
        }
        $files = [];
        foreach ($filesData->toArray() as $fileData) {
            $files[] = new File($fileData);
        }
        return $files;
    }
}