// Fetch books on page loading.
$(document).ready(function () {
  fetchBooks();
});

// Load more books.
$(document).on('click', '#btn-load-more', function(e) {
  e.preventDefault();
  fetchBooks();
})

// Fetch books details.
function fetchBooks() {
  let lastId = $('.card-body:last').attr('data-id') || 0;
  $.post('/fetch-books', {'last-id': lastId}, function(data) {
    if(data == '0') {
      alert("No more books available.")
    }
    else {
      $('.books-show').append(data)
    }
  })
}

// Add to bucket list.
$(document).on('click', '#btn-add-to-bucket', function (e) {
  e.preventDefault();
  let id = $(this).attr('data-id');
  $.post('/add-to-bucket', {'id': id}, function(data) {
    alert(data)
  })
})
