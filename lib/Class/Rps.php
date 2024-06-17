<?php 

require_once "WebProdiIlkom.php";

class Rps extends WebProdiIlkom{

    public function __construct()
    {
      parent::__construct();
    }

    public function getAllRps($search=null){
        $prefix = $this->getPrefix();
        $query = $prefix . "

            SELECT ?kodeRPS ?tahunPembuatan ?statusRPS
            WHERE {
                ?rps d:kodeRPS ?kodeRPS;
                    d:tahunPembuatan ?tahunPembuatan;
                    d:statusRPS ?statusRPS.
            ";
        if ($search == "rps") {
            $query .= "}";
        } else {
            $query .= " FILTER(regex(str(?kodeRPS), '$search','i') || regex(str(?tahunPembuatan), '$search','i') || regex(str(?statusRPS), '$search','i'))}";
        }

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

    public function getRpsDosen($search=null){
        $prefix = $this->getPrefix();
        $query = $prefix . "

            SELECT ?kodeRPS ?tahunPembuatan ?statusRPS ?namaDosen ?nip ?statusKeaktifanDosen ?unitKerjaDosen
            WHERE {
                ?rps d:kodeRPS ?kodeRPS;
                    d:tahunPembuatan ?tahunPembuatan;
                    d:statusRPS ?statusRPS;
                    d:disusun ?dosen.
                ?dosen al:namaDosen ?namaDosen;
                    al:nip ?nip;
                    al:statusKeaktifanDosen ?statusKeaktifanDosen;
                    al:unitKerjaDosen ?unitKerjaDosen.
            ";
        if ($search == "dosen") {
            $query .= "}";
        } else {
            $query .= " FILTER(regex(str(?kodeRPS), '$search','i') || regex(str(?tahunPembuatan), '$search','i') || regex(str(?statusRPS), '$search','i') || regex(str(?namaDosen), '$search','i') || regex(str(?nip), '$search','i') || regex(str(?statusKeaktifanDosen), '$search','i') || regex(str(?unitKerjaDosen), '$search','i'))}";
        }

        $result = sparql_query($query);

        $data = [];
        while( $row = sparql_fetch_array($result) )
        {
            $data[] = [
                'kodeRPS' => $row['kodeRPS'],
                'tahunPembuatan' => $row['tahunPembuatan'],
                'statusRPS' => $row['statusRPS'],
                'namaDosen' => $row['namaDosen'],
                'nip' => $row['nip'],
                'statusKeaktifanDosen' => $row['statusKeaktifanDosen'],
                'unitKerjaDosen' => $row['unitKerjaDosen'],
            ];
        }

        return $data;
    }

    public function getRpsMataKuliah($search=null){
        $prefix = $this->getPrefix();
        $query = $prefix . "

            SELECT ?kodeRPS ?tahunPembuatan ?statusRPS ?namaMatkul ?kodeMatkul ?bobotSKS
            WHERE {
                ?rps d:kodeRPS ?kodeRPS;
                    d:tahunPembuatan ?tahunPembuatan;
                    d:statusRPS ?statusRPS;
                    d:dimiliki ?matkul.
                ?matkul d:namaMatkul ?namaMatkul;
                    d:kodeMatkul ?kodeMatkul;
                    d:bobotSKS ?bobotSKS;
            ";
        if ($search == "matakuliah") {
            $query .= "}";
        } else {
            $query .= " FILTER(regex(str(?kodeRPS), '$search','i') || regex(str(?tahunPembuatan), '$search','i') || regex(str(?statusRPS), '$search','i') || regex(str(?namaMatkul), '$search','i') || regex(str(?kodeMatkul), '$search','i') || regex(str(?bobotSKS), '$search','i'))}";
        }

        $result = sparql_query($query);

        $data = [];
        while( $row = sparql_fetch_array($result) )
        {
            $data[] = [
                'kodeRPS' => $row['kodeRPS'],
                'tahunPembuatan' => $row['tahunPembuatan'],
                'statusRPS' => $row['statusRPS'],
                'namaMatkul' => $row['namaMatkul'],
                'kodeMatkul' => $row['kodeMatkul'],
                'bobotSKS' => $row['bobotSKS'],
            ];
        }
        return $data;
    }
}