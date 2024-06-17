<?php

require_once "Class/Mahasiswa.php";
require_once "Class/Rps.php";
require_once "Class/Staff.php";
require_once "Class/Jadwal.php";
require_once "Class/Dosen.php";
require_once "Class/Prestasi.php";
require_once "Class/Beasiswa.php";
require_once "Class/Organisasi.php";
require_once "Class/MataKuliah.php";
require_once "Class/Nilai.php";

$search = null;
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $search = strtolower($search);
}

$mahasiswa = new Mahasiswa();
$rps = new Rps();
$staff = new Staff();
$jadwal = new Jadwal();
$dosen = new Dosen();
$prestasi = new Prestasi();
$beasiswa = new Beasiswa();
$organisasi = new Organisasi();
$matakuliah = new MataKuliah();
$nilai = new Nilai();
$response = [
    'mahasiswa' => $mahasiswa->getAllMahasiswa($search),
    'rps' => $rps->getAllRps($search),
    'staff' => $staff->getAllStaff($search),
    'jadwal' => $jadwal->getAllJadwal($search),
    'dosen' => $dosen->getAllDosen($search),
    'prestasi' => $prestasi->getAllPrestasi($search),
    'beasiswa' => $beasiswa->getAllBeasiswa($search),
    'organisasi' => $organisasi->getAllOrganisasi($search),
    'matakuliah' => $matakuliah->getAllMataKuliah($search),
    'nilai' => $nilai->getAllNilai($search),

    //Mahasiswa
    'mahasiswa_Dosen' => $mahasiswa->getMahasiswaDosen($search),
    'mahasiswa_Beasiswa' => $mahasiswa->getMahasiswaBeasiswa($search),
    'mahasiswa_Prestasi' => $mahasiswa->getMahasiswaPrestasi($search),
    'mahasiswa_Jadwal' => $mahasiswa->getMahasiswaJadwal($search),
    'mahasiswa_Organisasi' => $mahasiswa->getMahasiswaOrganisasi($search),

    //RPS
    'rps_Dosen' => $rps->getRpsDosen($search),
    'rps_Matakuliah' => $rps->getRpsMataKuliah($search),

    //Staff
    'staff_Jadwal' => $staff->getStaffJadwal($search),

    //Jadwal
    'jadwal_Staff' => $jadwal->getJadwalStaff($search),

    //Dosen
    'dosen_Mahasiswa' => $dosen->getDosenMahasiswa($search),
    'dosen_Matakuliah' => $dosen->getDosenMataKuliah($search),
    'dosen_Prestasi' => $dosen->getDosenPrestasi($search),
    'dosen_Organisasi' => $dosen->getDosenOrganisasi($search),
    'dosen_Jadwal' => $dosen->getDosenJadwal($search),
    'dosen_Nilai' => $dosen->getDosenNilai($search),

    //Prestasi
    'prestasi_Mahasiswa' => $prestasi->getPrestasiMahasiswa($search),
    'prestasi_Dosen' => $prestasi->getPrestasiDosen($search),

    //Beasiswa
    'beasiswa_Mahasiswa' => $beasiswa->getBeasiswaMahasiswa($search),

    //Organisasi
    'organisasi_Mahasiswa' => $organisasi->getOrganisasiMahasiswa($search),
    'organisasi_Dosen' => $organisasi->getOrganisasiDosen($search),

    //Mata Kuliah
    'matakuliah_Jadwal' => $matakuliah->getMataKuliahJadwal($search),
    'matakuliah_Dosen' => $matakuliah->getMataKuliahDosen($search),
    'matakuliah_Rps' => $matakuliah->getMataKuliahRps($search),

    //Nilai
    'nilai_Mahasiswa' => $nilai->getNilaiMahasiswa($search),
    'nilai_Dosen' => $nilai->getNilaiDosen($search),
];
echo json_encode($response, JSON_PRETTY_PRINT);