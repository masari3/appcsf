<?php
    function formatTgl($tgl, $tampil_hari = true){
        $nhari = array("Ahad", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");
        $nbulan = array(1=>"Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember");

        $tahun = substr($tgl, 0, 4);
        $bulan = $nbulan[(int)substr($tgl, 5, 2)];
        $tanggal = substr($tgl, 8, 2);

        $text = "";
        if($tampil_hari){
            $urutan_hari = date('w', mktime(0,0,0,substr($tgl, 5, 2), $tanggal, $tahun));
            $hari = $nhari[$urutan_hari];
            $text .= $hari.", ";
        }

        $text .= $tanggal ." ". $bulan ." ". $tahun;
        return $text;
    }
