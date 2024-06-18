<?php

require_once "WebProdiIlkom.php";

class Nilai extends WebProdiIlkom{

    public function __construct()
    {
      parent::__construct();
    }

    public function getAllNilai($search=null){
        $prefix = $this->getPrefix();
        $query = $prefix . "

            SELECT ?ipkMahasiswa ?bobotAudit ?bobotITSec ?bobotJejaringSemantik ?bobotMachineLearning ?bobotMetFor ?bobotPKB ?bobotPMPL ?bobotSI ?nilaiAudit ?nilaiITSec ?nilaiJejaringSemantik ?nilaiMachineLearning ?nilaiMetFor ?nilaiPKB ?nilaiPMPL ?nilaiSI
            WHERE {
                ?nilai ad:ipkMahasiswa ?ipkMahasiswa;
                    ad:bobotAudit ?bobotAudit;
                    ad:bobotITSec ?bobotITSec;
                    ad:bobotJejaringSemantik ?bobotJejaringSemantik;
                    ad:bobotMachineLearning ?bobotMachineLearning;
                    ad:bobotMetFor ?bobotMetFor;
                    ad:bobotPKB ?bobotPKB;
                    ad:bobotPMPL ?bobotPMPL;
                    ad:bobotSI ?bobotSI;
                    ad:nilaiAudit ?nilaiAudit;
                    ad:nilaiITSec ?nilaiITSec;
                    ad:nilaiJejaringSemantik ?nilaiJejaringSemantik;
                    ad:nilaiMachineLearning ?nilaiMachineLearning;
                    ad:nilaiMetFor ?nilaiMetFor;
                    ad:nilaiPKB ?nilaiPKB;
                    ad:nilaiPMPL ?nilaiPMPL;
                    ad:nilaiSI ?nilaiSI;
            ";
        if ($search == "nilai") {
            $query .= "}";
        } else {
            $query .= " FILTER(regex(str(?ipkMahasiswa), '$search','i') || regex(str(?bobotAudit), '$search','i') || regex(str(?bobotITSec), '$search','i') || regex(str(?bobotJejaringSemantik), '$search','i') || regex(str(?bobotMachineLearning), '$search','i') || regex(str(?bobotMetFor), '$search','i') || regex(str(?bobotPKB), '$search','i') || regex(str(?bobotPMPL), '$search','i') || regex(str(?bobotSI), '$search','i') || regex(str(?nilaiAudit), '$search','i') || regex(str(?nilaiITSec), '$search','i') || regex(str(?nilaiJejaringSemantik), '$search','i') || regex(str(?nilaiMachineLearning), '$search','i') || regex(str(?nilaiMetFor), '$search','i') || regex(str(?nilaiPKB), '$search','i') || regex(str(?nilaiPMPL), '$search','i') || regex(str(?nilaiSI), '$search','i'))}";
        }

        $result = sparql_query($query);

        $data = [];
        while( $row = sparql_fetch_array($result) )
        {
            $data[] = [
                'ipkMahasiswa' => $row['ipkMahasiswa'],
                'bobotAudit' => $row['bobotAudit'],
                'bobotITSec' => $row['bobotITSec'],
                'bobotJejaringSemantik' => $row['bobotJejaringSemantik'],
                'bobotMachineLearning' => $row['bobotMachineLearning'],
                'bobotMetFor' => $row['bobotMetFor'],
                'bobotPKB' => $row['bobotPKB'],
                'bobotPMPL' => $row['bobotPMPL'],
                'bobotSI' => $row['bobotSI'],
                'nilaiAudit' => $row['nilaiAudit'],
                'nilaiITSec' => $row['nilaiITSec'],
                'nilaiJejaringSemantik' => $row['nilaiJejaringSemantik'],
                'nilaiMachineLearning' => $row['nilaiMachineLearning'],
                'nilaiMetFor' => $row['nilaiMetFor'],
                'nilaiPKB' => $row['nilaiPKB'],
                'nilaiPMPL' => $row['nilaiPMPL'],
                'nilaiSI' => $row['nilaiSI'],
            ];
        }

        return $data;
    }

    public function getNilaiMahasiswa($search=null){
        $prefix = $this->getPrefix();
        $query = $prefix . "

            SELECT ?ipkMahasiswa ?bobotAudit ?bobotITSec ?bobotJejaringSemantik ?bobotMachineLearning ?bobotMetFor ?bobotPKB ?bobotPMPL ?bobotSI ?nilaiAudit ?nilaiITSec ?nilaiJejaringSemantik ?nilaiMachineLearning ?nilaiMetFor ?nilaiPKB ?nilaiPMPL ?nilaiSI ?namaMahasiswa ?nim ?statusKemahasiswaan ?semester
            WHERE {
                ?nilai ad:ipkMahasiswa ?ipkMahasiswa;
                    ad:bobotAudit ?bobotAudit;
                    ad:bobotITSec ?bobotITSec;
                    ad:bobotJejaringSemantik ?bobotJejaringSemantik;
                    ad:bobotMachineLearning ?bobotMachineLearning;
                    ad:bobotMetFor ?bobotMetFor;
                    ad:bobotPKB ?bobotPKB;
                    ad:bobotPMPL ?bobotPMPL;
                    ad:bobotSI ?bobotSI;
                    ad:nilaiAudit ?nilaiAudit;
                    ad:nilaiITSec ?nilaiITSec;
                    ad:nilaiJejaringSemantik ?nilaiJejaringSemantik;
                    ad:nilaiMachineLearning ?nilaiMachineLearning;
                    ad:nilaiMetFor ?nilaiMetFor;
                    ad:nilaiPKB ?nilaiPKB;
                    ad:nilaiPMPL ?nilaiPMPL;
                    ad:nilaiSI ?nilaiSI;
                    d:didapatkan ?mhs.
                ?mhs k:namaMahasiswa ?namaMahasiswa;
                    k:nim ?nim;
                    k:statusKemahasiswaan ?statusKemahasiswaan;
                    k:semester ?semester.
            ";
        if ($search == "mahasiswa") {
            $query .= "}";
        } else {
            $query .= " FILTER(regex(str(?ipkMahasiswa), '$search','i') || regex(str(?bobotAudit), '$search','i') || regex(str(?bobotITSec), '$search','i') || regex(str(?bobotJejaringSemantik), '$search','i') || regex(str(?bobotMachineLearning), '$search','i') || regex(str(?bobotMetFor), '$search','i') || regex(str(?bobotPKB), '$search','i') || regex(str(?bobotPMPL), '$search','i') || regex(str(?bobotSI), '$search','i') || regex(str(?nilaiAudit), '$search','i') || regex(str(?nilaiITSec), '$search','i') || regex(str(?nilaiJejaringSemantik), '$search','i') || regex(str(?nilaiMachineLearning), '$search','i') || regex(str(?nilaiMetFor), '$search','i') || regex(str(?nilaiPKB), '$search','i') || regex(str(?nilaiPMPL), '$search','i') || regex(str(?nilaiSI), '$search','i') || regex(str(?namaMahasiswa), '$search','i') || regex(str(?nim), '$search','i') || regex(str(?statusKemahasiswaan), '$search','i') || regex(str(?semester), '$search','i'))}";
        }

        $result = sparql_query($query);

        $data = [];
        while( $row = sparql_fetch_array($result) )
        {
            $data[] = [
                'ipkMahasiswa' => $row['ipkMahasiswa'],
                'bobotAudit' => $row['bobotAudit'],
                'bobotITSec' => $row['bobotITSec'],
                'bobotJejaringSemantik' => $row['bobotJejaringSemantik'],
                'bobotMachineLearning' => $row['bobotMachineLearning'],
                'bobotMetFor' => $row['bobotMetFor'],
                'bobotPKB' => $row['bobotPKB'],
                'bobotPMPL' => $row['bobotPMPL'],
                'bobotSI' => $row['bobotSI'],
                'nilaiAudit' => $row['nilaiAudit'],
                'nilaiITSec' => $row['nilaiITSec'],
                'nilaiJejaringSemantik' => $row['nilaiJejaringSemantik'],
                'nilaiMachineLearning' => $row['nilaiMachineLearning'],
                'nilaiMetFor' => $row['nilaiMetFor'],
                'nilaiPKB' => $row['nilaiPKB'],
                'nilaiPMPL' => $row['nilaiPMPL'],
                'nilaiSI' => $row['nilaiSI'],
                'namaMahasiswa' => $row['namaMahasiswa'],
                'nim' => $row['nim'],
                'statusKemahasiswaan' => $row['statusKemahasiswaan'],
                'semester' => $row['semester'],
            ];
        }

        return $data;
    }

    public function getNilaiDosen($search=null){
        $prefix = $this->getPrefix();
        $query = $prefix . "

            SELECT ?ipkMahasiswa ?bobotAudit ?bobotITSec ?bobotJejaringSemantik ?bobotMachineLearning ?bobotMetFor ?bobotPKB ?bobotPMPL ?bobotSI ?nilaiAudit ?nilaiITSec ?nilaiJejaringSemantik ?nilaiMachineLearning ?nilaiMetFor ?nilaiPKB ?nilaiPMPL ?nilaiSI ?namaDosen ?nip ?statusKeaktifanDosen ?unitKerjaDosen
            WHERE {
                ?nilai ad:ipkMahasiswa ?ipkMahasiswa;
                    ad:bobotAudit ?bobotAudit;
                    ad:bobotITSec ?bobotITSec;
                    ad:bobotJejaringSemantik ?bobotJejaringSemantik;
                    ad:bobotMachineLearning ?bobotMachineLearning;
                    ad:bobotMetFor ?bobotMetFor;
                    ad:bobotPKB ?bobotPKB;
                    ad:bobotPMPL ?bobotPMPL;
                    ad:bobotSI ?bobotSI;
                    ad:nilaiAudit ?nilaiAudit;
                    ad:nilaiITSec ?nilaiITSec;
                    ad:nilaiJejaringSemantik ?nilaiJejaringSemantik;
                    ad:nilaiMachineLearning ?nilaiMachineLearning;
                    ad:nilaiMetFor ?nilaiMetFor;
                    ad:nilaiPKB ?nilaiPKB;
                    ad:nilaiPMPL ?nilaiPMPL;
                    ad:nilaiSI ?nilaiSI;
                    d:diisi ?dosen.
                ?dosen al:namaDosen ?namaDosen;
                    al:nip ?nip;
                    al:statusKeaktifanDosen ?statusKeaktifanDosen;
                    al:unitKerjaDosen ?unitKerjaDosen.
            ";
        if ($search == "dosen") {
            $query .= "}";
        } else {
            $query .= " FILTER(regex(str(?ipkMahasiswa), '$search','i') || regex(str(?bobotAudit), '$search','i') || regex(str(?bobotITSec), '$search','i') || regex(str(?bobotJejaringSemantik), '$search','i') || regex(str(?bobotMachineLearning), '$search','i') || regex(str(?bobotMetFor), '$search','i') || regex(str(?bobotPKB), '$search','i') || regex(str(?bobotPMPL), '$search','i') || regex(str(?bobotSI), '$search','i') || regex(str(?nilaiAudit), '$search','i') || regex(str(?nilaiITSec), '$search','i') || regex(str(?nilaiJejaringSemantik), '$search','i') || regex(str(?nilaiMachineLearning), '$search','i') || regex(str(?nilaiMetFor), '$search','i') || regex(str(?nilaiPKB), '$search','i') || regex(str(?nilaiPMPL), '$search','i') || regex(str(?nilaiSI), '$search','i') || regex(str(?namaDosen), '$search','i') || regex(str(?nip), '$search','i') || regex(str(?statusKeaktifanDosen), '$search','i') || regex(str(?unitKerjaDosen), '$search','i'))}";
        }

        $result = sparql_query($query);

        $data = [];
        while( $row = sparql_fetch_array($result) )
        {
            $data[] = [
                'ipkMahasiswa' => $row['ipkMahasiswa'],
                'bobotAudit' => $row['bobotAudit'],
                'bobotITSec' => $row['bobotITSec'],
                'bobotJejaringSemantik' => $row['bobotJejaringSemantik'],
                'bobotMachineLearning' => $row['bobotMachineLearning'],
                'bobotMetFor' => $row['bobotMetFor'],
                'bobotPKB' => $row['bobotPKB'],
                'bobotPMPL' => $row['bobotPMPL'],
                'bobotSI' => $row['bobotSI'],
                'nilaiAudit' => $row['nilaiAudit'],
                'nilaiITSec' => $row['nilaiITSec'],
                'nilaiJejaringSemantik' => $row['nilaiJejaringSemantik'],
                'nilaiMachineLearning' => $row['nilaiMachineLearning'],
                'nilaiMetFor' => $row['nilaiMetFor'],
                'nilaiPKB' => $row['nilaiPKB'],
                'nilaiPMPL' => $row['nilaiPMPL'],
                'nilaiSI' => $row['nilaiSI'],
                'namaDosen' => $row['namaDosen'],
                'nip' => $row['nip'],
                'statusKeaktifanDosen' => $row['statusKeaktifanDosen'],
                'unitKerjaDosen' => $row['unitKerjaDosen'],
            ];
        }

        return $data;
    }
}