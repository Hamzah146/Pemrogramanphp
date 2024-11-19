<?php 
    
    require_once '../models/koneksi.php';
    require_once 'class_produk.php';

    // tangkap request element form
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $harga_produk = $_POST['harga_produk'];
    $stok = $_POST['stok'];
    $min_stok = $_POST['min_stok'];
    $jenis_produk_id = $_POST['jenis_produk_id'];
    $tombol = $_POST['submit'];

    // Menyimpan data diatas ke sebuah array
    $data = [
        $kode,      // ? 1 
        $nama,      // ? 2
        $harga_produk,   // ? 3
        $stok,      // ? 4
        $min_stok,   // ? 5
        $jenis_produk_id       // ? 6
    ];

    // proses
    $obj = new Produk($dbh);
    // $obj->simpan($data);
    switch ($tombol) {
        case 'simpan';
            $obj->simpan($data);
            break;
        case 'ubah';
            $data[] = $_POST['idx']; //tangkap hidden field u/ ? ke-8
            $obj->ubah($data);
            break;
        case 'hapus';
        $id[] = $_POST['idx']; //tangkap ke-1 where id=?
        $obj->hapus($id);
        break;  
        default://tombol batal
        header('Location:http://localhost/LATIHANPHP_3/crud/produk.php');
            break;
    }

    // Landing Page
    header('Location:http://localhost/LATIHANPHP_3/crud/produk.php');
?>