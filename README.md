# Si Padi
Indonesian version
==================
Tugas besar mata kuliah Pemrograman Web, untuk mengimplementasikan bahasa sql, php, css, html, dan javascript menjadi sebuah aplikasi web untuk perpustakaan digital.

Tujuan dari pembuatan proyek ini adalah agar dapat menjadi aplikasi web yang berfungsi penuh untuk dapat mencari, menambah, menghapus buku serta nama pengarang, menyimpan (ketersediaan) buku, dan permintaan untuk meminjam buku.

Log Perubahan:
<ul class="list-group list-group-flush mt-2 text-left">
                    <span class='bg-primary'>Pre-alpha 0.3.0 :</span>
                        <li class="list-group-item">Perbaikan bug (8), jumlah halaman tidak sesuai jumlah entitas yang ditampilkan</li>
                        <li class="list-group-item">Perbaikan bug (9), nomor baris tidak sesuai jumlah entitas yang ditampilkan</li>
                        <li class="list-group-item">Perbaikan bug (10), textarea pada tambah dan ubah buku variatif</li>
                        <li class="list-group-item">Penambahan fitur sorting di di halaman Lihat Semua Buku</li>
                        <li class="list-group-item">Penambahan fitur pembagian halaman di halaman pencarian</li>
                        <li class="list-group-item">Penambahan halaman tampilkan buku</li>
                        <li class="list-group-item">Ada autocomplete dengan ajax di halaman index</li>
                        <li class="list-group-item">Penambahan fitur kirim saran/kesan/pesan</li>
                        <li class="list-group-item">Penyederhanaan perintah untuk menampilkan buku, pengarang, dan para pengguna</li>
                        <li class="list-group-item">Penambahan Fitur Cek Stok, dan ubah Stok</li>
                        <li class="list-group-item">UI disederhanakan dengan material-white theme</li>
                        <li class="list-group-item">PDF Reporting</li>
                    </ul>
                    <ul class="list-group list-group-flush mt-2 text-left">
                    <span class='bg-warning'>Pre-alpha 0.2.5 :</span>
                        <li class="list-group-item">Menyusun dan membersihkan source code (1)</li>
                        <li class="list-group-item">Menambahkan fitur konfirmasi, hapus, dan pengaturan akses user</li>
                    </ul>
                    <ul class="list-group list-group-flush mt-2 text-left">
                    <span class='bg-warning'>Pre-alpha 0.2.4 :</span>
                        <li class="list-group-item">Perbaikan bug (6), fitur registrasi username tidak menampilkan hasil dari ajax</li>
                        <li class="list-group-item">Perbaikan bug (7), keamanan dalam input form ditingkatkan</li>
                        <li class="list-group-item">Enkripsi password</li>
                        <li class="list-group-item">Penambahan kembali footer</li>
                    </ul>
                    <ul class="list-group list-group-flush mt-2 text-left">
                    <span class='bg-warning'>Pre-alpha 0.2.3 :</span>
                        <li class="list-group-item">Menggunakan Ajax untuk filter dan sorting beberapa tabel</li>
                        <li class="list-group-item">Registrasi username dan password menggunakan ajax</li>
                        <li class="list-group-item">Registrasi memperlukan verifikasi ke admin</li>
                        <li class="list-group-item">Notifikasi ke admin aktif</li>
                        <li class="list-group-item"></li>
                    </ul>
                    <ul class="list-group list-group-flush mt-2 text-left">
                    <span class='bg-warning'>Pre-alpha 0.2.2 :</span>
                        <li class="list-group-item">Perbaikan bug (5), enkripsi foto infinite loop, sehingga nama foto menjadi angka 0 seluruhnya</li>
                        <li class="list-group-item">Fungsi filter pada tabel pengarang ditambahkan</li>
                    </ul>
                    <ul class="list-group list-group-flush mt-2 text-left">
                    <span class='bg-warning'>Pre-alpha 0.2.1 :</span>
                        <li class="list-group-item">Perbaikan bug (3), notifikasi tidak muncul</li>
                        <li class="list-group-item">Perbaikan bug (4), upload foto tidak terenkripsi, sehingga foto dengan nama yang sama akan saling timpa di folder gambar</li>
                    </ul>
                    <ul class="list-group list-group-flush mt-2 text-left">
                    <span class='bg-primary'>Pre-alpha 0.2.0 :</span>
                        <li class="list-group-item">Tabel genre_buku dihapus</li>
                        <li class="list-group-item">Fungsi footer dihapus</li>
                        <li class="list-group-item">Penambahan tabel baru, notifikasi, user, dan ketersediaan (stok buku)</li>
                        <li class="list-group-item">Tampilan index menjadi lebih rapi dengan fitur pencarian</li>
                        <li class="list-group-item">Navbar memiliki tombol notifikasi</li>
                        <li class="list-group-item">Penambahan fitur registrasi</li>
                        <li class="list-group-item">Penambahan fitur login dan logout</li>
                        <li class="list-group-item">Dapat upload foto dengan verifikasi jpg, png, dan jpeg</li>
                        <li class="list-group-item">Menampilkan buku - buku kini lebih elegan dengan class 'card' bootstrap</li>
                        <li class="list-group-item">Dapat melakukan pencarian berdasarkan judul buku dan nama pengarang</li>
                        <li class="list-group-item">Ada fungsi enkripsi untuk url</li>
                        <li class="list-group-item">Simplified UI</li>
                    </ul>
                    <ul class="list-group list-group-flush mt-2 text-left">
                    <span class='bg-warning'>Pre-alpha 0.1.2 :</span>
                        <li class="list-group-item">Penghapusan fitur auto generated id berdasarkan kategori pengarang</li>
                        <li class="list-group-item">Perbaikan bug (2), tidak dapat mengubah buku dengan mengganti pengarang</li>
                    </ul>
                    <ul class="list-group list-group-flush mt-2 text-left">
                    <span class='bg-warning'>Pre-alpha 0.1.1 :</span>
                        <li class="list-group-item">Perbaikan bug (1), tidak dapat menambah pengarang lebih dari 10 orang</li>
                    </ul>
                    <ul class="list-group list-group-flush mt-2 text-left">
                    <span class='bg-primary'>Pre-alpha 0.1.0 :</span>
                        <li class="list-group-item">Si Padi, Aplikasi Perpustakaan Digital dibuat</li>
                        <li class="list-group-item">Tabel pengarang, buku, genre_buku dibuat</li>
                        <li class="list-group-item">Dapat menampilkan buku-buku beserta pengarangnya dengan tabel</li>
                        <li class="list-group-item">Dapat input buku ke database melalui aplikasi web</li>
                        <li class="list-group-item">Dapat menghapus buku di database melalui aplikasi web</li>
                        <li class="list-group-item">Auto generated ID untuk pengarang berdasarkan kategori pengarang (Internasional/Nasional)</li>
                        <li class="list-group-item">Navbar bootstrap yang dipanggil melalui fungsi php</li>
                        <li class="list-group-item">Footer yang dipanggil melalui fungsi php</li>
                    </ul>
   
===================
English Version
===================
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
