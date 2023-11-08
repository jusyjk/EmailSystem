<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Employee extends CI_Controller
{
    private $fields;
    private $separator = ";";
    private $enclosure = '"'; // Maximum row size to be used for decoding
    private $max_row_size = 100000;

    function __construct()
    {
        parent::__construct(false);
        $this
            ->load
            ->model("employee_model");
    }

    public function login($value = "")
    {
        $username = $this
            ->input
            ->post("username");
        $password = $this
            ->input
            ->post("password");

        // Verify the username and password against the database
        $user = $this
            ->employee_model
            ->get_user_by_username($username, $password);

        if ($user)
        {
            $data = ["user_id" => $user->id, "username" => $user->username, "email" => $user->email, "logged_in" => true, ];

            $this
                ->session
                ->set_userdata($data);

            redirect(WEB_URL . "Employee/index"); // Redirect to a dashboard page
            
        }
        else
        {
            $this
                ->session
                ->set_flashdata("error", "Invalid username or password");
            $this
                ->load
                ->view("login");
        }
    }
    /*
    * 
    * User Index List
    *
    */

    public function index()
    {
        $this
            ->load
            ->view("add/list_user");
    }
     /*
    * 
    * Campaign Index List
    *
    */
    public function campaignList()
    {
        $this
            ->load
            ->view("campaign/list_campaign");
    }
     /*
    * 
    * User Info Used as a ajax function in the index page
    *
    */
    public function userInfo()
    {
        $getUsersInfo = $this
            ->employee_model
            ->getUserInfo();
        $query = $this
            ->db
            ->get("user_info");
        $draw = intval($this
            ->input
            ->get("draw"));
        $start = intval($this
            ->input
            ->get("start"));
        $length = intval($this
            ->input
            ->get("length"));
        $data = [];
        foreach ($getUsersInfo as $r)
        {
            $data[] = [$r->id, $r->first_name, $r->last_name];
        }
        $result = ["draw" => $draw, "recordsTotal" => $query->num_rows() , "recordsFiltered" => $query->num_rows() , "data" => $data, ];
        echo json_encode($result);
        exit();
    }
      /*
    * 
    * Campaign Info Used as a ajax function in the index page
    *
    */
    public function campaignInfo()
    {
        $query = $this
            ->db
            ->get("campaign");
        $draw = intval($this
            ->input
            ->get("draw"));
        $start = intval($this
            ->input
            ->get("start"));
        $length = intval($this
            ->input
            ->get("length"));
        $data = [];
        foreach ($query->result() as $r)
        {
            $data[] = [$r->id, $r->campaign_name, $r->subject];
        }
        $result = ["draw" => $draw, "recordsTotal" => $query->num_rows() , "recordsFiltered" => $query->num_rows() , "data" => $data, ];
        echo json_encode($result);
        exit();
    }
    /*
    * 
    * Adding tage store function
    *
    */
    public function addTag()
    {
        $this
            ->load
            ->model("employee_model");
        if (!empty($_FILES["fileToUpload"]))
        {
            $csv = $_FILES["fileToUpload"]["tmp_name"];
            // print_r($csv); exit;
            $csvFile = fopen($csv, "r");
            $this->fields = fgetcsv($csvFile, $this->max_row_size, $this->separator, $this->enclosure);
            $keys_values = explode(",", $this->fields[0]);
            $keys = $this->escape_string($keys_values);
            $csvData = [];
            $i = 1;
            while (($row = fgetcsv($csvFile, $this->max_row_size, $this->separator, $this->enclosure)) !== false)
            {
                if ($row != null)
                {
                    $values = explode(",", $row[0]);
                    // printData($values);
                    if (count($keys) == count($values))
                    {
                        $arr = [];
                        $new_values = [];
                        $new_values = $this->escape_string($values);
                        for ($j = 0;$j < count($keys);$j++)
                        {
                            if ($keys[$j] != "")
                            {
                                $arr[$keys[$j]] = $new_values[$j];
                            }
                        }
                        $csvData[$i] = $arr;
                        $i++;
                    }
                }
            }
            foreach ($csvData as $key => $value)
            {
                $data = ["first_name" => $value["first_name"], "last_name" => $value["last_name"], "phone" => $value["phone"], "country" => $value["country"], "category" => $value["category"], "tag" => $value["tag"], "weather" => $value["weather"], "status" => $value["status"], ];
                $status = $this
                    ->employee_model
                    ->addUserInfo($data);
            }
            if ($status == true)
            {
                redirect(WEB_URL . "Employee/index");
            }
        }
        $this
            ->load
            ->view("add/add_details");
    }
     /*
    * 
    * User Store Function
    *
    */
    public function addUserInfo()
    {
        $postVal = $this
            ->input
            ->post();
        if (!empty($postVal)) { 
            $isValidEmail = validEmail($postVal["email"]);
        // printData($isValidEmail);
        if ($isValidEmail == true)
        {
            if (!empty($postVal["fname"]))
            {
                $data = ["first_name" => $postVal["fname"], "last_name" => $postVal["lname"], "phone" => $postVal["phone"], "email" => $postVal["email"], "country" => $postVal["country"], "category" => $postVal["category"], "tag" => $postVal["tag"], "weather" => $postVal["weather"], "status" => $postVal["status"], ];
                $status = $this
                    ->employee_model
                    ->addUserInfo($data);
                if ($status == true)
                {
                    redirect(WEB_URL . "Employee/index");
                }
            }
        
        }   }     
        $this
            ->load
            ->view("add/add_userinfo");
    }

    /*
    * 
    * Campaign Store function
    *
    */

    public function addCampaign()
    {
        $postVal = $this
            ->input
            ->post();
        if (!empty($postVal))
        {
            // printData($postVal);
            $status = $this
                ->employee_model
                ->addCampaign($postVal);
            if ($status == true)
            {
                redirect(WEB_URL . "Employee/index");
            }
        }
        $data["tags"] = $this
            ->employee_model
            ->getTags();
        $this
            ->load
            ->view("campaign/add_campaign", $data);
    }

    /*
    * 
    * Used for CSV import function
    *
    */
    public function updateRecords()
    {
        $postVal = $this
            ->input
            ->post();
        $this
            ->load
            ->model("employee_model");
        $returnVal = $this
            ->employee_model
            ->updateEmployee($postVal);
        if ($returnVal == true)
        {
            echo 0;
            exit();
        }
        else
        {
            echo 1;
            exit();
        }
    }

    /*
    * 
    * Cron for sending email
    *
    */

    public function sendEmail($serviceProvider = "")
    {
        // error_reporting(E_ALL);
        $getPendingEmail = $this
            ->employee_model
            ->getPendingCampaignEmails();
        $getServiceProviders = $this
            ->employee_model
            ->getServiceProviders();
        foreach ($getPendingEmail as $key => $value)
        {
            // printData($value);
            $tags = json_decode($value["tags"]);
            $getUsersInfo = $this
                ->employee_model
                ->getUserInfo(["id_user" => $tags, ]);
            // printData($getUsersInfo);
            // printData($getServiceProviders[$i],false);
            foreach ($getUsersInfo as $key => $userValue)
            {
                // printData($userValue);
                $i = 0;
                if ($i > 6)
                {
                    $i = 0;
                }
                for ($i = 0;$i <= 5;$i++)
                {
                    $serviceProviderCount = $this
                        ->employee_model
                        ->getServiceProviderCount($getServiceProviders[$i]["id"]);
                    // print_r($getServiceProviders[$i]['id']);echo'<pre>';printData($serviceProviderCount['total_count']);
                    if (!empty($serviceProviderCount["total_count"]))
                    {
                        if ($serviceProviderCount["total_count"] == 4)
                        {
                            $data["email_status"] = "61";
                        }
                        else
                        {
                            $data["email_status"] = "57";
                        }
                    }
                    else
                    {
                        $data["email_status"] = "57";
                    }
                    // printData($userValue,FALSE);
                    $data["from"] = $getServiceProviders[$i]["email"];
                    $data["to"] = $userValue["email"];
                    $data["subject"] = $value["subject"];
                    $data["id_campaign"] = $value["id"];
                    $data["id_user"] = $userValue["id"];
                    $data["message"] = $value["message"];
                    $data["id_service_provider"] = $getServiceProviders[$i]["id"];
                    $data["sent_date"] = getCurrentDateTime();
                    $this
                        ->employee_model
                        ->addEmailQueue($data);
                    $this
                        ->employee_model
                        ->updateCampaign(["id" => $value["id"], ]);
                }
                // printData($data,FALSE);
                
            }
        }
    }

    /*
    * 
    * Email Statictics Index
    *
    */
    public function getEmailStatics()
    {
        $data["campaigns"] = $this
            ->employee_model
            ->getCampaignData();

        // printData($data["campaigns"]);
        $this
            ->load
            ->view("campaign/analytics", $data);
    }

    /*
    * 
    * Function used in csv Import
    *
    */

    public function escape_string($data)
    {
        $result = [];
        foreach ($data as $row)
        {
            $result[] = str_replace('"', "", $row);
        }
        return $result;
    }
}

