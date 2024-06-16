<?php

require_once "sparqllib.php";

class WebProdiIlkom{
    public $db;

    public function __construct()
    {
      $this->db  = sparql_connect("http://localhost:3030/test2");
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
        public function getMahasiswa($search = null){
        $search = explode(",",$search);
        $revSearch = array_reverse($search);
        $firstElement = array_pop($revSearch);
        if (strcasecmp($firstElement,"prestasi") == 0 or strcasecmp($firstElement,"beasiswa") == 0 or strcasecmp($firstElement,"dosen") == 0 or strcasecmp($firstElement,"organisasi") == 0 or strcasecmp($firstElement,"jadwal") == 0 ){
            $firstElement = array_shift($search);
        }else{
            $firstElement = null;
        }
        if (strcasecmp($firstElement,"dosen") == 0){
            $query = "
            PREFIX d:<http://www.semanticweb.org/aditf/ontologies/2024/4/main-ontology-jejaring-semantik#>
            PREFIX al:<http://www.semanticweb.org/mak/ontologies/2024/4/jartik#>
            PREFIX k:<http://www.semanticweb.org/kenneth/ontologies/2024/4/mahasiswa#>
            PREFIX n:<http://www.semanticweb.org/naren/ontologies/2024/4/staff#>
            PREFIX ad:<http://www.semanticweb.org/crims/ontologies/2024/4/nilaijartik#>
            PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
            PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
            PREFIX owl: <http://www.w3.org/2002/07/owl#>
            SELECT ?namaMahasiswa ?nim ?semester ?statusKemahasiswaan ?namaDosen ?nip ?statusKeaktifanDosen ?unitKerjaDosen
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
        }
        elseif ((strcasecmp($firstElement,"prestasi") == 0)){
            $query = "
            PREFIX d:<http://www.semanticweb.org/aditf/ontologies/2024/4/main-ontology-jejaring-semantik#>
            PREFIX al:<http://www.semanticweb.org/mak/ontologies/2024/4/jartik#>
            PREFIX k:<http://www.semanticweb.org/kenneth/ontologies/2024/4/mahasiswa#>
            PREFIX n:<http://www.semanticweb.org/naren/ontologies/2024/4/staff#>
            PREFIX ad:<http://www.semanticweb.org/crims/ontologies/2024/4/nilaijartik#>
            PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
            PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
            PREFIX owl: <http://www.w3.org/2002/07/owl#>
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
        }
        elseif ((strcasecmp($firstElement,"beasiswa") == 0)){
            $query = "
            PREFIX d:<http://www.semanticweb.org/aditf/ontologies/2024/4/main-ontology-jejaring-semantik#>
            PREFIX al:<http://www.semanticweb.org/mak/ontologies/2024/4/jartik#>
            PREFIX k:<http://www.semanticweb.org/kenneth/ontologies/2024/4/mahasiswa#>
            PREFIX n:<http://www.semanticweb.org/naren/ontologies/2024/4/staff#>
            PREFIX ad:<http://www.semanticweb.org/crims/ontologies/2024/4/nilaijartik#>
            PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
            PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
            PREFIX owl: <http://www.w3.org/2002/07/owl#>
            SELECT ?namaMahasiswa ?nim ?semester ?statusKemahasiswaan ?durasiBeasiswa ?namaBeasiswa ?penyelenggara
            WHERE{
            	?mahasiswa 	k:namaMahasiswa ?namaMahasiswa; 
            				k:nim ?nim;
                 			k:semester ?semester;
                   			k:statusKemahasiswaan ?statusKemahasiswaan;
             				d:mendapatkan ?beasiswa.
                ?beasiswa	d:namaBeasiswa ?namaBeasiswa;
                  			d:durasiBeasiswa ?durasiBeasiswa;
                  			d:penyelenggara ?penyelenggara;";
        }
        elseif (strcasecmp($firstElement,"jadwal") == 0){
            $query = "
            PREFIX d:<http://www.semanticweb.org/aditf/ontologies/2024/4/main-ontology-jejaring-semantik#>
            PREFIX al:<http://www.semanticweb.org/mak/ontologies/2024/4/jartik#>
            PREFIX k:<http://www.semanticweb.org/kenneth/ontologies/2024/4/mahasiswa#>
            PREFIX n:<http://www.semanticweb.org/naren/ontologies/2024/4/staff#>
            PREFIX ad:<http://www.semanticweb.org/crims/ontologies/2024/4/nilaijartik#>
            PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
            PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
            PREFIX owl: <http://www.w3.org/2002/07/owl#>
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
        }
        elseif (strcasecmp($firstElement,"organisasi") == 0){
            $query = "
            PREFIX d:<http://www.semanticweb.org/aditf/ontologies/2024/4/main-ontology-jejaring-semantik#>
            PREFIX al:<http://www.semanticweb.org/mak/ontologies/2024/4/jartik#>
            PREFIX k:<http://www.semanticweb.org/kenneth/ontologies/2024/4/mahasiswa#>
            PREFIX n:<http://www.semanticweb.org/naren/ontologies/2024/4/staff#>
            PREFIX ad:<http://www.semanticweb.org/crims/ontologies/2024/4/nilaijartik#>
            PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
            PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
            PREFIX owl: <http://www.w3.org/2002/07/owl#>
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
        }
        elseif ($firstElement == null){
            $query = "
            PREFIX d:<http://www.semanticweb.org/aditf/ontologies/2024/4/main-ontology-jejaring-semantik#>
            PREFIX al:<http://www.semanticweb.org/mak/ontologies/2024/4/jartik#>
            PREFIX k:<http://www.semanticweb.org/kenneth/ontologies/2024/4/mahasiswa#>
            PREFIX n:<http://www.semanticweb.org/naren/ontologies/2024/4/staff#>
            PREFIX ad:<http://www.semanticweb.org/crims/ontologies/2024/4/nilaijartik#>
            PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
            PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
            PREFIX owl: <http://www.w3.org/2002/07/owl#>
            SELECT ?namaMahasiswa ?nim ?semester ?statusKemahasiswaan
            WHERE{
            	?mahasiswa 	k:namaMahasiswa ?namaMahasiswa; 
            				k:nim ?nim;
                 			k:semester ?semester;
                   			k:statusKemahasiswaan ?statusKemahasiswaan;
            ";
        }
        $gate = false;
        if ($search != null){
            foreach($search as $term_search){
                if ($gate){
                    $query.="||";
                }
                else {
                    $query.="FILTER(";
                }
                $gate = True;
                $query .= "regex(str(?namaMahasiswa), '$term_search','i') || regex(str(?nim), '$term_search','i') || regex(str(?semester), '$term_search','i') || regex(str(?statusKemahasiswaan), '$term_search','i')";
            }
        }
        if ($gate){
            $query .=")";
        }
        $query .="}";
        $result = sparql_query($query);

        $data = [];
        if (strcasecmp($firstElement,"dosen") == 0){
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
        }
        elseif (strcasecmp($firstElement,"prestasi") == 0){
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
        }
        elseif (strcasecmp($firstElement,"beasiswa") == 0){
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
        }
        elseif (strcasecmp($firstElement,"jadwal") == 0){
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
                    'ruanganJadwal' => $row['ruanganJadwal']
                ];
            }
        }
        elseif (strcasecmp($firstElement,"organisasi") == 0){
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
                    'namaOrganisasi' => $row['namaOrganisasi']
                ];
            }
        }
        elseif ($firstElement == null){
            while( $row = sparql_fetch_array($result) )
            {
                $data[] = [
                    'namaMahasiswa' => $row['namaMahasiswa'],
                    'nim' => $row['nim'],
                    'semester' => $row['semester'],
                    'statusKemahasiswaan' => $row['statusKemahasiswaan']
                ];
            }
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
    'mahasiswa' => $webProdiIlkom->getMahasiswa($search),
];
echo json_encode($response, JSON_PRETTY_PRINT);
