<?php 
class Video_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Insert video data into the videos table
    // public function insert_video($video_data) {
    //     return $this->db->insert('videos', $video_data);
    // }
    public function insert_video($video_data) {
        $this->db->insert('videos', $video_data); // Insert data into the 'videos' table
        return $this->db->insert_id(); // Get and return the last inserted ID
    }
    public function update_video($update_para,$video_id)
	{
	   $this->db->where("id",$video_id);
	   return $this->db->update('videos',$update_para);
	}
}


?>