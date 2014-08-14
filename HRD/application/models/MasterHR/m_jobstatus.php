<?php if ( ! defined('BASEPATH')) exit('No direct sjsript access allowed');
/*
* Copyright @Vinoti-Group 2014
* Author @Ardian Webi Kirda
* 082137288307 / ianwebikirda@gmail.com
*/

class M_jobstatus extends CI_Model
{
    /*
    * Contruct Function Aplikasi
    */
    public function __construct(){
        parent::__construct();
    }

    /*
    * Query Untuk mendapatkan Data Grid dari DB
    */
    public function getGridJobStatus($limit, $offset)
    {
         $this->db->select("sjs.id_jobstatus AS id, sjs.name AS name, 
            sjs.isactive AS isactive, CASE WHEN sjs.isactive = 'Y' THEN 1 ELSE 0 END AS isactive", FALSE);
        $this->db->from('sys_jobstatus sjs');
        $this->db->order_by('id_jobstatus');
        $this->db->limit($offset, $limit);
        $query = $this->db->get();
        // echo $this->db->last_query();
        // exit();
        return $query;
    }

    /*
    * Query Untuk Menghitung Jumlah Data Grid
    */
    public function countGridJobStatus()
    {
         $this->db->select("sjs.id_jobstatus AS id, sjs.name AS name, 
            sjs.isactive AS isactive, CASE WHEN sjs.isactive = 'Y' THEN 1 ELSE 0 END AS isactive", FALSE);
        $this->db->from('sys_jobstatus sjs');
        $this->db->order_by('id_jobstatus');
        $query = $this->db->get();
        // echo $this->db->last_query(); <-- This Query Can Activated for test parsing parameter
        // exit();   
        return $query;
    }

    /*
    * Query Untuk Menghapus data Master JobStatus
    */
    public function deleteJobStatus($id)
    {
        $this->db->where('id_jobstatus',$id);
        $this->db->delete('sys_jobstatus');
    }

    /*
    * Query untuk menyimpan data
    */
    public function saveJobStatus($name, $isactive, $uuid)
    {
            $this->db->set('id_jobstatus', $uuid);
            $this->db->set('name', $name);
            $this->db->set('isactive', $isactive);
            $this->db->set('createdby', $this->session->userdata('id'));
            $this->db->set('created', date('Y-m-d H:i:s'));
            $this->db->set('updatedby', $this->session->userdata('id'));
            $this->db->set('updated', date('Y-m-d H:i:s'));
            $this->db->insert('sys_jobstatus');
    }

    /*
    * Query untuk mendapatkan Generate ID dari DB PostgreSQL 
    */
    public function getUUID(){      
        return $this->db->query('SELECT get_uuid() AS uuid;')->row()->uuid;
    }

    /*
    * Query untuk validasi ID sebelum data disimpan 
    */
    public function saveConfirm($uuid){      
        return $this->db->select('COUNT(*) AS id', FALSE)->from('sys_jobstatus')->where('id_jobstatus',$uuid)->get()->row()->id;
    }

    /*
    * Query untuk validasi data unique sebelum data disimpan
    */
    public function cekJobStatus($name){      
        return $this->db->select('COUNT(*) AS id', FALSE)->from('sys_jobstatus')->where('name',$name)->get()->row()->id;
    }

    /*
    * Query untuk validasi key / index untuk udate data 
    */
    public function cekJobStatusID($name, $id){
        return $this->db->select('COUNT(*) AS id', FALSE)->from('sys_jobstatus')->where('name',$name)->where('id_jobstatus !=', $id)->get()->row()->id;
    }

    /*
    * Query untuk update data 
    */ 
    public function updateJobStatus($name,$isactive, $id){
            $data = array(
                           'name'       => $name,
                           'isactive'   => $isactive,
                           'updated'    => date('Y-m-d H:i:s'),
                           'updatedby'  => $this->session->userdata('id')
                        );
            $this->db->where('id_jobstatus',$id);
            $this->db->update('sys_jobstatus', $data);              
    }

    /*
    * Query untuk pencarian data 
    */ 
    public function searchGridJobStatus($name)
    {
        $this->db->select("sjs.id_jobstatus AS id, sjs.name AS name", FALSE);
        $this->db->from('sys_jobstatus sjs');
        $this->db->like('LOWER(sjs.name)', strtolower($name));
        $this->db->order_by('id_jobstatus');
        $query = $this->db->get();
        return $query;
    }

    /*
    * Query untuk melakukan export reporting  
    */ 
    // public function printJobStatus()
    // {
    //     $this->db->select("u.id_jobstatus AS id, u.username AS username, u.name AS name, u.firstname AS firstname, r.name AS role,
    //         u.lastname AS lastname, u.desjsription AS desjsription, u.email AS email, u.phone AS phone, u.phone2 AS mobile,
    //         u.isactive AS active, u1.name AS dibuat, to_char(u.created, 'dd-mm-yyyy') AS tgl_buat, 
    //         u2.name AS diupdate, to_char(u.updated, 'dd-mm-yyyy') AS tgl_update", FALSE);
    //     $this->db->from('sys_jobstatus AS u');
    //     $this->db->join('sys_jobstatus AS u1', 'u.createdby=u1.id_jobstatus');
    //     $this->db->join('sys_jobstatus AS u2', 'u.updatedby=u2.id_jobstatus');
    //     $this->db->join('ad_role r','r.ad_role_id=u.ad_role_id');
    //     $this->db->order_by('name');
    //     $query = $this->db->get();
    //     return $query;
    // }
}