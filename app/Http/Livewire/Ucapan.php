<?php

namespace App\Http\Livewire;

use App\Models\Kehadiran;
use App\Models\Ucapan as ModelsUcapan;
use Livewire\Component;
use Livewire\WithPagination;

class Ucapan extends Component
{
    use WithPagination;
    public $nama;
    public $ucapan;
    public $kehadiran;
    public function render()
    {
        return view('livewire.ucapan', [
            'ucapans' => ModelsUcapan::latest()->paginate(10),
            "kehadirans" => Kehadiran::get(),
            "kehadirans_datang" => ModelsUcapan::where('kehadiran', 'Dateng dong')->count(),
            "ucapans_uandangan" => ModelsUcapan::count(),
        ]);
    }

    public function store()
    {
        $this->validate(
            [
                'nama' => 'required',
                'ucapan' => 'required',
                'kehadiran' => 'required',
            ],
            [
                'nama.required' => 'Namanya harus di isi ya....',
                'kehadiran.required' => 'Pilih salah satu dong hehe...',
                'ucapan.required' => 'Minimal isi 10 karakter dong hehe...',
            ]
        );
        ModelsUcapan::create([
            'nama' => $this->nama,
            'kehadiran' => $this->kehadiran,
            'ucapan' => $this->ucapan,
        ]);
        $this->resetInput();
        $this->dispatchBrowserEvent('swal', [
            'text' => 'Makasih Yaaa... 🤗',
            'timer' => 1500,
            'icon' => false,
            'showConfirmButton' => false,
            'position' => 'center'
        ]);
    }

    private function resetInput()
    {
        $this->nama = null;
        $this->ucapan = null;
        $this->kehadiran = null;
    }
}
