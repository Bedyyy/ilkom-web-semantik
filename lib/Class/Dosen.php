<?php
require_once "WebProdiIlkom.php";

class Dosen extends WebProdiIlkom {
    // Fungsi untuk mendapatkan semua data dosen
    /* function getDataDosen($action = null) {
        $query = "
        PREFIX all:<http://www.semanticweb.org/aditf/ontologies/2024/4/main-ontology-jejaring-semantik#>
        PREFIX d:<http://www.semanticweb.org/mak/ontologies/2024/4/jartik#>
        PREFIX k:<http://www.semanticweb.org/kenneth/ontologies/2024/4/mahasiswa#>
        PREFIX c:<http://www.semanticweb.org/crims/ontologies/2024/4/nilaijartik#>
            SELECT ?nip ?namaDosen ?statusKeaktifanDosen ?unitKerjaDosen ?namaMahasiswa ?namaMatkul ?namaKegiatan ?namaOrganisasi ?hariJadwal ?statusKemahasiswaan ?ipkMahasiswa ?nim ?semester ?kodeMatkul ?bobotSKS ?kategori ?pencapaian ?tingkatan ?tahun ?jamJadwal ?ruanganJadwal
            WHERE {
                ?dosen d:nip ?nip ;
                    d:namaDosen ?namaDosen ;
                    d:statusKeaktifanDosen ?statusKeaktifanDosen ;
                    d:unitKerjaDosen ?unitKerjaDosen ;
                    d:mengajar ?mhs ;
                    d:mengampu ?mk ;
                    all:membimbing ?prs ;
                    all:membina ?org ;
                    d:menghadiri ?jdwl ;
                    all:mengisi ?nilai .
                ?mhs k:namaMahasiswa ?namaMahasiswa;
                    k:nim ?nim;
                    k:statusKemahasiswaan ?statusKemahasiswaan;
                    k:semester ?semester.
                ?mk all:namaMatkul ?namaMatkul;
                    all:kodeMatkul ?kodeMatkul;
                    all:bobotSKS ?bobotSKS.
                ?prs all:namaKegiatan ?namaKegiatan.
                ?org all:namaOrganisasi ?namaOrganisasi.
                ?jdwl all:hariJadwal ?hariJadwal.
                ?nilai c:ipkMahasiswa ?ipkMahasiswa.
                FILTER (
                    regex(str(?nip), '$action', 'i') ||
                    regex(str(?namaDosen), '$action', 'i') ||
                    regex(str(?statusKeaktifanDosen), '$action', 'i') ||
                    regex(str(?unitKerjaDosen), '$action', 'i') ||
                    regex(str(?namaMahasiswa), '$action', 'i') ||
                    regex(str(?nim), '$action', 'i') ||
                    regex(str(?statusKemahasiwaan), '$action', 'i') ||
                    regex(str(?namaMatkul), '$action', 'i') ||
                    regex(str(?kodeMatkul), '$action', 'i') ||
                    regex(str(?bobotSKS), '$action', 'i') 
                    regex(str(?namaKegiatan), '$action', 'i') ||
                    regex(str(?namaOrganisasi), '$action', 'i') ||
                    regex(str(?hariJadwal), '$action', 'i') ||
                    regex(str(?ipkMahasiswa), '$action', 'i') ||
                    regex(str(?semester), '$action', 'i') ||
                )
            }
        ";

        $result = sparql_query($query);

        $data = [];
        while ( $row = sparql_fetch_array($result) ) {
            $data[] = [
                'nip' => $row->nip->getValue(),
                'namaDosen' => $row->namaDosen->getValue(),
                'statusKeaktifanDosen' =>$row->statusKeaktifanDosen->getValue(),
                'unitKerjaDosen' => $row->unitKerjaDosen->getValue(),
                'namaMahasiswa' => $row->namaMahasiswa->getValue(),
                'nim' => $row->nim->getValue(),
                'statusKemahasiswaan' => $row->statusKemahasiswaan->getValue(),
                'semester' => $row->semester->getValue(),
                'namaMatkul' => $row->namaMatkul->getValue(),
                'kodeMatkul' => $row->kodeMatkul->getValue(),
                'bobotSKS' => $row->bobotSKS->getValue(),
                'namaKegiatan' => $row->namaKegiatan->getValue(),
                'hariJadwal' => $row->hariJadwal->getValue(),
                'ipkMahasiswa' => $row->ipkMahasiswa->getValue(),
            ];
        }

        return $data;
    } */

    public function __construct()
    {
        parent::__construct();
    }

    function getAllDosen($action = null) {
        $query = "
        PREFIX all:<http://www.semanticweb.org/aditf/ontologies/2024/4/main-ontology-jejaring-semantik#>
        PREFIX d:<http://www.semanticweb.org/mak/ontologies/2024/4/jartik#>
        PREFIX k:<http://www.semanticweb.org/kenneth/ontologies/2024/4/mahasiswa#>
        PREFIX c:<http://www.semanticweb.org/crims/ontologies/2024/4/nilaijartik#>
            SELECT ?nip ?namaDosen ?statusKeaktifanDosen ?unitKerjaDosen
            WHERE {
                ?dosen d:nip ?nip ;
                    d:namaDosen ?namaDosen ;
                    d:statusKeaktifanDosen ?statusKeaktifanDosen ;
                    d:unitKerjaDosen ?unitKerjaDosen .
        ";

        if ($action == "dosen") {
            $query .= "}";
        } else {
            $query .= " 
                FILTER (
                    regex(str(?nip), '$action', 'i') ||
                    regex(str(?namaDosen), '$action', 'i') ||
                    regex(str(?statusKeaktifanDosen), '$action', 'i') ||
                    regex(str(?unitKerjaDosen), '$action', 'i')
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

    function getDosenMahasiswa($action = null) {
        $query = "
        PREFIX all:<http://www.semanticweb.org/aditf/ontologies/2024/4/main-ontology-jejaring-semantik#>
        PREFIX d:<http://www.semanticweb.org/mak/ontologies/2024/4/jartik#>
        PREFIX k:<http://www.semanticweb.org/kenneth/ontologies/2024/4/mahasiswa#>
        PREFIX c:<http://www.semanticweb.org/crims/ontologies/2024/4/nilaijartik#>
            SELECT ?nip ?namaDosen ?statusKeaktifanDosen ?unitKerjaDosen ?namaMahasiswa ?nim ?statusKemahasiswaan ?semester 
            WHERE {
                ?dosen d:nip ?nip ;
                    d:namaDosen ?namaDosen ;
                    d:statusKeaktifanDosen ?statusKeaktifanDosen ;
                    d:unitKerjaDosen ?unitKerjaDosen ;
                    d:mengajar ?mhs .
                ?mhs k:namaMahasiswa ?namaMahasiswa;
                    k:nim ?nim;
                    k:statusKemahasiswaan ?statusKemahasiswaan;
                    k:semester ?semester.
        ";

        if ($action == "mahasiswa") {
            $query .= "}";
        } else {
            $query .= " 
                FILTER (
                    regex(str(?nip), '$action', 'i') ||
                    regex(str(?namaDosen), '$action', 'i') ||
                    regex(str(?statusKeaktifanDosen), '$action', 'i') ||
                    regex(str(?unitKerjaDosen), '$action', 'i') ||
                    regex(str(?namaMahasiswa), '$action', 'i') ||
                    regex(str(?nim), '$action', 'i') ||
                    regex(str(?statusKemahasiwaan), '$action', 'i') ||
                    regex(str(?semester), '$action', 'i')
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

    function getDosenMatakuliah($action = null) {
        $query = "
        PREFIX all:<http://www.semanticweb.org/aditf/ontologies/2024/4/main-ontology-jejaring-semantik#>
        PREFIX d:<http://www.semanticweb.org/mak/ontologies/2024/4/jartik#>
        PREFIX k:<http://www.semanticweb.org/kenneth/ontologies/2024/4/mahasiswa#>
        PREFIX c:<http://www.semanticweb.org/crims/ontologies/2024/4/nilaijartik#>
            SELECT ?nip ?namaDosen ?statusKeaktifanDosen ?unitKerjaDosen ?namaMahasiswa ?namaMatkul ?namaKegiatan ?hariJadwal ?statusKemahasiswaan ?ipkMahasiswa ?nim ?semester ?kodeMatkul ?bobotSKS ?kategori ?pencapaian ?tingkatan ?tahun ?jamJadwal ?ruanganJadwal
            WHERE {
                ?dosen d:nip ?nip ;
                    d:namaDosen ?namaDosen ;
                    d:statusKeaktifanDosen ?statusKeaktifanDosen ;
                    d:unitKerjaDosen ?unitKerjaDosen ;
                    d:mengampu ?mk .
                ?mk all:namaMatkul ?namaMatkul;
                    all:kodeMatkul ?kodeMatkul;
                    all:bobotSKS ?bobotSKS.
        ";

        if ($action == "mata kuliah" || $action == "matakuliah" || $action == "matkul" || $action == "mk") {
            $query .= "}";
        } else {
            $query .= " 
                FILTER (
                    regex(str(?nip), '$action', 'i') ||
                    regex(str(?namaDosen), '$action', 'i') ||
                    regex(str(?statusKeaktifanDosen), '$action', 'i') ||
                    regex(str(?unitKerjaDosen), '$action', 'i') ||
                    regex(str(?namaMatkul), '$action', 'i') ||
                    regex(str(?kodeMatkul), '$action', 'i') ||
                    regex(str(?bobotSKS), '$action', 'i') 
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
                'namaMatkul' => $row['namaMatkul'],
                'kodeMatkul' => $row['kodeMatkul'],
                'bobotSKS' => $row['bobotSKS'],
            ];
        }

        return $data;
    }

    function getDosenPrestasi($action = null) {
        $query = "
        PREFIX all:<http://www.semanticweb.org/aditf/ontologies/2024/4/main-ontology-jejaring-semantik#>
        PREFIX d:<http://www.semanticweb.org/mak/ontologies/2024/4/jartik#>
        PREFIX k:<http://www.semanticweb.org/kenneth/ontologies/2024/4/mahasiswa#>
        PREFIX c:<http://www.semanticweb.org/crims/ontologies/2024/4/nilaijartik#>
            SELECT ?nip ?namaDosen ?statusKeaktifanDosen ?unitKerjaDosen ?namaMahasiswa ?namaMatkul ?namaKegiatan ?hariJadwal ?statusKemahasiswaan ?ipkMahasiswa ?nim ?semester ?kodeMatkul ?bobotSKS ?kategori ?pencapaian ?tingkatan ?tahun ?jamJadwal ?ruanganJadwal
            WHERE {
                ?dosen d:nip ?nip ;
                    d:namaDosen ?namaDosen ;
                    d:statusKeaktifanDosen ?statusKeaktifanDosen ;
                    d:unitKerjaDosen ?unitKerjaDosen ;
                    all:membimbing ?prs .
                ?prs all:namaKegiatan ?namaKegiatan.
                ?jdwl all:hariJadwal ?hariJadwal.
                ?nilai c:ipkMahasiswa ?ipkMahasiswa.
        ";

        if ($action == "prestasi") {
            $query .= "}";
        } else {
            $query .= " 
                FILTER (
                    regex(str(?nip), '$action', 'i') ||
                    regex(str(?namaDosen), '$action', 'i') ||
                    regex(str(?statusKeaktifanDosen), '$action', 'i') ||
                    regex(str(?unitKerjaDosen), '$action', 'i') ||
                    regex(str(?namaKegiatan), '$action', 'i')
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

    function getDosenOrganisasi($action = null) {
        $query = "
        PREFIX all:<http://www.semanticweb.org/aditf/ontologies/2024/4/main-ontology-jejaring-semantik#>
        PREFIX d:<http://www.semanticweb.org/mak/ontologies/2024/4/jartik#>
        PREFIX k:<http://www.semanticweb.org/kenneth/ontologies/2024/4/mahasiswa#>
        PREFIX c:<http://www.semanticweb.org/crims/ontologies/2024/4/nilaijartik#>
            SELECT ?nip ?namaDosen ?statusKeaktifanDosen ?unitKerjaDosen ?namaMahasiswa ?namaMatkul ?namaKegiatan ?namaOrganisasi ?hariJadwal ?statusKemahasiswaan ?ipkMahasiswa ?nim ?semester ?kodeMatkul ?bobotSKS ?kategori ?pencapaian ?tingkatan ?tahun ?jamJadwal ?ruanganJadwal
            WHERE {
                ?dosen d:nip ?nip ;
                    d:namaDosen ?namaDosen ;
                    d:statusKeaktifanDosen ?statusKeaktifanDosen ;
                    d:unitKerjaDosen ?unitKerjaDosen ;
                    all:membina ?org .
                ?org all:namaOrganisasi ?namaOrganisasi.
        ";

        if ($action == "organisasi") {
            $query .= "}";
        } else {
            $query .= " 
                FILTER (
                    regex(str(?nip), '$action', 'i') ||
                    regex(str(?namaDosen), '$action', 'i') ||
                    regex(str(?statusKeaktifanDosen), '$action', 'i') ||
                    regex(str(?unitKerjaDosen), '$action', 'i') ||
                    regex(str(?namaOrganisasi), '$action', 'i')
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

    function getDosenJadwal($action = null) {
        $query = "
        PREFIX all:<http://www.semanticweb.org/aditf/ontologies/2024/4/main-ontology-jejaring-semantik#>
        PREFIX d:<http://www.semanticweb.org/mak/ontologies/2024/4/jartik#>
        PREFIX k:<http://www.semanticweb.org/kenneth/ontologies/2024/4/mahasiswa#>
        PREFIX c:<http://www.semanticweb.org/crims/ontologies/2024/4/nilaijartik#>
            SELECT ?nip ?namaDosen ?statusKeaktifanDosen ?unitKerjaDosen ?namaMahasiswa ?namaMatkul ?namaKegiatan ?hariJadwal ?statusKemahasiswaan ?ipkMahasiswa ?nim ?semester ?kodeMatkul ?bobotSKS ?kategori ?pencapaian ?tingkatan ?tahun ?jamJadwal ?ruanganJadwal
            WHERE {
                ?dosen d:nip ?nip ;
                    d:namaDosen ?namaDosen ;
                    d:statusKeaktifanDosen ?statusKeaktifanDosen ;
                    d:unitKerjaDosen ?unitKerjaDosen ;
                    d:menghadiri ?jdwl .
                ?jdwl all:hariJadwal ?hariJadwal.
                ?nilai c:ipkMahasiswa ?ipkMahasiswa.
        ";

        if ($action == "jadwal") {
            $query .= "}";
        } else {
            $query .= " 
                FILTER (
                    regex(str(?nip), '$action', 'i') ||
                    regex(str(?namaDosen), '$action', 'i') ||
                    regex(str(?statusKeaktifanDosen), '$action', 'i') ||
                    regex(str(?unitKerjaDosen), '$action', 'i') ||
                    regex(str(?hariJadwal), '$action', 'i')
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

    function getDosenNilai($action = null) {
        $query = "
        PREFIX all:<http://www.semanticweb.org/aditf/ontologies/2024/4/main-ontology-jejaring-semantik#>
        PREFIX d:<http://www.semanticweb.org/mak/ontologies/2024/4/jartik#>
        PREFIX k:<http://www.semanticweb.org/kenneth/ontologies/2024/4/mahasiswa#>
        PREFIX c:<http://www.semanticweb.org/crims/ontologies/2024/4/nilaijartik#>
            SELECT ?nip ?namaDosen ?statusKeaktifanDosen ?unitKerjaDosen ?namaMahasiswa ?namaMatkul ?namaKegiatan ?hariJadwal ?statusKemahasiswaan ?ipkMahasiswa ?nim ?semester ?kodeMatkul ?bobotSKS ?kategori ?pencapaian ?tingkatan ?tahun ?jamJadwal ?ruanganJadwal
            WHERE {
                ?dosen d:nip ?nip ;
                    d:namaDosen ?namaDosen ;
                    d:statusKeaktifanDosen ?statusKeaktifanDosen ;
                    d:unitKerjaDosen ?unitKerjaDosen ;
                    all:mengisi ?nilai .
                ?nilai c:ipkMahasiswa ?ipkMahasiswa.
        ";

        if ($action == "nilai") {
            $query .= "}";
        } else {
            $query .= " 
                FILTER (
                    regex(str(?nip), '$action', 'i') ||
                    regex(str(?namaDosen), '$action', 'i') ||
                    regex(str(?statusKeaktifanDosen), '$action', 'i') ||
                    regex(str(?unitKerjaDosen), '$action', 'i') ||
                    regex(str(?ipkMahasiswa), '$action', 'i')
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
?>
