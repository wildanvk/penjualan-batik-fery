<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    public $user = [
        'nama' => 'required',
        'email' => 'required|valid_email|is_unique[user.email]',
        'jenis_kelamin' => 'required',
        'telepon' => 'required|numeric',
        'password' => 'required|min_length[8]',

    ];

    public $user_errors = [
        'nama' => [
            'required' => 'Nama harus diisi!',
        ],
        'email' => [
            'required' => 'Email harus diisi!',
            'valid_email' => 'Email tidak valid!',
            'is_unique' => 'Email sudah terdaftar!'
        ],
        'jenis_kelamin' => [
            'required' => 'Jenis kelamin harus diisi!',
        ],
        'telepon' => [
            'required' => 'No. telepon harus diisi!',
        ],
        'password' => [
            'required' => 'Password harus diisi!',
            'min_length' => 'Password minimal 8 karakter!'
        ],
    ];

    public $kategori = [
        'nama_kategori'     => 'required',
        'status'     => 'required'
    ];

    public $kategori_errors = [
        'nama_kategori' => [
            'required'    => 'Nama kategori wajib diisi.',
        ],
        'status'    => [
            'required' => 'Status kategori wajib diisi.'
        ]
    ];

    public $produk = [
        'id_kategori'     => 'required',
        'nama_produk'     => 'required',
        'harga_produk'     => 'required',
        'status'     => 'required',
        'gambar_produk'     => 'uploaded[gambar_produk]|mime_in[gambar_produk,image/jpg,image/jpeg,image/gif,image/png]
        |max_size[gambar_produk,1000]',
        'deskripsi' => 'required'
    ];

    public $produk_errors = [
        'id_kategori' => [
            'required'    => 'Kategori wajib diisi.',
        ],
        'nama_produk'    => [
            'required' => 'Nama produk wajib diisi.'
        ],
        'harga_produk'    => [
            'required' => 'Harga produk wajib diisi.'
        ],
        'status'    => [
            'required' => 'Status produk wajib diisi.'
        ],
        'gambar_produk'    => [
            'mime_in' => 'Gambar produk hanya boleh diisi dengan JPG, PNG, atau GIF.',
            'max_size' => 'Gambar produk maksimal 1MB.',
            'uploaded' => 'Gambar produk wajib diisi.'
        ],
        'deskripsi'    => [
            'required' => 'Deskripsi produk wajib diisi.'
        ],
    ];

    public $produk_edit = [
        'id_kategori'     => 'required',
        'nama_produk'     => 'required',
        'harga_produk'     => 'required',
        'status'     => 'required',
        'gambar_produk'     => 'mime_in[gambar_produk,image/jpg,image/jpeg,image/gif,image/png]
        |max_size[gambar_produk,1000]',
        'deskripsi' => 'required'
    ];

    public $produk_edit_errors = [
        'id_kategori' => [
            'required'    => 'Kategori wajib diisi.',
        ],
        'nama_produk'    => [
            'required' => 'Nama produk wajib diisi.'
        ],
        'harga_produk'    => [
            'required' => 'Harga produk wajib diisi.'
        ],
        'status'    => [
            'required' => 'Status produk wajib diisi.'
        ],
        'gambar_produk'    => [
            'mime_in' => 'Gambar produk hanya boleh diisi dengan JPG, PNG, atau GIF.',
            'max_size' => 'Gambar produk maksimal 1MB.',
            'uploaded' => 'Gambar produk wajib diisi.'
        ],
        'deskripsi'    => [
            'required' => 'Deskripsi produk wajib diisi.'
        ],
    ];

    public $checkout = [
        'alamat' => 'required'
    ];

    public $checkout_errors = [
        'alamat' => [
            'required' => 'Alamat wajib diisi!'
        ]
    ];
}
