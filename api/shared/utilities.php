<?php
class Utilities
{
    public function getPaging($page, $total_rows, $records_per_page, $page_url)
    {
        // paging array
        $paging_arr=array();

        // button for first page
        $paging_arr["first"] = $page>1 ? "{$page_url}page=1" : "";

        // count all subscribers in the database to calculate total pages
        $total_pages = ceil($total_rows / $records_per_page);

        // range of links to show
        $range = 2;

        // display links to 'range of pages' around 'current page'
        $initial_num = $page - $range;
        $condition_limit_num = ($page + $range)  + 1;

        $paging_arr['pages']=array();
        $page_count=0;

        for($x=$initial_num; $x<$condition_limit_num; $x++){
            // be sure '$x is greater than 0' AND 'less than or equal to the $total_pages'
            if (($x > 0) && ($x <= $total_pages)) {
                $paging_arr['pages'][$page_count]["page"]=$x;
                $paging_arr['pages'][$page_count]["url"]="{$page_url}page={$x}";
                $paging_arr['pages'][$page_count]["current_page"] = $x==$page ? "yes" : "no";

                $page_count++;
            }
        }

        // button for last page
        $paging_arr["last"] = $page<$total_pages ? "{$page_url}page={$total_pages}" : "";

        // json format
        return $paging_arr;
    }

    public function isValidEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return FALSE;
        }

        // Splitting the email address to get domain
        $aux = explode('@', $email);
        $domain = $aux[1];

        $redis = new Redis();
        $redis->connect("localhost", 6379);

        // Validating if domain has configured MX
        $mxvalid = $redis->get("mx_".$domain);

        // If not in redis do the MX dig search, if equal 0
        if ($mxvalid === FALSE) {
            exec("dig +short MX " . escapeshellarg($domain),$ips);
            if($ips[0] == "") {
                $redis->set("mx_".$domain, 0);
                // Set redis key to expire in 24 hours
                $redis->expire("mx_".$domain, 86400);
                return FALSE;
            } else {
                $redis->set("mx_".$domain, 1);
                $redis->expire("mx_".$domain, 86400);
            }
        } elseif ($mxvalid === 0) {
            return FALSE;
        }

        return TRUE;
    }
}