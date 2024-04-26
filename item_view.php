<?php foreach ($books as $book) : ?>
  <div class="card">
    <div class="card-photo">
      <img src="public/book_images/<?= $book['poster'] ?>" class="card-img-top">
    </div>
    <div class="card-body" data-id="<?= $book['id'] ?>">
      <h5 class="card-title"> <?= $book['title'] ?> </h5>
      <p class="card-text"> Genre : <?= $book['genre'] ?> </p>
      <p class="card-text"> Author : <?= $book['author'] ?> </p>
      <p class="card-text"> Rating : <?= $book['rating'] ?>/5 </p>
      <p class="card-text"> Category : <?= $book['category'] ?> </p>
      <p class="card-text"> Date : <?= $book['date'] ?> </p>
      <button data-id="<?= $book['id'] ?>" id="btn-add-to-bucket" class="btn btn-outline-success m-2"> Add to bucket </button>
    </div>
  </div>
<?php endforeach; ?>
</div
