<div class="container">
    <div class="row row-cols-1 row-cols-md-2 g-4">

        <!-- Boucle qui parcourt chaque chaque élément du tableau $genres -->
        <?php foreach ($genres as $genre) : ?>
            <div class="col">
                <div class="card h-100">
                    <div class="card-header bg-black text-white">
                        <h2 class="card-title"><?= $genre['name']; ?></h2>
                    </div>
                    <div class="card-body">


                        <!-- Récupère tous les films de ce genre -->
                        <?php $movies = findAllMoviesByGenre($db, $genre['name']); ?>
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
        <?php endforeach; ?>
    </div>
</div>