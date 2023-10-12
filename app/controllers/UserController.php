<?php
use Phalcon\Paginator\Adapter\Model as Paginator;
use Phalcon\Mvc\Model\Criteria;

class UserController extends ControllerBase
    {

        public function indexAction()
    {
        // Ambil semua data pengguna
        $user = User::find();
  
        
        // Kirim data pengguna ke tampilan
        $this->view->user = $user;
        
    }

    public function createAction()
    {
        // Tangani pembuatan pengguna baru
        if ($this->request->isPost()) {
            $user = new User();
            $user->nama_user = $this->request->getPost("txt_nama");
            $user->email_user = $this->request->getPost("txt_email");

            if ($user->save()) {
                // Pengguna berhasil dibuat
                $this->flash->success("Pengguna berhasil dibuat");
                return $this->response->redirect("user/index");
            } else {
                // Ada kesalahan dalam pembuatan pengguna
                $this->flash->error("Terjadi kesalahan. Pengguna tidak dapat dibuat.");
            }
        }
    }
    
        public function viewDataAction()
        {
            $numberPage = $this->request->getQuery("page", "int");
            $user = User::find();
    
    
            //  Paginator 
            $paginator = new Paginator(array(
            "data"  => $user,
            "limit" => 5,
            "page"  => $numberPage
        ));
   

            $this->view->page = $paginator->getPaginate();
            $this->view->data=$user;
        }
    
        public function editAction($id)
        {
            // Ambil data pengguna yang akan diedit
            $user = User::findFirst($id);

            if (!$user) {
                // Pengguna tidak ditemukan, tindakan lain dapat diambil (misalnya, menampilkan pesan error)
                $this->flash->error("Pengguna tidak ditemukan.");
                return $this->response->redirect("viewData");
            }

            // Kirim data pengguna ke tampilan
            $this->view->id = $user->id_user;
            $this->view->email = $user->email_user;
            $this->view->nama = $user->nama_user;
        }
    
        public function updateAction()
        {
            // Tangani pembaruan data pengguna
            if ($this->request->isPost()) {
                $id = $this->request->getPost("txt_id");
                $user = User::findFirst($id);

                if (!$user) {
                    // Pengguna tidak ditemukan, tindakan lain dapat diambil (misalnya, menampilkan pesan error)
                    $this->flash->error("Pengguna tidak ditemukan.");
                    return $this->response->redirect("user");
                }

                // Update data pengguna
                $user->nama_user = $this->request->getPost("txt_nama");
                $user->email_user = $this->request->getPost("txt_email");

                if ($user->save()) {
                    // Pengguna berhasil diupdate
                    $this->flash->success("Pengguna berhasil diupdate");
                } else {
                    // Ada kesalahan dalam pembaruan pengguna
                    $this->flash->error("Terjadi kesalahan. Pengguna tidak dapat diupdate.");
                }

                // Redirect kembali ke halaman edit yang sama
                return $this->response->redirect("user/viewData/{$id}");
            }
        }

            public function hapusAction($id)
            {
                // Tangani penghapusan pengguna
                $user = User::findFirst($id);

                if ($user) {
                    if ($user->delete()) {
                        // Pengguna berhasil dihapus
                        $this->flash->success("Pengguna berhasil dihapus");
                    } else {
                        // Ada kesalahan dalam penghapusan pengguna
                        $this->flash->error("Terjadi kesalahan. Pengguna tidak dapat dihapus.");
                    }
                } else {
                    // Pengguna tidak ditemukan
                    $this->flash->error("Pengguna tidak ditemukan.");
                }

                // Mendapatkan URL halaman sebelumnya (jika informasi ini tersedia)
                $referer = $this->request->getHTTPReferer();
                
                // Redirect ke halaman sebelumnya (atau halaman lain)
                if ($referer) {
                    $this->response->redirect($referer);
                } else {
                    $this->response->redirect("viewData"); // Jika URL halaman sebelumnya tidak tersedia, kembali ke halaman daftar pengguna
                }
            }

            public function cariAction()
            {
                $numberPage1 = $this->request->getQuery("page", "int", 1);
                
                
                if ($this->request->isPost()) {
                $query = Criteria::fromInput($this->di, "User", $this->request->getPost());
                $this->persistent->searchParams = $query->getParams();
                } 
    
                $parameters = array();
                
                if ($this->persistent->searchParams) {
                $parameters = $this->persistent->searchParams;          
                };
                $user = User::find($parameters);
                
                
                $paginator1 = new Paginator(array(
                "data"  => $user,
                "limit" => 5,
                "page"  => $numberPage1
                ));
    
                
                // $this->view->data1=$user;
                $this->view->page = $paginator1->getPaginate();
            }
}