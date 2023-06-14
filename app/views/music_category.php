<?php include('header.php') ?>

<div class="container is-fullhd my-1 px-2">
    <nav class="breadcrumb has-arrow-separator" aria-label="breadcrumbs">
        <ul>
            <li><a href="/">Home</a></li>
            <li class="is-active"><a class="has-text-white" href="#" aria-current="page"><?php echo $category['music_category_name'] ?></a></li>
        </ul>
    </nav>
</div>

<section class="hero is-black">
    <div class="hero-body container is-fullhd px-2">
        <h1 class="title"><?php echo "{$category['music_category_name']} Music" ?></h1>
        <div class="subtitle"><?php echo "Download latest free mp3 music from {$category['music_category_name']} in HD quality." ?></div>
    </div>
</section>


<main class="container is-fullhd my-3 px-2">
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
</main>


<?php include('footer.php') ?>