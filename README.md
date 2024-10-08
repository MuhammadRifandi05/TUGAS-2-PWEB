# Tugas 2 PWEB2



## Struktur proyek

- koneksi.php
- kelas.php
- dosen.php
- nav.php
- lecturers1.php
- classes1.php
- classes.php


## Koneksi database
Kelas PHP ini menyediakan koneksi ke database MySQL dan metode untuk membaca data dari database. Kelas ini memudahkan untuk menghubungkan aplikasi PHP ke database dan menjalankan query.
### penjelasan 

- **Kelas database:** Kelas ini digunakan untuk mengelola koneksi ke database dan menjalankan query.

- **Properti:** Properti host, user, password, dan database menyimpan informasi yang diperlukan untuk membuat koneksi ke database.

- **Konstruktor (__construct):** Ketika sebuah objek dari kelas ini dibuat, koneksi ke database akan otomatis dilakukan. Jika koneksi gagal, skrip akan dihentikan dan pesan error ditampilkan.

- **Method readdata:** Method ini menerima sebuah query SQL dalam bentuk string, mengirimkannya ke database, dan mengembalikan hasilnya.
## **Hasil Kodingan**

```php
<?php
  // Deklarasi kelas database
  class database {
    // Deklarasi properti untuk menyimpan informasi koneksi database
    private $host = "localhost"; // Host database, umumnya "localhost"
    private $user = "root"; // Username untuk mengakses database, biasanya "root" pada server lokal
    private $password = ""; // Password untuk mengakses database, kosong jika tidak ada password
    private $database = "db_siwali"; // Nama database yang akan digunakan
    protected $conn; // Properti untuk menyimpan objek koneksi

    // Konstruktor kelas yang dijalankan saat objek dibuat
    public function __construct() {
      // Membuat koneksi ke database menggunakan mysqli
      $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database);

      // Mengecek apakah koneksi berhasil atau gagal
      if ($this->conn->connect_error) {
        // Jika koneksi gagal, tampilkan pesan error dan hentikan skrip
        die("Connection failed: " . $this->conn->connect_error);
      }
    }

    // Method untuk membaca data dari database berdasarkan query SQL yang diberikan
    public function readdata($sql) {
      // Mengirimkan query ke database dan mengembalikan hasilnya
      return $this->conn->query($sql);
    }
  }
?>
```

## Penjelasan kelas.php
- **Kelas database:** Kelas ini dirancang untuk mengelola koneksi database dan menjalankan query.
- **Properti Privat:**

- $host: Alamat host database. Biasanya "localhost" jika database ada di server yang sama dengan skrip PHP.

- $user: Nama pengguna untuk mengakses database.

- $password: Password untuk nama pengguna tersebut.

- $database: Nama database yang ingin diakses.
- **Properti Protected:**
$conn: Objek koneksi database yang dibuat dengan mysqli.
- **Konstruktor (__construct):**
Membuat koneksi ke database saat objek dibuat. Jika koneksi gagal, pesan kesalahan ditampilkan dan skrip dihentikan.
- **Method readdata($sql):**
Mengambil parameter berupa query SQL, mengeksekusinya menggunakan koneksi yang ada, dan mengembalikan hasil query tersebut.

Komentar ini menjelaskan bagian-bagian penting dari kode dan memberikan konteks tentang fungsionalitas masing-masing elemen dalam kelas database.
## **Hasil Kodingan**

```php
<?php 
// Mengimpor file "koneksi.php" yang berisi definisi kelas database untuk koneksi ke database
require_once "koneksi.php";

// Kelas lecturers mewarisi kelas database
class lecturers extends database {
  // Konstruktor kelas lecturers
  public function __construct() {
    // Memanggil konstruktor dari kelas parent (database) untuk inisialisasi koneksi
    parent::__construct();
  }

  // Method untuk mengambil data dari tabel lecturers
  public function tampilData() {
    // Query SQL untuk memilih semua data dari tabel lecturers
    $sql = "SELECT * FROM lecturers"; 
    // Menjalankan query dan menyimpan hasilnya dalam variabel $sqil
    $sqil = $this->conn->query($sql);
    // Mengembalikan hasil query
    return $sqil;
  }
}

// Kelas classes mewarisi kelas database
class classes extends database {
  // Konstruktor kelas classes
  public function __construct(){
    // Memanggil konstruktor dari kelas parent (database) untuk inisialisasi koneksi
    parent::__construct();
  }

  // Method untuk mengambil data dari tabel classes
  public function tampilData(){
    // Query SQL untuk memilih semua data dari tabel classes
    $sql = "SELECT * FROM classes";
    // Menjalankan query dan menyimpan hasilnya dalam variabel $sqil
    $sqil = $this->conn->query($sql);
    // Mengembalikan hasil query
    return $sqil;
  }
}

// Kelas lecturers_1 mewarisi kelas lecturers
class lecturers_1 extends lecturers {
  // Konstruktor kelas lecturers_1
  public function __construct(){
    // Memanggil konstruktor dari kelas parent (lecturers) untuk inisialisasi koneksi
    parent::__construct();
  }

  // Method untuk mengambil data dari tabel lecturers dengan filter khusus
  public function tampilData(){
    // Query SQL untuk memilih data dari tabel lecturers dengan address = 'Cilacap'
    $sql = "SELECT * FROM lecturers WHERE address = 'Cilacap' ";
    // Menjalankan query dan menyimpan hasilnya dalam variabel $sqil
    $sqil = $this->conn->query($sql);
    // Mengembalikan hasil query
    return $sqil;
  }
}

// Kelas classes_1 mewarisi kelas classes
class classes_1 extends classes {
  // Konstruktor kelas classes_1
  public function __construct(){
    // Memanggil konstruktor dari kelas parent (classes) untuk inisialisasi koneksi
    parent::__construct();
  }

  // Method untuk mengambil data dari tabel classes dengan filter khusus
  public function tampilData(){
    // Query SQL untuk memilih data dari tabel classes dengan academic_year = 2024
    $sql = "SELECT * FROM classes WHERE academic_year = 2024";
    // Menjalankan query dan menyimpan hasilnya dalam variabel $sqil
    $sqil = $this->conn->query($sql);
    // Mengembalikan hasil query
    return $sqil;
  }
} 
?>

```
## **penjelasan dosen.php**
- **Pengimporan Kelas:**

1. **require_once "kelas.php";:** Mengimpor file kelas.php yang berisi definisi kelas, kemungkinan besar kelas lecturers yang digunakan untuk mengambil data dosen.

2. **Inisialisasi Objek:**

- $pp = new lecturers();: Membuat objek baru dari kelas lecturers.
3. **Pengambilan Data:**

- $gd = $pp->tampilData();: Memanggil method tampilData() dari objek $pp untuk mendapatkan data dosen. Hasilnya disimpan dalam variabel $gd.
4. **HTML dan Bootstrap:**

- Kode HTML berikutnya mengatur struktur halaman web, termasuk memuat stylesheet Bootstrap dan DataTables untuk styling tabel.
- require_once "nav.php";: Memuat file navigasi untuk halaman ini.
5. **Pembuatan Tabel:**

- Tabel HTML digunakan untuk menampilkan data dosen. Kolom-kolom tabel sesuai dengan atribut dosen seperti nidn, nip, name, phone_number, address, dan signature.

6. **Iterasi Data:**

- foreach($gd as $row):: Mengiterasi setiap baris data dosen dan menampilkannya di dalam baris tabel HTML. Variabel $no digunakan untuk memberikan nomor urut pada setiap baris.

7. **JavaScript:**

- script yang memuat JavaScript Bootstrap untuk menambah fungsionalitas pada elemen-elemen yang menggunakan Bootstrap.
## **Hasil Kodingan**

```php
<?php 
// Mengimpor file "kelas.php" yang berisi definisi kelas yang diperlukan
require_once "kelas.php";

// Membuat objek dari kelas lecturers
$pp = new lecturers();

// Memanggil method tampilData() dari objek $pp untuk mendapatkan data dosen
$gd = $pp->tampilData();

// Inisialisasi variabel $no untuk nomor urut
$no = 1;
?>
```
```html
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Memuat stylesheet Bootstrap versi 4.4.1 -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <!-- Memuat stylesheet DataTables versi 1.10.20 -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <title>Document</title>
  <!-- Memuat stylesheet Bootstrap versi 5.3.3 dengan integritas dan cross-origin -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<!-- Memuat file navigasi "nav.php" -->
<?php require_once "nav.php"; ?>

<!-- Membuat tabel untuk menampilkan data dosen -->
<table class="table table-bordered" id="myTable">
  <thead>
    <tr>
      <th scope="col">NO.</th>
      <th scope="col">nidn</th>
      <th scope="col">nip</th>
      <th scope="col">name</th>
      <th scope="col">phone_number</th>
      <th scope="col">address</th>
      <th scope="col">signature</th>
    </tr>
  </thead>
  <tbody>
    <!-- Mengiterasi data dosen dan menampilkan setiap baris dalam tabel -->
    <?php foreach($gd as $row): ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $row['nidn'] ?></td>
      <td><?= $row['nip'] ?></td>
      <td><?= $row['name'] ?></td>
      <td><?= $row['phone_number'] ?></td>
      <td><?= $row['address'] ?></td>
      <td><?= $row['signature'] ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<!-- Memuat JavaScript Bootstrap versi 5.3.3 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
```
## **penjelasan navbar.php**
1. **Tag <nav>:**

- Elemen HTML <nav> digunakan untuk mendefinisikan navigasi pada halaman web. Di sini, digunakan untuk membuat navbar (bar navigasi) menggunakan kelas Bootstrap.

2. **Kontainer Fluid:**

- <div class="container-fluid">: Menggunakan kelas Bootstrap container-fluid untuk membuat kontainer yang mengambil lebar penuh dari viewport.

3. **Brand Navbar:**

- <a class="navbar-brand" href="#">Tabel Data</a>: Menampilkan nama atau logo dari aplikasi. href="#" berarti link ini tidak mengarah ke halaman lain, melainkan hanya sebagai placeholder.

4. **Bagian Navbar yang Dapat Diperluas atau Diperkecil:**

- <div class="collapse navbar-collapse" id="navbarNavAltMarkup">: Menggunakan kelas Bootstrap untuk bagian navbar yang dapat diperluas atau diperkecil pada tampilan perangkat dengan ukuran berbeda.

5. **Daftar Navigasi:**

- <div class="navbar-nav">: Menyimpan daftar link navigasi.
- Link navigasi menggunakan <a class="nav-link"> dengan atribut href untuk mengarahkan ke berbagai halaman. Kelas active pada link menandakan halaman saat ini (dalam hal ini "Dosen").
## **Hasil Kodingan**

```html
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <!-- Logo atau nama aplikasi -->
    <a class="navbar-brand" href="#">Tabel Data</a>
    
    <!-- Area navigasi yang dapat disembunyikan pada tampilan kecil -->
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <!-- Link navigasi -->
        <a class="nav-link active" aria-current="page" href="classes.php">Dosen</a> <!-- Link ke halaman Dosen -->
        <a class="nav-link" href="classes1.php">Kelas</a> <!-- Link ke halaman Kelas -->
        <a class="nav-link" href="dosen.php">ID</a> <!-- Link ke halaman ID -->
        <a class="nav-link" href="lecturers1.php">Nama</a> <!-- Link ke halaman Nama -->
      </div>
    </div>
  </div>
</nav>
```
## **Penjelasan lecturers1.php**
1. **Pengimporan Kelas:**

- require_once "kelas.php";: Mengimpor file kelas.php yang kemungkinan berisi definisi kelas lecturers_1.

2. **Inisialisasi Objek:**

- $pp = new lecturers_1();: Membuat objek baru dari kelas lecturers_1.

3. **Pengambilan Data:**

- $gd = $pp->tampilData();: Memanggil method tampilData() dari objek $pp untuk mendapatkan data dosen dan menyimpannya dalam variabel $gd.

4. **HTML dan Bootstrap:**

- Struktur HTML dasar dengan pengaturan metadata dan pemuatan stylesheet dari Bootstrap serta DataTables untuk styling tabel.

5. **Pembuatan Tabel:**

- Tabel HTML digunakan untuk menampilkan data dosen yang diambil dari objek lecturers_1. Kolom tabel disesuaikan dengan atribut dosen seperti nidn, nip, name, phone_number, address, dan signature.

6. **Iterasi Data:**

- foreach($gd as $row):: Mengiterasi setiap baris data dosen dan menampilkannya di dalam baris tabel HTML. Variabel $no digunakan untuk memberikan nomor urut pada setiap baris.

7. **JavaScript:**

- Memuat JavaScript dari Bootstrap untuk menambah fungsionalitas pada elemen yang menggunakan Bootstrap.

## **Hasil Kodingan**
```php
<?php 
// Mengimpor file "kelas.php" yang berisi definisi kelas yang diperlukan
require_once "kelas.php";

// Membuat objek dari kelas lecturers_1
$pp = new lecturers_1();

// Memanggil method tampilData() dari objek $pp untuk mendapatkan data dosen
$gd = $pp->tampilData();

// Inisialisasi variabel $no untuk nomor urut
$no = 1;
?>
```
```html
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Memuat stylesheet Bootstrap versi 4.4.1 -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <!-- Memuat stylesheet DataTables versi 1.10.20 -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <title>Document</title>
  <!-- Memuat stylesheet Bootstrap versi 5.3.3 dengan integritas dan cross-origin -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
```php
<!-- Memuat file navigasi "nav.php" -->
<?php require_once "nav.php"; ?>

<!-- Membuat tabel untuk menampilkan data dosen -->
<table class="table table-bordered" id="myTable">
  <thead>
    <tr>
      <th scope="col">NO.</th>
      <th scope="col">nidn</th>
      <th scope="col">nip</th>
      <th scope="col">name</th>
      <th scope="col">phone_number</th>
      <th scope="col">address</th>
      <th scope="col">signature</th>
    </tr>
  </thead>
  <tbody>
    <!-- Mengiterasi data dosen dan menampilkan setiap baris dalam tabel -->
    <?php foreach($gd as $row): ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $row['nidn'] ?></td>
      <td><?= $row['nip'] ?></td>
      <td><?= $row['name'] ?></td>
      <td><?= $row['phone_number'] ?></td>
      <td><?= $row['address'] ?></td>
      <td><?= $row['signature'] ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<!-- Memuat JavaScript Bootstrap versi 5.3.3 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
```
## **Penjelasan Classes1.php**

1. **Pengimporan Kelas:**

- require_once "kelas.php";: Mengimpor file kelas.php yang kemungkinan berisi definisi kelas classes_1.

2. **Inisialisasi Objek:**

- $pp = new classes_1();: Membuat objek baru dari kelas classes_1.

3. **Pengambilan Data:**

- $gd = $pp->tampilData();: Memanggil method tampilData() dari objek $pp untuk mendapatkan data kelas dan menyimpannya dalam variabel $gd.

4. **HTML dan Bootstrap:**

- Struktur HTML dasar dengan pengaturan metadata dan pemuatan stylesheet dari Bootstrap serta DataTables untuk styling tabel.

5. **Pembuatan Tabel:**

- Tabel HTML digunakan untuk menampilkan data kelas yang diambil dari objek classes_1. Kolom tabel disesuaikan dengan atribut kelas seperti id_program, id_academic_advisor, class_name, dan academic_year.

6. **Iterasi Data:**

- foreach($gd as $row):: Mengiterasi setiap baris data kelas dan menampilkannya di dalam baris tabel HTML. Variabel $no digunakan untuk memberikan nomor urut pada setiap baris.

7. **JavaScript:**

- Memuat JavaScript dari Bootstrap untuk menambah fungsionalitas pada elemen yang menggunakan Bootstrap.
Please make sure to update tests as appropriate.
## **Hasil Kodingan**
```php
<?php 
// Mengimpor file "kelas.php" yang berisi definisi kelas yang diperlukan
require_once "kelas.php";

// Membuat objek dari kelas classes_1
$pp = new classes_1();

// Memanggil method tampilData() dari objek $pp untuk mendapatkan data kelas
$gd = $pp->tampilData();

// Inisialisasi variabel $no untuk nomor urut
$no = 1;
?>
```
```html
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Memuat stylesheet Bootstrap versi 4.4.1 -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <!-- Memuat stylesheet DataTables versi 1.10.20 -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <title>Document</title>
  <!-- Memuat stylesheet Bootstrap versi 5.3.3 dengan integritas dan cross-origin -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<!-- Memuat file navigasi "nav.php" -->
<?php require_once "nav.php"; ?>

<!-- Membuat tabel untuk menampilkan data kelas -->
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
    <!-- Mengiterasi data kelas dan menampilkan setiap baris dalam tabel -->
    <?php foreach($gd as $row): ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $row['id_program'] ?></td>
      <td><?= $row['id_academic_advisor'] ?></td>
      <td><?= $row['class_name'] ?></td>
      <td><?= $row['academic_year'] ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<!-- Memuat JavaScript Bootstrap versi 5.3.3 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
```
## **Penjelasan Classes.php**
1. **Pengimporan Kelas dan Data:**

- require_once "kelas.php";: Mengimpor file kelas.php yang berisi definisi kelas classes. Kode ini memastikan bahwa file tersebut hanya diimpor satu kali dalam eksekusi script untuk menghindari deklarasi ganda.

- $pp = new classes();: Membuat instance dari kelas classes. Objek $pp akan digunakan untuk mengakses metode dan properti kelas classes.

- $gd = $pp->tampilData();: Memanggil metode tampilData() dari objek $pp untuk mengambil data yang diperlukan, dan menyimpannya dalam variabel $gd. Biasanya, metode ini mengembalikan data dari database dalam bentuk array.

2. **Struktur HTML:**

- <!DOCTYPE html>: Mendefinisikan tipe dokumen HTML5.

- <html lang="en">: Membuka elemen HTML dengan atribut bahasa diatur ke Inggris.

- <head>: Bagian kepala dari dokumen HTML, berisi metadata dan link ke stylesheet.

- <meta charset="UTF-8">: Mendefinisikan encoding karakter dokumen sebagai UTF-8.

- <meta name="viewport" content="width=device-width, initial-scale=1.0">: Menetapkan viewport untuk memastikan tampilan responsif pada perangkat mobile.

- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">: Memuat stylesheet Bootstrap versi 4.4.1.

- <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">: Memuat stylesheet DataTables versi 1.10.20.

- <title>Document</title>: Menetapkan judul halaman.

- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">: Memuat stylesheet Bootstrap versi 5.3.3 dengan integritas untuk memastikan file tidak diubah.

3. **Isi Halaman:**

- <body>: Bagian utama dari dokumen HTML.

- <?php require_once "nav.php"; ?>: Memuat file navigasi nav.php, yang biasanya berisi elemen navigasi untuk situs web.

- <table class="table table-bordered" id="myTable">: Membuat tabel dengan kelas Bootstrap untuk styling dan ID myTable untuk memungkinkan penggunaan DataTables atau JavaScript lainnya.

- <thead>: Bagian kepala tabel dengan definisi kolom.

- <tr>: Baris tabel untuk header kolom.

- <th scope="col">...</th>: Sel header kolom untuk setiap atribut data.

- <tbody>: Bagian tubuh tabel tempat data akan diiterasi dan ditampilkan.

- <?php foreach($gd as $row): ?>: Mengiterasi setiap elemen dalam array $gd untuk menampilkan baris tabel.

- <tr>: Baris tabel untuk setiap item data.

- <td><?= $no++ ?></td>: Menampilkan nomor urut yang diinkremen setiap iterasi.

- <td><?= $row['id_program'] ?></td>: Menampilkan nilai untuk kolom id_program dari data.

- <td><?= $row['id_academic_advisor'] ?></td>: Menampilkan nilai untuk kolom id_academic_advisor.

- <td><?= $row['class_name'] ?></td>: Menampilkan nilai untuk kolom class_name.

- <td><?= $row['academic_year'] ?></td>: Menampilkan nilai untuk kolom academic_year.

## **Hasil Koding**
```php
<?php 
// Mengimpor file "kelas.php" yang berisi definisi kelas yang diperlukan
require_once "kelas.php";

// Membuat objek dari kelas classes
$pp = new classes();

// Mengambil data dari metode tampilData() dan menyimpannya dalam variabel $gd
$gd = $pp->tampilData();

// Inisialisasi variabel $no untuk nomor urut baris tabel
$no = 1;
?>
```
```html
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Memuat stylesheet Bootstrap versi 4.4.1 -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <!-- Memuat stylesheet DataTables versi 1.10.20 -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <title>Document</title>
  <!-- Memuat stylesheet Bootstrap versi 5.3.3 dengan integritas dan cross-origin -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
  <!-- Memuat file navigasi "nav.php" -->
  <?php require_once "nav.php"; ?>

  <!-- Membuat tabel untuk menampilkan data kelas -->
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
      <!-- Mengiterasi data kelas dan menampilkan setiap baris dalam tabel -->
      <?php foreach($gd as $row): ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['id_program'] ?></td>
        <td><?= $row['id_academic_advisor'] ?></td>
        <td><?= $row['class_name'] ?></td>
        <td><?= $row['academic_year'] ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <!-- Memuat JavaScript Bootstrap versi 5.3.3 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
```
## Lisensi

[MIT](https://choosealicense.com/licenses/mit/)