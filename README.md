# basicarabicproblem
Web sederhana yang memiliki fitur ujian online dengan timer

Cara setting di local (Windows):
Web ini menggunakan .htaccess, sehingga perlu web server Apache. Jika menggunakan XAMPP, akan mudah menjalankan web ini. Untuk menjalankan XAMPP, bisa mendownload dan menginstallnya terlebih dahulu. Jika XAMPP sudah berhasil dijalankan, bisa mengikuti langkah-langkah berikut:
1. Masuk ke folder htdocs di folder xampp.
Misalnya di C:\xampp\htdocs (jika memakai Windows)
2. Membuat folder untuk menyimpan project ini. Bisa melakukan clone jika menggunakan git. Ini lebih mudah dilakukan.
Perintah yang dijalankan (untuk git, setelah masuk folder htdocs):
```cmd
git clone https://github.com/a-h-a-m/basicarabicproblem.git nama-folder
3. Membuat database MySQL
4. Import file bap.sql yang ada di project ini ke database
5. Edit file database.php untuk disesuaikan dengan database di local.
Lokasi file tersebut ada di config/database.php.
Berikut cara edit konfigurasi di file tersebut.
BASEURL disesuaikan dengan nama-folder (folder yang dibuat di htdocs).
DBHOST bisa dibiarkan apa adanya jika menggunakan XAMPP (biasanya localhost).
DBUSER bisa tetap menggunakan root atau diganti sesuai settingan MySQLnya.
DBPASS bisa dibiarkan kosong atau diganti sesuai settingan MySQLnya.
DBNAME disesuaikan dengan nama database yang dibuat di langkah ke-3.
6. Buka http://localhost/nama-folder menggunakan browser.
7. 