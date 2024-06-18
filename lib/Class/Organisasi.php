<?php

require_once "WebProdiIlkom.php";

class Organisasi extends WebProdiIlkom{

    public function __construct()
    {
      parent::__construct();
    }

    public function getAllOrganisasi($search=null){
        $prefix = $this->getPrefix();
        $query = $prefix . "

            SELECT ?namaOrganisasi ?jumlahAnggota ?departemen1 ?departemen2 ?departemen3 ?departemen4
            WHERE {
                ?organisasi d:namaOrganisasi ?namaOrganisasi;
                    d:jumlahAnggota ?jumlahAnggota;
                    d:departemen1 ?departemen1;
                    d:departemen2 ?departemen2;
                    d:departemen3 ?departemen3;
                    d:departemen4 ?departemen4.
            ";
        if ($search == "organisasi") {
            $query .= "}";
        } else {
            $query .= " FILTER(regex(str(?namaOrganisasi), '$search','i') || regex(str(?jumlahAnggota), '$search','i') || regex(str(?departemen1), '$search','i') || regex(str(?departemen2), '$search','i') || regex(str(?departemen3), '$search','i') || regex(str(?departemen4), '$search','i'))}";
        }

        $result = sparql_query($query);

        $data = [];
        while( $row = sparql_fetch_array($result) )
        {
            $data[] = [
                'namaOrganisasi' => $row['namaOrganisasi'],
                'jumlahAnggota' => $row['jumlahAnggota'],
                'departemen1' => $row['departemen1'],
                'departemen2' => $row['departemen2'],
                'departemen3' => $row['departemen3'],
                'departemen4' => $row['departemen4'],
            ];
        }

        return $data;
    }

    public function getOrganisasiMahasiswa($search=null){
        $prefix = $this->getPrefix();
        $query = $prefix . "

            SELECT ?namaOrganisasi ?jumlahAnggota ?departemen1 ?departemen2 ?departemen3 ?departemen4 ?namaMahasiswa ?nim ?statusKemahasiswaan ?semester
            WHERE {
                ?organisasi d:namaOrganisasi ?namaOrganisasi;
                    d:jumlahAnggota ?jumlahAnggota;
                    d:departemen1 ?departemen1;
                    d:departemen2 ?departemen2;
                    d:departemen3 ?departemen3;
                    d:departemen4 ?departemen4;
                    d:diikuti ?mhs.
                ?mhs k:namaMahasiswa ?namaMahasiswa;
                    k:nim ?nim;
                    k:statusKemahasiswaan ?statusKemahasiswaan;
                    k:semester ?semester.
            ";
        if ($search == "organisasi") {
            $query .= "}";
        } else {
            $query .= " FILTER(regex(str(?namaOrganisasi), '$search','i') || regex(str(?jumlahAnggota), '$search','i') || regex(str(?departemen1), '$search','i') || regex(str(?departemen2), '$search','i') || regex(str(?departemen3), '$search','i') || regex(str(?departemen4), '$search','i') || regex(str(?namaMahasiswa), '$search','i') || regex(str(?nim), '$search','i') || regex(str(?statusKemahasiswaan), '$search','i') || regex(str(?semester), '$search','i'))}";
        }

        $result = sparql_query($query);

        $data = [];
        while( $row = sparql_fetch_array($result) )
        {
            $data[] = [
                'namaOrganisasi' => $row['namaOrganisasi'],
                'jumlahAnggota' => $row['jumlahAnggota'],
                'departemen1' => $row['departemen1'],
                'departemen2' => $row['departemen2'],
                'departemen3' => $row['departemen3'],
                'departemen4' => $row['departemen4'],
                'namaMahasiswa' => $row['namaMahasiswa'],
                'nim' => $row['nim'],
                'statusKemahasiswaan' => $row['statusKemahasiswaan'],
                'semester' => $row['semester'],
            ];
        }

        return $data;
    }

    public function getOrganisasiDosen($search=null){
        $prefix = $this->getPrefix();
        $query = $prefix . "

            SELECT ?namaOrganisasi ?jumlahAnggota ?departemen1 ?departemen2 ?departemen3 ?departemen4 ?namaDosen ?nip ?statusKeaktifanDosen ?unitKerjaDosen
            WHERE {
                ?organisasi d:namaOrganisasi ?namaOrganisasi;
                    d:jumlahAnggota ?jumlahAnggota;
                    d:departemen1 ?departemen1;
                    d:departemen2 ?departemen2;
                    d:departemen3 ?departemen3;
                    d:departemen4 ?departemen4;
                    d:dibina ?dosen.
                ?dosen al:namaDosen ?namaDosen;
                    al:nip ?nip;
                    al:statusKeaktifanDosen ?statusKeaktifanDosen;
                    al:unitKerjaDosen ?unitKerjaDosen.
            ";
        if ($search == "organisasi") {
            $query .= "}";
        } else {
            $query .= " FILTER(regex(str(?namaOrganisasi), '$search','i') || regex(str(?jumlahAnggota), '$search','i') || regex(str(?departemen1), '$search','i') || regex(str(?departemen2), '$search','i') || regex(str(?departemen3), '$search','i') || regex(str(?departemen4), '$search','i') || regex(str(?namaDosen), '$search','i') || regex(str(?nip), '$search','i') || regex(str(?statusKeaktifanDosen), '$search','i') || regex(str(?unitKerjaDosen), '$search','i'))}";
        }

        $result = sparql_query($query);

        $data = [];
        while( $row = sparql_fetch_array($result) )
        {
            $data[] = [
                'namaOrganisasi' => $row['namaOrganisasi'],
                'jumlahAnggota' => $row['jumlahAnggota'],
                'departemen1' => $row['departemen1'],
                'departemen2' => $row['departemen2'],
                'departemen3' => $row['departemen3'],
                'departemen4' => $row['departemen4'],
                'namaDosen' => $row['namaDosen'],
                'nip' => $row['nip'],
                'statusKeaktifanDosen' => $row['statusKeaktifanDosen'],
                'unitKerjaDosen' => $row['unitKerjaDosen'],
            ];
        }

        return $data;
    }
}