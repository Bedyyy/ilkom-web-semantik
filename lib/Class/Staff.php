<?php

require_once "WebProdiIlkom.php";

class Staff extends WebProdiIlkom{

    public function __construct()
    {
      parent::__construct();
    }

    public function getAllStaff($search=null){
        $prefix = $this->getPrefix();
        $query = $prefix . "

            SELECT ?namaStaff ?statusKeaktifanStaff ?unitKerjaStaff
            WHERE {
                ?staff n:namaStaff ?namaStaff;
                    n:statusKeaktifanStaff ?statusKeaktifanStaff;
                    n:unitKerjaStaff ?unitKerjaStaff.
            ";
        if ($search == "staff") {
            $query .= "}";
        } else {
            $query .= " FILTER(regex(str(?namaStaff), '$search','i') || regex(str(?statusKeaktifanStaff), '$search','i') || regex(str(?unitKerjaStaff), '$search','i'))}";
        }

        $result = sparql_query($query);

        $data = [];
        while( $row = sparql_fetch_array($result) )
        {
            $data[] = [
                'namaStaff' => $row['namaStaff'],
                'statusKeaktifanStaff' => $row['statusKeaktifanStaff'],
                'unitKerjaStaff' => $row['unitKerjaStaff'],
            ];
        }

        return $data;
    }

    public function getStaffJadwal($search=null){
        $prefix = $this->getPrefix();
        $query = $prefix . "

            SELECT ?namaStaff ?statusKeaktifanStaff ?unitKerjaStaff ?namaMatkul ?hariJadwal ?jamJadwal ?ruanganJadwal
            WHERE {
                ?staff n:namaStaff ?namaStaff;
                    n:statusKeaktifanStaff ?statusKeaktifanStaff;
                    n:unitKerjaStaff ?unitKerjaStaff;
                    d:menyusun ?jadwal.
                ?jadwal d:dimiliki ?matkul;
                    d:hariJadwal ?hariJadwal;
                    d:jamJadwal ?jamJadwal;
                    d:ruanganJadwal ?ruanganJadwal.
                ?matkul d:namaMatkul ?namaMatkul.
            ";
        if ($search == "jadwal") {
            $query .= "}";
        } else {
            $query .= " FILTER(regex(str(?namaStaff), '$search','i') || regex(str(?statusKeaktifanStaff), '$search','i') || regex(str(?unitKerjaStaff), '$search','i') || regex(str(?namaMatkul), '$search','i') || regex(str(?hariJadwal), '$search','i') || regex(str(?jamJadwal), '$search','i') || regex(str(?ruanganJadwal), '$search','i'))}";
        }

        $result = sparql_query($query);

        $data = [];
        while( $row = sparql_fetch_array($result) )
        {
            $data[] = [
                'namaStaff' => $row['namaStaff'],
                'statusKeaktifanStaff' => $row['statusKeaktifanStaff'],
                'unitKerjaStaff' => $row['unitKerjaStaff'],
                'namaMatkul' => $row['namaMatkul'],
                'hariJadwal' => $row['hariJadwal'],
                'jamJadwal' => $row['jamJadwal'],
                'ruanganJadwal' => $row['ruanganJadwal'],
            ];
    }

    return $data;
    }
}