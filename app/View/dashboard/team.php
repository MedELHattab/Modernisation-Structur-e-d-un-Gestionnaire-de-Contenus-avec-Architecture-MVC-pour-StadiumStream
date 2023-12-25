<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="../../.././public/assets/css/dashboard.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <div class="wrapper">
    <aside id="sidebar" class="side">
      <div class="h-100">
        <div class="sidebar_logo d-flex align-items-end">
          <img src="../../.././public/assets/images/PeoplePerTask.png" alt="logo" style="width: 75%;">
          <!-- <a href="#" class="nav-link text-white-50">Dashboard</a> -->
          <img class="close align-self-start" src="../../.././public/assets/images/close.svg" alt="">
        </div>

        <ul class="sidebar_nav" style="max-height: 80vh; overflow-y: auto;">
          
            <li class="sidebar_item active" style="width: 100%;">
              <a href="dashboard.php" class="sidebar_link"> <img src="../../.././public/assets/images/1. overview.svg" alt="">Overview</a>
            </li>

            <li class="sidebar_item">
              <a href="team.php" class="sidebar_link"> <img src="../../.././public/assets/images/agents.svg" alt="">teams</a>
            </li>
           
           
          <li class="sidebar_item">
            <span><a href="logout.php" class="sidebar_link text-danger"><img src="../../.././public/assets/images/articles.svg" alt="">LOG
                OUT</a></span>
          </li>


        </ul>
        <div class="line"></div>
        <a href="#" class="sidebar_link"><img src="../../.././public/assets/images/settings.svg" alt="">Settings</a>


      </div>
    </aside>
    <div class="main">
      <nav class="navbar justify-content-space-between pe-4 ps-2">
        <button class="btn open">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar gap-4">
          <div class="">
            <input type="search" class="search" placeholder="Search" />
            <img class="search_icon" src="../../.././public/assets/images/search.svg" alt="iconicon" />
          </div>
          <!-- <img src="img/search.svg" alt="icon"> -->
          <img class="notification" src="../../.././public/assets/images/new.svg" alt="icon" />
          <div class="card new w-auto">
            <div class="list-group list-group-light">
              <div class="list-group-item px-3 d-flex justify-content-between align-items-center">
                <p class="mt-auto">Notification</p>
                <a href="#"><img src="../../.././public/assets/images/settingsno.svg" alt="icon" /></a>
              </div>
              <div class="list-group-item px-3 d-flex">
                <img src="../../.././public/assets/images/notif.svg" alt="iconimage" />
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text mb-3">
                    Some quick example text to build on the card title and
                    make up the bulk of the card's content.
                  </p>
                  <small class="card-text">1 day ago</small>
                </div>
              </div>
              <div class="list-group-item px-3 d-flex">
                <img src="../../.././public/assets/images/notif.svg" alt="iconimage" />
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text mb-3">
                    Some quick example text to build on the card title and
                    make up the bulk of the card's content.
                  </p>
                  <small class="card-text">1 day ago</small>
                </div>
              </div>
              <div class="list-group-item px-3 text-center">
                <a href="#">View all notifications</a>
              </div>
            </div>
          </div>
          <div class="inline"></div>
          <div class="name">
            bhhh
          </div>
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a href="#" class="nav-icon pe-md-0 position-relative" data-bs-toggle="dropdown">
                <img src="../../.././public/assets/images/photo_admin.svg" alt="icon" />
              </a>
              <div class="dropdown-menu dropdown-menu-end position-absolute">
                <a class="dropdown-item" href="#">Profile</a>
                <a class="dropdown-item" href="#">Account Setting</a>
                <a class="dropdown-item" href="#">Log out</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>



      <section class="Agents px-4">
        <a href="team/addteam" type="button" class="btn btn-primary my-2" data-bs-toggle="modal"
          data-bs-target="#exampleModalCenter1">Add user</button>

        <!-- Add Update User Modal -->
        <div class="modal fade" id="updateUserModal" tabindex="-1" aria-labelledby="updateUserModalLabel"
          aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Modal content goes here -->
            </div>
          </div>
        </div>
        <div>
          <form class="my-3" action="upload.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
          </form>
        </div>

        <table id="yourTableID" class="agent table align-middle bg-white">
          <thead class="bg-light">
            <tr>
              <th>Team ID</th>
              <th>Team Name</th>
              <th>Number</th>
              <th>Coach</th>
              <th>Update</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
    <?php foreach ($result as $res): ?>
        <tr>
            <td><?= $res->getName() ?></td>
            <td><?= $res->getCoach() ?></td>
            <td><?= $res->getNumber() ?></td>
            <td>
                <a href="team/edit/<?=$res->getId()?>" class="edit" title="Edit" data-toggle="tooltip">
                    <i class="material-icons">&#xE254;</i>edit
                </a>
                <a href="team/destroy/<?= $res->getId() ?>" class="delete" title="Delete" data-toggle="tooltip"
                    onclick="return confirm('Do you really want to Delete ?');">
                    <i class="material-icons">&#xE872;</i>delete
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>
        </table>
      </section>
      <script src="../../.././public/assets/js/dashboard.js"></script>
  <script src="../../.././public/assets/js/script.js"></script>
</body>

</html>