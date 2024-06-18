<?php

require_once "WebProdiIlkom.php";

class Mahasiswa extends WebProdiIlkom{

    public function __construct()
    {
      parent::__construct();
    }

    //Mahasiswa
    public function getAllMahasiswa($search = null){
        $prefix = $this->getPrefix();
        $query = $prefix . "
            SELECT ?namaMahasiswa ?nim ?semester ?statusKemahasiswaan
            WHERE{
                ?mahasiswa 	k:namaMahasiswa ?namaMahasiswa; 
                            k:nim ?nim;
                             k:semester ?semester;
                               k:statusKemahasiswaan ?statusKemahasiswaan;
            ";
        if ($search == "mahasiswa") {
            $query .= "}";
        } else {
            $query .= " FILTER(regex(str(?namaMahasiswa), '$search','i') || regex(str(?nim), '$search','i') || regex(str(?semester), '$search','i') || regex(str(?statusKemahasiswaan), '$search','i'))}";
        }

        $result = sparql_query($query);

        $data = [];
        while( $row = sparql_fetch_array($result) )
        {
            $data[] = [
                'namaMahasiswa' => $row['namaMahasiswa'],
                'nim' => $row['nim'],
                'semester' => $row['semester'],
                'statusKemahasiswaan' => $row['statusKemahasiswaan']
            ];
        }

        return $data;
    }

    public function getMahasiswaDosen($search=null){
        $prefix = $this->getPrefix();
        $query = $prefix . "
            SELECT DISTINCT ?namaMahasiswa ?nim ?semester ?statusKemahasiswaan ?namaDosen ?nip ?statusKeaktifanDosen ?unitKerjaDosen
            WHERE{
                ?mahasiswa 	k:namaMahasiswa ?namaMahasiswa; 
                            k:nim ?nim;
                             k:semester ?semester;
                               k:statusKemahasiswaan ?statusKemahasiswaan;
                             d:diajar ?dosen.
                ?dosen		al:namaDosen ?namaDosen;
                              al:nip ?nip;
                              al:statusKeaktifanDosen	?statusKeaktifanDosen;
                              al:unitKerjaDosen ?unitKerjaDosen.
            ";
        if ($search == "dosen") {
            $query .= "}";
        } else {
            $query .= " FILTER(regex(str(?namaMahasiswa), '$search','i') || regex(str(?nim), '$search','i') || regex(str(?semester), '$search','i') || regex(str(?statusKemahasiswaan), '$search','i') || regex(str(?namaDosen), '$search','i') || regex(str(?nip), '$search','i') || regex(str(?statusKeaktifanDosen), '$search','i') || regex(str(?unitKerjaDosen), '$search','i'))}";
        }

        $result = sparql_query($query);

        $data = [];
        while( $row = sparql_fetch_array($result) )
        {
            $data[] = [
                'namaMahasiswa' => $row['namaMahasiswa'],
                'nim' => $row['nim'],
                'semester' => $row['semester'],
                'statusKemahasiswaan' => $row['statusKemahasiswaan'],
                'namaDosen' => $row['namaDosen'],
                'nip' => $row['nip'],
                'statusKeaktifanDosen' => $row['statusKeaktifanDosen'],
                'unitKerjaDosen' => $row['unitKerjaDosen']
            ];
        }

        return $data;
    }

    public function getMahasiswaPrestasi($search = null){
        $prefix = $this->getPrefix();
        $query = $prefix . "
            SELECT ?namaMahasiswa ?nim ?semester ?statusKemahasiswaan ?kategori ?namaKegiatan ?pencapaian ?tahun ?tingkatan
            WHERE{
                ?mahasiswa 	k:namaMahasiswa ?namaMahasiswa; 
                            k:nim ?nim;
                             k:semester ?semester;
                               k:statusKemahasiswaan ?statusKemahasiswaan;
                             d:memiliki ?prestasi.
                ?prestasi	d:kategori ?kategori;
                              d:namaKegiatan ?namaKegiatan;
                              d:pencapaian ?pencapaian;
                              d:tahun ?tahun;
                             d:tingkatan ?tingkatan
            ";
        if ($search == "prestasi") {
            $query .= "}";
        } else {
            $query .= " FILTER(regex(str(?namaMahasiswa), '$search','i') || regex(str(?nim), '$search','i') || regex(str(?semester), '$search','i') || regex(str(?statusKemahasiswaan), '$search','i') || regex(str(?namaKegiatan), '$search','i') || regex(str(?tahun), '$search','i') || regex(str(?tingkatan), '$search','i') || regex(str(?pencapaian), '$search','i') || regex(str(?kategori), '$search','i'))}";
        }

        $result = sparql_query($query);

        $data = [];
        while( $row = sparql_fetch_array($result) )
        {
            $data[] = [
                'namaMahasiswa' => $row['namaMahasiswa'],
                'nim' => $row['nim'],
                'semester' => $row['semester'],
                'statusKemahasiswaan' => $row['statusKemahasiswaan'],
                'kategori' => $row['kategori'],
                'namaKegiatan' => $row['namaKegiatan'],
                'pencapaian' => $row['pencapaian'],
                'tahun' => $row['tahun'],
                'tingkatan' => $row['tingkatan']
            ];
        }

        return $data;
    }

    public function getMahasiswaBeasiswa($search = null){
        $prefix = $this->getPrefix();
        $query = $prefix . "
            SELECT ?namaMahasiswa ?nim ?semester ?statusKemahasiswaan ?durasiBeasiswa ?namaBeasiswa ?penyelenggara
            WHERE{
                ?mahasiswa 	k:namaMahasiswa ?namaMahasiswa; 
                            k:nim ?nim;
                             k:semester ?semester;
                               k:statusKemahasiswaan ?statusKemahasiswaan;
                             d:mendapatkan ?beasiswa.
                ?beasiswa	d:namaBeasiswa ?namaBeasiswa;
                              d:durasiBeasiswa ?durasiBeasiswa;
                              d:penyelenggara ?penyelenggara;
            ";
        if ($search == "beasiswa") {
            $query .= "}";
        } else {
            $query .= " FILTER(regex(str(?namaMahasiswa), '$search','i') || regex(str(?nim), '$search','i') || regex(str(?semester), '$search','i') || regex(str(?statusKemahasiswaan), '$search','i') || regex(str(?namaBeasiswa), '$search','i') || regex(str(?durasiBeasiswa), '$search','i') || regex(str(?penyelenggara), '$search','i'))}";
        }

        $result = sparql_query($query);

        $data = [];
        while( $row = sparql_fetch_array($result) )
        {
            $data[] = [
                'namaMahasiswa' => $row['namaMahasiswa'],
                'nim' => $row['nim'],
                'semester' => $row['semester'],
                'statusKemahasiswaan' => $row['statusKemahasiswaan'],
                'namaBeasiswa' => $row['namaBeasiswa'],
                'durasiBeasiswa' => $row['durasiBeasiswa'],
                'penyelenggara' => $row['penyelenggara'],
            ];
        }

        return $data;
    }

    public function getMahasiswaJadwal($search = null){
        $prefix = $this->getPrefix();
        $query = $prefix . "
            SELECT ?namaMahasiswa ?nim ?semester ?statusKemahasiswaan ?namaMatkul ?hariJadwal ?jamJadwal ?ruanganJadwal
            WHERE{
                ?mahasiswa 	k:namaMahasiswa ?namaMahasiswa; 
                            k:nim ?nim;
                             k:semester ?semester;
                               k:statusKemahasiswaan ?statusKemahasiswaan;
                             al:menghadiri ?jadwal.
                ?jadwal		d:dimiliki ?matkul;
                            d:hariJadwal ?hariJadwal;
                              d:jamJadwal ?jamJadwal;
                              d:ruanganJadwal ?ruanganJadwal.
                 ?matkul		d:namaMatkul ?namaMatkul.
            ";
        if ($search == "jadwal") {
            $query .= "}";
        } else {
            $query .= " FILTER(regex(str(?namaMahasiswa), '$search','i') || regex(str(?nim), '$search','i') || regex(str(?semester), '$search','i') || regex(str(?statusKemahasiswaan), '$search','i') || regex(str(?namaMatkul), '$search','i') || regex(str(?hariJadwal), '$search','i') || regex(str(?jamJadwal), '$search','i') || regex(str(?ruanganJadwal), '$search','i'))}";
        }

        $result = sparql_query($query);

        $data = [];
        while( $row = sparql_fetch_array($result) )
        {
            $data[] = [
                'namaMahasiswa' => $row['namaMahasiswa'],
                'nim' => $row['nim'],
                'semester' => $row['semester'],
                'statusKemahasiswaan' => $row['statusKemahasiswaan'],
                'namaMatkul' => $row['namaMatkul'],
                'hariJadwal' => $row['hariJadwal'],
                'jamJadwal' => $row['jamJadwal'],
                'ruanganJadwal' => $row['ruanganJadwal'],
            ];
        }

        return $data;
    }

    public function getMahasiswaOrganisasi($search = null){
        $prefix = $this->getPrefix();
        $query = $prefix . "
            SELECT ?namaMahasiswa ?nim ?semester ?statusKemahasiswaan ?departemen1 ?departemen2 ?departemen3 ?departemen4 ?jumlahAnggota ?namaOrganisasi
            WHERE{
                ?mahasiswa 	k:namaMahasiswa ?namaMahasiswa; 
                            k:nim ?nim;
                             k:semester ?semester;
                               k:statusKemahasiswaan ?statusKemahasiswaan;
                             d:mengikuti ?organisasi.
                ?organisasi	d:departemen1 ?departemen1;
                            d:departemen2 ?departemen2;
                              d:departemen3 ?departemen3;
                              d:departemen4 ?departemen4;
                             d:jumlahAnggota ?jumlahAnggota;
                               d:namaOrganisasi ?namaOrganisasi.
            ";
        if ($search == "organisasi") {
            $query .= "}";
        } else {
            $query .= " FILTER(regex(str(?namaMahasiswa), '$search','i') || regex(str(?nim), '$search','i') || regex(str(?semester), '$search','i') || regex(str(?statusKemahasiswaan), '$search','i') || regex(str(?departemen1), '$search','i') || regex(str(?departemen2), '$search','i') || regex(str(?departemen3), '$search','i') || regex(str(?departemen4), '$search','i') || regex(str(?jumlahAnggota), '$search','i') || regex(str(?namaOrganisasi), '$search','i'))}";
        }

        $result = sparql_query($query);

        $data = [];
        while( $row = sparql_fetch_array($result) )
        {
            $data[] = [
                'namaMahasiswa' => $row['namaMahasiswa'],
                'nim' => $row['nim'],
                'semester' => $row['semester'],
                'statusKemahasiswaan' => $row['statusKemahasiswaan'],
                'departemen1' => $row['departemen1'],
                'departemen2' => $row['departemen2'],
                'departemen3' => $row['departemen3'],
                'departemen4' => $row['departemen4'],
                'jumlahAnggota' => $row['jumlahAnggota'],
                'namaOrganisasi' => $row['namaOrganisasi'],
            ];
        }

        return $data;
    }
}