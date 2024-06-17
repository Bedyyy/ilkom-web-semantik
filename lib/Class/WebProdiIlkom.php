<?php

require_once "sparqllib.php";

class WebProdiIlkom{
    protected $db;

    public function __construct()
    {
      $this->db  = sparql_connect("http://localhost:3030/final");
    }

    public function getPrefix(){
        return "
            PREFIX d:<http://www.semanticweb.org/aditf/ontologies/2024/4/main-ontology-jejaring-semantik#>
            PREFIX al:<http://www.semanticweb.org/mak/ontologies/2024/4/jartik#>
            PREFIX k:<http://www.semanticweb.org/kenneth/ontologies/2024/4/mahasiswa#>
            PREFIX n:<http://www.semanticweb.org/naren/ontologies/2024/4/staff#>
            PREFIX ad:<http://www.semanticweb.org/crims/ontologies/2024/4/nilaijartik#>
            PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
            PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
            PREFIX owl: <http://www.w3.org/2002/07/owl#>
            ";
    }
}