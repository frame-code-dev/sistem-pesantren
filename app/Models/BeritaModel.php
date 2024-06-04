<?php

namespace App\Models;

use CodeIgniter\Model;

use function PHPUnit\Framework\fileExists;

class BeritaModel extends Model
{
	protected $table = "berita_acara";
	protected $primaryKey = "id";
	protected $useAutoIncrement = true;
	protected $allowedFields = ["judul", "keterangan", "kategori_id", "image", "user_id", "slug", "content"];


	public function rulesInsert()
	{
		return [
			'judul' => 'required',
			'kategori' => 'required',
			'keterangan' => 'required',
			'content' => 'required',
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
			'content' => 'required',

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


	public function getAll($limit = 0)
	{
		return  $this->select("berita_acara.id,ketegori_berita.nama as kategori ,users.id as id_user, users.username, 
							berita_acara.judul,	berita_acara.keterangan, berita_acara.content, berita_acara.image, berita_acara.slug, 
							berita_acara.created_at")
			->join("ketegori_berita", "berita_acara.kategori_id = ketegori_berita.id", "array")
			->join("users", "berita_acara.user_id = users.id", "array")
			->limit($limit)
			->orderBy("id", "desc")->findAll();
	}
	public function all($limit = 0, $search = null)
	{
		$this->builder()
			->select("berita_acara.id,ketegori_berita.nama as kategori ,users.id as id_user, users.username, 
					berita_acara.judul,berita_acara.keterangan,berita_acara.content,berita_acara.image,berita_acara.slug,
					berita_acara.created_at")
			->join("ketegori_berita", "berita_acara.kategori_id = ketegori_berita.id", "array")
			->join("users", "berita_acara.user_id = users.id", "array")
			->limit($limit)
			->orderBy("id", "desc");
		if ($search != "" || $search != null) {
			$this->like("berita_acara.judul", $search)
				->orLike('keterangan', $search)
				->orLike('ketegori_berita.nama', $search);
		}
		return [
			'berita'  => $this->paginate($limit),
			'pager' => $this->pager,
		];
	}

	public function getBySlug($slug)
	{
		return  $this->select("berita_acara.id,ketegori_berita.nama as kategori ,users.id as id_user, users.username, judul,keterangan,content,image,slug,berita_acara.created_at")
			->join("ketegori_berita", "berita_acara.kategori_id = ketegori_berita.id", "array")
			->join("users", "berita_acara.user_id = users.id", "array")
			->where('slug', $slug)
			->first();
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
		if (is_uploaded_file($data["gambar"])) {
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


	public function generateSlug($title)
	{
		$slug = str_replace(" ", "-", $title);
		$count = $this->where("slug", $slug)->countAllResults();
		if ($count > 0) {
			$slug = "$slug-" . ($count + 1);
			return $this->generateSlug($slug);
		}
		return $slug;
	}
}
