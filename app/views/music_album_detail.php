<?php include('header.php') ?>

<main class="container is-fullhd my-3 px-2">

    <nav class="breadcrumb has-arrow-separator" aria-label="breadcrumbs">
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/bollywood">Bollywood Music</a></li>
            <li class="is-active"><a class="has-text-white" href="#" aria-current="page"><?php echo $object['music_album_name'] ?></a></li>
        </ul>
    </nav>

    <h1 class="title has-text-white"><?php echo "Download {$object['music_album_name']} Mp3 Music" ?></h1>

    <div class="hero">
        <div class="hero-body px-0">
            <div class="columns">
                <div class="column is-one-fifth">
                    <figure class="image is-square">
                        <img class="box p-0" loading="lazy" src="<?php echo "//files.jattlal.com/{$object['music_album_poster']}" ?>" alt="<?php echo $object['music_album_name'] ?>">
                    </figure>
                </div>

                <div class="column">
                    <table class="table has-background-dark has-text-white">
                        <tbody>
                            <tr>
                                <th class="has-text-light">Album</th>
                                <td><?php echo $object['music_album_name'] ?></td>
                            </tr>
                            <tr>
                                <th class="has-text-light">Category</th>
                                <td><a title="<?php echo "Browse all {$object['music_category_name']} music" ?>" class="has-text-danger" href="<?php echo "/{$object['music_category_slug']}" ?>"><?php echo $object['music_category_name'] ?></a></td>
                            </tr>
                            <tr>
                                <th class="has-text-light">Year</th>
                                <td><?php echo $object['music_album_year'] ?></td>
                            </tr>
                            <?php if ($artists): ?>
                            <tr>
                                <th class="has-text-light">Artists</th>
                                <td class="tags are-normal">
                                    <?php foreach($artists as $artist): ?>
                                        <span class="tag is-danger"><?php echo $artist['music_artist_name'] ?></span>
                                    <?php endforeach ?>
                                </td>
                            </tr>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php foreach($tracks as $track): ?>
        <div class="box has-background-black p-0">
            <div class="media has-background-black">
                <figure class="media-left">
                    <p class="image box is-128x128 box p-0">
                        <img loading="lazy" src="<?php echo "//files.jattlal.com/{$object['music_album_poster']}" ?>" alt="<?php echo $object['music_album_name'] ?>">
                    </p>
                </figure>
                <div class="media-content">
                    <div class="content">
                        <p class="my-2">
                            <a title="<?php echo "Download {$track['music_track_name']} Mp3" ?>" class="has-text-danger" rel="nofollow" href="<?php echo "https://files.jattlal.com/{$track['music_track_path']}" ?>"><?php echo "{$track['music_track_name']}" ?></a>

                            <?php if($track['artists']): ?>
                                <span class="has-text-light">
                                    <br><span>By - </span>
                                    <?php foreach(explode('|', $track['artists']) as $artist): ?>
                                        <span class="is-underlined mr-2"><?php echo $artist ?></span>
                                    <?php endforeach ?>
                                </span>
                            <?php endif ?>
                        </p>

                        <nav class="my-1 level is-mobile has-text-light is-italic">
                            <div class="level-left">
                                <span class="level-item">
                                    <?php echo gmdate("i:s", $track['music_track_duration']) ?> min
                                </span>
                                <span class="level-item">
                                    <?php echo bytes($track['music_track_filesize']) ?>
                                </span>
                                <span class="level-item">
                                    320 kbps
                                </span>
                            </div>
                        </nav>

                        <!-- <audio controls>
                            <source src="<?php echo "https://files.jattlal.com/{$track['music_track_path']}" ?>" type="audio/mpeg">
                        </audio> -->
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>

</main>


<?php include('footer.php') ?>