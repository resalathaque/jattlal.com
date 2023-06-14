<?php

class MusicController {

    public static function index() {
        $objects = db::query('SELECT music_categories.*, music_albums.*
        FROM music_albums
        LEFT JOIN music_categories ON music_categories.music_category_id = music_albums.music_category_id
        -- ORDER BY music_album_id DESC
        LIMIT 15')->fetchAll();

        return view::make('home', [
            'title' =>  "JattLal.com | Download Free Fresh Music",
            'objects' => $objects
        ]);
    }

    public static function byCategory($slug) {
        $stmt = db::prepare('SELECT * FROM music_categories WHERE music_category_slug = ? LIMIT 1');
        $stmt->execute([$slug]);
        $category = $stmt->fetch();
        if (!$category) return app::abort(404);

        $objects = db::query("SELECT music_categories.*, music_albums.*
        FROM music_albums
        LEFT JOIN music_categories ON music_categories.music_category_id = music_albums.music_category_id
        WHERE music_albums.music_category_id = {$category['music_category_id']}
        -- ORDER BY music_album_id DESC
        LIMIT 15")->fetchAll();

        return view::make('music_category', [
            'title' =>  "Download {$category['music_category_name']} mp3 music | JattLal.com",
            'category' => $category,
            'objects' => $objects
        ]);
    }

    public static function albumDetail($category, $album) {
        $stmt = db::prepare('SELECT music_categories.*, music_albums.*
        FROM music_albums
        LEFT JOIN music_categories ON music_categories.music_category_id = music_albums.music_category_id
        WHERE music_categories.music_category_slug = ? AND music_albums.music_album_slug = ?
        LIMIT 1');

        $stmt->execute([$category, $album]);
        $object = $stmt->fetch();

        if (!$object) return App::abort(404);

        $tracks = db::query("SELECT music_tracks.*,
        (SELECT GROUP_CONCAT(music_artists.music_artist_name SEPARATOR '|')
            FROM music_track_artists
            LEFT JOIN music_artists ON music_artists.music_artist_id = music_track_artists.music_artist_id
            WHERE music_track_artists.music_track_id = music_tracks.music_track_id) AS artists
        FROM music_tracks
        WHERE music_tracks.music_album_id = {$object['music_album_id']}")->fetchAll();

        // get only all artists
        $artists = db::query("SELECT music_artists.*
        FROM music_artists
        LEFT JOIN music_track_artists ON music_artists.music_artist_id = music_track_artists.music_track_id
        LEFT JOIN music_tracks ON music_tracks.music_track_id = music_track_artists.music_track_id
        WHERE music_tracks.music_album_id = {$object['music_album_id']}
        GROUP BY music_artists.music_artist_id")->fetchAll();

        
        $description = "Download mp3 songs from {$object['music_category_name']} music {$object['music_album_name']}. ";
        foreach($tracks as $track) { $description .= "Download {$track['music_track_name']} mp3, "; }
        $description = trim($description, ', ');

        return view::make('music_album_detail', [
            'title' => "{$object['music_album_name']} | {$object['music_category_name']} | JattLal.com",
            'description' => $description,
            'object' => $object,
            'tracks' => $tracks,
            'artists' => $artists,
        ]);
    }
}

?>