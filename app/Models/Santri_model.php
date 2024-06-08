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
        return  $this
            ->findAll();
    }

    //santri yg belum melakukan registrasi
    public function getSantriRegistrasi()
    {
        return  $this
            ->where('status_santri', 'belum_registrasi')
            ->orderBy("id", "desc")
            ->get();
    }

    // santri yg blum registrasi ulang
    public function getSantriRegistrasiUlang()
    {
        return  $this
            ->where('status_santri', 'belum_registrasi_ulang')
            ->orderBy("id", "desc")
            ->get();
    }

    // semua santri kecuali alumni
    public function getSantriAktif()
    {
        return  $this->where('status_santri', 'aktif')
            ->orWhere('status_santri', 'belum_registrasi')
            ->orWhere('status_santri', 'belum_registrasi_ulang')
            ->orderBy("id", "desc")
            ->get();
    }
    // semua santri aktiv dan alumni
    public function getSantriAktifAlumni()
    {
        return  $this->where('status_santri', 'aktif')
            ->orWhere('status_santri', 'alumni')
            ->orderBy("id", "desc")
            ->get();
    }

    // santri alumni
    public function getSantriAlumni()
    {
        return  $this->where('status_santri', 'alumni')
            ->orderBy("id", "desc")
            ->get();
    }

    public function countSantri($status)
    {
        return $this->where('status_santri', $status)->countAllResults();
    }

    // detail santri by id
    public function getById($id)
    {
        return  $this->where("id", $id)->get()->getRow();
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
    public function updateDatas($id, $data)
    {
        return $this->update($id, $data);
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
        if (isset($data["foto_diri"]) &&  is_uploaded_file($data["foto_diri"])) {
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
        if (isset($data["foto_kk"]) && is_uploaded_file($data["foto_kk"])) {
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
        if (isset($data["foto_akte"]) &&  is_uploaded_file($data["foto_akte"])) {
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
        if (isset($data["foto_ijazah"]) && is_uploaded_file($data["foto_ijazah"])) {
            $ijazahFile = $data["foto_ijazah"];
            $nameFileFotoijazah = $data['foto_ijazah']->getRandomName();
            $data['file_ijazah'] = $nameFileFotoijazah;
            $this->storeImage(
                $id,
                $nameFileFotoijazah,
                $ijazahFile
            );
        }

        // foto skhu
        if (isset($data["foto_skhu"]) && is_uploaded_file($data["foto_skhu"])) {
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
        $pathDir = "../public/upload/santri/$id/";
        $image = "../public/upload/santri/$id/" . $this->find($id)["image"];
        $file_kk = "../public/upload/santri/$id/" . $this->find($id)["file_kk"];
        $file_akte = "../public/upload/santri/$id/" . $this->find($id)["file_akte"];
        $file_ijazah = "../public/upload/santri/$id/" . $this->find($id)["file_ijazah"];
        $file_skhu = "../public/upload/santri/$id/" . $this->find($id)["file_skhu"];
        if (file_exists($image) && file_exists($file_kk) && file_exists($file_akte) && file_exists($file_ijazah) && file_exists($file_skhu)) {
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

    public function getAlumni()
    {
        return $this->where('status_santri', 'alumni')->findAll();
    }

    public function updatedStatus($status)
    {
        $result = "";
        if ($status = "alumni") {
        }
    }

    public function countData($status)
    {
        $query = $this;
        if ($status = "aktif") {
            return $query->where('status_santri', 'aktif')->countAllResults();
        } else {
            return $query->where('status_santri', 'alumni')->countAllResults();
        }
    }

    public function getSantriAktifChart()
    {
        $data = $this->select("YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count, status_santri")
            ->orWhere('status_santri', 'belum_registrasi')
            ->orWhere('status_santri', 'belum_registrasi_ulang')
            ->groupBy('year, month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get()
            ->getResult();

        $categories = [];
        $seriesDataAktif = [];
        $seriesDataAlumni = [];
        $result_data_aktif = [];
        $result_data_alumni = [];
        foreach ($data as $entry) {
            $year = $entry->year;
            $month = $entry->month;
            $count_aktif = 0;
            $count_alumni = 0;
            if ($entry->status_santri == 'aktif') {
                $count_aktif = $entry->count;
            } elseif ($entry->status_santri == 'alumni') {
                $count_alumni = $entry->count;
            }
            // Create a date string for the first day of the month
            $dateString = sprintf('%04d-%02d-01T00:00:00.000Z', $year, $month);
            $categories[] = $dateString;
            $seriesDataAktif[] = $count_aktif;
            $seriesDataAlumni[] = $count_alumni;
            $result_data_aktif[] = (int)$count_aktif;
            $result_data_alumni[] = (int)$count_alumni;
        }
        $result = [
            'categories' => $categories,
            'data_aktif' => $result_data_aktif,
            'data_alumni' => $result_data_alumni,
            'data' => $data,
        ];
        return $result;
    }
}
