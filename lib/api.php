<?php

require_once "sparqllib.php";

class WebProdiIlkom{
    public $db;

    public function __construct()
    {
      $this->db  = sparql_connect("http://localhost:3030/final");
    }

    public function getRPS($search=null){
        $query = "
            PREFIX d:<http://www.semanticweb.org/aditf/ontologies/2024/4/main-ontology-jejaring-semantik#>
            PREFIX al:<http://www.semanticweb.org/mak/ontologies/2024/4/jartik#>
            PREFIX k:<http://www.semanticweb.org/kenneth/ontologies/2024/4/mahasiswa#>
            PREFIX n:<http://www.semanticweb.org/naren/ontologies/2024/4/staff#>
            PREFIX ad:<http://www.semanticweb.org/crims/ontologies/2024/4/nilaijartik#>
            PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
            PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
            PREFIX owl: <http://www.w3.org/2002/07/owl#>

            SELECT ?kodeRPS ?tahunPembuatan ?statusRPS
            WHERE {
                ?rps d:kodeRPS ?kodeRPS;
                    d:tahunPembuatan ?tahunPembuatan;
                    d:statusRPS ?statusRPS.
            FILTER(regex(str(?statusRPS), '$search','i') || regex(str(?kodeRPS), '$search','i') || regex(str(?tahunPembuatan), '$search','i'))}
            ";

        $result = sparql_query($query);

        $data = [];
        while( $row = sparql_fetch_array($result) )
        {
            $data[] = [
                'kodeRPS' => $row['kodeRPS'],
                'tahunPembuatan' => $row['tahunPembuatan'],
                'statusRPS' => $row['statusRPS'],
            ];
        }

        return $data;
    }

    public function getDosen($search=null){
        $query = "
            PREFIX d:<http://www.semanticweb.org/aditf/ontologies/2024/4/main-ontology-jejaring-semantik#>
            PREFIX al:<http://www.semanticweb.org/mak/ontologies/2024/4/jartik#>
            PREFIX k:<http://www.semanticweb.org/kenneth/ontologies/2024/4/mahasiswa#>
            PREFIX n:<http://www.semanticweb.org/naren/ontologies/2024/4/staff#>
            PREFIX ad:<http://www.semanticweb.org/crims/ontologies/2024/4/nilaijartik#>
            PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
            PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
            PREFIX owl: <http://www.w3.org/2002/07/owl#>

            SELECT ?nip ?namaDosen ?statusKeaktifanDosen ?unitKerjaDosen
            WHERE {
                ?dosen al:nip ?nip;
                    al:namaDosen ?namaDosen;
                    al:statusKeaktifanDosen ?statusKeaktifanDosen;
                    al:unitKerjaDosen ?unitKerjaDosen.
            FILTER(regex(str(?statusKeaktifanDosen), '$search','i') || regex(str(?nip), '$search','i') || regex(str(?namaDosen), '$search','i') || regex(str(?unitKerjaDosen), '$search','i'))}
            ";

        $result = sparql_query($query);

        $data = [];
        while( $row = sparql_fetch_array($result) )
        {
            $data[] = [
                'nip' => $row['nip'],
                'namaDosen' => $row['namaDosen'],
                'statusKeaktifanDosen' => $row['statusKeaktifanDosen'],
                'unitKerjaDosen' => $row['unitKerjaDosen'],
            ];
        }

        return $data;
    }

    public function getBeasiswa($search=null){
        $query = "
            PREFIX d:<http://www.semanticweb.org/aditf/ontologies/2024/4/main-ontology-jejaring-semantik#>
            PREFIX al:<http://www.semanticweb.org/mak/ontologies/2024/4/jartik#>
            PREFIX k:<http://www.semanticweb.org/kenneth/ontologies/2024/4/mahasiswa#>
            PREFIX n:<http://www.semanticweb.org/naren/ontologies/2024/4/staff#>
            PREFIX ad:<http://www.semanticweb.org/crims/ontologies/2024/4/nilaijartik#>
            PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
            PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
            PREFIX owl: <http://www.w3.org/2002/07/owl#>

            SELECT ?namaBeasiswa ?durasiBeasiswa ?penyelenggara
            WHERE {
                ?beasiswa d:namaBeasiswa ?namaBeasiswa;
                    d:durasiBeasiswa ?durasiBeasiswa;
                    d:penyelenggara ?penyelenggara.
            FILTER(regex(str(?penyelenggara), '$search','i') || regex(str(?namaBeasiswa), '$search','i') || regex(str(?durasiBeasiswa), '$search','i'))}
            ";

        $result = sparql_query($query);

        $data = [];
        while( $row = sparql_fetch_array($result) )
        {
            $data[] = [
                'namaBeasiswa' => $row['namaBeasiswa'],
                'durasiBeasiswa' => $row['durasiBeasiswa'],
                'penyelenggara' => $row['penyelenggara'],
            ];
        }

        return $data;
    }

    public function getPrestasi($search=null){
        $query = "
            PREFIX d:<http://www.semanticweb.org/aditf/ontologies/2024/4/main-ontology-jejaring-semantik#>
            PREFIX al:<http://www.semanticweb.org/mak/ontologies/2024/4/jartik#>
            PREFIX k:<http://www.semanticweb.org/kenneth/ontologies/2024/4/mahasiswa#>
            PREFIX n:<http://www.semanticweb.org/naren/ontologies/2024/4/staff#>
            PREFIX ad:<http://www.semanticweb.org/crims/ontologies/2024/4/nilaijartik#>
            PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
            PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
            PREFIX owl: <http://www.w3.org/2002/07/owl#>

            SELECT ?namaKegiatan ?tahun ?tingkatan ?pencapaian ?kategori
            WHERE {
                ?prestasi d:namaKegiatan ?namaKegiatan;
                    d:tahun ?tahun;
                    d:tingkatan ?tingkatan;
                    d:pencapaian ?pencapaian;
                    d:kategori ?kategori.
            FILTER(regex(str(?tingkatan), '$search','i') || regex(str(?namaKegiatan), '$search','i') || regex(str(?tahun), '$search','i') || regex(str(?pencapaian), '$search','i') || regex(str(?kategori), '$search','i'))}
            ";

        $result = sparql_query($query);

        $data = [];
        while( $row = sparql_fetch_array($result) )
        {
            $data[] = [
                'namaKegiatan' => $row['namaKegiatan'],
                'tahun' => $row['tahun'],
                'tingkatan' => $row['tingkatan'],
                'pencapaian' => $row['pencapaian'],
                'kategori' => $row['kategori'],
            ];
        }

        return $data;
    }
}

$search = null;
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}

$webProdiIlkom = new WebProdiIlkom();
$response = [
    'rps' => $webProdiIlkom->getRPS($search),
    'dosen' => $webProdiIlkom->getDosen($search),
    'beasiswa' => $webProdiIlkom->getBeasiswa($search),
    'prestasi' => $webProdiIlkom->getPrestasi($search),
];
echo json_encode($response);