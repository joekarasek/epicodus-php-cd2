<?php
    class CD
    {
        private $artist;
        private $album;

        function __construct($artist, $album)
        {
            $this->artist = $artist;
            $this->album = $album;
        }

        function getArtist(){
            return $this->artist;
        }

        function setArtist($artist)
        {
            $this->artist = $artist;
        }

        function getAlbum()
        {
            return $this->album;
        }

        function setAlbum()
        {
            $this->album = $album;
        }

        function save()
        {
            array_push($_SESSION['list_of_cds'], $this);
        }

        static function getAll()
        {
            return $_SESSION['list_of_cds'];
        }


    }
 ?>
