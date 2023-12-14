<?php

/**
 * @package ContactUs
 */
/**
 * Plugin Name: Contact Us Plugin
 * Plugin URI: http://jonah.....
 * Description: This is my contact plugin
 * version: 1.0.0
 * Author: Jonah
 * Author URI: http://jonah.....
 * 
 */

//  security check
if(!defined('ABSPATH')){
    die;
}
if (!class_exists('ContactUs')) {
    class ContactUs
    {
        public function __construct()
        {
            $this->pass_to_db();
        }

        public function activate()
        {
            $this->create_table_to_db();
            flush_rewrite_rules();
        }

        public function deactivate()
        {
            flush_rewrite_rules();
        }

        public function create_table_to_db()
        {
            global $wpdb;

            $table_name= $wpdb->prefix.'registration';
             $charset= $wpdb->get_charset_collate();

       

            $contactus="CREATE TABLE ".$table_name."(
                course text NOT NULL,
                surname text NOT NULL,
                other_names text NOT NULL,
                date_of_birth text NOT NULL,
                nationality text NOT NULL,
                gender text NOT NULL,
                component text NOT NULL,
                title_rank text NOT NULL,
                telephone text NOT NULL,
                private_email text NOT NULL,
                orgName text NOT NULL,
                posnOrg text NOT NULL,
                roleDescription text NOT NULL,
                lastAppointments text NOT NULL,
                keyCompetences text NOT NULL,
                futurePosn text NOT NULL,
                courseExpectation text NOT NULL,
                choice text NOT NULL,
                accountName text NOT NULL
                
            )$charset;";
            require_once(ABSPATH.'wp-admin/includes/upgrade.php');
            dbDelta($contactus);
        }

        public function pass_to_db()
        {
    if (isset($_POST['btnPersonalInfo'])) {

        global $wpdb;
        $table_name= $wpdb->prefix.'registration';

        $email = sanitize_email($_POST['private_email']); // Sanitize the email input

              // Check if the email already exists in the database
              $email_exists = $wpdb->get_var(
                $wpdb->prepare(
                    "SELECT COUNT(*) FROM $table_name WHERE private_email = %s",
                    $email
                )
            );
    
            if ($email_exists > 0) {
                add_action('admin_notices', function() {
                    echo '<div class="notice notice-error"><p>Email already exists. Please use a different email.</p></div>';
                });
                return; // Stop further execution
            }
        $data = array(
            'course'=>$_POST['course'],
            'surname'=>$_POST['surname'],
            'other_names'=>$_POST['other_names'],
            'date_of_birth'=>$_POST['date_of_birth'],
            'nationality'=>$_POST['nationality'],
            'gender'=>$_POST['gender'],
            'component'=>$_POST['component'],
            'title_rank'=>$_POST['title_rank'],
            'telephone'=>$_POST['telephone'],
            'private_email'=>$_POST['private_email'],
            'orgName'=>$_POST['orgName'],
            'posnOrg'=>$_POST['posnOrg'],
            'roleDescription'=>$_POST['roleDescription'],
            'lastAppointments'=>$_POST['lastAppointments'],
            'keyCompetences'=>$_POST['keyCompetences'],
            'futurePosn'=>$_POST['futurePosn'],
            'courseExpectation'=>$_POST['courseExpectation'],
            'choice'=>$_POST['choice'],
            'accountName'=>$_POST['accountName']

        );
        global $wpdb;
        $table_name=$wpdb->prefix.'registration';
        $result=$wpdb->insert($table_name, $data, $format=null);
        if ($result == true) {
            add_action('admin_notices', function() {
                echo '<div class="notice notice-success"><p>Data sent successfully</p></div>';
            });
        } else {
            add_action('admin_notices', function() {
                echo '<div class="notice notice-error"><p>Data not sent</p></div>';
            });
        }
    }
}
    }
    $contactUsInstance = new ContactUs();

    // activate
    register_activation_hook(__FILE__, array($contactUsInstance ,'activate'));

    //deactivate
    register_deactivation_hook(__FILE__, array($contactUsInstance ,'deactivate'));
}