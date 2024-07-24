<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Frontend extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Load Dependencies 
        $this->load->model('model_berita'); // model yang diload  
        $this->load->model('model_frontend');
    }

    public function index()
    {
        $data = array(
            'judul'     => 'WebGIS Trainning',
            'content'   => 'frontend/home'
        );
        $this->load->view('layout_frontend/viewunion', $data, FALSE);
    }

    function about()
    {
        $data = [
            'judul' => 'Tentang PDAM',
            'content' => 'frontend/sejarah'
        ];

        $this->load->view('layout_frontend/viewunion', $data);
    }

    function VisiMisi()
    {
        $data = [
            'judul' => 'Visi & Misi',
            'content' => 'frontend/visimisi'
        ];

        $this->load->view('layout_frontend/viewunion', $data);
    }

    function Strategi()
    {
        $data = [
            'judul' => 'Strategi Perumda Air Minum Tirto Panguripan',
            'content' => 'frontend/strategi'
        ];

        $this->load->view('layout_frontend/viewunion', $data);
    }

    function Motto()
    {
        $data = [
            'judul' => 'Motto Perumda Air Minum Tirto Panguripan',
            'content' => 'frontend/motto'
        ];

        $this->load->view('layout_frontend/viewunion', $data);
    }

    function Struktur()
    {
        $data = [
            'judul' => 'Struktur Organisasi',
            'content' => 'frontend/struktur'
        ];

        $this->load->view('layout_frontend/viewunion', $data);
    }

    function Tagihan()
    {
        $data = [
            'judul' => 'Cek Tagihan Pelanggan',
            'content' => 'frontend/tagihan'
        ];

        $this->load->view('layout_frontend/viewunion', $data);
    }

    function Login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'judul' => 'Login'
            ];
            $this->load->view('frontend/login', $data);
        } else {
            // Validasinya success 
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->db->get_where('tbl_user', array('email' => $email))->row_array();

            // Cek jika data user ada 
            if ($user) {
                // Cek jika password benar 
                if (password_verify($password, $user['password'])) {

                    // Kalau semua sudah dicek maka buat session
                    $data = [
                        'email' => $user['email'],
                        'role' => $user['role']
                    ];

                    $this->session->set_userdata($data);

                    if ($user['role'] == 'Admin') {
                        redirect(base_url('backend'), 'refresh');
                    } else {
                        redirect(base_url('frontend'), 'refresh');
                    }
                } else {
                    flashData('Password yang dimasukan salah!', 'Login Failed', 'error');

                    redirect(base_url('frontend/login'));
                }
            } else {
                flashData('Email yang dimasukan belum terdaftar!', 'Login Failed', 'error');

                redirect(base_url('frontend/login'));
            }
        }
    }

    function register()
    {
        // ATURAN VALIDASI INPUT DATA 
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_user.email]');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]');
        $this->form_validation->set_rules('confirm_password', 'Password', 'required|trim|matches[password]', [
            'matches' => "Password doesn't matches"
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'judul' => 'Register'
            ];

            $this->load->view('frontend/register', $data);
        } else {
            // Data Users 
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', TRUE)),
                'email' => htmlspecialchars($this->input->post('email', TRUE)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => 'User'
            ];


            $this->model_frontend->register($data);

            flashData('Pendaftaran Berhasil!', 'Registration Success', 'success');

            redirect(base_url('frontend/login'), 'refresh');
        }
    }

    function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');

        flashData('Berhasil Logout!', 'Logout Success', 'success');
        redirect('frontend', 'refresh');
    }

    function Berita()
    {
        $jumlah_data = $this->model_berita->jumlahdata();
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'frontend/berita';

        // Jumlah data dari database
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 5;
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';

        $offset = html_escape((!$this->input->get('page')) ? 0 : ($this->input->get('page') * $config['per_page']) - $config['per_page']);
        // $config['num_links'] = ($config["total_rows"] / $config["per_page"]);

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['attributes'] = ['class' => 'page-link'];
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $data = [
            'judul' => 'Berita',
            'berita' => $this->model_berita->getberita($config['per_page'], $offset),
            'content' => 'frontend/berita'
        ];

        $this->load->view('layout_frontend/viewunion', $data);
    }

    function single_berita()
    {
        $id = $this->input->get('brt');
        if ($this->model_berita->cekberita($id) < 1) {
            redirect('frontend/berita', 'refresh');
        }
        $data = [
            'berita' => $this->model_berita->getBeritaByID($id),
            'judul' => 'Berita',
            'content' => 'frontend/single_berita'
        ];

        $this->load->view('layout_frontend/viewunion', $data);
    }

    function kontak()
    {
        $data = [
            'judul' => 'Kontak',
            'content' => 'frontend/kontak'
        ];

        $this->load->view('layout_frontend/viewunion', $data);
    }

    function jumlah_pelanggan()
    {
        $data = [
            'judul' => 'Jumlah Pelangan',
            'content' => 'frontend/jumlah_pelanggan',
            'dataA' => $this->model_frontend->data_admin(),
            'titikKec' => $this->model_frontend->titik_kecamatan(),
        ];

        $this->load->view('layout_frontend/viewunion', $data);
    }
}
/* End of file Frontend.php */