<?php
require_once 'inc/config.php';

if (isset($_GET['a_id']) && isset($_GET['adm_id'])) {
        $agent_id = $_GET['a_id'];
        $admin_id = $_GET['adm_id'];

        $result = delete('agents', 'agent_id', $agent_id);
        if ($result === true) {
        	redirect("dashboard.php?id=$admin_id");
        } else {
        	$err_msg = "Agent could not be deleted";
        	redirect("dashboard.php?id=$admin_id&msg=$err_msg");
        }
    }

    if (isset($_GET['listing_id'])) {
        $listing_id = $_GET['listing_id'];

        $response = delete('listings', 'listing_id', $listing_id);
        if ($response === true) {
            $msg = "Property with ID " . $listing_id . " have been deleted";
            redirect("all-properties.php?success=$msg");
        } else {
            $err_msg = "Property could not be deleted";
            redirect("all-properties.php?msg=$err_msg");
        }
    }

    if (isset($_GET['client_id'])) {
        $client_id = $_GET['client_id'];

        $clientResponse = delete('clients', 'client_id', $client_id);
        if ($clientResponse === true) {
            $msg = "Client with ID " . $client_id . " have been deleted";
            redirect("all-clients.php?success=$msg");
        } else {
            $err_msg = "Client could not be deleted";
            redirect("all-clients.php?msg=$err_msg");
        }
    }