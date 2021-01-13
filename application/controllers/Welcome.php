<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	 public function __construct() {
		parent::__construct();
        $this->load->model('lemodele');
	}

	public function index()
	{
		$this->afficher('accueil');
	}
    
    public function afficher($content) {
        
        if(!file_exists('application/views/'.$content.'.php')){
            show_404();
        }
        
        $this->load->view($content);
    }
    
    public function afficher_liste_jeux($content) {
        $data['titre']='Liste des jeux';
        $data['liste_jeux']=$this->lemodele->get_liste_jeux();
        $this->load->vars($data);
        $this->afficher($content);
    }
    
    public function deconnexion() {
        $this->session->unset_userdata('id');
        redirect(site_url() . '/welcome');
    }
    
    
    public function afficher_collectionneurs() {
        if($this->session->userdata('id') != '') {
            
            $data['liste_col']=$this->lemodele->get_collectionneurs();
            
        } 
        else {
            redirect(site_url() . '/welcome/afficher_page_connexion');
        }
        
            $data['content1']='menu_admin';
            $data['content2']='bannir';
            $data['fait']='non';
            $data['dernier_col_banni']='';
            $this->load->vars($data);
            $this->load->view('accueil_co');
    }
    
     public function verifier_liste_col($col) {
        if($this->session->userdata('id') != '') {
            $data['liste_col']=$this->lemodele->get_collectionneurs();
        }
        else {
            redirect(site_url() . '/welcome/afficher_page_connexion');
        }
            $data['content1']='menu_admin';
            $data['content2']='bannir';
            $data['fait']='oui';
            $data['dernier_col_banni']=urldecode($col);
            $this->load->vars($data);
            $this->load->view('accueil_co');
    }
    
     public function bannir_col($id_col) {
        if($this->session->userdata('id') != '') {
            
            $this->lemodele->delete_col($id_col);
            
            $this->lemodele->delete_dans_collectionne($id_col);
            
            $this->lemodele->delete_dans_collectionneurs($id_col);
            
            redirect('welcome/verifier_liste_col/'.$id_col);
        }
        else {
            redirect(site_url() . '/welcome/afficher_page_connexion');
        }
        
        
    }
    
    
    public function afficher_collection() {
        if($this->session->userdata('id') != '') {
            
            $data['jeux_col']=$this->lemodele->get_ma_collection();
            
        } 
        else {
            redirect(site_url() . '/welcome/afficher_page_connexion');
        }
        
            $data['content1']='menu_col';
            $data['content2']='collection';
            $data['fait']='non';
            $data['dernier_jeu_supprime']='';
            $this->load->vars($data);
            $this->load->view('accueil_co');
    }
    
    public function verifier_liste($jeu) {
        if($this->session->userdata('id') != '') {
            $data['jeux_col']=$this->lemodele->get_ma_collection();
            
        }
        else {
            redirect(site_url() . '/welcome/afficher_page_connexion');
        }
        
            $data['content1']='menu_col';
            $data['content2']='collection';
            $data['fait']='oui';
            $data['dernier_jeu_supprime']=urldecode($jeu);
            $this->load->vars($data);
            $this->load->view('accueil_co');
    }
    
   
    public function supprimer_jeu($id_jeu) {
        if($this->session->userdata('id') != '') {
            $id_j=$this->lemodele->get_titre_jeu($id_jeu);
            $this->lemodele->delete_jeu($id_jeu);
                        
            redirect('welcome/verifier_liste/'.$id_j);
        }
        else {
            redirect(site_url() . '/welcome/afficher_page_connexion');
        }
        
        
    }
    
    public function afficher_jeux_disponibles() {
        if($this->session->userdata('id') != '') {
            $data['liste_jeux']=$this->lemodele->get_liste_jeux();
            $data['jeux_col']=$this->lemodele->get_collection($this->session->userdata('id'));
            
        }
        else {
            redirect(site_url() . 'welcome/afficher_page_connexion');
        }
            $data['content1']='menu_col';
            $data['content2']='liste_jeux_col';
            $data['fait']='non';
            $data['dernier_jeu_ajoute']='';
            $this->load->vars($data);
            $this->load->view('accueil_co');
    }    
    
    public function verifier_collection($jeu) {
        if($this->session->userdata('id') != '') {
            $data['liste_jeux']=$this->lemodele->get_liste_jeux();
            $data['jeux_col']=$this->lemodele->get_collection($this->session->userdata('id'));
            
        }
        else {
            redirect(site_url() . '/welcome/afficher_page_connexion');
        }
            $data['content1']='menu_col';
            $data['content2']='liste_jeux_col';
            $data['fait']='oui';
            $data['dernier_jeu_ajoute']=urldecode($jeu);
            $this->load->vars($data);
            $this->load->view('accueil_co');
    }
    
    public function ajouter_jeu($id_jeu) {
        if($this->session->userdata('id') != '') {
            
            $this->lemodele->add_jeu($id_jeu);
            
            redirect('welcome/verifier_collection/'.$this->lemodele->get_titre_jeu($id_jeu));
        }
        else {
            redirect(site_url() . '/welcome/afficher_page_connexion');
        }
        
        
    }
    
    public function connecte_col($val) {
        if($this->session->userdata('id') != '') {
            $data['titre']='Liste des jeux';
            $data['liste_jeux']=$this->lemodele->get_liste_jeux();
            $data['content1']='menu_col';
            $data['content2']=$val;
            $this->load->vars($data);
            $this->load->view('accueil_co');
        }
        else {
            redirect(site_url() . '/welcome/afficher_page_connexion');
        }
    }
    
    public function connecte_admin() {
        
        if($this->session->userdata('id') != '') {
            $data['content1']='menu_admin';
            $data['content2']='message_accueil_co';
            $this->load->vars($data);
            $this->load->view('accueil_co');
        }
        else {
            redirect(site_url() . '/welcome/afficher_page_connexion');
        }
    }
    
    
    public function afficher_page_connexion() {
        $data['titre']='Connexion';
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('id','"Identifiant"','required|trim');
        $this->form_validation->set_rules('mdp','"Mot de passe"','required');
        
        if($this->form_validation->run()===FALSE) {
            $data['ban']='non';
            $data['compte_existe']='';
            $data['content']='connexion';
            $this->load->vars($data);
            $this->load->view('form_template');
        }
        else {
            if($this->lemodele->est_banni(htmlspecialchars($this->input->post('id')))) {
                $data['ban']='oui';
                $data['compte_existe']='';
                $data['content']='connexion';
                $this->load->vars($data);
                $this->load->view('form_template');
            }
            else {
                $id=htmlspecialchars($this->input->post('id'));
                $mdp=htmlspecialchars($this->input->post('mdp'));

                if($this->lemodele->est_admin($id,$mdp)) {
                    $session_data=array(
                        'id' => $id
                    );
                $this->session->set_userdata($session_data);
    
                redirect(site_url().'/welcome/connecte_admin');
                }
                else {
                    if($this->lemodele->est_col($id,$mdp)) {
                        $session_data=array(
                            'id' => $id
                        );
                        $this->session->set_userdata($session_data);
    
                        redirect(site_url().'/welcome/connecte_col/message_accueil_co');
                    }
                    else {
                        $data['ban']='non';
                        $data['content']='connexion';
                        $data['compte_existe']='non';
                        $this->load->vars($data);
                    
                        $this->load->view('form_template');
                        
                    }
                }
            }   
            
        }

    }
    
    
    public function afficher_page_inscription() {
        $data['titre']='Inscription';
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('id','"Identifiant"','trim|required|min_length[5]|max_length[12]|is_unique[collectionneurs.id_col]');
        $this->form_validation->set_rules('nom','"Nom"','trim|required|max_length[50]');
        $this->form_validation->set_rules('prenom','"Prénom"','trim|required|max_length[50]');
        $this->form_validation->set_rules('mdp','"Mot de passe"','trim|required|min_length[8]|max_length[12]');
        $this->form_validation->set_rules('mdp_conf','"Confirmer le mot de passe"','trim|required|matches[mdp]');
        
        
        if($this->form_validation->run()===FALSE) {
            $data['inscrit']='non';
            $data['ban']='non';
            
        }
        else {
            if($this->lemodele->est_banni(htmlspecialchars($this->input->post('id'))) || htmlspecialchars($this->input->post('id'))==='admin') {
                $data['inscrit']='non';
                $data['ban']='oui';
            }
            else {
                $id=htmlspecialchars($this->input->post('id'));
            $nom=htmlspecialchars($this->input->post('nom'));
            $prenom=htmlspecialchars($this->input->post('prenom'));
            $mdp=htmlspecialchars($this->input->post('mdp'));
            
            $this->lemodele->ajouter_collectionneur($id,$nom,$prenom,$mdp);
            $data['inscrit']='oui';
            $data['ban']='non';
            }
            
            
        }
        $data['content']='inscription';
        $this->load->vars($data);
        $this->load->view('form_template');
    }
    

}
