<?php

require_once "WebProdiIlkom.php";

class MataKuliah extends WebProdiIlkom{

    public function __construct()
    {
      parent::__construct();
    }

    public function getAllMataKuliah($search=null){
        $prefix = $this->getPrefix();
        $query = $prefix . "

            SELECT ?namaMatkul ?kodeMatkul ?bobotSKS
            WHERE {
                ?matakuliah d:namaMatkul ?namaMatkul;
                    d:kodeMatkul ?kodeMatkul;
                    d:bobotSKS ?bobotSKS;
            ";
        if ($search == "matakuliah") {
            $query .= "}";
        } else {
            $query .= " FILTER(regex(str(?namaMatkul), '$search','i') || regex(str(?kodeMatkul), '$search','i') || regex(str(?bobotSKS), '$search','i'))}";
        }

        $result = sparql_query($query);

        $data = [];
        while( $row = sparql_fetch_array($result) )
        {
            $data[] = [
                'namaMatkul' => $row['namaMatkul'],
                'kodeMatkul' => $row['kodeMatkul'],
                'bobotSKS' => $row['bobotSKS'],
            ];
        }

        return $data;
    }

    public function getMataKuliahDosen($search=null){
        $prefix = $this->getPrefix();
        $query = $prefix . "

            SELECT ?namaMatkul ?kodeMatkul ?bobotSKS ?namaDosen ?nip ?statusKeaktifanDosen ?unitKerjaDosen
            WHERE {
                ?matakuliah d:namaMatkul ?namaMatkul;
                    d:kodeMatkul ?kodeMatkul;
                    d:bobotSKS ?bobotSKS;
                    d:diampu ?dosen.
                ?dosen al:namaDosen ?namaDosen;
                    al:nip ?nip;
                    al:statusKeaktifanDosen ?statusKeaktifanDosen;
                    al:unitKerjaDosen ?unitKerjaDosen.
            ";
        if ($search == "dosen") {
            $query .= "}";
        } else {
            $query .= " FILTER(regex(str(?namaMatkul), '$search','i') || regex(str(?kodeMatkul), '$search','i') || regex(str(?bobotSKS), '$search','i') || regex(str(?namaDosen), '$search','i') || regex(str(?nip), '$search','i') || regex(str(?statusKeaktifanDosen), '$search','i') || regex(str(?unitKerjaDosen), '$search','i'))}";
        }

        $result = sparql_query($query);

        $data = [];
        while( $row = sparql_fetch_array($result) )
        {
            $data[] = [
                'namaMatkul' => $row['namaMatkul'],
                'kodeMatkul' => $row['kodeMatkul'],
                'bobotSKS' => $row['bobotSKS'],
                'namaDosen' => $row['namaDosen'],
                'nip' => $row['nip'],
                'statusKeaktifanDosen' => $row['statusKeaktifanDosen'],
                'unitKerjaDosen' => $row['unitKerjaDosen'],
            ];
        }

        return $data;
    }

    public function getMataKuliahRps($search=null){
        $prefix = $this->getPrefix();
        $query = $prefix . "

            SELECT ?namaMatkul ?kodeMatkul ?bobotSKS ?kodeRPS ?tahunPembuatan ?statusRPS
            WHERE {
                ?matakuliah d:namaMatkul ?namaMatkul;
                    d:kodeMatkul ?kodeMatkul;
                    d:bobotSKS ?bobotSKS;
                    d:mempunyai ?rps.
                ?rps d:kodeRPS ?kodeRPS;
                    d:tahunPembuatan ?tahunPembuatan;
                    d:statusRPS ?statusRPS.
            ";
        if ($search == "dosen") {
            $query .= "}";
        } else {
            $query .= " FILTER(regex(str(?namaMatkul), '$search','i') || regex(str(?kodeMatkul), '$search','i') || regex(str(?bobotSKS), '$search','i') || regex(str(?kodeRPS), '$search','i') || regex(str(?tahunPembuatan), '$search','i') || regex(str(?statusRPS), '$search','i'))}";
        }

        $result = sparql_query($query);

        $data = [];
        while( $row = sparql_fetch_array($result) )
        {
            $data[] = [
                'namaMatkul' => $row['namaMatkul'],
                'kodeMatkul' => $row['kodeMatkul'],
                'bobotSKS' => $row['bobotSKS'],
                'kodeRPS' => $row['kodeRPS'],
                'tahunPembuatan' => $row['tahunPembuatan'],
                'statusRPS' => $row['statusRPS'],
            ];
        }

        return $data;
    }

    public function getMataKuliahJadwal($search=null){
        $prefix = $this->getPrefix();
        $query = $prefix . "

            SELECT ?namaMatkul ?kodeMatkul ?bobotSKS ?hariJadwal ?jamJadwal ?ruanganJadwal
            WHERE {
                ?matakuliah d:namaMatkul ?namaMatkul;
                    d:kodeMatkul ?kodeMatkul;
                    d:bobotSKS ?bobotSKS;
                    d:memiliki ?jadwal.
                ?jadwal d:hariJadwal ?hariJadwal;
                    d:jamJadwal ?jamJadwal;
                    d:ruanganJadwal ?ruanganJadwal.
            ";
        if ($search == "dosen") {
            $query .= "}";
        } else {
            $query .= " FILTER(regex(str(?namaMatkul), '$search','i') || regex(str(?kodeMatkul), '$search','i') || regex(str(?bobotSKS), '$search','i') || regex(str(?hariJadwal), '$search','i') || regex(str(?jamJadwal), '$search','i') || regex(str(?ruanganJadwal), '$search','i'))}";
        }

        $result = sparql_query($query);

        $data = [];
        while( $row = sparql_fetch_array($result) )
        {
            $data[] = [
                'namaMatkul' => $row['namaMatkul'],
                'kodeMatkul' => $row['kodeMatkul'],
                'bobotSKS' => $row['bobotSKS'],
                'hariJadwal' => $row['hariJadwal'],
                'jamJadwal' => $row['jamJadwal'],
                'ruanganJadwal' => $row['ruanganJadwal'],
            ];
        }

        return $data;
    }
}