<?php
include 'Model.php';

class Home extends Model
{
    private $photos;

    public function __construct()
    {
        $_db = new Model();
        $this->photos = $_db->getTable('photo');
        $this->photos = json_decode(json_encode($this->photos), true);
    }

    public function urlPhoto($id_photo)
    {
        foreach ($this->photos as $photo) {
            if ($photo['id_photo'] == $id_photo) {
                $filePhoto = $photo['file_name'] . '.' . $photo['file_extension'];
                $urlPhoto = "../PhotoChaos/img/photos/" . $filePhoto;
                return $urlPhoto;
            }
        }
    }
    public function showPhotos()
    {
        $urlsPhotos = array();
        foreach ($this->photos as $photo) {
            $filePhoto = $photo['file_name'] . '.' . $photo['file_extension'];
            $urlPhoto = "../PhotoChaos/img/photos/" . $filePhoto;
            $urlsPhotos[] = $urlPhoto;
        }

        return $urlsPhotos;
    }
}
