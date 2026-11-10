<?php
// LAB 7 — Trait (bagian namespace & Composer dikerjakan lokal di Laragon,
//         kirim tautan repositori GitHub pada kolom tautan)
// Spesifikasi:
//  - trait Timestampable: touch(): void (isi createdAt), getCreatedAt(): ?string
//  - Buku(string $judul) dan Anggota(string $nama) memakai Timestampable

trait Timestampable
{
    private ?string $createdAt = null;

    public function touch(): void
    {
        $this->createdAt = date('Y-m-d H:i:s');
    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }
}

class Buku
{
    use Timestampable;

    public function __construct(private string $judul)
    {
    }

    public function getJudul(): string
    {
        return $this->judul;
    }
}

class Anggota
{
    use Timestampable;

    public function __construct(private string $nama)
    {
    }

    public function getNama(): string
    {
        return $this->nama;
    }
}

// Contoh penggunaan
$buku = new Buku("Pemrograman PHP");
var_dump($buku->getCreatedAt()); // NULL
$buku->touch();
echo $buku->getJudul() . " dibuat pada " . $buku->getCreatedAt() . PHP_EOL;

$anggota = new Anggota("Budi");
$anggota->touch();
echo $anggota->getNama() . " dibuat pada " . $anggota->getCreatedAt() . PHP_EOL;