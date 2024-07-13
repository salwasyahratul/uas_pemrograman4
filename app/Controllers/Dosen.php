<?php

namespace App\Controllers;

use App\Models\Dosen as DosenModel;

class Dosen extends BaseController
{
    protected $dosen;
    protected $rules;

    public function __construct()
    {
        $this->dosen = new DosenModel();
        $this->rules = [
            'nama_dosen'   => 'required',
            'matkul_dosen'   => 'required',
            'alamat_dosen' => 'required',
        ];
    }

    public function list()
    {
        $data = [
            'data'  => $this->dosen->paginate('20', 'dosen'),
            'title' => 'List Dosen',
            'pager' => $this->dosen->pager,
        ];

        return view('dosen/list', $data);
    }

    public function tambah()
    {
        return view('dosen/tambah');
    }

    public function simpan()
    {
        $data = $this->request->getPost();

        if (! $this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $this->dosen->save($data);

        return redirect()->route('Dosen::list')->with('message', 'Sukses tambah data');
    }

    public function edit(int $id)
    {
        $data = [
            'title' => 'Edit Dosen',
            'dosen' => $this->dosen->find($id),
        ];

        return view('dosen/edit', $data);
    }

    public function update(int $id)
    {
        $data = $this->request->getPost();

        if (! $this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $this->dosen->update($id, $data);

        return redirect()->route('Dosen::list')->with('message', 'Sukses ubah data');
    }

    public function hapus(int $id)
    {
        $this->dosen->delete($id);

        return redirect()->back()->with('message', 'Sukses hapus data');
    }

    public function hadir(int $id)
    {
        $dosen = $this->dosen->find($id);
        $nama_dosen = $dosen['nama_dosen'];
        $matkul = $dosen['matkul_dosen'];

        $token = "7071754219:AAGUXiaNkXGOLcvP07xarhJxyl-VMgaMc_U"; // token bot
 
		$datas = [
		'text' =>"Assalamualaikum\nPemberitahuan\n dosen $nama_dosen dengan matkul $matkul  masuk seperti biasa\n Terimakasih ",
		'chat_id' => '-4285939060'  //contoh bot, group id -442697126
		];
       
		file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($datas) );

        return redirect()->back()->with('message', 'Notifikasi terkirim');
    }

    public function tidak(int $id)
    {
        $dosen = $this->dosen->find($id);
        $nama_dosen = $dosen['nama_dosen'];
        $matkul = $dosen['matkul_dosen'];

        $token = "7071754219:AAGUXiaNkXGOLcvP07xarhJxyl-VMgaMc_U"; // token bot
 
		$datas = [
		'text' =>"Assalamualaikum\nPemberitahuan\ndosen $nama_dosen dengan matkul $matkul  tidak bisa hadir dikarnakan ada kepereluan mendadak\n Terimakasih ",
		'chat_id' => '-4285939060'  //contoh bot, group id -442697126
		];
       
		file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($datas) );

        return redirect()->back()->with('message', 'Notifikasi terkirim');
    }

}