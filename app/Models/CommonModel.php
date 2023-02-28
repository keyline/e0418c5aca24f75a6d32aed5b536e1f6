<?php

namespace App\Models;

use CodeIgniter\Model;

class CommonModel extends Model
{
    public $table;
    public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
        $session = \Config\Services::session();
        $uri = new \CodeIgniter\HTTP\URI();
        helper('form');
        helper('cookie');
        $email = \Config\Services::email();
    }

    // find data
    public function find_data($table, $return_type='array', $conditions='', $select='*', $join='', $group_by='', $order_by='', $limit=0, $offset=0, $orConditions='')
    {
        $result = array();
        $builder = $this->db->table($table);
        $builder->select($select);
        if ($conditions != '') {
            $builder->where($conditions);
        }
        if ($orConditions != '') {
            $builder->orWhere($orConditions);
        }

        //$this->db->from($table_name);
        if (is_array($join)) {
            for ($j=0;$j<count($join);$j++) {
                if ($join[$j]['table']) {
                    /*$table_join = $join[$j]['table'].' as '.$join[$j]['table_alias']*/;
                    //$table_join_name = $join[$j]['table_alias'];
                    $table_join = $join[$j]['table'];
                    $table_join_name = $join[$j]['table'];
                } else {
                    /*$table_join = $join[$j]['table'];
                    $table_join_name = $join[$j]['table'];*/
                }
                if (!empty($join[$j]['table_master_alias'])) {
                    $table_master_join = $join[$j]['table_master_alias'];
                } else {
                    $table_master_join = $join[$j]['table_master'];
                }
                $builder->join($table_join, $table_join_name.'.'.$join[$j]['field'].'='.$table_master_join.'.'.$join[$j]['field_table_master']/*.$join[$j]['and']*/, $join[$j]['type']);
            }
        }


        if (is_array($group_by)) {
            for ($g=0;$g<count($group_by);$g++) {
                $builder->groupBy($group_by[$g]);
            }
        }

        if (is_array($order_by)) {
            for ($o=0;$o<count($order_by);$o++) {
                $builder->orderBy($order_by[$o]['field'], $order_by[$o]['type']);
            }
        }

        if ($limit != 0) {
            $builder->limit($limit, $offset);
        }
        $query = $builder->get();

        switch ($return_type) {
            case 'array':
            case '':
                if ($query->getNumRows() > 0) {
                    $result = $query->getResult();
                }
                break;
            case 'row':
                if ($query->getNumRows() > 0) {
                    $result = $query->getRow();
                }
                break;
            case 'row-array':
                if ($query->getNumRows() > 0) {
                    $result = $query->getRowArray();
                }
                break;
            case 'count':
                $result = $query->getNumRows();
                break;
        }
        //echo $this->db->getLastQuery();die;
        return $result;
    }

    // save or update data
    public function save_data($table, $postdata = array(), $id = '', $field = '')
    {
        $builder = $this->db->table($table);
        if ($id == '') {
            $builder->insert($postdata);
            return $this->db->insertID();
        } else {
            $builder->where($field, $id);
            $builder->update($postdata);
            return $this->db->affectedRows();
        }
    }

    public function save_batchdata($table, $postdata = array(), $id = '', $field = '')
    {
        $builder = $db->table($table);
        $builder->insertBatch($postdata);
    }

    // delete data
    public function delete_data($table, $id, $field)
    {
        $builder = $this->db->table($table);
        $builder->where($field, $id);
        $builder->delete();
        return true;
    }

    // single file upload
    public function upload_single_file($fieldName, $fileName, $uploadedpath, $uploadType)
    {
        $imge = $fileName;
        if ($imge == '') {
            $slider_image = 'no-user-image.jpg';
        } else {
            $imageFileType1 = pathinfo($imge, PATHINFO_EXTENSION);
            if ($uploadType=='image') {
                // if ($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" && $imageFileType1 != "gif" && $imageFileType1 != "JPG" && $imageFileType1 != "PNG" && $imageFileType1 != "JPEG" && $imageFileType1 != "GIF" && $imageFileType1 != "ico" && $imageFileType1 != "ICO" && $imageFileType1 != "SVG" && $imageFileType1 != "svg") {
                //     $message = 'Sorry, only JPG, JPEG, ICO, SVG, PNG & GIF files are allowed';
                if ($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" && $imageFileType1 != "JPG" && $imageFileType1 != "PNG" && $imageFileType1 != "JPEG") {
                    $message = 'Sorry, only JPG, JPEG & PNG files are allowed';
                    $status = 0;
                } else {
                    $message = 'Upload ok';
                    $status = 1;
                }
            } elseif ($uploadType=='pdf') {
                if ($imageFileType1 != "pdf" && $imageFileType1 != "PDF") {
                    $message = 'Sorry, only PDF files are allowed';
                    $status = 0;
                } else {
                    $message = 'Upload ok';
                    $status = 1;
                }
            } elseif ($uploadType=='word') {
                if ($imageFileType1 != "doc" && $imageFileType1 != "DOC" && $imageFileType1 != "docx" && $imageFileType1 != "DOCX") {
                    $message = 'Sorry, only DOC files are allowed';
                    $status = 0;
                } else {
                    $message = 'Upload ok';
                    $status = 1;
                }
            } elseif ($uploadType=='excel') {
                if ($imageFileType1 != "xls" && $imageFileType1 != "XLS" && $imageFileType1 != "xlsx" && $imageFileType1 != "XLSX") {
                    $message = 'Sorry, only EXCEl files are allowed';
                    $status = 0;
                } else {
                    $message = 'Upload ok';
                    $status = 1;
                }
            } elseif ($uploadType=='powerpoint') {
                if ($imageFileType1 != "ppt" && $imageFileType1 != "PPT" && $imageFileType1 != "pptx" && $imageFileType1 != "PPTX") {
                    $message = 'Sorry, only PPT files are allowed';
                    $status = 0;
                } else {
                    $message = 'Upload ok';
                    $status = 1;
                }
            } elseif ($uploadType=='custom') {
                if ($imageFileType1 != "doc" && $imageFileType1 != "DOC" && $imageFileType1 != "docx" && $imageFileType1 != "DOCX" && $imageFileType1 != "pdf" && $imageFileType1 != "PDF" && $imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" && $imageFileType1 != "JPG" && $imageFileType1 != "PNG" && $imageFileType1 != "JPEG") {
                    $message = 'Sorry, only .DOC,.DOCX,.PNG,.JPG,.PDF,.RTF files are allowed';
                    $status = 0;
                } else {
                    $message = 'Upload ok';
                    $status = 1;
                }
            }

            $newFilename = time().$imge;
            $temp = $_FILES[$fieldName]["tmp_name"];
            if ($uploadedpath=='') {
                $upload_path = 'uploads/';
            } else {
                $upload_path = 'uploads/'.$uploadedpath.'/';
            }
            if ($status) {
                move_uploaded_file($temp, $upload_path.$newFilename);
                $return_array = array('status'=>1, 'message'=>$message, 'newFilename'=>$newFilename);
            } else {
                $return_array = array('status'=>0, 'message'=>$message, 'newFilename'=>'');
            }
            return $return_array;
        }
    }

    public function upload_multiple_file($fieldName, $fileName, $uploadedpath, $uploadType, $tempName)
    {
        $imge = $fileName;
        if ($imge == '') {
            $slider_image = 'no-user-image.jpg';
        } else {
            $imageFileType1 = pathinfo($imge, PATHINFO_EXTENSION);
            if ($uploadType=='image') {
                if ($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" && $imageFileType1 != "gif" && $imageFileType1 != "JPG" && $imageFileType1 != "PNG" && $imageFileType1 != "JPEG" && $imageFileType1 != "GIF" && $imageFileType1 != "ico" && $imageFileType1 != "ICO") {
                    $message = 'Sorry, only JPG, JPEG, ICO, PNG & GIF files are allowed';
                    $status = 0;
                } else {
                    $message = 'Upload ok';
                    $status = 1;
                }
            } elseif ($uploadType=='pdf') {
                if ($imageFileType1 != "pdf" && $imageFileType1 != "PDF") {
                    $message = 'Sorry, only PDF files are allowed';
                    $status = 0;
                } else {
                    $message = 'Upload ok';
                    $status = 1;
                }
            } elseif ($uploadType=='word') {
                if ($imageFileType1 != "doc" && $imageFileType1 != "DOC" && $imageFileType1 != "docx" && $imageFileType1 != "DOCX") {
                    $message = 'Sorry, only DOC files are allowed';
                    $status = 0;
                } else {
                    $message = 'Upload ok';
                    $status = 1;
                }
            } elseif ($uploadType=='excel') {
                if ($imageFileType1 != "xls" && $imageFileType1 != "XLS" && $imageFileType1 != "xlsx" && $imageFileType1 != "XLSX") {
                    $message = 'Sorry, only EXCEl files are allowed';
                    $status = 0;
                } else {
                    $message = 'Upload ok';
                    $status = 1;
                }
            } elseif ($uploadType=='powerpoint') {
                if ($imageFileType1 != "ppt" && $imageFileType1 != "PPT" && $imageFileType1 != "pptx" && $imageFileType1 != "PPTX") {
                    $message = 'Sorry, only PPT files are allowed';
                    $status = 0;
                } else {
                    $message = 'Upload ok';
                    $status = 1;
                }
            }
            //echo $status;die;
            $newFilename = time().$imge;
            $temp = $tempName;
            if ($uploadedpath=='') {
                $upload_path = 'uploads/';
            } else {
                $upload_path = 'uploads/'.$uploadedpath.'/';
            }
            if ($status==1) {
                move_uploaded_file($temp, $upload_path.$newFilename);
                $return_array = array('status'=>1, 'message'=>$message, 'newFilename'=>$newFilename);
            } else {
                $return_array = array('status'=>0, 'message'=>$message, 'newFilename'=>'');
            }
            return $return_array;
        }
    }

    public function commonFileArrayUpload($path = '', $images = array(), $uploadType = '')
    {
        $apiStatus = false;
        $apiMessage = [];
        $apiResponse = [];
        if (count($images)>0) {
            for ($p=0;$p<count($images);$p++) {
                $imge = $images[$p]->getClientName();
                if ($imge == '') {
                    $slider_image = 'no-user-image.jpg';
                } else {
                    $imageFileType1 = pathinfo($imge, PATHINFO_EXTENSION);
                    if ($uploadType=='image') {
                        if ($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" && $imageFileType1 != "gif" && $imageFileType1 != "JPG" && $imageFileType1 != "PNG" && $imageFileType1 != "JPEG" && $imageFileType1 != "GIF" && $imageFileType1 != "ico" && $imageFileType1 != "ICO") {
                            $message = 'Sorry, only JPG, JPEG, ICO, PNG & GIF files are allowed';
                            $status = 0;
                        } else {
                            $message = 'Upload ok';
                            $status = 1;
                        }
                    } elseif ($uploadType=='pdf') {
                        if ($imageFileType1 != "pdf" && $imageFileType1 != "PDF") {
                            $message = 'Sorry, only PDF files are allowed';
                            $status = 0;
                        } else {
                            $message = 'Upload ok';
                            $status = 1;
                        }
                    } elseif ($uploadType=='word') {
                        if ($imageFileType1 != "doc" && $imageFileType1 != "DOC" && $imageFileType1 != "docx" && $imageFileType1 != "DOCX") {
                            $message = 'Sorry, only DOC files are allowed';
                            $status = 0;
                        } else {
                            $message = 'Upload ok';
                            $status = 1;
                        }
                    } elseif ($uploadType=='excel') {
                        if ($imageFileType1 != "xls" && $imageFileType1 != "XLS" && $imageFileType1 != "xlsx" && $imageFileType1 != "XLSX") {
                            $message = 'Sorry, only EXCEl files are allowed';
                            $status = 0;
                        } else {
                            $message = 'Upload ok';
                            $status = 1;
                        }
                    } elseif ($uploadType=='powerpoint') {
                        if ($imageFileType1 != "ppt" && $imageFileType1 != "PPT" && $imageFileType1 != "pptx" && $imageFileType1 != "PPTX") {
                            $message = 'Sorry, only PPT files are allowed';
                            $status = 0;
                        } else {
                            $message = 'Upload ok';
                            $status = 1;
                        }
                    }
                    $newFilename = time().$imge;
                    $temp = $images[$p]->getTempName();
                    if ($path=='') {
                        $upload_path = 'uploads/';
                    } else {
                        $upload_path = 'uploads/'.$path.'/';
                    }
                    if ($status) {
                        move_uploaded_file($temp, $upload_path.$newFilename);
                        //$apiStatus      = TRUE;
                        //$apiMessage     = $message;
                        $apiResponse[]  = $newFilename;
                    } else {
                        //$apiStatus      = FALSE;
                        //$apiMessage     = $message;
                    }
                }
            }
        }
        //$return_array = array('status'=> $apiStatus, 'message'=> $apiMessage, 'newFilename'=> $apiResponse);
        return $apiResponse;
    }

    public function clean($string)
    {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        $string2 = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
        $string3 = preg_replace('/-+/', '-', $string2);
        return $string3;
    }

    public function weekdays($dayNo)
    {
        if ($dayNo==0) {
            $day_name = 'Sunday';
        }
        if ($dayNo==1) {
            $day_name = 'Monday';
        }
        if ($dayNo==2) {
            $day_name = 'Tuesday';
        }
        if ($dayNo==3) {
            $day_name = 'Wednesday';
        }
        if ($dayNo==4) {
            $day_name = 'Thursday';
        }
        if ($dayNo==5) {
            $day_name = 'Friday';
        }
        if ($dayNo==6) {
            $day_name = 'Saturday';
        }
        return $day_name;
    }

    public function format_date($dt)
    {
        return date_format(date_create($dt), "h:i A");
    }

    public function format_date2($dt)
    {
        return date_format(date_create($dt), "d-m-Y");
    }

    public function total_address($a, $b, $c, $d, $e)
    {
        return $a.' '.$b.' '.$c.' '.$d.' '.$e;
    }

    public function time_difference($to_time)
    {
        $to_time = strtotime($to_time);
        $from_time = strtotime(date('Y-m-d H:i:s'));
        $time_diff = round(abs($to_time - $from_time) / 60, 0);

        if ($time_diff>1440) {
            $day_diff = round(($time_diff/1440), 0)." days";
        } else {
            $day_diff = $time_diff. " mins";
        }
        return $day_diff;
    }

    public function page_content($pageID)
    {
        $conditions = array('static_id'=>$pageID);
        $static_page = $this->find_data('sms_static_content', 'row', $conditions);
        $content = $static_page->description;
        return $content;
    }

    public function review_star_show($rating)
    {
        if ($rating==0) {
            $star_count = '';
        } elseif ($rating>=1 && $rating<2) {
            $star_count = '<span class="fa fa-star checked"></span>';
        } elseif ($rating>=2 && $rating<3) {
            $star_count = '<span class="fa fa-star checked"></span><span class="fa fa-star checked"></span>';
        } elseif ($rating>=3 && $rating<4) {
            $star_count = '<span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span>';
        } elseif ($rating>=4 && $rating<5) {
            $star_count = '<span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span>';
        } elseif ($rating>=5) {
            $star_count = '<span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span>';
        }
        return $star_count;
    }

    public function calculate_average_rating($provider_id, $subcat, $review_count)
    {
        $db = \Config\Database::connect();
        $total_rating_value = $db->query("SELECT sum(rating) as tot_rating FROM `sms_reviews` WHERE `parent_id` = 0 AND `provider_id` = '$provider_id' and subcat='$subcat' and published=1")->getRow();
        if ($review_count>0) {
            $avarage_rating = $total_rating_value->tot_rating/$review_count;
        } else {
            $avarage_rating = 0;
        }

        return $avarage_rating;
    }

    public function sendEmail($to_email, $email_subject, $mailbody)
    {
        // $email = \Config\Services::email();
        // $config['protocol'] = 'sendmail';
        // $config['mailPath'] = '/usr/sbin/sendmail';
        // $config['charset']  = 'iso-8859-1';
        // $config['wordWrap'] = true;
        // $config['mailType'] = 'html';
        // $email->initialize($config);

        // $site_setting = $this->find_data('sms_site_settings','row');
        // $from_email = 'info@school.com';
        // $from_name = $site_setting->site_name;
        // $email->setFrom($from_email, $from_name);
        // $email->setTo($to_email);
        // $email->setSubject($email_subject);
        // $email->setMessage($mailbody);
        // $email->send();
        // return true;

        $email = \Config\Services::email();
        $config['protocol'] = 'sendmail';
        $config['mailPath'] = '/usr/sbin/sendmail';
        $config['charset']  = 'iso-8859-1';
        $config['wordWrap'] = true;
        $config['mailType'] = 'html';
        $email->initialize($config);
        $email->setFrom('no-reply@indiainfocom.com', 'India Infocom');
        $email->setTo($to_email);
        //$email->setCC('another@another-example.com');
        $email->setBCC('infocom@abp.in');
        $email->setSubject($email_subject);
        $email->setMessage($mailbody);
        $email->send();
        return true;
    }

    public function sendSMS($mobileNo, $messageBody)
    {
        $siteSetting    = $this->find_data('sms_site_settings', 'row');
        $authKey        = $siteSetting->authentication_key;
        $senderId       = $siteSetting->sender_id;
        $route          = "4";
        $postData = array(
            'apikey'        => $authKey,
            'number'        => $mobileNo,
            'message'       => $messageBody,
            'senderid'      => $senderId,
            'format'        => 'json'
        );
        //API URL
        $url            = $siteSetting->base_url;
        // init the resource
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => false,
            CURLOPT_POSTFIELDS => $postData
            //,CURLOPT_FOLLOWLOCATION => true
        ));
        //Ignore SSL certificate verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        //get response
        $output = curl_exec($ch);
        //pr($output);
        if (curl_errno($ch)) {
            echo 'error:' . curl_error($ch);
            return false;
        } else {
            return true;
        }
        curl_close($ch);
    }
    public function sendSMSABP($mobileNo, $otp)
    {
        // String $resourceUrl = "https://zj29n2.api.infobip.com/sms/1/text/query?username=abp_it&password=Abptest@2021&from=ABPCLS&to=91"+mobile+"&text=" + OTP + " is your One Time Password for ABP Classifieds. Please use the Password to complete the Login.&indiaDltContentTemplateId=1707161527045855844&indiaDltPrincipalEntityId=1701158080778038304";

        // CURLOPT_POSTFIELDS =>'{"messages":[{"destinations":[{"to":"91'.$mobileNo.'"}],"from":"ABPCLS","text":"'.$otp.' is your One Time Password for ABP Classifieds. Please use the Password to complete the Login."}]}',

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://zj29n2.api.infobip.com/sms/1/text/advanced',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{"messages":[{"destinations":[{"to":"91'.$mobileNo.'"}],"from":"ABPCLS","text":"'.$otp.' is your One Time Password for ABP Classifieds. Please use the Password to complete the Login."}]}',
            CURLOPT_HTTPHEADER => array(
                'Authorization: App 002527aedddbd71a57c18f94f34b409c-fa0d15d0-3679-4060-9fa6-61e8fffe0d91',
                'Content-Type: application/json',
                'Accept: application/json'
            ),
        ));
        $response = curl_exec($curl);
        //pr($response);
        if (curl_errno($curl)) {
            echo 'error:' . curl_error($curl);
            return false;
        } else {
            return true;
        }
        curl_close($curl);
    }


    public function get_user($user_type, $user_id)
    {
        $conditions = array('user_type'=>$user_type, 'user_id'=>$user_id);
        $user_detail = $this->find_data('users', 'row', $conditions);
        return $user_detail;
    }
    public function get_user_detail($user_id)
    {
        $conditions = array('user_id'=>$user_id);
        $user_detail = $this->find_data('users', 'row', $conditions);
        return $user_detail;
    }

    public function get_category($parent_id, $cat_id)
    {
        $conditions = array('parent_id'=>$parent_id, 'cat_id'=>$cat_id);
        $category_detail = $this->find_data('sms_category', 'row', $conditions);
        return $category_detail;
    }

    public function get_business_primary_address($user_id)
    {
        $conditions = array('user_id'=>$user_id, 'is_primary_location'=>1);
        $businessAddress = $this->find_data('sms_business_details', 'row', $conditions);
        if ($businessAddress) {
            $address = $businessAddress->bs_address;
        } else {
            $conditions = array('user_id'=>$user_id, 'is_primary_location'=>1);
            $businessAddress2 = $this->find_data('sms_business_details', 'row', $conditions);
            if ($businessAddress2) {
                $address = $businessAddress2->bs_address;
            } else {
                $address = "";
            }
        }
        return $address;
    }
}
