<?php 
require_once "kelas.php";
$pp = new classes();
$gd = $pp->tampilData();
$no = 1;
?>

<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    
    <?php
    require_once "nav.php";
    ?>

  <table class="table table-bordered" id="myTable">
                <thead>
                  <tr>
                    <th scope="col">NO.</th>
                    <th scope="col">id_program</th>
                    <th scope="col">id_academic_advisor</th>
                    <th scope="col">class_name</th>
                    <th scope="col">academic_year</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($gd as $row): ?>
                  <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $row['id_program'] ?></td>
                      <td><?= $row['id_academic_advisor'] ?></td>
                      <td><?= $row['class_name'] ?></td>
                      <td><?= $row['academic_year'] ?></td>
                  </tr>
<?php endforeach; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
  </html>