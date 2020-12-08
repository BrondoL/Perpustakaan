<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perpus extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Data Buku';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $cari = $this->input->get('keyword', TRUE);

        if ($cari) {
            $this->db->select('*');
            $this->db->from('buku');
            $this->db->like('kode_buku', $cari);
            $this->db->or_like('judul', $cari);
            $this->db->or_like('jumlah', $cari);
            $data['buku'] = $this->db->get()->result_array();
        } else {
            $data['buku'] = $this->db->get('buku')->result_array();
        }

        if (isset($_POST["tambahbuku"])) {
            $this->form_validation->set_rules('kode_buku', 'Kode Buku', 'required');
            $this->form_validation->set_rules('judul', 'Judul Buku', 'required');
            $this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
            $this->form_validation->set_rules('pengarang', 'Pengarang', 'required');
            $this->form_validation->set_rules('tahun_terbit', 'Tahun terbit', 'required');
            $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('perpus/databuku', $data);
            $this->load->view('templates/footer');
        } else {
            $kode_buku = $this->input->post('kode_buku');
            $judul = $this->input->post('judul');
            $penerbit = $this->input->post('penerbit');
            $pengarang = $this->input->post('pengarang');
            $tahun_terbit = $this->input->post('tahun_terbit');
            $jumlah = $this->input->post('jumlah');
            $keterangan = $this->input->post('keterangan');

            $data = [
                'kode_buku' => $kode_buku,
                'judul' => $judul,
                'penerbit' => $penerbit,
                'pengarang' => $pengarang,
                'th_terbit' => $tahun_terbit,
                'jumlah' => $jumlah,
                'ket' => $keterangan,
            ];

            $upload_image = $_FILES['sampul']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '4096';
                $config['upload_path'] = './assets/img/buku/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('sampul')) {
                    $data['sampul'] = $upload_image;
                } else {
                    echo $this->upload->display_errors();
                    die;
                }
            } else {
                $data['sampul'] = "buku.png";
            }

            $this->db->insert('buku', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menambahkan buku !</div>');
            redirect('perpus');
        }
    }

    public function editBuku($id)
    {
        $data['title'] = 'Data Buku';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['buku'] = $this->db->get_where('buku', ['buku_id' => $id])->row_array();

        $this->form_validation->set_rules('kode_buku', 'Kode Buku', 'required');
        $this->form_validation->set_rules('judul', 'Judul Buku', 'required');
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
        $this->form_validation->set_rules('pengarang', 'Pengarang', 'required');
        $this->form_validation->set_rules('tahun_terbit', 'Tahun terbit', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('perpus/databuku', $data);
            $this->load->view('templates/footer');
        } else {
            $kode_buku = $this->input->post('kode_buku');
            $judul = $this->input->post('judul');
            $penerbit = $this->input->post('penerbit');
            $pengarang = $this->input->post('pengarang');
            $tahun_terbit = $this->input->post('tahun_terbit');
            $jumlah = $this->input->post('jumlah');
            $keterangan = $this->input->post('keterangan');

            $data = [
                'kode_buku' => $kode_buku,
                'sampul' => $data['buku']['sampul'],
                'judul' => $judul,
                'penerbit' => $penerbit,
                'pengarang' => $pengarang,
                'th_terbit' => $tahun_terbit,
                'jumlah' => $jumlah,
                'ket' => $keterangan,
            ];

            $upload_image = $_FILES['sampul']['name'];


            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '4096';
                $config['upload_path'] = './assets/img/buku/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('sampul')) {
                    $old_image = $data['sampul'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/img/buku/' . $old_image);
                    }
                    $sampul = $this->upload->data('file_name');
                    $data['sampul'] = $sampul;
                } else {
                    echo $this->upload->display_errors();
                    die;
                }
            }

            $this->db->set($data);
            $this->db->where('buku_id', $id);
            $this->db->update('buku');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil mengubah data buku !</div>');
            redirect('perpus');
        }
    }

    public function deleteBuku($id)
    {
        $data['buku'] = $this->db->get_where('buku', ['buku_id' => $id])->row_array();
        $sampul = $data['buku']['sampul'];
        if ($sampul != "buku.png") {
            unlink(FCPATH . 'assets/img/buku/' . $sampul);
        }
        $this->db->where('buku_id', $id);
        $this->db->delete('buku');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menghapus buku !</div>');
        redirect('Perpus');
    }

    public function detailbuku($id)
    {
        $data['title'] = 'Detail Buku';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['buku'] = $this->db->get_where('buku', ['buku_id' => $id])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('perpus/detailbuku', $data);
        $this->load->view('templates/footer');
    }
}
