<?php

require_once "WebProdiIlkom.php";

class Beasiswa extends WebProdiIlkom{

    public function __construct()
    {
      parent::__construct();
    }

    public function getAllBeasiswa($search=null){
        $prefix = $this->getPrefix();
        $query = $prefix . "

            SELECT ?namaBeasiswa ?durasiBeasiswa ?penyelenggara
            WHERE {
                ?beasiswa d:namaBeasiswa ?namaBeasiswa;
                    d:durasiBeasiswa ?durasiBeasiswa;
                    d:penyelenggara ?penyelenggara.
            ";
        if ($search == "beasiswa") {
            $query .= "}";
        } else {
            $query .= " FILTER(regex(str(?namaBeasiswa), '$search','i') || regex(str(?durasiBeasiswa), '$search','i') || regex(str(?penyelenggara), '$search','i'))}";
        }

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

    public function getBeasiswaMahasiswa($search=null){
        $prefix = $this->getPrefix();
        $query = $prefix . "

            SELECT ?namaBeasiswa ?durasiBeasiswa ?penyelenggara ?namaMahasiswa ?nim ?statusKemahasiswaan ?semester
            WHERE {
                ?beasiswa d:namaBeasiswa ?namaBeasiswa;
                    d:durasiBeasiswa ?durasiBeasiswa;
                    d:penyelenggara ?penyelenggara;
                    d:didapatkan ?mhs.
                ?mhs k:namaMahasiswa ?namaMahasiswa;
                    k:nim ?nim;
                    k:statusKemahasiswaan ?statusKemahasiswaan;
                    k:semester ?semester.
            ";
        if ($search == "beasiswa") {
            $query .= "}";
        } else {
            $query .= " FILTER(regex(str(?namaBeasiswa), '$search','i') || regex(str(?durasiBeasiswa), '$search','i') || regex(str(?penyelenggara), '$search','i') || regex(str(?namaMahasiswa), '$search','i') || regex(str(?nim), '$search','i') || regex(str(?statusKemahasiswaan), '$search','i') || regex(str(?semester), '$search','i'))}";
        }

        $result = sparql_query($query);

        $data = [];
        while( $row = sparql_fetch_array($result) )
        {
            $data[] = [
                'namaBeasiswa' => $row['namaBeasiswa'],
                'durasiBeasiswa' => $row['durasiBeasiswa'],
                'penyelenggara' => $row['penyelenggara'],
                'namaMahasiswa' => $row['namaMahasiswa'],
                'nim' => $row['nim'],
                'statusKemahasiswaan' => $row['statusKemahasiswaan'],
                'semester' => $row['semester'],
            ];
        }

        return $data;
    }
}