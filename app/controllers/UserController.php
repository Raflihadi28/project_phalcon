<?php
use Phalcon\Paginator\Adapter\Model as Paginator;
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Http\Response as Response;

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
                // $this->flash->success("Pengguna berhasil dibuat");
                // return $this->response->redirect("user/index");
                echo '<script> 
                alert("Pengguna berhasil dibuat.") ;
                window.location.href = "http://localhost:8080/phalcon_project/test/user/index";
                </script>';
            } else {
                // Ada kesalahan dalam pembuatan pengguna
                // $this->flash->error("Terjadi kesalahan. Pengguna tidak dapat dibuat.");
                echo '<script> 
                alert("Terjadi kesalahan. Pengguna tidak dapat dibuat.") ;
                window.location.href = "http://localhost:8080/phalcon_project/test/user/index";
                </script>';
                
            }
        }
    }
    
    public function saveAction()
    {
    	$this->view->disable();

    	$res = new Response;

    	$id_user = $this->request->getPost("id_user");

    	if($id_user == ''){

	    	$create = new User();

	    	$create->assign(array(
	    		'nama_user' => $this->request->getPost('txt_nama'),
	    		'email_user' => $this->request->getPost('txt_email'),
	    	));

	    	$action = $create->save();

	    }else{

	    	$user = User::findFirst($id_user);

	      	$user->id_user = $id_user;
	   		$user->nama_user = $this->request->getPost("txt_nama");
	   		$user->email_user = $this->request->getPost("txt_email");

	   		$action = $user->save();
	    }

   		if (! $action) {
			$return = array('return' => false, 'msg' => 'Error ! while saving data');
		} else {
			$return = array('return' => true);
		}

    	$res->setContent( json_encode( $return ) );

   		return $res;
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

        public function editAction(){
            $this->view->disable();
    
            $res = new Response;
    
            $id = $this->request->getPost('id');
               $user = User::findFirst($id);
    
               $res->setContent( json_encode( array(
                   'id_user'=>$user->id_user,
                   'nama_user'=>$user->nama_user,
                   'email_user'=>$user->email_user,
               ) ) );
    
               return $res;
        }

    
        public function updateAction()
        {
            // Tangani pembaruan data pengguna
            if ($this->request->isPost()) {
                $id = $this->request->getPost("id");
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
                    // $this->flash->success("Pengguna berhasil diupdate");
                } else {
                    // Ada kesalahan dalam pembaruan pengguna
                    $this->flash->error("Terjadi kesalahan. Pengguna tidak dapat diupdate.");
                }

                // Redirect kembali ke halaman edit yang sama
                return $this->response->redirect("user/viewData/{$id}");
            }
        }

            public function deleteAction()
        {
            $this->view->disable();

            $res = new Response;

            $id = $this->request->getPost('id_user');
            $user = User::findFirst($id);

            if (! $user->delete()) {
                $return = array('return' => false, 'msg' => 'Error ! while deleting data');
            } else {
                $return = array('return' => true);
            }

            $res->setContent( json_encode( $return ) );

            return $res;
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