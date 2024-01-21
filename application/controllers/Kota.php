<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;
use Halfpastfour\PHPChartJS\Chart\Bar;

class Kota extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('KotaModel', 'kota_model');
    }

	public function index()
	{
        $cities = $this->kota_model->getAll()->get();

		$this->load->view('data_kota', compact('cities'));
	}

    public function update($id)
    {
        $post = $this->input->post();
        $validation = $this->form_validation;
        $kota_model = $this->kota_model;
        $validation->set_rules($kota_model->rules());

        if ($validation->run())
        {
            $kota_model->NamaKota = $post['NamaKota'];
            $kota_model->NamaPemimpin = $post['NamaPemimpin'];
            $kota_model->TglBerdiri = $post['TglBerdiri'];
            $kota_model->JmlPenduduk = $post['JmlPenduduk'];
            $kota_model->LuasWilayah = $post['LuasWilayah'];
            $kota_model->JenisKota = $post['JenisKota'];
            $kota_model->Keunggulan = $post['Keunggulan'];
            $kota_model->update($id);
            $this->session->set_flashdata('success', 'Data Berhasil di Update');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal di Update');
            $this->session->set_flashdata('validation', validation_errors());
        }

        return redirect('/kota', 'refresh');
    }

    public function store()
    {
        $post = $this->input->post();
        $validation = $this->form_validation;
        $kota_model = $this->kota_model;
        $validation->set_rules($kota_model->rules());

        if ($validation->run())
        {
            $kota_model->NamaKota = $post['NamaKota'];
            $kota_model->NamaPemimpin = $post['NamaPemimpin'];
            $kota_model->TglBerdiri = $post['TglBerdiri'];
            $kota_model->JmlPenduduk = $post['JmlPenduduk'];
            $kota_model->LuasWilayah = $post['LuasWilayah'];
            $kota_model->JenisKota = $post['JenisKota'];
            $kota_model->Keunggulan = $post['Keunggulan'];
            $kota_model->save();
            $this->session->set_flashdata('success', 'Data Berhasil di Simpan');
        } else {
            $this->session->set_flashdata('validation', validation_errors());
            $this->session->set_flashdata('error', 'Data Gagal di Simpan');
        }

        return redirect('/kota', 'refresh');
    }

    public function delete()
    {
        $post = $this->input->post();
        $kota_model = $this->kota_model;

        if ($kota_model->delete($post['id']))
        {
            $this->session->set_flashdata('success', 'Data Berhasil di hapus');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal di hapus');
        }

        return redirect('/kota', 'refresh');
    }

    public function export($id)
    {
        $kota_model = $this->kota_model;
        $city = $kota_model->getById($id)->first();

        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $dompdf->loadHtml($this->load->view('export_pdf', compact('city'), TRUE));
        $options->setIsRemoteEnabled(true);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        return $dompdf->stream($city->NamaKota.'.pdf');
    }

    protected function rand_color() {
        return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
    }

    public function print_statistik()
    {
        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $bar = $this->setDataStatistik();
        $options->set('isJavascriptEnabled', TRUE);
        $options->setIsRemoteEnabled(true);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->loadHtml($this->load->view('chart', compact('bar'), TRUE));
        $dompdf->render();
        return $dompdf->stream('Statistik Wilayah Kota.pdf');
    }

    protected function setDataStatistik()
    {
        $cities = $this->kota_model->getAll()->get();
        $label = array_map(function ($value) {
            return $value->NamaKota;
        }, $cities);
        $value = array_map(function ($value) {
            return $value->LuasWilayah;
        }, $cities);

        $colors = [];
        for ($i = 0;$i<=count($value); $i++)
        {
            array_push($colors, $this->rand_color());
        }

        $bar = new Bar();
        $bar->setId("kota");
        $bar->labels()->exchangeArray($label);
        $kota = $bar->createDataSet();
        $kota->setLabel("Statistik Wilayah Kota (hektar)")
        ->setBackgroundColor($colors)
        ->data()->exchangeArray($value);
        $bar->addDataSet($kota);

        return $bar;
    }

    public function statistik()
    {
        $bar = $this->setDataStatistik();
        $this->load->view('chart', compact('bar'));
    }
}
