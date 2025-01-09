<?php



class Commen_model extends CI_Model {



    function __construct() {

        // Call the Model constructor

        parent::__construct();

        $this->load->helper('string');

    }
    
    
    
    public function gatdatabyid($where, $table)
    {
    	$this->db->select('*')->where($where);
    	$qry = $this->db->get($table);
    	return $qry->result();
    }
    
    
    public function getgroupbydata($where, $table, $groupby)
    {
    	$this->db->select($groupby)->where($where)->group_by($groupby);
    	$qry = $this->db->get($table);
    	return $qry->result();
    }
    
      function update_notification_status_for_extend($notification_id,$senior_id) {
        $data = array(
            'notification_status' => '1',
            'notification_to_senior_id' => $senior_id
        );
        $this->db->where('notification_id', $notification_id);
        $this->db->update('notification', $data);
        return;
    } 

 public function update($update, $where, $table)
    {
    	$this->db->where($where);
    	$this->db->update($table, $update);
    	return true;
    }


    function create_address_id() {

        $data = array(

            'address_long' => '0',

            'address_lat' => '0',

        );

        $query = $this->db->insert('address', $data);

        if ($query)

            return $this->db->insert_id();

        else

            return FALSE;

    }


    function insert_data($table, $data, $where = NULL)
    {
        $query = $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
    

    function create_image_id() {

        $data = array(

            'image_description' => NULL,

        );

        $query = $this->db->insert('image', $data);

        if ($query)

            return $this->db->insert_id();

        else

            return FALSE;

    }



    function create_clinic_gallery_id() {

        $data = array(

            'gallery_name' => $this->input->post('clinic_name'),

            'gallery_description' => $this->input->post('clinic_description'),

        );

        $query = $this->db->insert('gallery', $data);

        if ($query)

            return $this->db->insert_id();

        else

            return FALSE;

    }



    function update_ambulance_details() {

        $data = array(

            'ambulance_description' => $this->input->post('ambulance_description'),

            'ambulance_estd_year' => $this->input->post('ambulance_estd_year'),

        );

        $this->db->where('ambulnace_id', $this->input->post('ambulance_id'));

        $query = $this->db->update('ambulance', $data);

        return;

    }



    function get_types($service) {

        $query = $this->db->query('select * from type where type_of="' . $service . '"');

        return $query->result();

    }



    function get_all_pharmacy_types() {

        $query = $this->db->query('

            select pharmacy_id,type_name

            from pharmacy p, type t, pharmacy_type a

            where p.pharmacy_id=a.pt_pharmacy_id

            and t.type_id=a.pt_type_id');

        return $query->result();

    }



    function get_pharmacy_types_by_id($pharmacy_id) {

        $query = $this->db->query('

            select pharmacy_id,type_name

            from pharmacy p, type t, pharmacy_type a

            where p.pharmacy_id="' . $pharmacy_id . '" 

            and p.pharmacy_id=a.pt_pharmacy_id

            and t.type_id=a.pt_type_id');

        return $query->result();

    }



    function get_clinic_gallery_images($clinic_id) {

        $query = $this->db->query('

            select *

            from clinic c, gallery g, image i,gallery_image d

            where c.clinic_id="' . $clinic_id . '"

            and c.clinic_gallery_id=g.gallery_id

            and d.gi_gallery_id=g.gallery_id

            and d.gi_image_id=i.image_id;

        ');

        return $query->result();

    }



    function add_address_details() {

        $data = array(

            'address_street' => $this->input->post('address_street'),

            'address_locality' => $this->input->post('address_locality'),

            'address_city' => $this->input->post('address_city'),

            'address_state' => $this->input->post('address_state'),

            'address_country' => $this->input->post('address_country'),

            'address_pincode' => $this->input->post('address_pincode'),

        );

        $query = $this->db->insert('address', $data);

        if ($query)

            return $this->db->insert_id();

        else

            return FALSE;

    }

    function update_notification_status_off_boarding_process($notification_id) {
        $data = array(
            'reminder_resignation_off_boarding_status' => '1'
        );
        $this->db->where('notification_id', $notification_id);
        $this->db->update('notification', $data);
        return;
    }

    function update_address_details($address_id) {

        $data = array(

            'address_street' => $this->input->post('address_street'),

            'address_locality' => $this->input->post('address_locality'),

            'address_city' => $this->input->post('address_city'),

            'address_state' => $this->input->post('address_state'),

            'address_country' => $this->input->post('address_country'),

            'address_pincode' => $this->input->post('address_pincode'),

        );

        $this->db->where('address_id', $address_id);

        $query = $this->db->update('address', $data);

        if ($this->db->affected_rows() > 0)

            return TRUE;

        else

            return FALSE;

    }



    function add_image_details($details) {

        $query = $this->db->insert('image', $details);

        if ($query)

            return $this->db->insert_id();

        else

            return FALSE;

    }



    function update_image_details($image_id, $details) {

        $this->db->where('image_id', $image_id);

        $query = $this->db->update('image', $details);



        return;

    }



    function get_all_contries() {

        $query = $this->db->get('country');

        return $query->result();

    }



    function get_all_specialities() {

        $query = $this->db->get('speciality');

        return $query->result();

    }



    function get_all_servies() {

        $query = $this->db->get('service');

        return $query->result();

    }



    // clinic functions 

    function get_clinic_services($clinic_id) {

        $query = $this->db->query('

            select *

            from clinic c,service s, clinic_service a

            where c.clinic_id="' . $clinic_id . '"

            and c.clinic_id=a.cs_clinic_id

            and s.service_id=a.cs_service_id;

        ');

        return $query->result();

    }



    function add_clinic_services() {

        $count = count($this->input->post('service_id'));

        for ($i = 0; $i < $count; $i++) {

            $data = array(

                'cs_clinic_id' => $this->input->post('clinic_id'),

                'cs_service_id' => $this->input->post('service_id')[$i],

            );

            $this->db->insert('clinic_service', $data);

        }



        return;

    }



    function get_clinic_details_by_id($clinic_id) {

        $query = $this->db->query('

            select * 

            from clinic c,address a, image i 

            where c.clinic_id="' . $clinic_id . '"

            and c.clinic_address_id=a.address_id

            and c.clinic_image_id=i.image_id;');

        return $query->row();

    }



    function update_clinic_details($clinic_id) {

        $data = array(

            'clinic_name' => $this->input->post('clinic_name'),

            'clinic_description' => $this->input->post('clinic_description'),

            'clinic_contact' => $this->input->post('clinic_contact'),

            'clinic_website' => $this->input->post('clinic_website'),

            'clinic_email' => $this->input->post('clinic_email'),

            'clinic_about' => $this->input->post('clinic_about'),

            'clinic_consultation_fees' => $this->input->post('clinic_consultation_fees'),

            'clinic_working_days' => $this->input->post('clinic_working_days'),

            'clinic_opening_time' => $this->input->post('clinic_opening_time'),

            'clinic_closing_time' => $this->input->post('clinic_closing_time'),

        );

        $this->db->where('clinic_id', $clinic_id);

        $query = $this->db->update('clinic', $data);



        return;

    }



    function get_all_clinic_timings($clinic_id) {

        $query = $this->db->query('select * from times where time_clinic_id="' . $clinic_id . '";');

        return $query->result();

    }



    /* Doctor Functions */



    function doctor_listing($limit, $offset) {

        $query = $this->db->query('

                select *

                from doctor d, clinic c, clinic_doctor b,address a,image i,user u

                where b.cd_is_deleted!=1 

                and d.doctor_is_published=1

                and b.cd_doctor_id=d.doctor_id

                and b.cd_clinic_id=c.clinic_id

                and c.clinic_address_id=a.address_id

                and d.doctor_user_id=u.user_id

       		and u.user_image_id=i.image_id

       		LIMIT ' . $limit . ' OFFSET ' . $offset . ';

		');

        $q['doctors'] = $query->result();



        $query2 = $this->db->query('

                select count(*) as count

                from doctor d, clinic c, clinic_doctor b,address a,image i,user u

                where b.cd_is_deleted!=1

                and d.doctor_is_published=1

                and b.cd_doctor_id=d.doctor_id

                and b.cd_clinic_id=c.clinic_id

                and c.clinic_address_id=a.address_id

                and d.doctor_user_id=u.user_id

       		and u.user_image_id=i.image_id

                ');

        $tmp = $query2->result();

        $q['num_rows'] = $tmp[0]->count;



        return $q;

    }



    function search_doctor($limit, $offset) {

        $location = explode(",", $this->input->post('address'));

        $query = $this->db->query('

                select *

                from doctor d, clinic c, clinic_doctor b,address a,image i,user u,speciality s,doctor_speciality p

                where  s.speciality_name= "' . $this->input->post('q') . '"

                and (a.address_street like "%' . $location[0] . '%" or a.address_locality like "%' . $location[0] . '%" or a.address_city like "%' . $location[0] . '%" or a.address_state like "%' . $location[0] . '%" or a.address_country like "%' . $location[0] . '%")

                and b.cd_doctor_id=d.doctor_id

                and d.doctor_is_published=1

                and b.cd_clinic_id=c.clinic_id

                and c.clinic_address_id=a.address_id

                and d.doctor_user_id=u.user_id

                and u.user_image_id=i.image_id

                and s.speciality_id=p.ds_speciality_id

                and d.doctor_id=p.ds_doctor_id

                LIMIT ' . $limit . ' OFFSET ' . $offset . ';

		');

        $q['doctors'] = $query->result();



        $query2 = $this->db->query('

                select count(*) as count

                from doctor d, clinic c, clinic_doctor b,address a,image i,user u,speciality s,doctor_speciality p

                where b.cd_doctor_id=d.doctor_id

                and d.doctor_is_published=1

                and b.cd_clinic_id=c.clinic_id

                and c.clinic_address_id=a.address_id

                and (a.address_street like "%' . $location[0] . '%" or a.address_locality like "%' . $location[0] . '%" or a.address_city like "%' . $location[0] . '%" or a.address_state like "%' . $location[0] . '%" or a.address_country like "%' . $location[0] . '%")

                and d.doctor_user_id=u.user_id

                and u.user_image_id=i.image_id

                and s.speciality_name like "%' . $this->input->post('speciality') . '%"

                and s.speciality_id=p.ds_speciality_id

                and d.doctor_id=p.ds_doctor_id

                ');

        $tmp = $query2->result();

        $q['num_rows'] = $tmp[0]->count;



        return $q;

    }



    function filter_doctors($limit, $offset) {

        $string = 'from doctor d, clinic c, clinic_doctor b,address a,image i,user u

                where b.cd_doctor_id=d.doctor_id

                and d.doctor_is_published=1

                and b.cd_clinic_id=c.clinic_id

                and c.clinic_address_id=a.address_id

                and d.doctor_user_id=u.user_id

       		and u.user_image_id=i.image_id';

        if ($this->input->get_post('doctor_is_247'))

            $string.=' and d.doctor_is_247="' . $this->input->get_post('doctor_is_247') . '"';

        if ($this->input->get_post('doctor_is_certified'))

            $string.=' and d.doctor_is_certified="' . $this->input->get_post('doctor_is_certified') . '"';

        if ($this->input->get_post('doctor_home_checkup'))

            $string.=' and d.doctor_home_checkup="' . $this->input->get_post('doctor_home_checkup') . '"';

        if ($this->input->get_post('user_gender'))

            $string.=' and u.user_gender="' . $this->input->get_post('user_gender') . '"';



        $string2 = $string;

        if ($limit)

            $string.=" LIMIT " . $limit;

        if ($offset)

            $string.=" OFFSET " . $offset;



        $query = $this->db->query('select * ' . $string);

        $q['doctors'] = $query->result();



        $query2 = $this->db->query('select count(*) as count ' . $string2);

        $tmp = $query2->result();

        $q['num_rows'] = $tmp[0]->count;



        return $q;

    }



    function load_doctor_clinic_timings() {

        $day = date('l', strtotime($this->input->post('booking_date')));

        $query = $this->db->query('

            select * 

            from doctor_timings

            where time_doctor_id="' . $this->input->post('doctor_id') . '"

            and time_clinic_id="' . $this->input->post('clinic_id') . '"

            and  time_day="' . $day . '";');

        return $query->row();

    }



    function get_doctor_details_by_id($doctor_id) {

        $query = $this->db->query('

            select * 

            from doctor d,user u, image i, address a

            where doctor_id="' . $doctor_id . '"

            and d.doctor_user_id=u.user_id

            and u.user_address_id=a.address_id

            and u.user_image_id=i.image_id;');

        return $query->row();

    }



    /* Pharmacy functions */



    function pharmacy_listing($limit, $offset) {

        $query = $this->db->query('

                select *

                from pharmacy b,user u,image i,address a

                where b.pharmacy_user_id=u.user_id

                and u.user_address_id=a.address_id

                and u.user_image_id=i.image_id

                LIMIT ' . $limit . ' OFFSET ' . $offset . ';

		');

        $q['pharmacies'] = $query->result();



        $query2 = $this->db->query('

               select count(*) as count

                from pharmacy b,user u,image i,address a

                where b.pharmacy_user_id=u.user_id

                and u.user_address_id=a.address_id

                and u.user_image_id=i.image_id

                ');

        $tmp = $query2->result();

        $q['num_rows'] = $tmp[0]->count;



        return $q;

    }



    function search_pharmacy($limit, $offset) {

        $query = $this->db->query('

                select *

                from pharmacy b,user u,image i,address a

                where b.pharmacy_user_id=u.user_id

                and u.user_address_id=a.address_id

                and u.user_image_id=i.image_id

                LIMIT ' . $limit . ' OFFSET ' . $offset . ';

		');

        $q['pharmacies'] = $query->result();



        $query2 = $this->db->query('

               select count(*) as count

                from pharmacy b,user u,image i,address a

                where b.pharmacy_user_id=u.user_id

                and u.user_address_id=a.address_id

                and u.user_image_id=i.image_id

                ');

        $tmp = $query2->result();

        $q['num_rows'] = $tmp[0]->count;



        return $q;

    }



    function filter_pharmacy($limit, $offset) {

        $string = 'from pharmacy p,user u,image i,address a

                where p.pharmacy_user_id=u.user_id

                and u.user_address_id=a.address_id

                and u.user_image_id=i.image_id';

        if ($this->input->get_post('pharmacy_247'))

            $string.=' and p.pharmacy_247="' . $this->input->get_post('pharmacy_247') . '"';

        if ($this->input->get_post('pharmacy_is_certified'))

            $string.=' and p.pharmacy_is_certified="' . $this->input->get_post('pharmacy_is_certified') . '"';

        if ($this->input->get_post('pharmacy_home_delivery'))

            $string.=' and p.pharmacy_home_delivery="' . $this->input->get_post('pharmacy_home_delivery') . '"';



        $string2 = $string;

        if ($limit)

            $string.=" LIMIT " . $limit;

        if ($offset)

            $string.=" OFFSET " . $offset;



        $query = $this->db->query('select * ' . $string);

        $q['pharmacies'] = $query->result();



        $query2 = $this->db->query('select count(*) as count ' . $string2);

        $tmp = $query2->result();

        $q['num_rows'] = $tmp[0]->count;



        return $q;

    }



    function get_pharmacy_details_by_id($pharmacy_id) {

        $query = $this->db->query('

            select * 

            from pharmacy p,user u, image i, address a

            where p.pharmacy_id="' . $pharmacy_id . '"

            and p.pharmacy_user_id=u.user_id

            and u.user_address_id=a.address_id

            and u.user_image_id=i.image_id

            ;');

        return $query->row();

    }



    function get_pharmacy_types() {

        $query = $this->db->query('

            select pt_id,type_id,type_name

            from pharmacy a, type t, pharmacy_type c

            where a.pharmacy_id="' . $this->session->userdata('pharmacy_id') . '" 

            and c.pt_pharmacy_id=a.pharmacy_id

            and c.pt_type_id=t.type_id');

        return $query->result();

    }



    /* Laboratory functions */



    function laboratory_listing($limit, $offset) {

        $query = $this->db->query('

                select *

                from laboratory b,user u,image i,address a

                where b.laboratory_user_id=u.user_id

                and u.user_address_id=a.address_id

                and u.user_image_id=i.image_id

                LIMIT ' . $limit . ' OFFSET ' . $offset . ';

		');

        $q['laboratories'] = $query->result();



        $query2 = $this->db->query('

               select count(*) as count

                from laboratory b,user u,image i,address a

                where b.laboratory_user_id=u.user_id

                and u.user_address_id=a.address_id

                and u.user_image_id=i.image_id

                ');

        $tmp = $query2->result();

        $q['num_rows'] = $tmp[0]->count;



        return $q;

    }



    function filter_laboratory($limit, $offset) {

        $string = 'from laboratory l,user u,image i,address a

                where l.laboratory_user_id=u.user_id

                and u.user_address_id=a.address_id

                and u.user_image_id=i.image_id';

        if ($this->input->get_post('laboratory_is_247'))

            $string.=' and l.laboratory_is_247="' . $this->input->get_post('laboratory_is_247') . '"';

        if ($this->input->get_post('laboratory_is_certified'))

            $string.=' and l.laboratory_is_certified="' . $this->input->get_post('laboratory_is_certified') . '"';

        if ($this->input->get_post('laboratory_home_services'))

            $string.=' and l.laboratory_home_services="' . $this->input->get_post('laboratory_home_services') . '"';



        $string2 = $string;

        if ($limit)

            $string.=" LIMIT " . $limit;

        if ($offset)

            $string.=" OFFSET " . $offset;



        $query = $this->db->query('select * ' . $string);

        $q['laboratories'] = $query->result();



        $query2 = $this->db->query('select count(*) as count ' . $string2);

        $tmp = $query2->result();

        $q['num_rows'] = $tmp[0]->count;



        return $q;

    }



    function search_laboratory($limit, $offset) {

        $query = $this->db->query('

                select *

                from laboratory b,user u,image i,address a

                where b.laboratory_user_id=u.user_id

                and u.user_address_id=a.address_id

                and u.user_image_id=i.image_id

                LIMIT ' . $limit . ' OFFSET ' . $offset . ';

		');

        $q['laboratories'] = $query->result();



        $query2 = $this->db->query('

               select count(*) as count

                from laboratory b,user u,image i,address a

                where b.laboratory_user_id=u.user_id

                and u.user_address_id=a.address_id

                and u.user_image_id=i.image_id

                ');

        $tmp = $query2->result();

        $q['num_rows'] = $tmp[0]->count;



        return $q;

    }



    function get_laboratory_details_by_id($laboratory_id) {

        $query = $this->db->query('select *

                from laboratory b,user u,image i,address a

                where laboratory_id="' . $laboratory_id . '"

                and b.laboratory_user_id=u.user_id

                and u.user_address_id=a.address_id

                and u.user_image_id=i.image_id;');

        return $query->row();

    }



    function get_ambulance_types($ambulance_id) {

        $query = $this->db->query('

            select at_id,type_id,type_name

            from ambulance a, type t, ambulance_type c

            where a.ambulance_id="' . $ambulance_id . '" 

            and c.at_ambulance_id=a.ambulance_id

            and c.at_type_id=t.type_id');

        return $query->result();

    }



    function get_laboratory_images_by_id($laboratory_id) {

        $query = $this->db->query('

             select *

             from laboratory l, gallery g, gallery_image c, image i

             where l.laboratory_id="' . $laboratory_id . '"

             and l.laboratory_gallery_id=g.gallery_id

             and g.gallery_id=c.gi_gallery_id

             and c.gi_image_id=i.image_id;

             ');

        return $query->result();

    }



    //Ambulance Functions

    function ambulance_listing($limit, $offset) {

        $query = $this->db->query('

                select *

                from ambulance b,user u,image i,address a

                where b.ambulance_user_id=u.user_id

                and u.user_address_id=a.address_id

                and u.user_image_id=i.image_id

                LIMIT ' . $limit . ' OFFSET ' . $offset . ';

                ');

        $q['ambulances'] = $query->result();



        $query2 = $this->db->query('

                select count(*) as count

                from ambulance b,user u,image i,address a

                where b.ambulance_user_id=u.user_id

                and u.user_address_id=a.address_id

                and u.user_image_id=i.image_id

                ');

        $tmp = $query2->result();

        $q['num_rows'] = $tmp[0]->count;



        return $q;

    }



    function search_ambulance($limit, $offset) {

        $query = $this->db->query('

                select *

                from ambulance b,user u,image i,address a

                where b.ambulance_user_id=u.user_id

                and u.user_address_id=a.address_id

                and u.user_image_id=i.image_id

                LIMIT ' . $limit . ' OFFSET ' . $offset . ';

                ');

        $q['ambulances'] = $query->result();



        $query2 = $this->db->query('

                select count(*) as count

                from ambulance b,user u,image i,address a

                where b.ambulance_user_id=u.user_id

                and u.user_address_id=a.address_id

                and u.user_image_id=i.image_id

                ');

        $tmp = $query2->result();

        $q['num_rows'] = $tmp[0]->count;



        return $q;

    }



    function filter_ambulance($limit, $offset) {

        $string = 'from ambulance l,user u,image i,address a

                where l.ambulance_user_id=u.user_id

                and u.user_address_id=a.address_id

                and u.user_image_id=i.image_id';

        if ($this->input->get_post('ambulance_is_247'))

            $string.=' and l.ambulance_is_247="' . $this->input->get_post('ambulance_is_247') . '"';

        if ($this->input->get_post('laboratory_is_certified'))

            $string.=' and l.ambulance_is_certified="' . $this->input->get_post('ambulance_is_certified') . '"';



        $string2 = $string;

        if ($limit)

            $string.=" LIMIT " . $limit;

        if ($offset)

            $string.=" OFFSET " . $offset;



        $query = $this->db->query('select * ' . $string);

        $q['ambulances'] = $query->result();



        $query2 = $this->db->query('select count(*) as count ' . $string2);

        $tmp = $query2->result();

        $q['num_rows'] = $tmp[0]->count;



        return $q;

    }



    function get_ambulance_details_by_id($ambulance_id) {

        $query = $this->db->query('

            select * 

            from ambulance a,user u,image i, address c

            where a.ambulance_id="' . $ambulance_id . '"

            and a.ambulance_user_id=u.user_id

            and u.user_image_id=i.image_id

            and u.user_address_id=c.address_id;');

        return $query->row();

    }



    //bloodbank functions

    function bloodbank_listing($limit, $offset) {

        $query = $this->db->query('

                select *

                from bloodbank b,user u,image i,address a

                where b.bloodbank_user_id=u.user_id

                and u.user_address_id=a.address_id

                and u.user_image_id=i.image_id

                LIMIT ' . $limit . ' OFFSET ' . $offset . ';

                ');

        $q['bloodbanks'] = $query->result();



        $query2 = $this->db->query('

                select count(*) as count

                from bloodbank b,user u,image i,address a

                where b.bloodbank_user_id=u.user_id

                and u.user_address_id=a.address_id

                and u.user_image_id=i.image_id

                ');

        $tmp = $query2->result();

        $q['num_rows'] = $tmp[0]->count;



        return $q;

    }



    function filter_bloodbank($limit, $offset) {

        $string = 'from bloodbank b,user u,image i,address a

                where b.bloodbank_user_id=u.user_id

                and u.user_address_id=a.address_id

                and u.user_image_id=i.image_id';

        if ($this->input->get_post('bloodbank_is_247'))

            $string.=' and b.bloodbank_is_247="' . $this->input->get_post('bloodbank_is_247') . '"';

        if ($this->input->get_post('bloodbank_is_certified'))

            $string.=' and b.bloodbank_is_certified="' . $this->input->get_post('bloodbank_is_certified') . '"';



        $string2 = $string;

        if ($limit)

            $string.=" LIMIT " . $limit;

        if ($offset)

            $string.=" OFFSET " . $offset;



        $query = $this->db->query('select * ' . $string);

        $q['bloodbanks'] = $query->result();



        $query2 = $this->db->query('select count(*) as count ' . $string2);

        $tmp = $query2->result();

        $q['num_rows'] = $tmp[0]->count;



        return $q;

    }



    function search_bloodbank($limit, $offset) {

        $query = $this->db->query('

                select *

                from bloodbank b,user u,image i,address a

                where b.bloodbank_user_id=u.user_id

                and u.user_address_id=a.address_id

                and u.user_image_id=i.image_id

                LIMIT ' . $limit . ' OFFSET ' . $offset . ';

                ');

        $q['bloodbanks'] = $query->result();



        $query2 = $this->db->query('

                select count(*) as count

                from bloodbank b,user u,image i,address a

                where b.bloodbank_user_id=u.user_id

                and u.user_address_id=a.address_id

                and u.user_image_id=i.image_id

                ');

        $tmp = $query2->result();

        $q['num_rows'] = $tmp[0]->count;



        return $q;

    }



    function get_bloodbanks_details_by_id($bloodbanks_id) {

        $query = $this->db->query('

            select * 

            from bloodbank b,user u,image i,address a

            where b.bloodbanks_id="' . $bloodbanks_id . '"

            and b.bloodbank_user_id=u.user_id

            and u.user_image_id=i.image_id

            and u.user_address_id=a.address_id;');

        return $query->row();

    }



    //Ngo functions

    function ngo_listing($limit, $offset) {

        $query = $this->db->query('

                select *

                from ngo b,user u,image i,address a

                where b.ngo_user_id=u.user_id

                and u.user_address_id=a.address_id

                and u.user_image_id=i.image_id

                LIMIT ' . $limit . ' OFFSET ' . $offset . ';

                ');

        $q['ngos'] = $query->result();



        $query2 = $this->db->query('

                select count(*) as count

                from ngo b,user u,image i,address a

                where b.ngo_user_id=u.user_id

                and u.user_address_id=a.address_id

                and u.user_image_id=i.image_id

                ');

        $tmp = $query2->result();

        $q['num_rows'] = $tmp[0]->count;



        return $q;

    }



    function filter_ngo($limit, $offset) {

        $string = 'from ngo b,user u,image i,address a

                where b.ngo_user_id=u.user_id

                and u.user_address_id=a.address_id

                and u.user_image_id=i.image_id';

        if ($this->input->get_post('ngo_is_247'))

            $string.=' and b.ngo_is_247="' . $this->input->get_post('ngo_is_247') . '"';

        if ($this->input->get_post('ngo_is_certified'))

            $string.=' and b.ngo_is_certified="' . $this->input->get_post('ngo_is_certified') . '"';



        $string2 = $string;

        if ($limit)

            $string.=" LIMIT " . $limit;

        if ($offset)

            $string.=" OFFSET " . $offset;



        $query = $this->db->query('select * ' . $string);

        $q['ngos'] = $query->result();



        $query2 = $this->db->query('select count(*) as count ' . $string2);

        $tmp = $query2->result();

        $q['num_rows'] = $tmp[0]->count;



        return $q;

    }



    function search_ngo($limit, $offset) {

        $query = $this->db->query('

                select *

                from ngo b,user u,image i,address a

                where b.ngo_user_id=u.user_id

                and u.user_address_id=a.address_id

                and u.user_image_id=i.image_id

                LIMIT ' . $limit . ' OFFSET ' . $offset . ';

                ');

        $q['ngos'] = $query->result();



        $query2 = $this->db->query('

                select count(*) as count

                from ngo b,user u,image i,address a

                where b.ngo_user_id=u.user_id

                and u.user_address_id=a.address_id

                and u.user_image_id=i.image_id

                ');

        $tmp = $query2->result();

        $q['num_rows'] = $tmp[0]->count;



        return $q;

    }



    function get_ngo_details_by_id($ngo_id) {

        $query = $this->db->query('

            select * 

            from ngo n,user u,image i,address a

            where n.ngo_id="' . $ngo_id . '"

            and n.ngo_user_id=u.user_id

            and u.user_image_id=i.image_id

            and u.user_address_id=a.address_id;');

        return $query->row();

    }



    function get_ngo_types($ngo_id) {

        $query = $this->db->query('

            select nt_id,type_id,type_name

            from ngo a, type t, ngo_type c

            where  a.ngo_id="' . $ngo_id . '" 

            and c.nt_ngo_id=a.ngo_id

            and c.nt_type_id=t.type_id');

        return $query->result();

    }



    //insurance functions

    function insurance_listing($limit, $offset) {

        $query = $this->db->query('

                select *

                from insurance i, image a

                where i.insurance_image_id=a.image_id

                LIMIT ' . $limit . ' OFFSET ' . $offset . ';

                ');

        $q['insurances'] = $query->result();



        $query2 = $this->db->query('

                select count(*) as count

                from insurance i, image a

                where i.insurance_image_id=a.image_id

                ');

        $tmp = $query2->result();

        $q['num_rows'] = $tmp[0]->count;



        return $q;

    }



    function filter_insurance($limit, $offset) {

        $string = 'from insurance i, image a

                where i.insurance_image_id=a.image_id';





        $string2 = $string;

        if ($limit)

            $string.=" LIMIT " . $limit;

        if ($offset)

            $string.=" OFFSET " . $offset;



        $query = $this->db->query('select * ' . $string);

        $q['insurances'] = $query->result();



        $query2 = $this->db->query('select count(*) as count ' . $string2);

        $tmp = $query2->result();

        $q['num_rows'] = $tmp[0]->count;



        return $q;

    }



    function get_insurance_details_by_id($insurance_id) {

        $query = $this->db->query('select *

                from insurance i, image a

                where i.insurance_id="' . $insurance_id . '" 

                and i.insurance_image_id=a.image_id');

        return $query->row();

    }



    //offer functions

    function offer_listing($limit, $offset) {

        $query = $this->db->query('

                select *

                from offer o, image i

                where o.offer_image_id=i.image_id

                LIMIT ' . $limit . ' OFFSET ' . $offset . ';

                ');

        $q['offers'] = $query->result();



        $query2 = $this->db->query('

                select count(*) as count

                from offer o, image i

                where o.offer_image_id=i.image_id

                ;

                ');

        $tmp = $query2->result();

        $q['num_rows'] = $tmp[0]->count;



        return $q;

    }



    function filter_offers($limit, $offset) {

        $string = 'from offer o, image i

                where o.offer_image_id=i.image_id';





        $string2 = $string;

        if ($limit)

            $string.=" LIMIT " . $limit;

        if ($offset)

            $string.=" OFFSET " . $offset;



        $query = $this->db->query('select * ' . $string);

        $q['insurances'] = $query->result();



        $query2 = $this->db->query('select count(*) as count ' . $string2);

        $tmp = $query2->result();

        $q['num_rows'] = $tmp[0]->count;

        return $q;

    }



    function get_offer_details_by_id($offer_id) {

        $query = $this->db->query('

            select * 

            from offer o,image i

            where offer_id="' . $offer_id . '"

            and offer_image_id=i.image_id;');

        return $query->row();

    }



    //ads functions

    function ads_listing($limit, $offset) {

        $query = $this->db->query('

                select *

                from ads a, image i,user u,address b

                where a.ads_image_id=i.image_id

                and a.ads_address_id=b.address_id

                and a.ads_user_id=u.user_id

                LIMIT ' . $limit . ' OFFSET ' . $offset . ';

                ');

        $q['ads'] = $query->result();



        $query2 = $this->db->query('

                select count(*) as count

                from ads a, image i,user u,address b

                where a.ads_image_id=i.image_id

                and a.ads_address_id=b.address_id

                and a.ads_user_id=u.user_id

                ');

        $tmp = $query2->result();

        $q['num_rows'] = $tmp[0]->count;



        return $q;

    }



    function get_ads_details_by_id($ads_id) {

        $query = $this->db->query('select * 

            from ads a, image i,user u,address b

                where ads_id="' . $ads_id . '"

                and a.ads_image_id=i.image_id

                and a.ads_address_id=b.address_id

                and a.ads_user_id=u.user_id

            ;');

        return $query->row();

    }



    //other functions

    function create_clinic_gallery() {

        $data = array(

            'gallery_name' => $this->input->post('clinic_name'),

            'gallery_description' => $this->input->post('clinic_description'),

        );

        $query = $this->db->insert('gallery', $data);

        if ($query)

            return $this->db->insert_id();

        else

            return FALSE;

    }



    function add_doctor_clinic_mapping($clinic_id) {

        $data = array(

            'cd_clinic_id' => $clinic_id,

            'cd_doctor_id' => $this->session->userdata('doctor_id'),

        );

        $query = $this->db->insert('clinic_doctor', $data);

        return;

    }



    function add_patient_details($address_id, $image_id) {

        $dob = date('Y-m-d', strtotime($this->input->post('user_birthdate')));

        $data = array(

            'user_fullname' => $this->input->post('user_fullname'),

            'user_email' => $this->input->post('user_email'),

            'user_mobile' => $this->input->post('user_mobile'),

            'user_password' => $this->input->post('user_password'),

            'user_gender' => $this->input->post('user_gender'),

            'user_type' => 'Patient',

            'user_birthdate' => $dob,

            'user_blood_group' => $this->input->post('user_blood_group'),

            'user_image_id' => $image_id,

            'user_address_id' => $address_id,

        );

        $query = $this->db->insert('user', $data);

        if ($query)

            return $this->db->insert_id();

        else

            return FALSE;

    }



    function update_user_basic_details($user_id) {

        $dob = date('Y-m-d', strtotime($this->input->post('user_birthdate')));

        $data = array(

            'user_fullname' => $this->input->post('user_fullname'),

            'user_email' => $this->input->post('user_email'),

            'user_mobile' => $this->input->post('user_mobile'),

            'user_gender' => $this->input->post('user_gender'),

            'user_birthdate' => $dob,

            'user_blood_group' => $this->input->post('user_blood_group'),

        );

        $this->db->where('user_id', $user_id);

        $this->db->update('user', $data);

        return;

    }



    function get_patient_prescriscription_history($patient_id) {

        $query = $this->db->query('

            select *

            from doctor_prescription p,image i,user u

            where p.prescription_user_id="' . $patient_id . '"

            and p.prescription_doctor_id="' . $this->session->userdata('doctor_id') . '"

            and p.prescription_image_id=i.image_id

            and p.prescription_user_id=u.user_id;');

        return $query->result();

    }



    function get_patient_report_history($patient_id) {

        $query = $this->db->query('

            select *

            from doctor_report p

            where p.report_user_id="' . $patient_id . '"

            and p.report_doctor_id="' . $this->session->userdata('doctor_id') . '";');

        return $query->result();

    }



    function get_patient_report_images($patient_id) {

        $query = $this->db->query('select *

            from doctor_report r,gallery_image c,image i

            where r.report_user_id="' . $patient_id . '"

            and r.report_doctor_id="' . $this->session->userdata('doctor_id') . '"    

            and r.report_gallery_id=c.gi_gallery_id

            and c.gi_image_id=i.image_id');

        return $query->result();

    }



    function get_my_appointments($limit, $offset) {

        $query = $this->db->query('

            select *

            from doctor_appointment

            where da_doctor_id="' . $this->session->userdata('doctor_id') . '"

            ORDER BY da_date DESC

            LIMIT ' . $limit . ' OFFSET ' . $offset . ';');



        $q2['my_appointments'] = $query->result();

        $q = $this->db->query('

            select count(*) as count

            from doctor_appointment

            where da_doctor_id="' . $this->session->userdata('doctor_id') . '"; ');

        $tmp = $q->result();

        $q2['num_rows'] = $tmp[0]->count;

        return $q2;

    }



    function get_my_todays_appointments() {

        $today = date('Y-m-d');

        $query = $this->db->query('

            select *

            from doctor_appointment

            where da_doctor_id="' . $this->session->userdata('doctor_id') . '"

            and da_date="' . $today . '"    

            ORDER BY da_time ASC

            ;');



        return $query->result();

    }



    function get_all_doctor_clinics() {

        $query = $this->db->query('

            select doctor_id,clinic_id, clinic_name,clinic_consultation_fees,concat(address_locality,",",address_city) as address

            from doctor d, clinic c, clinic_doctor a,address b

            where c.clinic_is_deleted="0" 

            and a.cd_doctor_id=d.doctor_id

            and a.cd_clinic_id=c.clinic_id

            and c.clinic_address_id=b.address_id;');

        return $query->result();

    }



    function get_all_doctor_clinics_by_doctor_id($doctor_id) {

        $query = $this->db->query('

            select doctor_id,clinic_id, clinic_name,clinic_consultation_fees,concat(address_locality,",",address_city) as address

            from doctor d, clinic c, clinic_doctor a,address b

            where d.doctor_id="' . $doctor_id . '" 

            and c.clinic_is_deleted="0" 

            and a.cd_doctor_id=d.doctor_id

            and a.cd_clinic_id=c.clinic_id

            and c.clinic_address_id=b.address_id;');

        return $query->result();

    }



    function get_all_clinic_images() {

        $query = $this->db->query('

            select clinic_id,clinic_name,image_path,image_filename

            from clinic c,gallery g, gallery_image a, image i

            where c.clinic_gallery_id=g.gallery_id

            and a.gi_gallery_id=g.gallery_id

            and a.gi_image_id=i.image_id;');

        return $query->result();

    }



    function get_all_doctor_specialities() {

        $query = $this->db->query('

            select doctor_id,speciality_name

            from doctor d, speciality s, doctor_speciality a

            where a.ds_doctor_id=d.doctor_id

            and a.ds_speciality_id=s.speciality_id;');

        return $query->result();

    }



    function get_all_doctor_degrees() {

        $query = $this->db->query('

            select doctor_id,education_degree

            from doctor d, doctor_education e

            where e.education_doctor_id=d.doctor_id;');

        return $query->result();

    }



    function check_if_user_exists_by_mobile_no($mobile) {

        $query = $this->db->query('

            select *

            from user 

            where user_mobile="' . $mobile . '";');



        if ($query->num_rows() > 0)

            return TRUE;

        else

            return FALSE;

    }



    function get_user_id_by_mobile_no($mobile) {

        $query = $this->db->query('

            select user_id

            from user 

            where user_mobile="' . $mobile . '";');



        if ($query->num_rows() > 0)

            return $query->row()->user_id;

        else

            return FALSE;

    }



    function book_doctor_appointment($user_id) {

        $code = random_string('numeric', 6);

        $adate = date('Y-m-d', strtotime($this->input->post('da_date')));

        $data = array(

            'da_doctor_id' => $this->input->post('da_doctor_id'),

            'da_clinic_id' => $this->input->post('da_clinic_id'),

            'da_user_id' => $user_id,

            'da_date' => $adate,

            'da_time' => $this->input->post('da_time'),

            'da_patient_name' => $this->input->post('user_fullname'),

            'da_patient_email' => $this->input->post('user_email'),

            'da_patient_mobile' => $this->input->post('user_mobile'),

            'da_reason' => $this->input->post('da_reason'),

            'da_verification_code' => $code,

        );

        $query = $this->db->insert('doctor_appointment', $data);

        $appdata['code'] = $code;

        $appdata['app_id'] = $this->db->insert_id();

        if ($query)

            return $appdata;

        else

            return FALSE;

    }



    function register_appointment_new_user_as_patient() {

        $password = random_string('alnum', 6);

        $data = array(

            'user_fullname' => $this->input->post('user_fullname'),

            'user_email' => $this->input->post('user_email'),

            'user_mobile' => $this->input->post('user_mobile'),

            'user_password' => $password,

            'user_type' => 'Patient',

        );

        $query = $this->db->insert('user', $data);

        if ($query)

            return $this->db->insert_id();

        else

            return FALSE;

    }



    function verify_doctor_appointment_code_of_user() {

        $query = $this->db->query('

            update doctor_appointment 

            set da_is_appointment_verified="1"

            where da_id="' . $this->input->post('appointment_id') . '"

            and  da_verification_code="' . $this->input->post('verification_code') . '"   

            ');



        if ($this->db->affected_rows() > 0)

            return TRUE;

        else

            return FALSE;

    }



    function get_user_mobile_from_doctor_appointment_by_appointment_id($app_id) {

        $query = $this->db->query('

            select da_patient_mobile

            from doctor_appointment

            where da_id="' . $app_id . '";');

        $data = $query->row();

        return $data->da_patient_mobile;

    }



    function get_doctor_clinics_by_doctor_id($doctor_id) {

        $query = $this->db->query('

                select *

                from doctor d, clinic c, clinic_doctor e,address a,image i

                where d.doctor_id="' . $doctor_id . '" 

                and e.cd_doctor_id=d.doctor_id

                and e.cd_clinic_id=c.clinic_id

                and e.cd_is_deleted="0"

                and c.clinic_address_id=a.address_id

                and c.clinic_image_id=i.image_id');

        return $query->result();

    }



    function get_doctor_specialities_by_doctor_id($doctor_id) {

        $query = $this->db->query('

                select distinct doctor_id,speciality_name

                from doctor d, speciality s, doctor_speciality a

                where d.doctor_id="' . $doctor_id . '"

                and a.ds_doctor_id=d.doctor_id

                and a.ds_speciality_id=s.speciality_id');

        return $query->result();

    }



    function get_clinic_images_by_doctor_id($doctor_id) {

        $query = $this->db->query('

                select clinic_id,image_path,image_filename

                from doctor d,clinic c,clinic_doctor e,gallery g,image i,gallery_image f

                where d.doctor_id="' . $doctor_id . '"

                and e.cd_doctor_id=d.doctor_id

                and e.cd_clinic_id=c.clinic_id

                and c.clinic_gallery_id=g.gallery_id

                and f.gi_gallery_id=g.gallery_id

                and f.gi_image_id=i.image_id

                ');

        return $query->result();

    }



    function get_doctor_degrees_by_doctor_id($doctor_id) {

        $query = $this->db->query('

                select *

                from doctor_education e

                where e.education_doctor_id="' . $doctor_id . '"

                ');

        return $query->result();

    }



    function get_doctor_experience_by_doctor_id($doctor_id) {

        $query = $this->db->query('

                select *

                from doctor_experience e

                where e.experience_doctor_id="' . $doctor_id . '"

                ');

        return $query->result();

    }



    function get_doctor_membership_by_doctor_id($doctor_id) {

        $query = $this->db->query('

                select *

                from doctor_membership e

                where e.membership_doctor_id="' . $doctor_id . '"

                ');

        return $query->result();

    }



    function get_doctor_registration_by_doctor_id($doctor_id) {

        $query = $this->db->query('

                select *

                from doctor_registration e

                where e.registration_doctor_id="' . $doctor_id . '"

                ');

        return $query->result();

    }



    function get_all_tests() {

        $query = $this->db->query('

            select * from test;');

        return $query->result();

    }



    function get_all_lab_tests() {

        $query = $this->db->query('

            select laboratory_id,test_id,test_name,lt_laboratory_id

            from laboratory l,test t,laboratory_test a

            where a.lt_laboratory_id=l.laboratory_id

            and a.lt_test_id=t.test_id;');

        return $query->result();

    }



    function get_clinic_doctors_by_id($clinic_id) {

        $query = $this->db->query('

            select *

            from clinic c,doctor d,clinic_doctor s,user u,image i

            where c.clinic_id="' . $clinic_id . '"

            and c.clinic_id=s.cd_clinic_id

            and d.doctor_id=s.cd_doctor_id

            and d.doctor_user_id=u.user_id

            and u.user_image_id=i.image_id');

        return $query->result();

    }



    function get_clinic_services_by_id($clinic_id) {

        $query = $this->db->query('

            select service_id,service_name

            from clinic c,service s, clinic_service a

            where c.clinic_id="' . $clinic_id . '"

            and c.clinic_id=a.cs_clinic_id

            and s.service_id=cs_service_id

            ');

        return $query->result();

    }



    function get_clinic_images_by_id($clinic_id) {

        $query = $this->db->query('

            select clinic_id,image_path,image_filename

            from clinic c,gallery g, image i,gallery_image a

            where c.clinic_id="' . $clinic_id . '"

            and c.clinic_gallery_id=g.gallery_id

            and g.gallery_id=a.gi_gallery_id

            and i.image_id=a.gi_image_id');

        return $query->result();

    }



    function get_all_ambulance_types() {

        $query = $this->db->query('

            select ambulance_id,type_name

            from ambulance a,type t, ambulance_type e

            where a.ambulance_id=e.at_ambulance_id

            and t.type_id=e.at_type_id;');

        return $query->result();

    }



    function get_all_ngo_types() {

        $query = $this->db->query('

            select ngo_id,type_name

            from ngo a,type t, ngo_type e

            where a.ngo_id=e.nt_ngo_id

            and t.type_id=e.nt_type_id;');

        return $query->result();

    }



//blood Bank

    function get_all_bloodbank_types() {

        $query = $this->db->query('

            select bloodbank_id,type_name

            from bloodbank a,type t, bloodbank_type e

            where a.bloodbank_id=e.bt_bloodbank_id

            and t.type_id=e.bt_type_id;');

        return $query->result();

    }



    function get_bloodbank_details_by_id($bloodbank_id) {

        $query = $this->db->query('

            select *

            from bloodbank b, user u, image i, address a

            where b.bloodbank_id="' . $bloodbank_id . '" 

            and b.bloodbank_user_id=u.user_id

            and u.user_image_id=i.image_id

            and u.user_address_id=a.address_id;');

        return $query->row();

    }



    function get_bloodbank_types($bloodbank_id) {

        $query = $this->db->query('

            select bt_id,type_id,type_name

            from bloodbank a, type t, bloodbank_type c

            where  a.bloodbank_id="' . $bloodbank_id . '" 

            and c.bt_bloodbank_id=a.bloodbank_id

            and c.bt_type_id=t.type_id');

        return $query->result();

    }



    function get_all_insurance_types() {

        $query = $this->db->query('

            select insurance_id,type_name

            from insurance a,type t, insurance_type e

            where a.insurance_id=e.it_insurance_id

            and t.type_id=e.it_type_id;');

        return $query->result();

    }



    function add_advertisement_details($address_id, $image_id) {

        $data = array(

            'ads_title' => $this->input->post('ads_title'),

            'ads_description' => $this->input->post('ads_description'),

            'ads_user_id' => $this->session->userdata('user_id'),

            'ads_contact' => $this->input->post('ads_contact'),

            'ads_address_id' => $address_id,

            'ads_image_id' => $image_id,

            'ads_ad_type' => $this->input->post('ads_ad_type'),

            'ads_price' => $this->input->post('ads_price'),

        );

        $query = $this->db->insert('ads', $data);

        if ($query)

            return $this->db->insert_id();

        else

            return FALSE;

    }



    function add_advertisement_type_mapping($ads_id) {

        $count = count($this->input->post('type_id'));

        for ($i = 0; $i < $count; $i++) {

            $data = array(

                'at_ads_id' => $ads_id,

                'at_type_id' => $this->input->post('type_id')[$i],

            );

            $this->db->insert('ads_type', $data);

        }

        return;

    }



    function delete_clinic_from_clinic($clinic_id) {

        $query = $this->db->query('

            update clinic set clinic_is_deleted="1" where clinic_id="' . $clinic_id . '"');

        if ($query)

            return TRUE;

        else

            return FALSE;

    }



    function delete_clinic_from_clinic_doctor($clinic_id) {

        $query = $this->db->query('

            update clinic_doctor set cd_is_deleted="1" where cd_clinic_id="' . $clinic_id . '"');

        if ($query)

            return TRUE;

        else

            return FALSE;

    }



    function delete_clinic_from_clinic_service($clinic_id) {

        $query = $this->db->query('

            update clinic_service set cs_is_deleted="1" where cs_clinic_id="' . $clinic_id . '"');

        if ($query)

            return TRUE;

        else

            return FALSE;

    }



    function get_patient_details_by_id($patient_id) {

        $query = $this->db->query('select * 

            from user u,address a, image i

            where user_id="' . $patient_id . '"

            and u.user_address_id=a.address_id

            and u.user_image_id=i.image_id;');

        return $query->row();

    }



    function add_patient_into_doctor_patient($patient_id) {

        $data = array(

            'dp_doctor_id' => $this->session->userdata('doctor_id'),

            'dp_user_id' => $patient_id,

        );

        $query = $this->db->insert('doctor_patient', $data);

        if ($query)

            return TRUE;

        else

            return FALSE;

    }



    function check_if_existing_doctor_patient($patient_id) {

        $query = $this->db->query('

            select *

            from doctor_patient

            where dp_doctor_id="' . $this->session->userdata('doctor_id') . '"

            and dp_user_id="' . $patient_id . '"    ');

        if ($query->num_rows() > 0)

            return TRUE;

        else

            return FALSE;

    }



    function check_if_existing_laboratory_patient($patient_id) {

        $query = $this->db->query('

            select *

            from laboratory_patient

            where lp_laboratory_id="' . $this->session->userdata('laboratory_id') . '"

            and lp_user_id="' . $patient_id . '"    ');

        if ($query->num_rows() > 0)

            return TRUE;

        else

            return FALSE;

    }



    function add_patient_into_laboratory_patient($patient_id) {

        $data = array(

            'lp_laboratory_id' => $this->session->userdata('laboratory_id'),

            'lp_user_id' => $patient_id,

        );

        $query = $this->db->insert('laboratory_patient', $data);

        if ($query)

            return TRUE;

        else

            return FALSE;

    }



//messages functions

    function add_message_details($from, $to) {

        $data = array(

            'message_text' => $this->input->post('message_text'),

            'message_from' => $from,

            'message_to' => $to,

        );

        $query = $this->db->insert('message', $data);

        if ($query)

            return TRUE;

        else

            return FALSE;

    }



    function update_message_status($message_id) {

        $query = $this->db->query('update message set message_is_read="1" where message_id="' . $message_id . '";');

        return;

    }



    function get_message_details($message_id) {

        $query = $this->db->query('

            select * 

            from message m, user u 

            where m.message_id="' . $message_id . '"

            and m.message_from=u.user_id    ;');

        return $query->row();

    }



    function get_sent_messages($user_id) {

        $query = $this->db->query('

            select *

            from message m, user u

            where m.message_from="' . $user_id . '"

            and m.message_to=u.user_id;    ');

        return $query->result();

    }



    function get_received_messages($user_id) {

        $query = $this->db->query('

            select *

            from message m, user u

            where m.message_to="' . $user_id . '"

            and m.message_from=u.user_id;    ');

        return $query->result();

    }



    function add_notes_details() {

        $data = array(

            'note_title' => $this->input->post('note_title'),

            'note_description' => $this->input->post('note_description'),

            'note_user_id' => $this->input->post('user_id'),

        );

        $query = $this->db->insert('note', $data);

        if ($query)

            return TRUE;

        else

            return FALSE;

    }



    function get_my_all_notes($user_id) {

        $query = $this->db->query('

            select *

            from note

            where note_user_id="' . $user_id . '"');

        return $query->result();

    }



    function get_bills_by_date($start_date, $end_date) {

        $query = $this->db->query('

            select * 

            from doctor_prescription p,user u

            where prescription_doctor_id="' . $this->session->userdata('doctor_id') . '"

            and prescription_date>="' . $start_date . '"

            and prescription_date<="' . $end_date . '"

            and p.prescription_user_id=u.user_id;');

        return $query->result();

    }



    function send_prescription_to_pharmacy($image_id) {

        $verification_code = random_string('numeric', 6);

        $data = array(

            'pp_prescription' => $this->input->post('pp_prescription'),

            'pp_user_id' => $this->input->post('user_id'),

            'pp_pharmacy_id' => $this->input->post('pharmacy_id'),

            'pp_image_id' => $image_id,

            'pp_verification_code' => $verification_code,

        );

        $query = $this->db->insert('pharmacy_prescription', $data);

        if ($query)

            return $this->db->insert_id();

        else

            return FALSE;

    }



    function create_gallery_id() {

        $data = array(

            'gallery_name' => NULL,

        );

        $query = $this->db->insert('gallery', $data);



        return $this->db->insert_id();

    }



    function update_lab_gallery_id($lab_id, $gallery_id) {

        $data = array('laboratory_gallery_id' => $gallery_id);

        $this->db->where('laboratory_id', $lab_id);

        $this->db->update('laboratory', $data);

        return;

    }



    function get_all_laboratory_images() {

        $query = $this->db->query('

             select *

             from laboratory l, gallery g, gallery_image c, image i

             where l.laboratory_gallery_id=g.gallery_id

             and g.gallery_id=c.gi_gallery_id

             and c.gi_image_id=i.image_id;

             ');

        return $query->result();

    }



    function book_laboratory_appointment($user_id) {

        $code = random_string('numeric', 6);

        $adate = date('Y-m-d', strtotime($this->input->post('da_date')));

        $data = array(

            'la_laboratory_id' => $this->input->post('la_laboratory_id'),

            'la_user_id' => $user_id,

            'la_date' => $adate,

            'la_time' => $this->input->post('la_time'),

            'la_patient_name' => $this->input->post('user_fullname'),

            'la_patient_email' => $this->input->post('user_email'),

            'la_patient_mobile' => $this->input->post('user_mobile'),

            'la_reason' => $this->input->post('la_reason'),

            'la_verification_code' => $code,

        );

        $query = $this->db->insert('laboratory_appointment', $data);

        $appdata['code'] = $code;

        $appdata['app_id'] = $this->db->insert_id();



        if ($query)

            return $appdata;

        else

            return FALSE;

    }



    function verify_laboratory_appointment_code_of_user() {

        $query = $this->db->query('

            update laboratory_appointment 

            set la_is_appointment_verified="1"

            where la_id="' . $this->input->post('appointment_id') . '"

            and  la_verification_code="' . $this->input->post('verification_code') . '"   

            ');



        if ($this->db->affected_rows() > 0)

            return TRUE;

        else

            return FALSE;

    }



    function get_my_appointments_laboratory($limit, $offset) {

        $query = $this->db->query('

            select *

            from laboratory_appointment

            where la_laboratory_id="' . $this->session->userdata('laboratory_id') . '"

            ORDER BY la_date DESC

            LIMIT ' . $limit . ' OFFSET ' . $offset . ';');



        $q2['my_appointments'] = $query->result();

        $q = $this->db->query('

            select count(*) as count

             from laboratory_appointment

            where la_laboratory_id="' . $this->session->userdata('laboratory_id') . '"; ');

        $tmp = $q->result();

        $q2['num_rows'] = $tmp[0]->count;

        return $q2;

    }



    function get_all_laboratory_tests_by_id($lab_id) {

        $query = $this->db->query('

            select *

            from laboratory l, test t, laboratory_test c

            where l.laboratory_id="' . $lab_id . '"

            and c.lt_laboratory_id=l.laboratory_id

            and c.lt_test_id=t.test_id;');



        return $query->result();

    }



    //review functions



    function add_doctor_review() {

        $data = array(

            'review_title' => $this->input->post('review_title'),

            'review_user_id' => $this->input->post('review_user_id'),

            'review_doctor_id' => $this->input->post('review_doctor_id'),

        );

        $query = $this->db->insert('review', $data);

        return;

    }



    function get_doctor_review($doctor_id) {

        $query = $this->db->query('

            select * 

            from review r, user u,image i

            where review_doctor_id="' . $doctor_id . '"

            and r.review_user_id=u.user_id

            and u.user_image_id=i.image_id');

        return $query->result();

    }



    function add_clinic_review() {

        $data = array(

            'review_title' => $this->input->post('review_title'),

            'review_user_id' => $this->input->post('review_user_id'),

            'review_clinic_id' => $this->input->post('review_clinic_id'),

        );

        $query = $this->db->insert('review', $data);

        return;

    }



    function get_clinic_review($id) {

        $query = $this->db->query('

            select * 

            from review r, user u,image i

            where review_clinic_id="' . $id . '"

            and r.review_user_id=u.user_id

            and u.user_image_id=i.image_id');

        return $query->result();

    }



    function add_pharmacy_review() {

        $data = array(

            'review_title' => $this->input->post('review_title'),

            'review_user_id' => $this->input->post('review_user_id'),

            'review_pharmacy_id' => $this->input->post('review_pharmacy_id'),

        );

        $query = $this->db->insert('review', $data);

        return;

    }



    function get_pharmacy_review($id) {

        $query = $this->db->query('

            select * 

            from review r, user u,image i

            where review_pharmacy_id="' . $id . '"

            and r.review_user_id=u.user_id

            and u.user_image_id=i.image_id');

        return $query->result();

    }



    function add_laboratory_review() {

        $data = array(

            'review_title' => $this->input->post('review_title'),

            'review_user_id' => $this->input->post('review_user_id'),

            'review_laboratory_id' => $this->input->post('review_laboratory_id'),

        );

        $query = $this->db->insert('review', $data);

        return;

    }



    function get_laboratory_review($id) {

        $query = $this->db->query('

            select * 

            from review r, user u,image i

            where review_laboratory_id="' . $id . '"

            and r.review_user_id=u.user_id

            and u.user_image_id=i.image_id');

        return $query->result();

    }



    function add_bloodbank_review() {

        $data = array(

            'review_title' => $this->input->post('review_title'),

            'review_user_id' => $this->input->post('review_user_id'),

            'review_bloodbank_id' => $this->input->post('review_bloodbank_id'),

        );

        $query = $this->db->insert('review', $data);

        return;

    }



    function get_bloodbank_review($id) {

        $query = $this->db->query('

            select * 

            from review r, user u,image i

            where review_bloodbank_id="' . $id . '"

            and r.review_user_id=u.user_id

            and u.user_image_id=i.image_id');

        return $query->result();

    }



    function add_ambulance_review() {

        $data = array(

            'review_title' => $this->input->post('review_title'),

            'review_user_id' => $this->input->post('review_user_id'),

            'review_ambulance_id' => $this->input->post('review_ambulance_id'),

        );

        $query = $this->db->insert('review', $data);

        return;

    }



    function get_ambulance_review($id) {

        $query = $this->db->query('

            select * 

            from review r, user u,image i

            where review_ambulance_id="' . $id . '"

            and r.review_user_id=u.user_id

            and u.user_image_id=i.image_id');

        return $query->result();

    }



    function add_ngo_review() {

        $data = array(

            'review_title' => $this->input->post('review_title'),

            'review_user_id' => $this->input->post('review_user_id'),

            'review_ngo_id' => $this->input->post('review_ngo_id'),

        );

        $query = $this->db->insert('review', $data);

        return;

    }



    function get_ngo_review($id) {

        $query = $this->db->query('

            select * 

            from review r, user u,image i

            where review_ngo_id="' . $id . '"

            and r.review_user_id=u.user_id

            and u.user_image_id=i.image_id');

        return $query->result();

    }



    function create_nofitication($data) {

        /* $beta = array(

          'notification_title' => 'Doctor Profile Submited For Verification',

          'notification_from_id' => $this->session->userdata('user_id'),

          'notification_to_id' => '',

          'notification_for' => '',

          'notification_type' => 'Profile Submission',

          'notification_of' => $this->session->userdata('user_id'),

          ); */

        $query = $this->db->insert('notification', $data);

        if ($query)

            return;

    }



    function show_my_notifications($user_id) {

        $query = $this->db->query('

            select *

            from notification n,user u,image i

            where n.notification_to_id="' . $user_id . '"

            and n.notification_from_id=u.user_id

            and u.user_image_id=i.image_id

            order by notification_timestamp desc

            limit 5;

            ');

        return $query->result();

    }



    function show_my_all_notifications($user_id) {

        $query = $this->db->query('

            select *

            from notification n,user u,image i

            where n.notification_to_id="' . $user_id . '"

            and n.notification_from_id=u.user_id

            and u.user_image_id=i.image_id

            order by notification_timestamp desc;

            ');

        return $query->result();

        print_r($query->result());

        die();

    }



    //patient functions 

    function get_patient_doctors($user_id) {

        $query = $this->db->query('

            select *

            from doctor d, doctor_patient p,user u,image i

            where p.dp_user_id="' . $user_id . '"

            and p.dp_doctor_id=d.doctor_id

            and d.doctor_user_id=u.user_id

            and u.user_image_id=i.image_id;');



        return $query->result();

    }



    function get_patients_doctor_prescriptions() {

        $query = $this->db->query('

            select *

            from doctor d,doctor_prescription p,user u,image i

            where p.prescription_doctor_id=d.doctor_id

            and p.prescription_user_id="' . $this->session->userdata('user_id') . '"

            and d.doctor_user_id=u.user_id

            and u.user_image_id=i.image_id;');

        return $query->result();

    }



    function view_doctor_prescription($prescription_id) {

        $query = $this->db->query('

            select *

            from doctor_prescription p,doctor d, user u, image i

            where p.prescription_id="' . $prescription_id . '"

            and p.prescription_doctor_id=d.doctor_id

            and d.doctor_user_id=u.user_id

            and p.prescription_image_id=i.image_id;

        ');

        return $query->row();

    }



    function get_all_doctor_reports() {

        $query = $this->db->query('

            select *

            from doctor_report r,doctor d, user u, image i

            where r.report_user_id="' . $this->session->userdata('user_id') . '"

            and r.report_doctor_id=d.doctor_id

            and d.doctor_user_id=u.user_id

            and u.user_image_id=i.image_id;');

        return $query->result();

    }



    function view_report_by_id($report_id) {

        $query = $this->db->query('

            select *

            from doctor_report r,doctor d,user u

            where r.report_id="' . $report_id . '"

            and r.report_doctor_id=d.doctor_id

            and d.doctor_user_id=u.user_id');

        return $query->row();

    }



    function view_report_images_by_id($report_id) {

        $query = $this->db->query('

            select *

            from doctor_report r, gallery_image g,image i

            where r.report_id="' . $report_id . '"

            and r.report_gallery_id=g.gi_gallery_id

            and g.gi_image_id=i.image_id;

            ');

        return $query->result();

    }



    function get_all_lab_reports() {

        $query = $this->db->query('

            select *

            from doctor_report

            where report_user_id="' . $this->session->userdata('user_id') . '";');

        return $query->result();

    }



    function get_all_pharma_orders() {

        $query = $this->db->query('

            select *

            from pharmacy_prescription p, pharmacy a,user u,image i

            where p.pp_user_id="' . $this->session->userdata('user_id') . '"

            and p.pp_pharmacy_id=a.pharmacy_id

            and a.pharmacy_user_id=u.user_id

            and u.user_image_id=i.image_id');

        return $query->result();

    }



    function view_pharmacy_prescription($prescription_id) {

        $query = $this->db->query('

            select *

            from pharmacy_prescription

            where pp_id="' . $prescription_id . '"');

        return $query->row();

    }



    function get_patient_doctor_appointments($user_id) {

        $query = $this->db->query('

            select *

            from doctor_appointment b,doctor d, user u, image i,clinic c,address a

            where b.da_user_id="' . $user_id . '"

            and b.da_doctor_id=d.doctor_id

            and d.doctor_user_id=u.user_id

            and u.user_image_id=i.image_id

            and b.da_clinic_id=c.clinic_id

            and c.clinic_address_id=a.address_id;');

        return $query->result();

    }



    function get_patient_laboratory_appointments($user_id) {

        $query = $this->db->query('

            select * 

            from laboratory_appointment l,laboratory a, user u, image i

            where l.la_user_id="' . $user_id . '"    

            and l.la_laboratory_id=a.laboratory_id

            and a.laboratory_user_id=u.user_id

            and u.user_image_id=i.image_id;');

        return $query->result();

    }



    function create_notification($data) {

        $query = $this->db->insert('notification', $data);

        return;

    }

/////////////notification for domain exp

function create_notification_domain($data) {

        $query = $this->db->insert('notification', $data);

        return;

    }

    function send_email($to, $msg, $sub) {

        $CI = & get_instance();

        $config = Array(

            'mailtype' => 'html',

            'charset' => 'utf-8',

            'priority' => '1'

        );

        $this->load->library('email', $config);

        $this->email->set_newline("\r\n");



        $this->email->from('no-reply@medicatch.in', 'Medicatch Solutions');

        $this->email->to($to);

        //$this->email->cc('sagar.pawar@montekservices.com');

        $this->email->subject($sub);

        $this->email->message($msg);



        $result = $this->email->send();

        return;

    }



   


    function get_user_details_by_user_id($user_id) {

        $query = $this->db->query('select * from user where user_id="' . $user_id . '"');

        return $query->row();

    }



    function get_doctor_details_by_user_id($user_id) {

        $query = $this->db->query('

            select *

            from doctor d,user u

            where u.user_id="' . $user_id . '"

            and d.doctor_user_id=u.user_id;');

        return $query->row();

    }



    function get_all_admin_notifications($limit, $offset) {

        $query = $this->db->query('

                select * 

                from notification n, user u

                where n.notification_from_id=u.user_id

                and n.notification_for_role="admin"

                order by notification_timestamp desc

       		LIMIT ' . $limit . ' OFFSET ' . $offset . ';

		');

        $q['notifications'] = $query->result();



        $query2 = $this->db->query('

                select count(*) as count

                from notification n, user u

                where n.notification_from_id=u.user_id

                and n.notification_for_role="admin"

                order by notification_timestamp desc

                ');

        $tmp = $query2->result();

        $q['num_rows'] = $tmp[0]->count;



        return $q;

    }



    function get_notification_details_for_doctor($notification_id) {

        $query = $this->db->query('

            select *

            from notification n, user_admin u

            where n.notification_id="' . $notification_id . '"

            and n.notification_from_id=u.user_admin_id;');

        return $query->row();

    }



    function update_notification_status($notification_id) {

        $data = array(

            'notification_status' => '1'

        );

        $this->db->where('notification_id', $notification_id);

        $this->db->update('notification', $data);

        return;

    }
    
       function update_notification_status_manager($notification_to_id,$notification_type) {

        $data = array(

            'notification_status' => '1'

        );

        $this->db->where('notification_to_id', $notification_to_id);
        $this->db->where('notification_type', $notification_type);
        $this->db->update('notification', $data);
        //print_r($this->db->imap_last_error(oid)query());exit();

        return;

    }







   






   
     function update_notification_status_admin($notification_id) {
        $data = array(
            'admin_status' => '1',
            'notification_status' => '1'
        );
        $this->db->where('notification_id', $notification_id);
        $this->db->update('notification', $data);
        return;
    }



}

