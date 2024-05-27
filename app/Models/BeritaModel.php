<?php

namespace App\Models;

use CodeIgniter\Model;

use function PHPUnit\Framework\fileExists;

class BeritaModel extends Model
{
	protected $table = "berita_acara";
	protected $primaryKey = "id";
	protected $useAutoIncrement = true;
	protected $allowedFields = ["judul", "keterangan", "kategori_id", "image"];


	public function rulesInsert()
	{
		return [
			'judul' => 'required',
			'kategori' => 'required',
			'keterangan' => 'required',
			'gambar' => [
				'rules' => 'max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png,image/gif]',
				'errors' => [
					'required' => 'Gambar harus diisi.',
					'max_size' => 'Ukuran gambar maksimal 2MB.',
					'is_image' => 'File yang diunggah harus berupa gambar.',
					'mime_in' => 'Format gambar yang diizinkan adalah JPG, JPEG, PNG, dan GIF.'
				]
			],
		];
	}

	public function rulesUpdate()
	{
		return [
			'judul' => 'required',
			'kategori' => 'required',
			'keterangan' => 'required',
			// 'gambar' => [
			// 	'rules' => 'max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png,image/gif]',
			// 	'errors' => [
			// 		'max_size' => 'Ukuran gambar maksimal 2MB.',
			// 		'is_image' => 'File yang diunggah harus berupa gambar.',
			// 		'mime_in' => 'Format gambar yang diizinkan adalah JPG, JPEG, PNG, dan GIF.'
			// 	]
			// ],
		];
	}


	public function getAll()
	{
		return  $this->select("berita_acara.id,ketegori_berita.nama as kategori , judul,keterangan,image")
			->join("ketegori_berita", "berita_acara.kategori_id = ketegori_berita.id", "array")
			->orderBy("id", "desc")->findAll();
	}
	public function getById($id)
	{
		return  $this->where("id", $id)->first();
	}

	public function store($data)
	{
		$data["kategori_id"] = $data["kategori"];
		$nameFile = $data["gambar"]->getRandomName();
		$data["image"] = $nameFile;
		$imageFile  = $data["gambar"];
		unset($data["kategori"]);
		unset($data["gambar"]);
		try {
			$id = $this->insert($data);
			$this->storeImage($id, $nameFile, $imageFile);
			return true;
		} catch (\Throwable $th) {

			return false;
		}
	}
	public function updateData($id, $data)
	{
		$data["kategori_id"] = $data["kategori"];
		if ($data["gambar"]) {
			$pathDir = "../public/upload/$id/";
			$pathFile = "../public/upload/$id/" . $this->find($id)["image"];
			if (file_exists($pathFile)) {
				unlink($pathDir . "index.html");
				unlink($pathFile);
				rmdir($pathDir);
			}
			$nameFile = $data["gambar"]->getRandomName();
			$data["image"] = $nameFile;
			$this->storeImage($id, $nameFile, $data["gambar"]);
		}
		unset($data["kategori"]);
		unset($data["gambar"]);

		try {
			return  $this->update($id, $data);
			return true;
		} catch (\Throwable $th) {
			return false;
		}
	}

	public function deleteData($id)
	{
		$pathDir = "../public/upload/$id/";
		$pathFile = "../public/upload/$id/" . $this->find($id)["image"];
		if (file_exists($pathFile)) {
			unlink($pathFile);
			unlink($pathDir . "index.html");
			rmdir($pathDir);
		}
		return  $this->delete($id);
	}

	public function storeImage($id, $name, $image)
	{
		$image->move("../public/upload/$id/", $name);
	}
}
