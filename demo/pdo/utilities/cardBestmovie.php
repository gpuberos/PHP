<?php $movies = findBestMovies($db); ?>

<div class="container">
    <div class="col">
        <div class="card h-100">
            <div class="card-header bg-black text-white">
                <h2 class="card-title">Nos 3 meilleurs films</h2>
            </div>
            <div class="card-body">
                <!-- Boucle qui parcourt chaque élément du tableau $movies et affiche un lien vers la page de détails pour chaque film. -->
                <ul class="list-group list-group-flush">
                    <?php foreach ($movies as $movie) : ?>
                        <li class="list-group-item">
                            <a href="<?= $movie_page; ?>?id=<?= $movie['id']; ?>"><?= $movie['title']; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>