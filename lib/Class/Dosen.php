<?php

require_once "WebProdiIlkom.php";

class Dosen extends WebProdiIlkom{

    public function __construct()
    {
      parent::__construct();
    }

    public function getAllDosen($search = null) {
        $prefix = $this->getPrefix();
        $query = $prefix . "
            SELECT ?nip ?namaDosen ?statusKeaktifanDosen ?unitKerjaDosen
            WHERE {
                ?dosen al:nip ?nip ;
                    al:namaDosen ?namaDosen ;
                    al:statusKeaktifanDosen ?statusKeaktifanDosen ;
                    al:unitKerjaDosen ?unitKerjaDosen .
        ";

        if ($search == "dosen") {
            $query .= "}";
        } else {
            $query .= " 
                FILTER (
                    regex(str(?nip), '$search', 'i') ||
                    regex(str(?namaDosen), '$search', 'i') ||
                    regex(str(?statusKeaktifanDosen), '$search', 'i') ||
                    regex(str(?unitKerjaDosen), '$search', 'i')
                )}
            ";
        }

        $result = sparql_query($query);

        $data = [];
        while ( $row = sparql_fetch_array($result) ) {
            $data[] = [
                'nip' => $row['nip'],
                'namaDosen' => $row['namaDosen'],
                'statusKeaktifanDosen' =>$row['statusKeaktifanDosen'],
                'unitKerjaDosen' => $row['unitKerjaDosen']
            ];
        }

        return $data;
    }

    public function getDosenMahasiswa($search = null) {
        $prefix = $this->getPrefix();
        $query = $prefix . "
            SELECT ?nip ?namaDosen ?statusKeaktifanDosen ?unitKerjaDosen ?namaMahasiswa ?nim ?statusKemahasiswaan ?semester 
            WHERE {
                ?dosen al:nip ?nip ;
                    al:namaDosen ?namaDosen ;
                    al:statusKeaktifanDosen ?statusKeaktifanDosen ;
                    al:unitKerjaDosen ?unitKerjaDosen ;
                    al:mengajar ?mhs .
                ?mhs k:namaMahasiswa ?namaMahasiswa;
                    k:nim ?nim;
                    k:statusKemahasiswaan ?statusKemahasiswaan;
                    k:semester ?semester.
        ";

        if ($search == "mahasiswa") {
            $query .= "}";
        } else {
            $query .= " 
                FILTER (
                    regex(str(?nip), '$search', 'i') ||
                    regex(str(?namaDosen), '$search', 'i') ||
                    regex(str(?statusKeaktifanDosen), '$search', 'i') ||
                    regex(str(?unitKerjaDosen), '$search', 'i') ||
                    regex(str(?namaMahasiswa), '$search', 'i') ||
                    regex(str(?nim), '$search', 'i') ||
                    regex(str(?statusKemahasiwaan), '$search', 'i') ||
                    regex(str(?semester), '$search', 'i')
                )}
            ";
        }

        $result = sparql_query($query);

        $data = [];
        while ( $row = sparql_fetch_array($result) ) {
            $data[] = [
                'nip' => $row['nip'],
                'namaDosen' => $row['namaDosen'],
                'statusKeaktifanDosen' =>$row['statusKeaktifanDosen'],
                'unitKerjaDosen' => $row['unitKerjaDosen'],
                'namaMahasiswa' => $row['namaMahasiswa'],
                'nim' => $row['nim'],
                'statusKemahasiswaan' => $row['statusKemahasiswaan'],
                'semester' => $row['semester']
            ];
        }

        return $data;
    }

    public function getDosenMatakuliah($search = null) {
        $prefix = $this->getPrefix();
        $query = $prefix . "
            SELECT ?nip ?namaDosen ?statusKeaktifanDosen ?unitKerjaDosen ?namaMahasiswa ?namaMatkul ?namaKegiatan ?hariJadwal ?statusKemahasiswaan ?ipkMahasiswa ?nim ?semester ?kodeMatkul ?bobotSKS ?kategori ?pencapaian ?tingkatan ?tahun ?jamJadwal ?ruanganJadwal
            WHERE {
                ?dosen al:nip ?nip ;
                    al:namaDosen ?namaDosen ;
                    al:statusKeaktifanDosen ?statusKeaktifanDosen ;
                    al:unitKerjaDosen ?unitKerjaDosen ;
                    al:mengampu ?mk .
                ?mk d:namaMatkul ?namaMatkul;
                    d:kodeMatkul ?kodeMatkul;
                    d:bobotSKS ?bobotSKS.
        ";

        if ($search == "mata kuliah" || $search == "matakuliah" || $search == "matkul" || $search == "mk") {
            $query .= "}";
        } else {
            $query .= " 
                FILTER (
                    regex(str(?nip), '$search', 'i') ||
                    regex(str(?namaDosen), '$search', 'i') ||
                    regex(str(?statusKeaktifanDosen), '$search', 'i') ||
                    regex(str(?unitKerjaDosen), '$search', 'i') ||
                    regex(str(?namaMatkul), '$search', 'i') ||
                    regex(str(?kodeMatkul), '$search', 'i') ||
                    regex(str(?bobotSKS), '$search', 'i') 
                )}
            ";
        }

        $result = sparql_query($query);

        $data = [];
        while( $row = sparql_fetch_array($result) ) {
            $data[] = [
                'nip' => $row['nip'],
                'namaDosen' => $row['namaDosen'],
                'statusKeaktifanDosen' =>$row['statusKeaktifanDosen'],
                'unitKerjaDosen' => $row['unitKerjaDosen'],
                'namaMatkul' => $row['namaMatkul'],
                'kodeMatkul' => $row['kodeMatkul'],
                'bobotSKS' => $row['bobotSKS'],
            ];
        }

        return $data;
    }

    public function getDosenPrestasi($search = null) {
        $prefix = $this->getPrefix();
        $query = $prefix . "
            SELECT ?nip ?namaDosen ?statusKeaktifanDosen ?unitKerjaDosen ?namaMahasiswa ?namaMatkul ?namaKegiatan ?hariJadwal ?statusKemahasiswaan ?ipkMahasiswa ?nim ?semester ?kodeMatkul ?bobotSKS ?kategori ?pencapaian ?tingkatan ?tahun ?jamJadwal ?ruanganJadwal
            WHERE {
                ?dosen al:nip ?nip ;
                    al:namaDosen ?namaDosen ;
                    al:statusKeaktifanDosen ?statusKeaktifanDosen ;
                    al:unitKerjaDosen ?unitKerjaDosen ;
                    d:membimbing ?prs .
                ?prs d:namaKegiatan ?namaKegiatan.
                ?jdwl d:hariJadwal ?hariJadwal.
                ?nilai ad:ipkMahasiswa ?ipkMahasiswa.
        ";

        if ($search == "prestasi") {
            $query .= "}";
        } else {
            $query .= " 
                FILTER (
                    regex(str(?nip), '$search', 'i') ||
                    regex(str(?namaDosen), '$search', 'i') ||
                    regex(str(?statusKeaktifanDosen), '$search', 'i') ||
                    regex(str(?unitKerjaDosen), '$search', 'i') ||
                    regex(str(?namaKegiatan), '$search', 'i')
                )}
            ";
        }

        $result = sparql_query($query);

        $data = [];
        while ( $row = sparql_fetch_array($result) ) {
            $data[] = [
                'nip' => $row['nip'],
                'namaDosen' => $row['namaDosen'],
                'statusKeaktifanDosen' =>$row['statusKeaktifanDosen'],
                'unitKerjaDosen' => $row['unitKerjaDosen'],
                'namaKegiatan' => $row['namaKegiatan']
            ];
        }

        return $data;
    }

    public function getDosenOrganisasi($search = null) {
        $prefix = $this->getPrefix();
        $query = $prefix . "
            SELECT ?nip ?namaDosen ?statusKeaktifanDosen ?unitKerjaDosen ?namaMahasiswa ?namaMatkul ?namaKegiatan ?namaOrganisasi ?hariJadwal ?statusKemahasiswaan ?ipkMahasiswa ?nim ?semester ?kodeMatkul ?bobotSKS ?kategori ?pencapaian ?tingkatan ?tahun ?jamJadwal ?ruanganJadwal
            WHERE {
                ?dosen al:nip ?nip ;
                    al:namaDosen ?namaDosen ;
                    al:statusKeaktifanDosen ?statusKeaktifanDosen ;
                    al:unitKerjaDosen ?unitKerjaDosen ;
                    d:membina ?org .
                ?org d:namaOrganisasi ?namaOrganisasi.
        ";

        if ($search == "organisasi") {
            $query .= "}";
        } else {
            $query .= " 
                FILTER (
                    regex(str(?nip), '$search', 'i') ||
                    regex(str(?namaDosen), '$search', 'i') ||
                    regex(str(?statusKeaktifanDosen), '$search', 'i') ||
                    regex(str(?unitKerjaDosen), '$search', 'i') ||
                    regex(str(?namaOrganisasi), '$search', 'i')
                )}
            ";
        }

        $result = sparql_query($query);

        $data = [];
        while ( $row = sparql_fetch_array($result) ) {
            $data[] = [
                'nip' => $row['nip'],
                'namaDosen' => $row['namaDosen'],
                'statusKeaktifanDosen' =>$row['statusKeaktifanDosen'],
                'unitKerjaDosen' => $row['unitKerjaDosen'],
                'namaOrganisasi' => $row['namaOrganisasi']
            ];
        }

        return $data;
    }

    public function getDosenJadwal($search = null) {
        $prefix = $this->getPrefix();
        $query = $prefix . "
            SELECT ?nip ?namaDosen ?statusKeaktifanDosen ?unitKerjaDosen ?namaMahasiswa ?namaMatkul ?namaKegiatan ?hariJadwal ?statusKemahasiswaan ?ipkMahasiswa ?nim ?semester ?kodeMatkul ?bobotSKS ?kategori ?pencapaian ?tingkatan ?tahun ?jamJadwal ?ruanganJadwal
            WHERE {
                ?dosen al:nip ?nip ;
                    al:namaDosen ?namaDosen ;
                    al:statusKeaktifanDosen ?statusKeaktifanDosen ;
                    al:unitKerjaDosen ?unitKerjaDosen ;
                    al:menghadiri ?jdwl .
                ?jdwl d:hariJadwal ?hariJadwal.
                ?nilai ad:ipkMahasiswa ?ipkMahasiswa.
        ";

        if ($search == "jadwal") {
            $query .= "}";
        } else {
            $query .= " 
                FILTER (
                    regex(str(?nip), '$search', 'i') ||
                    regex(str(?namaDosen), '$search', 'i') ||
                    regex(str(?statusKeaktifanDosen), '$search', 'i') ||
                    regex(str(?unitKerjaDosen), '$search', 'i') ||
                    regex(str(?hariJadwal), '$search', 'i')
                )}
            ";
        }

        $result = sparql_query($query);

        $data = [];
        while ( $row = sparql_fetch_array($result) ) {
            $data[] = [
                'nip' => $row['nip'],
                'namaDosen' => $row['namaDosen'],
                'statusKeaktifanDosen' =>$row['statusKeaktifanDosen'],
                'unitKerjaDosen' => $row['unitKerjaDosen'],
                'hariJadwal' => $row['hariJadwal']
            ];
        }

        return $data;
    }

    public function getDosenNilai($search = null) {
        $prefix = $this->getPrefix();
        $query = $prefix . "
            SELECT ?nip ?namaDosen ?statusKeaktifanDosen ?unitKerjaDosen ?namaMahasiswa ?namaMatkul ?namaKegiatan ?hariJadwal ?statusKemahasiswaan ?ipkMahasiswa ?nim ?semester ?kodeMatkul ?bobotSKS ?kategori ?pencapaian ?tingkatan ?tahun ?jamJadwal ?ruanganJadwal
            WHERE {
                ?dosen al:nip ?nip ;
                    al:namaDosen ?namaDosen ;
                    al:statusKeaktifanDosen ?statusKeaktifanDosen ;
                    al:unitKerjaDosen ?unitKerjaDosen ;
                    d:mengisi ?nilai .
                ?nilai ad:ipkMahasiswa ?ipkMahasiswa.
        ";

        if ($search == "nilai") {
            $query .= "}";
        } else {
            $query .= " 
                FILTER (
                    regex(str(?nip), '$search', 'i') ||
                    regex(str(?namaDosen), '$search', 'i') ||
                    regex(str(?statusKeaktifanDosen), '$search', 'i') ||
                    regex(str(?unitKerjaDosen), '$search', 'i') ||
                    regex(str(?ipkMahasiswa), '$search', 'i')
                )}
            ";
        }

        $result = sparql_query($query);

        $data = [];
        while ( $row = sparql_fetch_array($result) ) {
            $data[] = [
                'nip' => $row['nip'],
                'namaDosen' => $row['namaDosen'],
                'statusKeaktifanDosen' =>$row['statusKeaktifanDosen'],
                'unitKerjaDosen' => $row['unitKerjaDosen'],
                'ipkMahasiswa' => $row['ipkMahasiswa'],
            ];
        }

        return $data;
    }

}