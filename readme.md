# Generate Quiz using Natural Language Processing Algorithms

Proyek ini bertujuan untuk membuat aplikasi yang dapat menghasilkan kuis secara otomatis menggunakan algoritma *Natural Language Processing (NLP)*. Aplikasi ini mendukung masukan berupa teks, memprosesnya untuk memahami konteks, dan menghasilkan pertanyaan kuis yang relevan. Proyek ini dibangun menggunakan Python untuk pemrosesan NLP dan PHP untuk antarmuka pengguna.

## Fitur Utama
- **Pemrosesan Teks**: Menganalisis teks untuk memahami konteks dan menghasilkan pertanyaan yang berkaitan.
- **Berbasis NLP**: Menggunakan algoritma NLP untuk identifikasi kata kunci, pembuatan pertanyaan, dan opsi jawaban.
- **Integrasi Python dan PHP**: Python digunakan untuk pemrosesan backend, sementara PHP menangani antarmuka dan pengelolaan data.

## Teknologi yang Digunakan
- **Python**: Untuk implementasi algoritma NLP.
- **PHP**: Untuk pengelolaan antarmuka pengguna.
- **Sense2Vec**: Untuk mendapatkan kata kunci berbasis *word embeddings*.
- **NLTK/Spacy**: Untuk pemrosesan teks.

## Prasyarat
Pastikan Anda telah menginstal:
- Python 3.x dan pustaka Python (NLTK, Spacy, dan Sense2Vec).
- PHP dan server lokal seperti XAMPP atau WAMP.

## Instalasi
1. **Unduh Sense2Vec**  
   Unduh file [Sense2Vec](https://github.com/explosion/sense2vec/releases/download/v1.0.0/s2v_reddit_2015_md.tar.gz) atau sumber lain, lalu ekstrak ke folder proyek ini.  

2. **Jalankan index.php**  
   Buka server lokal Anda dan arahkan ke `index.php` untuk memulai aplikasi.  

## Cara Kerja
1. Masukkan teks atau dokumen melalui antarmuka web.
2. Aplikasi akan memproses teks menggunakan Python dan algoritma NLP untuk menghasilkan kuis.
3. Hasil kuis ditampilkan melalui antarmuka PHP.

## Kontribusi
Jika Anda ingin berkontribusi pada proyek ini, silakan *fork* repositori ini, buat *branch* baru untuk perubahan Anda, dan ajukan *pull request*. Pastikan untuk mendokumentasikan perubahan Anda dengan baik.

## Lisensi
Proyek ini dilisensikan di bawah MIT License. Lihat file [LICENSE](LICENSE) untuk informasi lebih lanjut.
