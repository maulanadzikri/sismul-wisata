<?php
class Destination extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('DestinationModel');
    }

    public function index() {
        $data['destinations'] = $this->DestinationModel->getAll();
        $this->load->view('destination/index', $data);
    }

    public function addView() {
        $this->load->view('destination/add');
    }

    public function add() {
        if ($_POST) {
            $config['upload_path'] = './assets/uploads/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('photo')) {
                $uploadData = $this->upload->data();
                $data = [
                    'name' => $this->input->post('name'),
                    'location' => $this->input->post('location'),
                    'description' => $this->input->post('description'),
                    'photo' => $uploadData['file_name']
                ];
                $this->DestinationModel->insert($data);
                redirect('destination');
            } else {
                echo $this->upload->display_errors();
            }
        } else {
            $this->load->view('destination/add');
        }
    }

    public function editView($id) {
        $data['destination'] = $this->DestinationModel->getById($id);
        $this->load->view('destination/edit', $data);
    }

    public function update($id) {
        $data = [
            'name' => $this->input->post('name'),
            'location' => $this->input->post('location'),
            'description' => $this->input->post('description')
        ];

        if ($_FILES['photo']['name']) {
            $config['upload_path'] = './assets/uploads/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 2048;
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('photo')) {
                $uploadData = $this->upload->data();
                $data['photo'] = $uploadData['file_name'];
            } else {
                echo $this->upload->display_errors();
                return;
            }
        }

        $this->DestinationModel->update($id, $data);
        redirect('destination');
    }

	public function delete($id) {
		$destination = $this->DestinationModel->getById($id);

		if ($destination && !empty($destination['photo'])) {
			$file_path = FCPATH . 'assets/uploads/' . $destination['photo'];
			if (file_exists($file_path)) {
				unlink($file_path);
			}
		}

		$this->DestinationModel->delete($id);

		redirect('destination');
	}

    public function detail($id) {
        $data['destination'] = $this->DestinationModel->getById($id);

        if (!$data['destination']) {
            show_404(); // tampilkan 404 kalau data tidak ditemukan
        }

        $this->load->view('destination/detail', $data);
    }

	public function deleteAll(){
		$destinations = $this->DestinationModel->getAll();

		foreach ($destinations as $destination) {
			$file_path = FCPATH . 'assets/uploads/' . $destination['photo'];
			if (!empty($destination['photo']) && file_exists($file_path)) {
				unlink($file_path);
			}
		}

		$this->DestinationModel->deleteAll();
		redirect('destination');
	}


}
