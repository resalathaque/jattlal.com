<?php include('header.php') ?>

<main class="container is-fullhd my-3 px-2">

    <section id="bollywood">
        <div class="box has-background-danger py-2">
            <div class="is-size-6 has-text-white">
                <span >Bollywood Music</span>
                <a href="/bollywood" title="Browse all Bollywood music" class="is-pulled-right has-text-warning">Browse All &#8594;</a>
            </div>
        </div>

        <div class="columns is-multiline is-mobile">
            <?php foreach($objects as $object): ?>
                
                <div class="column is-one-fifth-desktop is-half-mobile is-one-third-tablet">
                    <a href="<?php echo "{$object['music_category_slug']}/{$object['music_album_slug']}" ?>" title="<?php echo $object['music_album_name'] ?>">
                        <div class="card has-background-black">
                            <div class="card-image">
                                <figure class="image is-square">
                                    <img loading="lazy" src="<?php echo "//files.jattlal.com/{$object['music_album_poster']}" ?>" alt="<?php echo $object['music_album_name'] ?>">
                                </figure>
                            </div>

                            <div class="card-content py-2">
                                <div class="content">
                                    <?php echo $object['music_album_name'] ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach ?>
        </div>
    </section>
</main>


<?php include('footer.php') ?>