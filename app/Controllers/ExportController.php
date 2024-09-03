<?php

namespace App\Controllers;

use App\Models\Santri_model;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Cell\DataType;

class ExportController extends BaseController
{
    public function exportSantri()
    {
        $santri = new Santri_model();

        $fields = ["nama", "nis", "gender as jenis_kelamin", "tempat_lahir", "telepon", "alamat", "nama_ibu", "nik_ibu", "nama_ayah", "nik_ayah", "tanggal_masuk", "tanggal_keluar", "status_santri"];

        $statusSantri = $this->request->getGet("status_santri");
        $tanggalMasuk = $this->request->getGet("tanggal_masuk");
        $tanggalKeluar = $this->request->getGet("tanggal_keluar");
        $condition = $tanggalMasuk ? ["tanggal_masuk" => $tanggalMasuk, "status_santri" => $statusSantri] : ["tanggal_keluar" => $tanggalKeluar, "status_santri" => $statusSantri];
        // Ambil data santri berdasarkan kriteria status
        $data = $santri->getSantriExport($fields, $condition);
        // Buat objek Spreadsheet baru
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        if (!empty($data) || count($data) != 0) {
            // Ambil kunci array sebagai header kolom
            $headers = ["no", ...array_keys($data[0])];

            // Atur header kolom secara dinamis dengan iterasi huruf kolom
            $columnIndex = 'A';
            // var_dump($headers);
            // exit();
            foreach ($headers as $header) {
                $sheet->setCellValueExplicit($columnIndex . '1', ucfirst($header), DataType::TYPE_STRING);
                $sheet->getColumnDimension($columnIndex)->setAutoSize(true); // Set auto width
                $columnIndex++; // Menaikkan huruf ke kolom berikutnya (A -> B -> C, dst.)
            }

            // Isi data ke dalam spreadsheet
            $no = 1;
            $row = 2;
            foreach ($data as $rowData) {
                $columnIndex = 'A';
                $sheet->setCellValueExplicit($columnIndex . $row, (string)$no, DataType::TYPE_STRING);
                $columnIndex++;
                $no++;
                foreach ($rowData as $cellData) {
                    $sheet->setCellValueExplicit($columnIndex . $row, (string)$cellData, DataType::TYPE_STRING);
                    $columnIndex++; // Menaikkan huruf untuk kolom berikutnya di baris yang sama
                }
                $row++;
            }

            // Buat writer untuk Excel dan atur nama file
            $fileName = 'santri-' . $statusSantri . '.xlsx';

            // Atur header untuk download
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $fileName . '"');
            header('Cache-Control: max-age=0');

            // Simpan file ke output
            $writer = new Xlsx($spreadsheet);
            $writer->save('php://output');
        } else {
            // Handle jika tidak ada data
            session()->setFlashdata("status_error", true);
            session()->setFlashdata('error', 'Data santri tidak ditemukan');
            return redirect()->back();
        }
    }
}
