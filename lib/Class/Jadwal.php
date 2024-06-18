<?php

require_once "WebProdiIlkom.php";

class Jadwal extends WebProdiIlkom{

    public function __construct()
    {
      parent::__construct();
    }

    public function getAllJadwal($search=null){
        $prefix = $this->getPrefix();
        $query = $prefix . "

            SELECT ?namaMatkul ?hariJadwal ?jamJadwal ?ruanganJadwal
            WHERE {
            ?jdwl d:hariJadwal ?hariJadwal;
                    d:jamJadwal ?jamJadwal;
                    d:ruanganJadwal ?ruanganJadwal;
                    d:dimiliki ?mtkl.
            ?mtkl d:namaMatkul ?namaMatkul.
            ";
        if ($search == "jadwal") {
            $query .= "}";
        } else {
            $query .= " FILTER(regex(str(?namaMatkul), '$search','i') || regex(str(?hariJadwal), '$search','i') || regex(str(?jamJadwal), '$search','i') || regex(str(?ruanganJadwal), '$search','i'))}";
        }

        $result = sparql_query($query);

        $data = [];
        while( $row = sparql_fetch_array($result) )
        {
            $data[] = [
                'namaMatkul' => $row['namaMatkul'],
                'hariJadwal' => $row['hariJadwal'],
                'jamJadwal' => $row['jamJadwal'],
                'ruanganJadwal' => $row['ruanganJadwal'],
            ];
        }

        return $data;
    }

    public function getJadwalStaff($search=null){
        $prefix = $this->getPrefix();
        $query = $prefix . "

            SELECT DISTINCT ?namaMatkul ?hariJadwal ?jamJadwal ?ruanganJadwal ?namaStaff ?statusKeaktifanStaff ?unitKerjaStaff
            WHERE {
            ?jdwl d:hariJadwal ?hariJadwal;
                    d:jamJadwal ?jamJadwal;
                    d:ruanganJadwal ?ruanganJadwal;
                    d:dimiliki ?mtkl;
                    d:disusun ?staff.
            ?mtkl d:namaMatkul ?namaMatkul.
            ?staff n:namaStaff ?namaStaff;
                    n:statusKeaktifanStaff ?statusKeaktifanStaff;
                    n:unitKerjaStaff ?unitKerjaStaff.
            ";
        if ($search == "staff") {
            $query .= "}";
        } else {
            $query .= " FILTER(regex(str(?namaMatkul), '$search','i') || regex(str(?hariJadwal), '$search','i') || regex(str(?jamJadwal), '$search','i') || regex(str(?ruanganJadwal), '$search','i') || regex(str(?namaStaff), '$search','i') || regex(str(?statusKeaktifanStaff), '$search','i') || regex(str(?unitKerjaStaff), '$search','i'))}";
        }

        $result = sparql_query($query);

        $data = [];
        while( $row = sparql_fetch_array($result) )
        {
            $data[] = [
                'namaMatkul' => $row['namaMatkul'],
                'hariJadwal' => $row['hariJadwal'],
                'jamJadwal' => $row['jamJadwal'],
                'ruanganJadwal' => $row['ruanganJadwal'],
                'namaStaff' => $row['namaStaff'],
                'statusKeaktifanStaff' => $row['statusKeaktifanStaff'],
                'unitKerjaStaff' => $row['unitKerjaStaff'],
            ];
        }

        return $data;
    }

}