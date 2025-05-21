<?php

class Mahasiswa_model{
    private $mhs =[
        [
        "nama" => "Mikael",
        "nrp" => "235314036",
        "email" => "mikael@gmail.com",
        "jurusan" => "Informatika"
        ],
        [
        "nama" => "Yin",
        "nrp" => "235314037",
        "email" => "yin@gmail.com",
        "jurusan" => "Elektro"
        ],
        [
        "nama" => "Mike",
        "nrp" => "235314038",
        "email" => "mike@gmail.com",
        "jurusan" => "Mesin"
        ],
];


public function getAllMahasiswa(){
    return $this->mhs;
}
}