<?php defined('BASEPATH') OR exit('No direct script access allowed');

class KotaModel extends Model
{
    protected $_table = "kota";
    public $IDKota;
    public $NamaKota;
    public $NamaPemimpin;
    public $TglBerdiri;
    public $JmlPenduduk;
    public $LuasWilayah;
    public $JenisKota;
    public $Keunggulan;
    protected $primary_key = 'IDKota';

    public function __construct()
    {
        parent::__construct();
    }

    public function rules()
    {
        return [
            [
                'field' => 'NamaKota',
                'label' => 'Nama Kota',
                'rules' => 'required|max_length[15]'
            ],
            [
                'field' => 'NamaPemimpin',
                'label' => 'Pemimpin',
                'rules' => 'required|max_length[20]'
            ],
            [
                'field' => 'TglBerdiri',
                'label' => 'Tanggal Berdiri',
                'rules' => 'required'
            ],
            [
                'field' => 'JmlPenduduk',
                'label' => 'Jumlah Penduduk',
                'rules' => 'required|numeric'
            ],
            [
                'field' => 'LuasWilayah',
                'label' => 'Luas Wilayah',
                'rules' => 'required|numeric'
            ],
            [
                'field' => 'JenisKota',
                'label' => 'Jenis Kota',
                'rules' => 'required'
            ],
            [
                'field' => 'Keunggulan',
                'label' => 'Keunggulan',
                'rules' => 'required'
            ],
        ];
    }
    
}