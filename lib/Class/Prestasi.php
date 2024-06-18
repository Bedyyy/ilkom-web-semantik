<?php

require_once "WebProdiIlkom.php";

class Prestasi extends WebProdiIlkom{

    public function __construct()
    {
      parent::__construct();
    }

    public function getAllPrestasi($search=null){
        $prefix = $this->getPrefix();
        $query = $prefix . "

            SELECT ?namaKegiatan ?kategori ?pencapaian ?tingkatan ?tahun
            WHERE {
                ?prestasi d:namaKegiatan ?namaKegiatan;
                    d:kategori ?kategori;
                    d:pencapaian ?pencapaian;
                    d:tingkatan ?tingkatan;
                    d:tahun ?tahun;
            ";
        if ($search == "prestasi") {
            $query .= "}";
        } else {
            $query .= " FILTER(regex(str(?namaKegiatan), '$search','i') || regex(str(?kategori), '$search','i') || regex(str(?pencapaian), '$search','i') || regex(str(?tingkatan), '$search','i') || regex(str(?tahun), '$search','i'))}";
        }

        $result = sparql_query($query);

        $data = [];
        while( $row = sparql_fetch_array($result) )
        {
            $data[] = [
                'namaKegiatan' => $row['namaKegiatan'],
                'kategori' => $row['kategori'],
                'pencapaian' => $row['pencapaian'],
                'tingkatan' => $row['tingkatan'],
                'tahun' => $row['tahun'],
            ];
        }

        return $data;
    }

    public function getPrestasiMahasiswa($search=null){
        $prefix = $this->getPrefix();
        $query = $prefix . "

            SELECT ?namaKegiatan ?kategori ?pencapaian ?tingkatan ?tahun ?namaMahasiswa ?nim ?statusKemahasiswaan ?semester
            WHERE {
                ?prestasi d:namaKegiatan ?namaKegiatan;
                    d:kategori ?kategori;
                    d:pencapaian ?pencapaian;
                    d:tingkatan ?tingkatan;
                    d:tahun ?tahun;
                    d:dimiliki ?mhs.
                ?mhs k:namaMahasiswa ?namaMahasiswa;
                    k:nim ?nim;
                    k:statusKemahasiswaan ?statusKemahasiswaan;
                    k:semester ?semester.
            ";
        if ($search == "mahasiswa") {
            $query .= "}";
        } else {
            $query .= " FILTER(regex(str(?namaKegiatan), '$search','i') || regex(str(?kategori), '$search','i') || regex(str(?pencapaian), '$search','i') || regex(str(?tingkatan), '$search','i') || regex(str(?tahun), '$search','i') || regex(str(?namaMahasiswa), '$search','i') || regex(str(?nim), '$search','i') || regex(str(?statusKemahasiswaan), '$search','i') || regex(str(?semester), '$search','i'))}";
        }

        $result = sparql_query($query);

        $data = [];
        while( $row = sparql_fetch_array($result) )
        {
            $data[] = [
                'namaKegiatan' => $row['namaKegiatan'],
                'kategori' => $row['kategori'],
                'pencapaian' => $row['pencapaian'],
                'tingkatan' => $row['tingkatan'],
                'tahun' => $row['tahun'],
                'namaMahasiswa' => $row['namaMahasiswa'],
                'nim' => $row['nim'],
                'statusKemahasiswaan' => $row['statusKemahasiswaan'],
                'semester' => $row['semester'],
            ];
        }

        return $data;
    }

    public function getPrestasiDosen($search=null){
        $prefix = $this->getPrefix();
        $query = $prefix . "

            SELECT ?namaKegiatan ?kategori ?pencapaian ?tingkatan ?tahun ?namaDosen ?nip ?statusKeaktifanDosen ?unitKerjaDosen
            WHERE {
                ?prestasi d:namaKegiatan ?namaKegiatan;
                    d:kategori ?kategori;
                    d:pencapaian ?pencapaian;
                    d:tingkatan ?tingkatan;
                    d:tahun ?tahun;
                    d:dibimbing ?dosen.
                ?dosen al:namaDosen ?namaDosen;
                    al:nip ?nip;
                    al:statusKeaktifanDosen ?statusKeaktifanDosen;
                    al:unitKerjaDosen ?unitKerjaDosen.
            ";
        if ($search == "dosen") {
            $query .= "}";
        } else {
            $query .= " FILTER(regex(str(?namaKegiatan), '$search','i') || regex(str(?kategori), '$search','i') || regex(str(?pencapaian), '$search','i') || regex(str(?tingkatan), '$search','i') || regex(str(?tahun), '$search','i') || regex(str(?namaDosen), '$search','i') || regex(str(?nip), '$search','i') || regex(str(?statusKeaktifanDosen), '$search','i') || regex(str(?unitKerjaDosen), '$search','i'))}";
        }

        $result = sparql_query($query);

        $data = [];
        while( $row = sparql_fetch_array($result) )
        {
            $data[] = [
                'namaKegiatan' => $row['namaKegiatan'],
                'kategori' => $row['kategori'],
                'pencapaian' => $row['pencapaian'],
                'tingkatan' => $row['tingkatan'],
                'tahun' => $row['tahun'],
                'namaDosen' => $row['namaDosen'],
                'nip' => $row['nip'],
                'statusKeaktifanDosen' => $row['statusKeaktifanDosen'],
                'unitKerjaDosen' => $row['unitKerjaDosen'],
            ];
        }

        return $data;
    }
}