<!-- Bootstrap navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/home"> HOME </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"> </span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active m-2" aria-current="page"> <?= $this->userData['full_name'] ?> </a>
        </li>
        <li class="nav-item">
        </li>
      </ul>
      <a href="/login" type="button" class="btn btn-outline-danger m-2"> Log Out</a>
    </div>
  </div>
</nav>
