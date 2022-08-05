<?php
namespace App\Services;

class NameFile{
    public function renameFile($imageFile){
        $value =date('YmdHis'). "-" . uniqid()."-".
        $imageFile->getClientOriginalExtension();
        return $value;
    }
}