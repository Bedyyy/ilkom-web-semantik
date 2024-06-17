<?php

require_once "Class/Mahasiswa.php";
require_once "Class/Rps.php";
require_once "Class/Staff.php";
require_once "Class/Dosen.php";


$search = null;
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $search = strtolower($search);
}

$mahasiswa = new Mahasiswa();
$rps = new Rps();
$staff = new Staff();
$dosen = new Dosen();
$response = [
    'mahasiswa' => $mahasiswa->getAllMahasiswa($search),
    'rps' => $rps->getAllRps($search),
    'staff' => $staff->getAllStaff($search),
    'dosen' => $dosen->getAllDosen($search),

    //Mahasiswa
    'mahasiswa_Dosen' => $mahasiswa->getMahasiswaDosen($search),
    'mahasiswa_Beasiswa' => $mahasiswa->getMahasiswaBeasiswa($search),
    'mahasiswa_Prestasi' => $mahasiswa->getMahasiswaPrestasi($search),
    'mahasiswa_Jadwal' => $mahasiswa->getMahasiswaJadwal($search),
    'mahasiswa_organisasi' => $mahasiswa->getMahasiswaOrganisasi($search),

    //RPS
    'rps_Dosen' => $rps->getRpsDosen($search),
    'rps_Matakuliah' => $rps->getRpsMataKuliah($search),

    //Staff
    'staff_Jadwal' => $staff->getStaffJadwal($search),

    // Dosen
    'dosen_Mahasiswa' => $dosen->getDosenMahasiswa($search),
    'dosen_Matakuliah' => $dosen->getDosenMataKuliah($search),
    'dosen_Prestasi' => $dosen->getDosenPrestasi($search),
    'dosen_Organisasi' => $dosen->getDosenOrganisasi($search),
    'dosen_Jadwal' => $dosen->getDosenJadwal($search),
    'dosen_Nilai' => $dosen->getDosenNilai($search),
];
echo json_encode($response, JSON_PRETTY_PRINT);