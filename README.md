# Si Padi
Aplikasi Perpustakaan Digital
Versi Indonesia
==================
Si Padi Hak Cipta (C) 2019 Azvya Erstevan
Program ini benar-benar TANPA GARANSI;
Ini adalah perangkat lunak gratis, dan Anda dapat mendistribusikannya kembali
dalam kondisi tertentu;

Perlu dicatat oleh para pengguna, beberapa aset yang kami gunakan untuk aplikasi web ini, memiliki sumber sebagai berikut:
Gambar, judul, nama pengarang, isbn, dan deskripsi buku diambil dari https://ebooks.gramedia.com dan https://www.goodreads.com/
CSS, JS dari https://getbootstrap.com/ https://developer.snapappointments.com/bootstrap-select/ https://github.com/craftpip/jquery-confirm

Tugas besar mata kuliah Pemrograman Web, untuk mengimplementasikan bahasa sql, php, css, html, dan javascript menjadi sebuah aplikasi web untuk perpustakaan digital.

Tujuan dari pembuatan proyek ini adalah agar dapat menjadi aplikasi web yang berfungsi penuh untuk dapat mencari, menambah, menghapus buku serta nama pengarang, menyimpan (ketersediaan) buku, dan permintaan untuk meminjam buku.

Log Perubahan:

Pre-alpha 0.3.0 :
- Perbaikan bug (8), jumlah halaman tidak sesuai jumlah entitas yang ditampilkan
- Perbaikan bug (9), nomor baris tidak sesuai jumlah entitas yang ditampilkan
- Perbaikan bug (10), textarea pada tambah dan ubah buku variatif
- Penambahan fitur sorting di di halaman Lihat Semua Buku
- Penambahan fitur pembagian halaman di halaman pencarian
- Penambahan halaman tampilkan buku
- Ada autocomplete dengan ajax di halaman index
- Penambahan fitur kirim saran/kesan/pesan
- Penyederhanaan perintah untuk menampilkan buku, pengarang, dan para pengguna
- Penambahan Fitur Cek Stok, dan ubah Stok
- UI disederhanakan dengan material-white theme
- PDF Reporting


Pre-alpha 0.2.5 :
- Menyusun dan membersihkan source code (1)
- Menambahkan fitur konfirmasi, hapus, dan pengaturan akses user


Pre-alpha 0.2.4 :
- Perbaikan bug (6), fitur registrasi username tidak menampilkan hasil dari ajax
- Perbaikan bug (7), keamanan dalam input form ditingkatkan
- Enkripsi password
- Penambahan kembali footer


Pre-alpha 0.2.3 :
- Menggunakan Ajax untuk filter dan sorting beberapa tabel
- Registrasi username dan password menggunakan ajax
- Registrasi memperlukan verifikasi ke admin
- Notifikasi ke admin aktif


Pre-alpha 0.2.2 :
- Perbaikan bug (5), enkripsi foto infinite loop, sehingga nama foto menjadi angka 0 seluruhnya
- Fungsi filter pada tabel pengarang ditambahkan


Pre-alpha 0.2.1 :
- Perbaikan bug (3), notifikasi tidak muncul
- Perbaikan bug (4), upload foto tidak terenkripsi, sehingga foto dengan nama yang sama akan saling timpa di folder gambar


Pre-alpha 0.2.0 :
- Tabel genre_buku dihapus
- Fungsi footer dihapus
- Penambahan tabel baru, notifikasi, user, dan ketersediaan (stok buku)
- Tampilan index menjadi lebih rapi dengan fitur pencarian
- Navbar memiliki tombol notifikasi
- Penambahan fitur registrasi
- Penambahan fitur login dan logout
- Dapat upload foto dengan verifikasi jpg, png, dan jpeg
- Menampilkan buku - buku kini lebih elegan dengan class 'card' bootstrap
- Dapat melakukan pencarian berdasarkan judul buku dan nama pengarang
- Ada fungsi enkripsi untuk url
- Simplified UI


Pre-alpha 0.1.2 :
- Penghapusan fitur auto generated id berdasarkan kategori pengarang
- Perbaikan bug (2), tidak dapat mengubah buku dengan mengganti pengarang


Pre-alpha 0.1.1 :
- Perbaikan bug (1), tidak dapat menambah pengarang lebih dari 10 orang


Pre-alpha 0.1.0 :
- Si Padi, Aplikasi Perpustakaan Digital dibuat
- Tabel pengarang, buku, genre_buku dibuat
- Dapat menampilkan buku-buku beserta pengarangnya dengan tabel
- Dapat input buku ke database melalui aplikasi web
- Dapat menghapus buku di database melalui aplikasi web
- Auto generated ID untuk pengarang berdasarkan kategori pengarang (Internasional/Nasional)
- Navbar bootstrap yang dipanggil melalui fungsi php
- Footer yang dipanggil melalui fungsi php
                    
English Version
===================
Si Padi  Copyright (C) 2019  Azvya Erstevan
This program comes with ABSOLUTELY NO WARRANTY
This is free software, and you are welcome to redistribute it
under certain conditions

It should be noted by the users, some of the assets that we use for this web application, have the following sources:
Pictures, titles, author names, text, and book descriptions are taken from https://ebooks.gramedia.com and https://www.goodreads.com/
CSS, JS from https://getbootstrap.com/ https://developer.snapappointments.com/bootstrap-select/ https://github.com/craftpip/jquery-confirm

University Project for Web Programming course, about to implements sql, php, css, html, and javascript to a web application for digital library.

This project goal is to create a fully functional web application to search, add, remove books and writers, storing books, and request to borrow books.

Changelog:
Pre Alpha 0.3.0
- Bug fix (8), the number of pages does not match the number of entities displayed
- Bug fixes (9), line numbers do not match the number of entities displayed
- Bug fixes (10), textarea to add and change varied books
- Added sorting feature on the page See All Books
- Added page sharing feature on the search page
- Add pages to show books
- There is autocomplete with ajax on the index page
- Added features send suggestions / impressions / messages
- Simplifying commands to display books, authors, and users
- Feature Add Stock Check, and change Stock
- The UI is simplified with material-white themes
- PDF Reporting

Pre-alpha 0.2.5:
- Compile and clean source code (1)
- Added confirmation, delete, and user access settings

Pre-alpha 0.2.4:
- Bug fix (6), username registration feature does not display results from ajax
- Bug fix (7), security in input form is improved
- Password encryption
- Re-add footer

Pre-alpha 0.2.3:
- Use Ajax to filter and sort multiple tables
- Register username and password using ajax
- Registration requires verification to the admin
- Notifications to active admin

Pre-alpha 0.2.2:
- Bug fix (5), encryption of infinite loop photos, so that the name of the photo becomes 0 in all
- The filter function in the author table is added

Pre-alpha 0.2.1:
- Bug fixes (3), notifications do not appear
- Bug fixes (4), upload unencrypted photos, so photos with the same name will overwrite each other in the image folder

Pre-alpha 0.2.0:
- Book genre_ table deleted
- The footer function is deleted
- Add new tables, notifications, users, and availability (stock of books)
- The index view is more neat with the search feature
- Navbar has a notification button
- Added registration feature
- Added login and logout features
- Can upload photos with jpg, png, and jpeg verification
- Showing books are now more elegant with the bootstrap 'card' class
- Can do searches based on book titles and author names
- There is an encryption function for the url
- Simplified UI

Pre-alpha 0.1.2:
- Removal of the auto generated id feature based on the author category
- Bug fixes (2), cannot change books by changing authors

Pre-alpha 0.1.1:
- Bug fixes (1), cannot add more than 10 authors

Pre-alpha 0.1.0:
- Si Padi, Digital Library Application was created
- Author, book, book genre_ created
- Can display books and their authors with tables
- Can input books into the database through a web application
- Can delete books in the database through a web application
- Auto generated ID for authors based on author category (International / National)
- Bootstrap navbar that is invoked through the php function
- The footer is called through the php function
