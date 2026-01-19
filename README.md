# Website Data Mahasiswa

## Deskripsi Singkat Aplikasi
Website Data Mahasiswa merupakan sebuah aplikasi berbasis web yang digunakan untuk mengelola data mahasiswa secara terstruktur.  
Aplikasi ini memiliki dua jenis pengguna, yaitu **operator** dan **mahasiswa**, yang masing-masing memiliki hak akses berbeda.

- **Operator** memiliki hak untuk mengelola seluruh data mahasiswa, seperti menambahkan, mengedit, menghapus, serta mencari data mahasiswa.
- **Mahasiswa** hanya dapat melihat data mahasiswa tertentu dan mengisi serta mengelola data diri mereka sendiri.

---

## Tata Cara Penggunaan Aplikasi

### 1. Login dan Register
Pengguna dapat melakukan **register** dengan mengisi:
- Username
- Email
- Password

Setelah berhasil register, pengguna dapat melakukan **login** menggunakan email dan password.  
Sistem akan secara otomatis mengarahkan pengguna ke **dashboard sesuai peran** (operator atau mahasiswa).

---

### 2. Dashboard Mahasiswa
Mahasiswa dapat melihat tabel data mahasiswa yang berisi:
- NIM
- Email
- Nama Mahasiswa
- Fakultas
- Program Studi

Mahasiswa dapat menggunakan **fitur pencarian** berdasarkan NIM atau nama mahasiswa.

Mahasiswa juga memiliki menu **Data Diri** untuk mengisi dan mengedit informasi pribadi, seperti:
- NIM
- Email
- Nama Mahasiswa
- Nomor HP
- Fakultas
- Program Studi
- Kategori Kelas

---

### 3. Dashboard Operator
Operator dapat melihat seluruh data mahasiswa secara lengkap.

Fitur yang tersedia untuk operator:
- Menambah data mahasiswa
- Mengedit data mahasiswa
- Menghapus data mahasiswa
- Mencari data mahasiswa berdasarkan NIM atau nama

---

## Teknologi yang Digunakan
- **Backend**: Laravel (PHP Framework)
- **Frontend**: Blade Template Laravel & Bootstrap 5
- **Database**: MySQL
