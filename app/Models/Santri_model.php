<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class Santri_model extends Model
{
    protected $table = 'santri';
    protected $primaryKey = "id";
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'nis',
        'nama',
        'image',
        'gender',
        'nisn',
        'nik_santri',
        'no_kk',
        'tempat_lahir',
        'nama_ibu',
        'nik_ibu',
        'nama_ayah',
        'nik_ayah',
        'file_kk',
        'file_akte',
        'file_ijazah',
        'file_skhu',
        'motto',
        'telepon',
        'tanggal_lahir', 
        'alamat',
        'status_santri',
        'tanggal_masuk', 
        'tanggal_keluar', 
        'created_at',
        'updated_at'
    ];


    public function rules()
    {
        return [
            'nama' => 'required',
            'nisn' => 'required',
            'nik_santri' => 'required',
            'no_kk' => 'required',
            'tempat_lahir' => 'required',
            'nis' => 'required|min_length[10]|max_length[10]',
            'gender' => 'required',
            'telepon' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'tanggal_masuk' => 'required',
        ];
    }
    public function rulesAlumni()
    {
        return [
            'santri' => 'required',
            'tanggal_keluar' => 'required',
            'motto' => 'required',
        ];
    }

    // semua santri
    public function getAll()
    {
        return  $this->findAll();
    }

    //santri yg belum melakukan registrasi
    public function getSantriRegistrasi()
    {
        return  $this->where('status_santri', 'belum_registrasi')->get();
    }

    // santri yg blum registrasi ulang
    public function getSantriRegistrasiUlang()
    {
        return  $this->where('status_santri', 'belum_registrasi_ulang')->get();
    }

    // semua santri kecuali alumni
    public function getSantriAktif()
    {
        return  $this->where('status_santri', 'aktif')->orWhere('status_santri', 'belum_registrasi')->orWhere('status_santri', 'belum_registrasi_ulang')->get();
    }
    // semua santri aktiv dan alumni
    public function getSantriAktifAlumni()
    {
        return  $this->where('status_santri', 'aktif')->orWhere('status_santri', 'alumni')->get();
    }

    // santri alumni
    public function getSantriAlumni()
    {
        return  $this->where('status_santri', 'alumni')->get();
    }

    public function countSantri($status)
    {
        return $this->where('status_santri', $status)->countAllResults();
    }

    // detail santri by id
    public function getById($id)
    {
        return  $this->where("id", $id)->first();
    }

    // detail santri by nis
    public function getByNis($nis)
    {
        return  $this->where("nis", $nis)->first();
    }

    // get santri by nis update
    public function getByNisUpdate($id, $nis)
    {
        return  $this->where('id !=', $id)->where("nis", $nis)->first();
    }

    // update status santri
    public function updateStatus($id, $status)
    {
        return $this->where('id', $id)->update([
            'status_santri' => $status
        ]);
    }

    public function saveData($data)
    {
        //foto diri
        if (is_uploaded_file($data["foto_diri"])) {
            $imageFile = $data["foto_diri"];
            $nameFileFotoDiri = $data['foto_diri']->getRandomName();
            $data['image'] = $nameFileFotoDiri;
        }
        //foto kk
        if (is_uploaded_file($data["foto_kk"])) {
            $kkFile = $data["foto_kk"];
            $nameFileFotoKK = $data['foto_kk']->getRandomName();
            $data['file_kk'] = $nameFileFotoKK;
        }
        //foto akte
        if (is_uploaded_file($data["foto_akte"])) {
            $akteFile = $data["foto_akte"];
            $nameFileFotoakte = $data['foto_akte']->getRandomName();
            $data['file_akte'] = $nameFileFotoakte;
        }
        //foto ijazah
        if (is_uploaded_file($data["foto_ijazah"])) {
            $ijazahFile = $data["foto_ijazah"];
            $nameFileFotoijazah = $data['foto_ijazah']->getRandomName();
            $data['file_ijazah'] = $nameFileFotoijazah;
        }
        // foto skhu
        if (is_uploaded_file($data["foto_skhu"])) {
            $skhuFile = $data["foto_skhu"];
            $nameFileFotoskhu = $data['foto_skhu']->getRandomName();
            $data['file_skhu'] = $nameFileFotoskhu;
        }
        // insert
        $id = $this->insert($data);

        //foto diri
        if (is_uploaded_file($data["foto_diri"])) {
            $this->storeImage($id, $nameFileFotoDiri, $imageFile);
        }
        //foto kk
        if (is_uploaded_file($data["foto_kk"])) {
            $this->storeImage($id, $nameFileFotoKK, $kkFile);
        }
        //foto akte
        if (is_uploaded_file($data["foto_akte"])) {
            $this->storeImage($id, $nameFileFotoakte, $akteFile);
        }
        //foto akte
        if (is_uploaded_file($data["foto_ijazah"])) {
            $this->storeImage($id, $nameFileFotoijazah, $ijazahFile);
        }
        //foto skhu
        if (is_uploaded_file($data["foto_skhu"])) {
            $this->storeImage($id, $nameFileFotoskhu, $skhuFile);
        }
    }

    public function updateData($id, $data)
    {
        // update
        $this->update($id, $data);
        //foto diri
        if (isset($data["foto_diri"])) {
            $imageFile = $data["foto_diri"];
            $nameFileFotoDiri = $data['foto_diri']->getRandomName();
            $data['image'] = $nameFileFotoDiri;
            $this->storeImage(
                $id,
                $nameFileFotoDiri,
                $imageFile
            );
        }
        //foto kk
        if (isset($data["foto_kk"])) {
            $kkFile = $data["foto_kk"];
            $nameFileFotoKK = $data['foto_kk']->getRandomName();
            $data['file_kk'] = $nameFileFotoKK;
            $this->storeImage(
                $id,
                $nameFileFotoKK,
                $kkFile
            );
        }
        //foto akte
        if (isset($data["foto_akte"])) {
            $akteFile = $data["foto_akte"];
            $nameFileFotoakte = $data['foto_akte']->getRandomName();
            $data['file_akte'] = $nameFileFotoakte;
            $this->storeImage(
                $id,
                $nameFileFotoakte,
                $akteFile
            );
        }
        
        //foto ijazah
        if (isset($data["foto_ijazah"])) {
            $ijazahFile = $data["foto_ijazah"];
            $nameFileFotoijazah = $data['foto_ijazah']->getRandomName();
            $data['file_ijazah'] = $nameFileFotoijazah;
            $this->storeImage($id,
                $nameFileFotoijazah,
                $ijazahFile
            );
        }

        // foto skhu
        if (isset($data["foto_skhu"])) {
            $skhuFile = $data["foto_skhu"];
            $nameFileFotoskhu = $data['foto_skhu']->getRandomName();
            $data['file_skhu'] = $nameFileFotoskhu;
            $this->storeImage(
                $id,
                $nameFileFotoskhu,
                $skhuFile
            );
        }
    }

    public function deleteData($id)
    {
        $pathDir = "../public/upload/$id/";
        $image = "../public/upload/santri/$id/" . $this->find($id)["image"];
        $file_kk = "../public/upload/santri/$id/" . $this->find($id)["file_kk"];
        $file_akte = "../public/upload/santri/$id/" . $this->find($id)["file_akte"];
        $file_ijazah = "../public/upload/santri/$id/" . $this->find($id)["file_ijazah"];
        $file_skhu = "../public/upload/santri/$id/" . $this->find($id)["file_skhu"];
        if (file_exists($image, $file_kk, $file_akte, $file_ijazah, $file_skhu)) {
            unlink($image);
            unlink($file_kk);
            unlink($file_akte);
            unlink($file_ijazah);
            unlink($file_skhu);
            unlink($pathDir . "index.html");
            rmdir($pathDir);
        }
        return $this->delete($id);
    }

    public function storeImage($id, $name, $image)
    {
        $image->move("../public/upload/santri/$id/", $name);
    }

    public function getAlumni(){
        return $this->where('status_santri', 'alumni')->findAll();
    }
}
