<?php 
    class Lemodele extends CI_Model {
        
        public function __construct() {
            parent::__construct();
            $this->load->database();
        }
        
        public function get_liste_jeux() {
            $this->db->order_by('sortie','DESC');
            $query=$this->db->get('_jeu');
            return $query->result_array();
        }
        
        public function ajouter_collectionneur($id,$nom,$prenom,$mdp) {
            $data=array(
                'id_col'=>$id,
                'nom'=>$nom,
                'prenom'=>$prenom,
                'mdp'=>sha1($mdp)
            );
            return $this->db->insert('collectionneurs',$data);
        }
        
        public function get_collectionneurs() {
            $query=$this->db->get('collectionneurs');
            return $query->result_array();
        }
        
        public function get_col($id) {
            $this->db->where('id_col',$id);
            $query=$this->db->get('collectionneurs');
            return $query->result_array();
        }
        
        public function est_admin($id,$mdp) {
            return ($id=='admin' && $mdp=='mario');
        }
        public function est_col($id,$mdp) {
            $this->db->where('id_col',$id);
            $this->db->where('mdp',sha1($mdp));
            $query=$this->db->get('collectionneurs');
            
            if($query->num_rows() > 0) {
                return true;
            }
            else {
                return false;
            }
        }
 /***********************/       
        /*public function get_dernier_jeu_insere() {
            $query=$this->db->get_collection();
            //$nbl=count($query);
            global $dernier;
            foreach($query as $val) {
                /*$nbl--;
                if($nbl==0) {
                    return $val['id'];
                }*//*
                $dernier=$val['id'];
            }
            return $dernier;
        }
        
        public function get_nb_jeux_col() {
            $this->db->where(array('id_col' => $this->session->userdata('id')));
            $query=$this->db->get('collectionne');
            return count($query);//$query->num_rows();
        }
        
        */
 /***********/  
        
        public function add_jeu($id_j) {  
            $data=array(
                'id_col'=>$this->session->userdata('id'),
                'id_jeu'=>$id_j
            );
            return $this->db->insert('collectionne',$data);
        }
        
        public function get_collection() {
            $this->db->where(array('id_col' => $this->session->userdata('id')));
            $query=$this->db->get('collectionne');
            return $query->result_array();
        }
        
        public function get_titre_jeu($id) {
            
            
            
            $this->db->select('*');
            $this->db->from('collectionne');
            $this->db->join('_jeu', 'collectionne.id_jeu = _jeu.id_jeu');
            $query = $this->db->get();
            $query=$query->result_array();
            
            foreach($query as $val) {
                if($val['id_jeu']==$id) {
                    return $val['titre'];
                }
            }
            
            return 'vide';
            
        }
    
        
        public function delete_jeu($id_j) {
            $this->db->where('id_col',$this->session->userdata('id'));
            $this->db->where('id_jeu',$id_j);
            $this->db->delete('collectionne');
        }
        
        public function delete_col($id_c) { 
            
                $data=array(
                'id_col'=>$id_c
                );
                return $this->db->insert('bannis',$data);
            
        }
        
        public function delete_dans_collectionne($id_c) {
            $this->db->where('id_col',$id_c);
            $this->db->delete('collectionne');
        }
        
        public function est_banni($id_c) {
            $query=$this->db->query("SELECT * FROM jeux.bannis WHERE id_col='".$id_c."'");
            if($query->num_rows() > 0) {
                return true;
            }
            else {
                return false;
            }
        }
        
        public function delete_dans_collectionneurs($id_c) {
            $this->db->where('id_col',$id_c);
            $this->db->delete('collectionneurs');
        }
        
        public function get_ma_collection() {   //tri
            $query=$this->db->query("WITH res AS (SELECT * FROM jeux.collectionne NATURAL JOIN jeux._jeu WHERE collectionne.id_col='".$this->session->userdata('id')."')
            SELECT id_jeu,titre,sortie,description,couverture FROM res ORDER BY sortie DESC");
            /*$this->db->select('*');
            $this->db->from('collectionne');
            $this->db->join('tri_jeux', 'collectionne.id_jeu = tri_jeux.id_jeu');
            $this->db->order_by('sortie', 'DESC');*/
            //$query = $this->db->get();
            return $query->result_array();
        }
    }
?>