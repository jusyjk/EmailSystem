<?php
class Employee_model extends CI_Model
{

    public function get_user_by_username($username, $password)
    {
        $query = $this
            ->db
            ->get_where('users', array(
            'username' => $username,
            'password' => md5($password)
        ));
        return $query->row();
    }

    public function addUserInfo($data)
    {
        // printData($data);
        if (!empty($data))
        {
            $insertData = $this
                ->db
                ->insert('user_info', $data);
            if ($insertData > 0)
            {
                $last_id = $this
                    ->db
                    ->insert_id();

                return array(
                    'status' => STATUS_SUCCESS,
                    'msg' => "Banner added successfully!",
                    'data' => array(
                        "id_user" => $last_id
                    )
                );

            }
            else
            {
                return array(
                    'status' => STATUS_FAIL,
                    'msg' => PLEASE_TRY_AGAIN_MSG,
                    'data' => array()
                );
            }
        }
        else
        {
            return array(
                'status' => STATUS_FAIL,
                'msg' => PLEASE_TRY_AGAIN_MSG,
                'data' => array()
            );

        }

    }
    public function addCampaign($data)
    {
        if (!empty($data))
        {
            $data['tags'] = json_encode($data['tags']);
            $insertData = $this
                ->db
                ->insert('campaign', $data);
            if ($insertData > 0)
            {
                $last_id = $this
                    ->db
                    ->insert_id();

                return array(
                    'status' => STATUS_SUCCESS,
                    'msg' => "Banner added successfully!",
                    'data' => array(
                        "id_user" => $last_id
                    )
                );

            }
            else
            {
                return array(
                    'status' => STATUS_FAIL,
                    'msg' => PLEASE_TRY_AGAIN_MSG,
                    'data' => array()
                );
            }
        }
        else
        {
            return array(
                'status' => STATUS_FAIL,
                'msg' => PLEASE_TRY_AGAIN_MSG,
                'data' => array()
            );

        }

    }

    public function updateEmployee($postVal)
    {
        $data = array(
            'tag_name' => $postVal['search'],
            'user_id' => json_encode($postVal['id'])
        );
        if ($this
            ->db
            ->insert('segments', $data))
        {
            return array(
                'status' => STATUS_SUCCESS,
                'msg' => "Data Stored successfully!"
            );
        }
        else
        {
            return array(
                'status' => STATUS_FAIL,
                'msg' => PLEASE_TRY_AGAIN_MSG
            );
        }
    }
    public function getUserInfo($postVal = '')
    {
        $this
            ->db
            ->from('user_info');
        if (isset($postVal['id_user']))
        {
            $this
                ->db
                ->where_in('id', $postVal['id_user']);
        }
        $this
            ->db
            ->order_by('id', 'ASC');
        $query = $this
            ->db
            ->get();
        if ($query->num_rows() > 0)
        {
            if (isset($postVal['id_user']))
            {
                $row = $query->result_array();

            }
            else
            {

                $row = $query->result();
            }

        }
        return $row;
    }

    public function getTags()
    {
        $this
            ->db
            ->from('segments');
        $this
            ->db
            ->order_by('id', 'ASC');
        $query = $this
            ->db
            ->get();
        if ($query->num_rows() > 0)
        {
            $row = $query->result_array();

        }
        return $row;
    }
    public function getCampaignData()
    {
        $this
            ->db
            ->from('email_queue');
        // $this->db->order_by('id', 'DESC');
        $query = $this
            ->db
            ->get();
        if ($query->num_rows() > 0)
        {
            $row = $query->result_array();

        }
        return $row;
    }

    public function getServiceProviderCount($idServiceProvider = '')
    {
        $row = '';
        $fields = "COUNT(id_email_queue) as total_count";
        $this
            ->db
            ->select($fields);
        $this
            ->db
            ->from('email_queue');
        $this
            ->db
            ->where('id_service_provider', $idServiceProvider);
        $this
            ->db
            ->where('DATE(sent_date) =', getCurrentDate());
        $this
            ->db
            ->where('email_status', 57);
        $query = $this
            ->db
            ->get();
        // printData($this->db->last_query());
        if ($query->num_rows() > 0)
        {
            $row = $query->row_array();

        }
        return $row;
    }

    public function getPendingCampaignEmails()
    {
        $result = array();
        $fields = "s.*";
        $this
            ->db
            ->select($fields);
        $this
            ->db
            ->from("campaign" . ' s');
        $this
            ->db
            ->where('is_sync', 'N');
        $this
            ->db
            ->order_by('s.id', 'DESC');
        $query = $this
            ->db
            ->get();
        if ($query->num_rows() > 0)
        {
            $result = $query->result_array();
        }
        return $result;
    }

    public function updateCampaign($postVal)
    {
        // printData($postVal);
        $data = array(
            'is_sync' => 'Y'
        );
        $this
            ->db
            ->where('id', $postVal['id']);
        if ($this
            ->db
            ->update('campaign', $data))
        {
            return array(
                'status' => STATUS_SUCCESS,
                'msg' => "Data Stored successfully!"
            );
        }
        else
        {
            return array(
                'status' => STATUS_FAIL,
                'msg' => PLEASE_TRY_AGAIN_MSG
            );
        }
    }

    public function getServiceProviders()
    {
        $result = array();

        $fields = "sr.*";
        $this
            ->db
            ->select($fields);
        $this
            ->db
            ->from("service_providers" . ' sr');

        $this
            ->db
            ->where('status', 'Active');
        $query = $this
            ->db
            ->get();
        if ($query->num_rows() > 0)
        {
            $result = $query->result_array();
        }
        return $result;
    }

    public function addEmailQueue($data)
    {
        if (!empty($data))
        {

            $insertData = $this
                ->db
                ->insert('email_queue', $data);
            if ($insertData > 0)
            {
                $last_id = $this
                    ->db
                    ->insert_id();

                return array(
                    'status' => STATUS_SUCCESS,
                    'msg' => "Banner added successfully!",
                    'data' => array(
                        "id_user" => $last_id
                    )
                );

            }
            else
            {
                return array(
                    'status' => STATUS_FAIL,
                    'msg' => PLEASE_TRY_AGAIN_MSG,
                    'data' => array()
                );
            }
        }
        else
        {
            return array(
                'status' => STATUS_FAIL,
                'msg' => PLEASE_TRY_AGAIN_MSG,
                'data' => array()
            );

        }

    }

}

